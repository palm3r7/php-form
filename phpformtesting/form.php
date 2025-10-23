<?php
//error checking
error_reporting(E_ALL);
ini_set('display_errors', 1);

//define variables
$name = $email = $comment = $gender = "";
$nameErr = $emailErr = $commentErr = $genderErr = "";

//form required
if($_SERVER["REQUEST_METHOD"] == 'POST'){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $comment=$_POST['comment'];
    $gender=$_POST['gender'];

    //check if name has been entered
    if(empty($_POST['name'])){
        $nameErr = 'PLEASE ENTER YOUR NAME!';
    } else{
        $name = test_input($_POST['name']);
    }

    //check if email has been entered
    if(empty($_POST['email'])){
        $emailErr = 'PLEASE ENTER YOUR EMAIL ADRESS!';
    } else{
        $email = test_input($_POST['email']);
    }

    //check if email adress is well formed
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $emailErr = 'INVALID EMAIL FORMAT!';
    }

    //check if comment has been entered
    if(empty($_POST['comment'])){
        $commentErr = 'PLEASE ENTER A COMMENT!';
    } else{
        $comment = test_input($_POST['comment']);
    }

    //check if gender has been entered
    if(empty($_POST['gender'])){
        $genderErr = 'PLEASE ENTER YOUR GENDER!';
    } else{
        $gender = test_input($_POST['gender']);
    }
    
    //if no errors submit form
    if(empty($nameErr) && empty($emailErr) && empty($commentErr) && empty($genderErr)){
        echo "WELCOME,$name!";
    }
}
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div>
        <form action="form.php" method="post">
            <h1>Input your data</h1>
            <label for="name">NAME:</label><br>
            <input type="text" name="name" value ="<?php echo $name;?>"><br><br>
            <?php echo $nameErr;?><br><br>

            <label for="email">EMAIL:</label><br>
            <input type="text" name="email" value ="<?php echo $email;?>"><br><br>
            <?php echo $emailErr;?><br><br>


            <label for="comment">COMMENT:</label><br>
            <input type="text" name="comment" value ="<?php echo $comment;?>"><br><br>
            <?php echo $commentErr;?><br><br>

            <label for="gender">GENDER:</label><br>
            <input type="text" name="gender" value ="<?php echo $gender;?>"><br><br>
            <?php echo $genderErr;?><br><br>
            <button type="submit">SUBMIT</button>
        </form>
    </div>
</body>
</html>