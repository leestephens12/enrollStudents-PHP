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
                <input type="text" id="firstName" name="firstName"><br /><br />
                <!--Input section for last name-->
                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName"><br /><br />
                <!--Input section for student number-->
                <label for="studentNumber">Student Number:</label>
                <input type="number" id="studentNumber" name="studentNumber"><br /><br />
                <!--Button to submit all information-->
                <input type="submit" value="submit">
            </form>
        </main>
    </body>
</html>