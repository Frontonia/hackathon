<?PHP

session_start();

$linkBD = mysqli_connect($_SESSION['bdHost'], $_SESSION['bdUser'], $_SESSION['bdPassword'], $_SESSION['bdName']);

if(mysqli_errno($linkBD))
{
    echo "Ошибка подключения к базе данных(".mysqli_errno($linkBD)."):".mysqli_error($linkBD);
    exit();
}

$login = $_POST['Login'];
$password = $_POST['PasswordFirst'];

$sql = "INSERT INTO auth_data VALUES (NULL,'".$login."','".$password."');";
mysqli_query($linkBD, $sql);
$_SESSION['isLogin'] = True;
require_once("templates/registrationPassport.html");                                              
?>
