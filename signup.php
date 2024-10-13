<?php 

require "./person/person.php";
require "./public/template/head.php";

session_start();


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
    $_SESSION['person'] = serialize($person);
    header("Location: dashboard.php");
    exit();
}   

$title = "Sign up";
$css = [
    "./public/style/logins.css",
    "./public/style/style.css"
];

?>

<!DOCTYPE html>


<html lang="en">

<?= headerTemplate($title, $css) ?>

<body>
    <h1>Sign Up</h1>
    <div class="formlogin">
        <form action="./signup.php" method="post">
            <label for="fname">First Name</label><br>
            <input type="text" name="fname" id="" class="formlogininp"><br>

            <label for="lname">Last Name</label><br>
            <input type="text" name="lname" id="" class="formlogininp"><br>

            <label for="uname">User Name</label><br>
            <input type="text" name="uname" id="" class="formlogininp" value=""><br>

            <label for="passwrd">Password</label><br>
            <input type="password" name="passwrd" id="" class="formlogininp" value=""><br>

            <label for="dob">Date of Birth</label><br>
            <input type="date" name="dob" id="" class="formlogininp"><br>

            <label for="email">Email</label><br>
            <input type="email" name="email" id="" class="formlogininp"><br>

            <label for="contact">Contact</label><br>
            <input type="tel" name="contact" id="" class="formlogininp"><br>

            <input type="submit" value="signup" name="submit">
            <button><a href="login.php">login</a></button>

        </form>
    </div>
</body>
</html>