<?php session_start(); ?>

<?php
if(isset($_POST['disconect']))
{
session_destroy();
header ('Location: index.php');
}
?>