<?php
include_once 'include.php';  
$regNo = $_SESSION['reg_No'];

$stmt = $pdo->prepare("SELECT * FROM staffs WHERE reg_No = ?");
        $stmt->execute([$regNo]); 
        $librarianRow = $stmt->fetch(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body><div class="header">
            <h1>MBEYA UNIVERSITY OF SCIENCE AND TECHNOLOGY</h1>
        </div>
    <nav>
        <ul>
             <li><a href="view.php">View</a></li>
            <li><a href="Newrecords.php">Newrecords</a></li>    
        </ul>
    </nav>
</body>
</html>