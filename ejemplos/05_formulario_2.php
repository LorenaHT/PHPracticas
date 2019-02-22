<!DOCTYPE HTML>
<html>
<head>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>

<?php

function char_at($str, $pos)
{
    return $str{$pos};
}
// define variables and set to empty values
$numerosErr = $fechaErr = $emailErr = $nifErr = "";
$numeros = $fecha = $email = $nif = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") { //primera vez o datos enviados
    if (empty($_POST["numeros"])) {
        $numerosErr = "Numeros is required";
    } else {
        $numeros = test_input($_POST["numeros"]);
        // check if name only contains letters and whitespace
        if (!filter_var($numeros, FILTER_VALIDATE_INT)) {
            $numerosErr = "Only numbers and white space allowed";
        }
    }

    if (empty($_POST["fecha"])) {
        $fechaErr = "Fecha is required";
    } else {
        $fecha = test_input($_POST["fecha"]);
        // check if fecha address is well-formed
        $matches = explode('/', $fecha);
        $pattern = '/^([0-9]{1,2})\\/([0-9]{1,2})\\/([0-9]{4})$/';
        if (!preg_match($pattern, $fecha, $matches))
             $fechaErr = "Fecha incorrecta";
        else if (!checkdate($matches[2], $matches[1], $matches[3]))
            $fechaErr = "Fecha incorrecta";
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Email erroneo";
        }
    }

    if (empty($_POST["nif"])) {
        $nifErr = "El DNI es un campo obligatorio";
    } else {
        $nif = test_input($_POST["nif"]);
        // check if name only contains letters and whitespace
        $validChars = 'TRWAGMYFPDXBNJZSQVHLCKET';
        $nifRexp = "/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKET]$/i";
        $nieRexp = "/^[XYZ][0-9]{7}[TRWAGMYFPDXBNJZSQVHLCKET]$/i";
        $str = strtoupper($nif);

        if (!preg_match($nifRexp,$str) && !preg_match($nieRexp,$str))
           $nifErr="DNI erroneo";

        $nie = str_replace($str, "/^[X]/", '0');
        $nie = str_replace($str, "/^[Y]/", '1');
        $nie = str_replace($str, "/^[Z]/", '2');

  $letter = substr($str, -1);
  $charIndex = intval(substr($nif, 0, 8) % 23);


  if (char_at($validChars , $charIndex) !== $letter) {
      $nifErr = "DNI incorrecto";
  }



    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field.</span></p>
<!-- <form method="post" action="<?php //$_SERVER['PHP_SELF'];?>"> -->
    <form method="post" action="<?= $_SERVER['REQUEST_URI'];?>">
    Numeros: <input type="text" name="numeros" value="<?= $numeros;?>">
    <span class="error">* <?php echo $numerosErr;?></span>
    <br><br>
    Fecha (dd/mm/yyyy): <input type="text" name="fecha" value="<?=$fecha;?>">
    <span class="error">* <?php echo $fechaErr;?></span>
    <br><br>
    Email: <input type="text" name="email" value="<?=$email;?>">
    <span class="error"><?php echo $emailErr;?></span>
    <br><br>
    DNI: <input type="text" name="nif" value="<?=$nif;?>">
    <span class="error"><?php echo $nifErr;?></span>
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $numeros;
echo "<br>";
echo $fecha;
echo "<br>";
echo $email;
echo "<br>";
echo $nif;
?>

</body>
</html>