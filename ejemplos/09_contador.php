<?php
/**
 * Created by PhpStorm.
 * User: lore9
 * Date: 21/01/2019
 * Time: 12:56
 */
session_start();

/*if(isset($_POST['reiniciar'])) {
    session_destroy();
    session_start();
}*/
//$contador = 0;

if(isset($_POST['action']) && $_POST['action'] == "Destroy") :
    session_destroy();
    session_id(uniqid());
    session_start();
else :
    if(isset($_POST['action']) && $_POST['action'] == "Sumar") :
    //$_SESSION['contador']++;
   ++$_SESSION['contador'];
    endif;
endif;
if(!isset($_SESSION['contador'])) :
    $_SESSION['contador']=0;
endif;
echo session_id() . "<br/>";

?>
<form action="<?=$_SERVER['REQUEST_URI']?>" method="POST">
    <input type="submit" name="action" value="Sumar"/>
    <input type="submit" name="action" value="Destroy"/>
    <input type="text" name="contador" value="<?=$_SESSION['contador']?>"/>
    <!--<input type="submit" name="reiniciar" value="Reiniciar Contador"/>-->
</form>
<?php
//echo "CONTADOR : " . $_SESSION['contador'];
?>