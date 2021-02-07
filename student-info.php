<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Student Saved</title>
    </head>
    <body>
<?php
//getting the values from the input page
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $studentNumber = $_POST['studentNumber'];
    $studyYear = $_POST['studyYear'];

    //connecting to database
    $db = new PDO('mysql:host=172.31.22.43;dbname=Lee1138287', 'Lee1138287', 'KpxdeDafpk');

    //insert all the user info into my database
    $sql = "INSERT INTO students (first_name, last_name, student_number, study_year) VALUES (:firstName, :lastName, :studentNumber, :studyYear)";

    //execute sql query
    $cmd = $db->prepare($sql);
    $cmd-> bindParam (':firstName', $firstName, PDO::PARAM_STR, 15);
    $cmd-> bindParam (':lastName', $lastName, PDO::PARAM_STR, 15);
    $cmd-> bindParam (':studentNumber', $studentNumber, PDO::PARAM_INT);
    $cmd-> bindParam (':studyYear', $studyYear, PDO::PARAM_STR, 10);
    $cmd->execute();

    //dsiconnect db
    $db = null;

    echo '<h1>Your item has been saved succesfully</h1>';
    echo '<p>You inputed:<br /> Name: '.$firstName.' '.$lastName.'<br /> Student Number: '.$studentNumber.'<br /> Year of Study: '.$studyYear.'</p>';
    echo '<a href="http://localhost:8080/comp-1006/Assignment1/student-info-table.php">Click me to see the updated table of enrolled students!</a>';
?>
    </body>
</html>