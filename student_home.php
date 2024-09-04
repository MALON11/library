<?php
    include_once 'include.php';

    $sql ="SELECT * FROM books INNER JOIN books_info ON books.ISBN=books_info.ISBN";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(); 
    $bookRows = $stmt->fetchAll(PDO::FETCH_OBJ);
    //var_dump($bookRows);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>books</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <table>
        <tr>
            <td>
                ISBN
            </td>
            <td>
                Tittle
            </td>
            <td>
                Total Copies
            </td>
            <td>
                Available Copies
            </td>
            <td>
                Borrowable
            </td>
        </tr>
        <?php
            foreach($bookRows as $row){
                echo '<tr>';
                    echo '<td>';
                        echo $row->ISBN;
                    echo '</td>';
                    echo '<td>';
                        echo $row->Tittle;
                    echo '</td>';
                    echo '<td>';
                    echo $row->totalCopies;
                    echo '</td>';
                    echo '<td>';
                        echo $row->availableCopies; 
                    echo '</td>';
                    echo '<td>';
                        echo $row->borrowable;
                    echo '</td>';
                echo '</tr>';
            }        
        
        ?>
    </table>
</body>
</html>