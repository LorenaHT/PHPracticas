
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "elrincon";
            $dbname = "tienda";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM books ORDER BY category_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                //$rows = array();
                // output data of each row
               // echo "<ul>";
                while ($row = $result->fetch_assoc()) {
                    $rows[] = $row;
                  //  echo "<li> ";
                //    foreach ($row as $k => $v)
                      //  echo $k . "=>" . $v.", ";
                   // echo "</li> ";
                }
              //  echo "</ul>";
                //var_dump($rows);
                Header("Content-type:application/json");
                print (json_encode($rows));
             //   $x= xmlrpc_encode($rows);


            } else {
                echo "No hay registros";
            }
            $conn->close();
            ?>