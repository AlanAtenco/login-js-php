<?php
session_start();
// if (isset($_SESSION['usuario'])){
//     header("location:index.php");
//     exit();
// }   
                                                            //loginPassword               //loginPassword
    if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])){
        if ($_SESSION['registro']['email']  == $_POST['email']) {
            if($_SESSION['registro']['password'] == $_POST['password']){//loginPassword
                $_SESSION['usuario'] = $_SESSION['registro'];
                echo json_encode([1,"datos correctos"]);
            }else{
                echo json_encode([0,"datos incorrectos"]);
            }
        } 
    }
?>
