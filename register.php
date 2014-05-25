
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["pass"])) {
     $nameErr = "Password is required";
   } else {
     $password = test_input($_POST["pass"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$password)) {
       $nameErr = "Only letters and white space allowed"; 
     }
   }
   
   if (empty($_POST["email"])) {
     $emailErr = "Email is required";
   } else {
     $email = test_input($_POST["email"]);
     // check if e-mail address syntax is valid
     if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
       $emailErr = "Invalid email format"; 
     }
   }
     if (empty($_POST["name"])) {
     $name = "";
   } else {
     $name = test_input($_POST["name"]);
   }
   

   if (empty($_POST["comment"])) {
     $comment = "";
   } else {
     $comment = test_input($_POST["comment"]);
   }

   if (empty($_POST["gender"])) {
     $genderErr = "Gender is required";
   } else {
     $gender = test_input($_POST["gender"]);
   }
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

<h2>SIGN UP</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>
   Name: <input type="text" name="name">
   
   <br><br>
   E-mail: <input type="text" name="email">
   <span class="error">* <?php echo $emailErr;?></span>
   <br><br>
   Password: <input type="password" name="pass">
 <span class="error">* <?php echo $nameErr;?></span>
   <br><br>
   Comment: <textarea name="comment" rows="5" cols="40"></textarea>
   <br><br>
   Gender:
   <input type="radio" name="gender" value="female">Female
   <input type="radio" name="gender" value="male">Male
   <span class="error">* <?php echo $genderErr;?></span>
   <br><br>
   <input type="submit" name="submit" value="Submit"> 
</form>

<?php

if(isset($_POST['submit']))
{
  SignUp();
 // newuser();


$username=mysql_real_escape_string($_POST['email']);
$pass=mysql_real_escape_string($_POST['pass']);
}
//$con=mysqli_connect('localhost','root','','anubhav');
//if (mysqli_connect_errno()) {
//  echo "Failed to connect to MySQL: " . mysqli_connect_error();
//if(!empty($_POST['email'])&&!empty($_POST['pass'])){
//mysqli_query($con,"INSERT INTO  users(username,password) values ($email,$password)");
function SignUp() {
 if(!empty($_POST['email'])) //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
 {mysql_connect('localhost','root','') or die("error");
mysql_select_db('anubhav');echo "help";
  $username=mysql_real_escape_string($_POST['email']);
$pass=mysql_real_escape_string($_POST['pass']);

  $query = mysql_query("SELECT * FROM users WHERE username = '$username' AND password = '$pass'") or die(mysql_error()); if(!$row = mysql_fetch_array($query) or die(mysql_error())) { newuser(); } else { echo "SORRY...YOU ARE ALREADY REGISTERED USER..."; } 
}
}
function newuser(){
mysql_connect('localhost','root','') or die("error");
mysql_select_db('anubhav');

$username=mysql_real_escape_string($_POST['email']);
$pass=mysql_real_escape_string($_POST['pass']);
$query="INSERT INTO  users(username,password) values ('$username','$pass')";
mysql_query($query);}
//echo $name;

//cho "<br>";
//echo $email;
//echo "<br>";

//echo $comment;
//echo "<br>";
//echo $gender;
?>

</body>
</html>
