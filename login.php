<?PHP
/// UTILIT FUNCTION BEGIN//////////////////
function isStudent($linkBD, $login, $password)
{
    $sql = "select id from student where login = '".$login."' and password = '".$password."'";
    $result = $linkBD->query($sql);
    if($arr = $result->fetch_assoc()) 
    {
        $_SESSION['studentId'] = $arr['id'];
        return true;
    }
    return false;
}


function isTeacher($linkBD, $login, $password)
{
    $sql = "select id from teacher where login = '".$login."' and password = '".$password."'";
    $result = $linkBD->query($sql);
    if($arr = $result->fetch_assoc()) 
    {
        $_SESSION['teacherId'] = $arr['id'];
        return true;
    }
    return false;
}

/// UTILIT FUNCTION END//////////////////



/// MAIN BEGIN//////////////////
session_start();
$_SESSION['bdHost'] = "localhost";
$_SESSION['bdUser'] = "root";
$_SESSION['bdPassword'] = "";
$_SESSION['bdName'] = "misha";


$login = $_POST['Login'];
$password = $_POST['Password'];
$linkBD = mysqli_connect($_SESSION['bdHost'], $_SESSION['bdUser'], $_SESSION['bdPassword'], $_SESSION['bdName']);


if(mysqli_errno($linkBD))
{
    echo "Ошибка подключения к базе данных(".mysqli_errno($linkBD)."):".mysqli_error($linkBD);
    exit();
}

if($login == $password && $password == 'admin')
{
    $_SESSION['admin'] = true;
    require_once("template/admin.html");
    exit();
}

if(isTeacher($linkBD, $login, $password))
{
    $_SESSION['teacher'] = true;
    require_once("template/teacher.html");
    exit();
}

if(isStudent($linkBD, $login, $password))
{
    $_SESSION['student'] = true;
    require_once("template/student.html");
    exit();
}    
/// MAIN END//////////////////
?>