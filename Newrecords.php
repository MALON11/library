<?php
    include_once 'include.php';  
    $regNo = $_SESSION['reg_No'];

    $stmt = $pdo->prepare("SELECT * FROM staffs WHERE reg_No = ?");
    $stmt->execute([$regNo]); 
    $librarianRow = $stmt->fetch(PDO::FETCH_OBJ);
    //echo $librarianRow->Names;

    if( isset($_POST['ISBN']) && isset($_POST['regNumber'])){
        $stdntRegNo = 0;
        $staffRegNo = 0;

        $ISBN = $_POST['ISBN'];
        $regNumber = $_POST['regNumber'];
        $borrowedDate = $_POST['borrowedDate'];
        $returnDate = $_POST['returnDate'];

        $stmt = $pdo->prepare("SELECT COUNT(*) AS count FROM books WHERE ISBN = ? "); 
        $stmt->execute([$ISBN]); 
        $bookRow = $stmt->fetch(PDO::FETCH_OBJ);

        if($bookRow->count == 1){
            $stmt = $pdo->prepare("SELECT COUNT(*) AS count FROM staffs WHERE reg_No = ? ");
            $stmt->execute([$regNumber]); 
            $staffRow = $stmt->fetch(PDO::FETCH_OBJ);
        }else{
            $errorISBN="Incorrect ISBN!";
        }

        if($staffRow->count == 1){
            $stmt = $pdo->query("INSERT INTO borrowed_books_staffs VALUES ('',$ISBN,$regNumber,'$borrowedDate','$returnDate')");
            //$stmt->execute([$regNumber]);
        }else{
            $stmt = $pdo->prepare("SELECT COUNT(*) AS count FROM students WHERE reg_No = ? ");
            $stmt->execute([$regNumber]); 
            $studentRow = $stmt->fetch(PDO::FETCH_OBJ);

            if($studentRow->count == 1){
                $stmt = $pdo->query("INSERT INTO borrowed_bookstudents VALUES ('',$ISBN,$regNumber,'$borrowedDate','$returnDate')");
                //$stmt->execute([$regNumber]);
            }else{
                $errorRegNo="Incorrect registration number!";
            }
        }
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Records</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <h1>MBEYA UNIVERSITY OF SCIENCE AND TECHNOLOGY</h1>
    </div>
    <form action="" method="post">
        <label for="ISBN">ISBN</label>
        <input type="text" name="ISBN" id="" required> <?php echo @$errorISBN;?>
        <label for="Reg Number">Reg Number</label>
        <input type="text" name="regNumber" id="" required> <?php echo @$errorRegNo;?>
        <label for="Borrowed Date">Borrowed Date</label>
        <input type="date" name="borrowedDate" id="" required> 
        <label for="Return Date">Return Date</label>
        <input type="date" name="returnDate" id="" required><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>