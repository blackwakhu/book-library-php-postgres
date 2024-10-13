<?php 

require "./person/person.php";
require "./public/template/head.php";

session_start();


if (isset($_POST['signup']))  {
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

if (isset($_POST["login"]))  {
    header("Location: login.php");
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
    
    <div class="formlogin">
        <h1>Sign Up</h1>
        <form action="./signup.php" method="post">
            <label class="formloginlabel" for="fname">First Name</label><br>
            <input type="text" name="fname" id="" class="formlogininp"><br>

            <label class="formloginlabel" for="lname">Last Name</label><br>
            <input type="text" name="lname" id="" class="formlogininp"><br>

            <label class="formloginlabel" for="uname">User Name</label><br>
            <input type="text" name="uname" id="" class="formlogininp" value=""><br>

            <label class="formloginlabel" for="passwrd">Password</label><br>
            <input type="password" name="passwrd" id="" class="formlogininp" value=""><br>

            <label class="formloginlabel" for="dob">Date of Birth</label><br>
            <input type="date" name="dob" id="" class="formlogininp"><br>

            <label class="formloginlabel" for="email">Email</label><br>
            <input type="email" name="email" id="" class="formlogininp"><br>

            <label class="formloginlabel" for="contact">Contact</label><br>
            <input type="tel" name="contact" id="" class="formlogininp"><br>

            <input type="submit" value="Sign up" name="signup">
            <input type="submit" value="Login" name="login">

        </form>
    </div>
</body>
</html>