<?php
echo "hell";
mysql_connect('localhost','root','') or die("error");
mysql_select_db('anubhav');

ob_start();
session_start();
//$current_file=$_SERVER['SCRIPT_NAME'];

//if(isset($_POST['email'])&&isset($_POST['pass'])){

if(isset($_POST['submit']))
{
  echo "hello";
   $user=mysql_real_escape_string($_POST['email']);
   $pass=mysql_real_escape_string($_POST['pass']);

  // $password=md5($pass);
   if(!empty($user) && !empty($pass)){
    echo "ABC";
   	$query="select 'username' from 'users' where 'username'='$user' and password='$pass'";
          $query_run=mysql_query($query);
//         if($query_run=mysql_query($query)){
//$id=$query_row('username');
//echo $id;
   $query_num_rows=mysql_num_rows($query_run);
    if($query_num_rows==0){
    	echo "invalid username/password combination";
}
   	else{
    		echo 'ok';
    	}

    

   }

}
    	else{
   	echo 'you must supply';
   }

?> 
<form action="<?php echo $current_file;?>" method="post">

Username: <input type="text" name="email"><br>
password: <input type="password" name="pass"><br>
<input type="submit" value="log in" name="submit">
</form>
