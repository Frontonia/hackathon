<?PHP

session_start();

if(!$_SESSION['isLogin'])
{
    require_once("templates/login.html"); 
}

$linkBD = mysqli_connect($_SESSION['bdHost'], $_SESSION['bdUser'], $_SESSION['bdPassword'], $_SESSION['bdName']);

if(mysqli_errno($linkBD))
{
    echo "Ошибка подключения к базе данных(".mysqli_errno($linkBD)."):".mysqli_error($linkBD);
    exit();
}

$nameFirst = $_POST['NameFirst'];
$nameLast = $_POST['NameLast'];
$numpass = $_POST['Numpass'];
$birthday = $_POST['Birthday'];
$city = $_POST['City'];
$street = $_POST['Street'];
$phone = $_POST['Phone'];

$sql = "INSERT INTO passport VALUES (NULL,'".$nameFirst."','".$nameLast."','".$numpass."','".$birthday."','".$city."','".$street."','".$phone."');";
mysqli_query($linkBD, $sql);
#require_once("templates/addStudent.html");                                              
?>
