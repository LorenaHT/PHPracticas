<section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
    <div class="my-auto">
        <h1 class="mb-0">Conexión a Base de datos

        </h1>
        <div class="subheading mb-5">
            <?php
            require "./includes/config.php";
            try{
            /*$servername = "localhost";
            $username = "root";
            $password = "elrincon";
            $database="tienda";
            // Create connection
            $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);*/
            $db = new DB();
            $conn = $db->getConexionPDO();
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $categoria = 1;
            $sentencia = $conn->prepare("select* from books where category_id = :xyz");
            $sentencia->bindParam(':xyz', $categoria);
            //$sql = "select * from books where category_id=".$categoria;
            $sentencia->execute();
            //$stmt = $conn->query($sql);
                $results = $sentencia->fetchAll(PDO::FETCH_ASSOC);
           // $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo "<ul>";
            foreach ($results as $k => $v) {
                echo "<li>";
                foreach ($v as $k1 => $v1)
                    echo $k1 . " => " . $v1 . " ; ";
                echo "</li>";
            }
            echo "</ul>";
            }catch (PDOException $ex){
                echo $ex->getMessage();
            }catch (Exception $ex){
                echo $ex->getMessage();
            } finally {
                echo "Me ejecuto SIEMPRE";
                $conn = null;
            }
            ?>
        </div>
    </div>
</section>



