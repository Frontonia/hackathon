<?PHP
// Пусть отсюда будет Main
session_start();

$_SESSION['bdHost'] = "localhost:3302";
$_SESSION['bdUser'] = "root";
$_SESSION['bdPassword'] = "";
$_SESSION['bdName'] = "hackathon";
$_SESSION['isLogin'] = False;
require_once("template/login.html");
?>
