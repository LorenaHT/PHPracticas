<?php
$servername = "localhost";
$username = "root";
$password = "elrincon";
$dbname = "shop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) :
    die("Connection failed: " . $conn->connect_error);
endif;

$sql = "SELECT * FROM categories";
$result = $conn->query($sql);

if ($result->num_rows > 0) :
    $myXMLData = "<?xml version='1.0' encoding='UTF-8'?>";
    $myXMLData .= "<resultados>";

    while ($row = mysqli_fetch_assoc($result)) :
        $myXMLData .= "<fila>";
        foreach ($row as $k => $v) :

            $myXMLData .= "<$k>";
            $myXMLData .= "$v";
            $myXMLData .= "</$k>";

        endforeach;
        $myXMLData .= "</fila>";

    endwhile;
    $myXMLData .= "</resultados>";
else  :
    echo "No hay registros";
endif;
//var_dump($myXMLData);
$xml = simplexml_load_string($myXMLData) or die('Error: No es posible crear el objeto XML');

header('Content-type:  text/xml');
echo $xml->asXML();