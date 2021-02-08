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
    $valid = true;

    //validating inputs
    if(empty($firstName)){ // if the first name field is left empty
        //warning message
        echo '<p>You must input a first name</p>';
        //link to brin guser back to fix errors
        echo '<a href="http://localhost:8080/comp-1006/Assignment1/index.php">Click to go back to Add a Student page!</a>';
        $valid = false;
    }

    if(empty($lastName)){ // if the last name field is left empty
        //warning message
        echo '<p>You must input a last name</p>';
        //link to brin guser back to fix errors
        echo '<a href="http://localhost:8080/comp-1006/Assignment1/index.php">Click to go back to Add a Student page!</a>';
        $valid = false;
    }

    if(empty($studentNumber)) { // if the student number field is empty
        //warning message
        echo '<p>You must input a student number</p>';
        //link to brin guser back to fix errors
        echo '<a href="http://localhost:8080/comp-1006/Assignment1/index.php">Click to go back to Add a Student page!</a>';
        $valid = false;
    }
    else if($studentNumber < 1000000 || $studentNumber > 9999999) {
        //warning message
        echo '<p>student number must be 7 digits</p>';
        //link to brin guser back to fix errors
        echo '<a href="http://localhost:8080/comp-1006/Assignment1/index.php">Click to go back to Add a Student page!</a>';
        $valid = false;
    }
    
    if(empty($studyYear)) {
        //warning message
        echo '<p>You must input a student number</p>';
        //link to brin guser back to fix errors
        echo '<a href="http://localhost:8080/comp-1006/Assignment1/index.php">Click to go back to Add a Student page!</a>';
        $valid = false;
    }

    if($valid == true) {// If all the users inputs have been validated
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

        //If everything goes well this statement will be displayed showing their information has been saved to database
        echo '<h1>Your item has been saved succesfully</h1>';
        echo '<p>You inputed:<br /> Name: '.$firstName.' '.$lastName.'<br /> Student Number: '.$studentNumber.'<br /> Year of Study: '.$studyYear.'</p>';
        echo '<a href="http://localhost:8080/comp-1006/Assignment1/student-info-table.php">Click me to see the updated table of enrolled students!</a>';
    }
?>
    </body>
</html>