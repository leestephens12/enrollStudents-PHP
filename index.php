<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add New Student</title>
    </head>
    <body>
        <header> <!--Header for page-->
            <h1>Add a New Student</h1>
        </header>
        <main><!--Main section for page-->
            <!--Form method passing inputed information to database-->
            <form method="post" action="student-info">
                <!--Input section for fist name-->
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName" required><br /><br />
                <!--Input section for last name-->
                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName" required><br /><br />
                <!--Input section for student number-->
                <label for="studentNumber">Student Number:</label>
                <input type="number" id="studentNumber" name="studentNumber" required><br /><br />
                <!--Input section for dropdown-->
                <label for="studyYear">Year of Study</label>
                <select id="studyYear">
<?php

    //connecting to database
    $db = new PDO('mysql:host=172.31.22.43;dbname=Lee1138287', 'Lee1138287', 'KpxdeDafpk');

    //Retrieving information from my info table
    $sql = "SELECT study_year FROM info";

    //execute sql query
    $cmd = $db->prepare($sql);
    $cmd->execute();

    //get info into variable relatives
    $studyYear = $cmd->fetchAll();

    // loop to output data
    foreach($studyYear as $year) {
    echo '<option value="'.$year['study_year'].' ">'.$year['study_year'].'</option>';
}
    echo '</select><br /><br />';

    //dsiconnect db
    $db = null;
?>
                <!--Button to submit all information-->
                <input type="submit" value="submit">
            </form>
        </main>
    </body>
</html>