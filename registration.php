<?PHP

session_start();


$linkBD = mysqli_connect($_SESSION['bdHost'], $_SESSION['bdUser'], $_SESSION['bdPassword'], $_SESSION['bdName']);

var_dump( mysqli_errno($linkBD));
if(mysqli_errno($linkBD))
{
    echo "Ошибка подключения к базе данных(".mysqli_errno($linkBD)."):".mysqli_error($linkBD);
    exit();
}

$login = $_POST['Login'];
$password = $_POST['Password'];

var_dump($linkBD);
$sql = "INSERT INTO auth_data VALUES (NULL,'".$login."','".$password."');";
var_dump(mysqli_query($linkBD, $sql));


#require_once("template/addStudent.html");                                              

?>