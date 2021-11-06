<?php
function Conectarse()
{
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "clase";
$link = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

return $link;

}

?>