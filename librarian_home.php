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
    <title>Librarian</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
    <h1>MBEYA UNIVERSITY OF SCIENCE AND TECHNOLOGY</h1>
    </div>
    <h3>Welcome <?php echo $librarianRow->Names.'!'; ?></h3>
    
    <nav>
        <ul>
            <li><a href="books.php">Books</a></li>
            <li><a href="records.php">Records</a></li>
        </ul>
    </nav>
</body>
</html>