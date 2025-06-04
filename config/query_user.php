<?php

if (isset($_POST['reg_submit'])){
    if(user_function($_POST['reg_name'], $_POST['reg_pwd'])){
        echo 'Erfolgreich registriert und User in der DB abgelegt!';
    }
}
// hier sollte noch was rein 
?>