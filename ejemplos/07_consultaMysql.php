
            <?php

                require "./includes/config.php";
                $db = new DB();
                $datosTabla = $db->registroTodosMysqli("books");
                Header("Content-type:application/json");
                $json = json_encode($datosTabla);
                echo $json;
            ?>