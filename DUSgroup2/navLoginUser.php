<?php
include "header.php";
include "header2.php";
include "side.php";
require "dbconfig.php";

$username = $password = "";
$usernameError = $passwordError = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //check username 檢查帳號
    if(empty(trim($_POST["username"]))){
        $usernameError = "Please enter your account username.";
    }else{
        $username = trim($_POST["username"]);
    }
    //check pwd 檢查密碼
    if(empty(trim($_POST["password"]))){
        $passwordError = "Please enter password";
    }else{
        $password = trim($_POST["password"]);
    }
    //confirm with database 驗證帳密
    if(!empty($username) && !empty($password)){
        //撈資料庫相同帳號的資料
        $sql = "SELECT username, password, is_manager, id FROM user
                WHERE username = :username";
        $statement = $pdo -> prepare($sql);
        $statement -> bindParam(":username", $username, PDO::PARAM_STR);
        $statement -> execute();

        if($statement -> rowCount() == 1){
            $data = $statement -> fetch();
            $dbhashPassword = $data["password"];

            if(password_verify($password, $dbhashPassword) && $data["is_manager"] == 0){
                //比對成功
                // session_start();
                $_SESSION["username"] = $username;
                $_SESSION["id"] = $data["id"];
                $_SESSION["loginStatus"] = 2;
                // header("location: facilities.php"); //don't know why
                // echo "789";
                echo "<script>alert('Successfully logged in!');
                    window.location = 'facilities.php';
                    </script>";

            }elseif(password_verify($password, $dbhashPassword) && $data["is_manager"] == 1){
                // session_start();
                $_SESSION["username"] = $username;
                $_SESSION["id"] = $data["id"];
                $_SESSION["loginStatus"] = 1;
                // header("location: facilities.php");
                echo "<script>alert('Successfully logged in!');
                    window.location = 'facilities.php';
                    </script>";
            }else{
            //比對失敗
            $passwordError = "This is an invalid password.";
            }
        }else{
            $usernameError = "Account username doesn't exist.";
        }
        unset($statement);
    }
    unset($pdo);
}
?>

<div class="span9">
    <h1>User Login</h1>
</div>

<div class="span9">
    <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST">

        <div>
            <label class="col-form-label" for="usernameId">Username</label>
            <input type="text" class="form-control" placeholder="Username" id="usernameId" name="username">
            <span class="help-block"><?php echo $usernameError?></span>
        </div>

        <div>
            <label class="col-form-label" for="passwordId">Password</label>
            <input type="password" class="form-control" placeholder="Password" id="passwordId" name="password">
            <a href="navLoginPwdForgot.php">Forgot password?</a>
            <span class="help-block"><?php echo $passwordError?></span>
        </div>

        <div>
            <button type="submit" class="btn btn-warning" name="userLogin">Log in</button>
        </div>

        <div>
            Not a user yet?
            <a href="navLoginRegister.php">Register now!</a>
        </div>
    </form>
</div>



<?php include "footer.php";?>