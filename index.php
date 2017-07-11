<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="src/css/base.css">
    <link rel="stylesheet" href="src/css/head.css">
    <link rel="stylesheet" href="src/css/footer.css">
    <script src="src/lib/jquery/jquery.js"></script>
    <script src="src/lib/artTemplate/template.js"></script>

</head>
<?php
include "src/include/head.html";
$id = @$_GET['id'];
switch ($id) {
    case 1:
        echo "<link rel='stylesheet' href='src/css/main.css'>";
        include "src/include/main.html";
        echo "<script src='src/js/main.js'></script>";
        break;
    case 2:
        echo "<link rel='stylesheet' href='src/css/techniqueSharing.css'>";
        include "src/include/techniqueSharing.html";
        break;
    case 3:
        echo "<link rel='stylesheet' href='src/css/techniqueSharing.css'>";
        include "src/include/log.html";
        break;
    case 4:
        include "src/include/pic.html";
        break;
    case 5:

        include "src/include/resume.html";
        break;
    case 6:
        include "src/include/contactUS.html";
        break;
    default:
        echo "<link rel='stylesheet' href='src/css/main.css'>";
        include "src/include/main.html";
        echo "<script src='src/js/main.js'></script>";
}
include "src/include/footer.html";
?>