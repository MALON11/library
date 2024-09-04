<?php
    include_once 'include.php';  
    
    if( isset($_POST['username']) && isset($_POST['password'])){
        //echo "you";die;
        $username = $_POST['username'];
        $password = $_POST['password'];
        //echo $username; die;
        // select a particular user by id and password
        $stmt = $pdo->prepare("SELECT COUNT(*) AS count FROM staffs WHERE reg_No = ? AND `password` = ?");
        $stmt->execute([$username, $password]); 
        $staffRow = $stmt->fetch(PDO::FETCH_OBJ);
        //var_dump($staffRow); die;

        if($staffRow && $staffRow->count == 1){
            $stmt = $pdo->prepare("SELECT `Role` FROM staffs WHERE reg_No = ? AND `password` = ?");
            $stmt->execute([$username, $password]);
            $staffRole = $stmt->fetch(PDO::FETCH_OBJ);
           
            if($staffRole->Role == "Librarian"){
               
                $_SESSION['reg_No'] = $username;
                header("Location: librarian_home.php");
                exit;
            }else{
                $_SESSION['reg_No'] = $username;
                header("Location: staffs_home.php");
                exit;
            }                   
        }

        $stmt = $pdo->prepare("SELECT COUNT(*) AS count FROM students WHERE reg_No = ? AND `password` = ?");
        $stmt->execute([$username, $password]); 
        $studentRow = $stmt->fetch(PDO::FETCH_OBJ);
        //var_dump($studentRow->count); die;

        if($studentRow && $studentRow->count == 1){ 
            $_SESSION['studentId'] = $username;
            header("Location: student_home.php");
            exit;
        }
        else{
            
            header("Location: index.php?incorrectLogin=1");
        }
        
    } //else echo "nothing!";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="header">
        <h1>MBEYA UNIVERSITY OF SCIENCE AND TECHNOLOGY</h1>
    </div>
    <form action="" method="post">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required><br>
        <input type="checkbox" name="" id=""> Remember Me
        <a href="#">Forgot Password?</a><br>
        <button type="submit">Login</button>
    </form>
</body>

</html>