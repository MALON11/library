<?php
include_once 'include.php';

$sql ="SELECT * FROM borrowed_books_staffs";
$stmt = $pdo->prepare($sql);
$stmt->execute(); 
$borrowed_books_staffsRows = $stmt->fetchAll(PDO::FETCH_OBJ);

$sql ="SELECT * FROM borrowed_bookstudents";
$stmt = $pdo->prepare($sql);
$stmt->execute(); 
$borrowed_bookstudentsRows = $stmt->fetchAll(PDO::FETCH_OBJ);



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
    <div class="header">
        <h1>MBEYA UNIVERSITY OF SCIENCE AND TECHNOLOGY</h1>
    </div>
<table class="tb">
    <div class="header">
        <h2>Staffs Records</h2>
    </div>
        <tr>
            <td>
                ISBN
            </td>
            <td>
                reg_No
            </td>
            <td>
                borrowedDate
            </td>
            <td>
                returnDate
            </td>
        </tr>
        <?php
            foreach($borrowed_books_staffsRows as $row){
                echo '<tr>';
                    echo '<td>';
                        echo $row->ISBN;
                    echo '</td>';
                    echo '<td>';
                        echo $row->reg_No;
                    echo '</td>';
                    echo '<td>';
                    echo $row->borrowedDate;
                    echo '</td>';
                    echo '<td>';
                        echo $row->returnDate; 
                    echo '</td>';
                echo '</tr>';
            }        
        
        ?>
    </table>
    <table class="tb">
        <div class="header">
            <h2>Student Records</h2>
        </div>
        <tr>
            <td>
                ISBN
            </td>
            <td>
                reg_No
            </td>
            <td>
                borrowedDate
            </td>
            <td>
                returnDate
            </td>
        </tr>
        <?php
            foreach($borrowed_bookstudentsRows as $row){
                echo '<tr>';
                    echo '<td>';
                        echo $row->ISBN;
                    echo '</td>';
                    echo '<td>';
                        echo $row->reg_No;
                    echo '</td>';
                    echo '<td>';
                    echo $row->borrowedDate;
                    echo '</td>';
                    echo '<td>';
                        echo $row->returnd
                        ]
                        
                        
                        ate; 
                    echo '</td>';
                echo '</tr>';
            }        
        
        ?>
    </table>
    <button><a href="records.php">Back</a></button>
</body>
</html>