<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Student Information Table</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    </head>
    <body>
    <h1>Students Currently Enrolled</h1>
    <!--Creating my Table-->
        <table class="table table-hover">
            <tr> <!--Table Rows-->
                <th>First Name</th>
                <th>Last Name</th>
                <th>Student Number</th>
                <th>Year of Study</th>
            </tr>
<?php
//connecting to database
$db = new PDO('mysql:host=172.31.22.43;dbname=Lee1138287', 'Lee1138287', 'KpxdeDafpk');

//Selecting info from students table
$sql = "SELECT * FROM students";

//execute sql query
$cmd = $db->prepare($sql);
$cmd->execute();

//get info into variable students
$students = $cmd->fetchAll();

// loop to output data
foreach($students as $student) {
    echo '<tr><td>'.$student['first_name'].'</td> <td>'.$student['last_name']. '</td> <td>'.$student['student_number'].'</td><td>'.$student['study_year'].'</td></tr>';
}

//close table
echo '</table>';

//dsiconnect db
$db = null;

//Link to bring user back to add a new student
echo '<a href=http://localhost:8080/comp-1006/Assignment1/index.php> Add a New Student </a>';
?>
    </body>
</html>