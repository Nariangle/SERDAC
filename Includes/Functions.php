<?php require_once("DB.php"); ?>
<?php
function Redirect_to($New_Location){ #redirect function admin
    echo "Redirecting to : $New_Location"; //debug code to print redirect location
    
    header("Location: ".$New_Location);

    exit;
}

 
function CheckUserNameExistOrNot($Username){
    global $ConnectingDB;
    $sql = "SELECT username FROM admins WHERE username=:userName";
    $stmt = $ConnectingDB->prepare($sql);
    $stmt->bindValue(':userName',$Username);
    $stmt->execute();
    $Result = $stmt->rowCount();
    if ($Result==1){
        return true;
    } else {
        return false;
    }

}

function Login_Attempt($Username, $Password) {

    global $ConnectingDB;
    $sql = "SELECT * FROM admins WHERE username=:userName AND password=:passWord LIMIT 1";
    $stmt = $ConnectingDB->prepare($sql);
    $stmt->bindValue(':userName', $Username);
    $stmt->bindValue(':passWord', $Password);
    $stmt->execute();
    $Result = $stmt->rowCount();
        if ($Result==1) {
            return $Found_Account = $stmt->fetch();
        } else {
            return null;
        }

}

function Confirm_Login() {
    if(isset($_SESSION["UserId"])) {
        return true;
    } else {
        $_SESSION["ErrorMessage"]="Login Required !";
        Redirect_to("Admin.php");
    }
}

function check_login($con)
{
    if(isset($_SESSION['username']))
    {

        $id = $_SESSION['id'];
        $query = "select * from users where id = '$id' limit 1";

        $result = mysqli_query($con,$query);
        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }  
    }
    //redirect login
    header("location: index.php");
    die;
}

function random_num($length)
{

    $text = "";
    if($length < 5)
    {
        $length = 5;
    }

    $len = rand(4,$length);

    for ($i=0; $i < $len; $i++) { 
        # code...

        $text .= rand(0,9); 
     }
        return $text;
}


function getAuthor() {
    global $ConnectingDB;
    $query = "SELECT * FROM post GROUP BY author";
    $sql = $ConnectingDB->prepare($query);
    $sql->execute();
    return $sql->fetchAll();
}

function getAuthorDataSet() {
    global $ConnectingDB;
    $query = "SELECT * FROM dataset GROUP BY author DESC";
    $sql = $ConnectingDB->prepare($query);
    $sql->execute();
    return $sql->fetchAll();
}

function getCategories() {
    global $ConnectingDB;
    $query = "SELECT * from category GROUP BY title";
    $sql = $ConnectingDB->prepare($query);
    $sql->execute();
    return $sql->fetchAll();
}

// function check_login($con)
// {
//     if(isset($_SESSION['user_id']))
//     {

//         $id = $_SESSION['user_id'];
//         $query = "select * from users where user_id = '$id' limit 1";

//         $result = mysqli_query($con,$query);
//         if($result && mysqli_num_rows($result) > 0)
//         {
//             $user_data = mysqli_fetch_assoc($result);
//             return $user_data;
//         }  
//     }
//     //redirect login
//     header("location: userdashboard.php");
//     die;
// }

// function random_num($length)
// {

//     $text = "";
//     if($length < 5)
//     {
//         $length = 5;
//     }

//     $len = rand(4,$length);

//     for ($i=0; $i < $len; $i++) { 
//         # code...

//         $text .= rand(0,9); 
//      }
//         return $text;
// }
?>
