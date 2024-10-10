<?php 

require "./person/person.php";


if (isset($_POST['submit']))  {
    $person = new Person(
        $_POST['fname'], 
        $_POST['lname'], 
        $_POST['uname'], 
        $_POST['passwrd'], 
        $_POST['dob'], 
        $_POST['email'], 
        $_POST['contact']
    );
    $person->save();
    header("Location: dashboard.php");
    exit();
}   

?>

<!DOCTYPE html>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
</head>
<body>
    <h1>Sign Up</h1>
    <div>
        <form action="" method="post">
            <label for="fname">First Name</label><br>
            <input type="text" name="fname" id=""><br>

            <label for="lname">Last Name</label><br>
            <input type="text" name="lname" id=""><br>

            <label for="uname">User Name</label><br>
            <input type="text" name="uname" id=""><br>

            <label for="passwrd">Password</label><br>
            <input type="password" name="passwrd" id=""><br>

            <label for="dob">Date of Birth</label><br>
            <input type="date" name="dob" id=""><br>

            <label for="email">Email</label><br>
            <input type="email" name="email" id=""><br>

            <label for="contact">Contact</label><br>
            <input type="tel" name="contact" id=""><br>

            <input type="submit" value="signup" name="submit">
            <button><a href="login.php">login</a></button>

        </form>
    </div>
</body>
</html>