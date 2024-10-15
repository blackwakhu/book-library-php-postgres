<?php 

require "./person/person.php";
require "./public/template/links.php";

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
    
    <div class="formlogin" id="formsignup">
        
        <h1>Sign Up</h1>
        
        <form action="./signup.php" method="post">
    
            <label class="formloginlabel" for="fname">First Name</label>
            <input type="text" name="fname" id="" class="formlogininp">

            <label class="formloginlabel" for="lname">Last Name</label>
            <input type="text" name="lname" id="" class="formlogininp">

            <label class="formloginlabel" for="uname">User Name</label>
            <input type="text" name="uname" id="" class="formlogininp" value="">

            <label class="formloginlabel" for="passwrd">Password</label>
            <input type="password" name="passwrd" id="" class="formlogininp" value="">

            <label class="formloginlabel" for="dob">Date of Birth</label>
            <input type="date" name="dob" id="" class="formlogininp">

            <label class="formloginlabel" for="email">Email</label>
            <input type="email" name="email" id="" class="formlogininp">

            <label class="formloginlabel" for="contact">Contact</label>
            <input type="tel" name="contact" id="" class="formlogininp">

            <input type="submit" value="Sign up" name="signup">
            <input type="submit" value="Login" name="login">

        </form>
    </div>
</body>
</html>