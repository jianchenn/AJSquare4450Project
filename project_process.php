

<?php
include('project_connection.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$fname = $_POST['fname']; //variable name in the bracket must match with the name in the form
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
//if values are not empty, proceed to store them in the database
    
    
if(!empty($fname) && !empty($lname) && !empty($email) && !empty($phone) && !empty($password)){
$exist= mysqli_query($dbc, "select email from users where email = '$email'");   
    if($exist=='$email')
       echo "This email has already registered. Please use a different email "; 
    else{
    mysqli_query($dbc, "INSERT INTO users(first_name, last_name, email, pw, phone ) VALUES ('$fname', '$lname', '$email', '$password', '$phone')");
    echo " row inserted, everything worked fine!";}
}else{
echo "ERROR: you left some values in blank!";
}
}else{
echo "<strong>Please complete the form...</strong>";
}
?>