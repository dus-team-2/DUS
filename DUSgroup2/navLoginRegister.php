<?php
include "header.php";
include "header2.php";
include "side.php";
require "dbconfig.php";
$username = $password = $confirmPassword = "";
$usernameError = $passwordError = $confirmPasswordError = $emailError ="";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    //check username 檢查使用者名稱
    $tempUsername = trim($_POST["username"]);
    if(empty($tempUsername)){
        //空的話
        $usernameError = "Please enter your account username";
    }else{
        //檢查是否有重複帳號
        $sql = "SELECT * FROM user WHERE username = :username";
        $statement = $pdo -> prepare($sql);
        $statement -> bindParam(":username", $tempUsername, PDO::PARAM_STR); //PARAM_STR: 以字串形式做檢查
        $statement -> execute();
        if($statement -> rowCount() > 0){
            $usernameError ="This username has been registered.";
        }else{
            $username = $tempUsername;
        }
        unset($statement);
    }

    //check pwd 檢查密碼
    $tempPassword = trim($_POST["password"]);
    $tempConfirmPassword = trim($_POST["confirmPassword"]);    
    if(empty($tempPassword || empty($tempConfirmPassword))){
        $passwordError = "Please enter password twice.";
    }else{
        //檢查密碼是否大於六個字元
        if(strlen($tempPassword) < 6){
            $passwordError = "Please set password more than 6 letters.";
        }else{
            //檢查密碼是否小於16個字元
            if(strlen($tempPassword) > 16){
                $passwordError = "Please set password less than 16 letters.";
            }else{
                //是否有大寫
                if(preg_match('/[A-Z]/', $tempPassword) == 0){
                    $passwordError = "Include at least one upper case letter.";
                }else{
                    //是否有數字
                    if(preg_match('/[0-9]/', $tempPassword) == 0){
                        $passwordError = "Include at least one number.";
                    }else{
                        //放進去password
                        if($tempPassword !== $tempConfirmPassword){
                            $confirmPasswordError = "Please check your password.";
                        }else{
                            $password = $tempPassword;
                        }
                    }
                } 
            }
        }
    }

    // check email 檢查email
    $checkEmail="/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/";
    if(isset($_POST['email']) && $_POST['email']!=""){
        $tempEmail = $_POST["email"];

        $sql = "SELECT * FROM user WHERE email = :email";
        $statement = $pdo -> prepare($sql);
        $statement -> bindParam(":email", $tempEmail, PDO::PARAM_STR); //PARAM_STR: 以字串形式做檢查
        $statement -> execute();

        if($statement -> rowCount() > 0){
            $emailError ="This email has been registered.";
        }else{
            if(!preg_match($checkEmail,$tempEmail)){			
                $emailError = "Invalid format";
            }else{
                $email = $tempEmail;
            }
        }
        
    }

    // membership & question $ answer
    $membership = $_POST["membership"];
    $question = $_POST["question"];
    $answer = $_POST["answer"];


    if(!empty($username) && !empty($password) && !empty($email)){
        $sql = "INSERT INTO user (username, password, email, is_uni_member, security_question, security_answer, is_manager)
                VALUES (:username, :password, :email, :is_uni_member, :security_question, :security_answer, 0)";
        $statement = $pdo -> prepare($sql);
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);
        $statement -> bindPARAM(":username", $username, PDO::PARAM_STR);
        $statement -> bindPARAM(":password", $hashPassword, PDO::PARAM_STR);
        $statement -> bindPARAM(":email", $email, PDO::PARAM_STR);
        $statement -> bindPARAM(":is_uni_member", $membership, PDO::PARAM_STR);
        $statement -> bindPARAM(":security_question", $question, PDO::PARAM_STR);
        $statement -> bindPARAM(":security_answer", $answer, PDO::PARAM_STR);
        if($statement -> execute()){
            echo "<script>alert('Successfully registered, you can log in now!');
                window.location = 'navLoginUser.php';
                </script>";
        }else{
            echo "<script>alert('Server is busy, please try again.');
                window.location = 'navLoginRegister.php';
                </script>";
        }
        unset($statement);
    }
    unset($pdo);
}
?>

<div class="span9">
    <h1>Register</h1>
</div>

<div class="span9">
    <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST">

        <div>
            <label for="usernameId">Username</label>
            <input type="text" placeholder="Username" id="usernameId" name="username">
            <span><?php echo $usernameError?></span>
        </div>

        <div>
            <label for="passwordId">Password (6-16 characters, include at least one upper case letter and one number)</label>
            <input type="password" placeholder="Password" id="passwordId" name="password">
            <span><?php echo $passwordError?></span>
        </div>

        <div>
            <label for="confirmPasswordId">Confirm password</label>
            <input type="password" placeholder="Confirm password" id="confirmPasswordId" name="confirmPassword">
            <span><?php echo $confirmPasswordError?></span>
        </div>

        <div>
            <label for="emailId">Email</label>
            <input type="text" placeholder="abc@gmail.com" id="emailId" name="email">
            <span><?php echo $emailError?></span>
        </div>

        <div>
            <label for="questionId">Recovery Question</label>
            <input type="textarea" style="width:400px" placeholder="Your question" id="questionId" name="question" required>
            <br>
            <input type="textarea" style="width:400px" placeholder="Your answer" id="answerId" name="answer" required>
        </div>
        
        <br>

        <p>Are you a member of Durham University?</p>
        <div>
            <input type="radio" id="yesMemberId" name="membership" value="1" required>
            <label style="display:inline" for="yesMemberId">Yes</label>
            <input type="radio" id="noMemberId" name="membership" value="0">
            <label style="display:inline" for="noMemberId">No</label>
        </div>

        <br>

        <div>
            <button type="submit" class="btn btn-warning" name="registerSubmit">Register</button>
            <a href="facilities.php" class="btn btn-danger">Cancel</a>
        </div>
    </form>
</div>




<?php include "footer.php";?>



