<?php
$account = $_POST['account'];
$password = $_POST['password'];


if (isset($_POST['chris']) && $_POST['chris'] == "liu") {
    if (!($account == "admin" && $password == "123456")) {
        header("Location:error.php?mes=1");
    }else{
        header("Location:../homepage.html");
    }
} else {
    header("Location:error.php?mes=2");
}
?>
