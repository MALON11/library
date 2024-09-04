<?php
    include_once '../includes/php/header.php';  
      
    if( isset($_POST['username']) && isset($_POST['password'])){
        //echo "you";
        $username = $_POST['username'];
        $password = $_POST['password'];
        //echo $username; die;
        // select a particular user by id and password
        $stmt = $pdo->prepare("SELECT COUNT(*) AS count FROM lecturers WHERE lecturerId = ? AND lecturerPassword = ?");
        $stmt->execute([$username, $password]); 
        $lecturerRow = $stmt->fetch(PDO::FETCH_OBJ);
        //var_dump($lecturerRow); die;
        if($lecturerRow && $lecturerRow->count == 1){
            $_SESSION['lecturerId'] = $username;
            header("Location: lecturer_home.php");
            exit;
        }

        $stmt = $pdo->prepare("SELECT COUNT(*) AS count FROM students WHERE studentId = ? AND studentPassword = ?");
        $stmt->execute([$username, $password]); 
        $studentRow = $stmt->fetch(PDO::FETCH_OBJ);
        //var_dump($studentRow->count); die;

        if($studentRow && $studentRow->count == 1){ 
            //$_SESSION['studentId'] = $username;
            header("Location: student_home.php");
            exit;
        }
        else{








                                           
            
            header("Location: ../index.php?incorrectLogin=1");
        }
        
    } else echo "nothing!";
?>