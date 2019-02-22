
            <?php

                require "./includes/bd.php";
                $db = new DB();
                //var_dump($datosTabla);
                //$datosTabla = $db->registroTodosMysqli("books");

                $datosTabla = $db->registroTodosPDO("books");
                echo "<ul>";
                foreach ($datosTabla as $k => $v) :
                    echo "<li>";
                    foreach ($v as $k1 => $v1) :
                        echo $k1 . " => " . $v1 . " ; ";
                    endforeach;
                    echo "</li>";
                endforeach;
                echo "</ul>";
                Header("Content-type:application/json");
                $json = json_encode($datosTabla);
                //echo $json;
            ?>