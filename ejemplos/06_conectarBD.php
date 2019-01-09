<section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
    <div class="my-auto">
        <h1 class="mb-0">Conexión a Base de datos

        </h1>
        <div class="subheading mb-5">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "elrincon";
            $database="tienda";

            // Create connection
            $conn = new mysqli($servername, $username, $password,$database);
          //  var_dump($conn);
            // Check connection
            if ($conn->connect_error) {
                die("Fallo al conectar: " . $conn->connect_error);
            }
            echo "Conexión establecida...<br/>";

            $sql = "select * from books";
            if ($conn->query($sql) ) {
                echo "Consulta realizada";
            } else {
                echo "Problema en la consulta: " . $conn->error;
            }
            $conn->close();
            ?>
        </div>
    </div>
</section>



