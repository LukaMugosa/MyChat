<?php
include("include/connection.php");

if(isset($_POST['sign_up'])){
    $name = htmlentities(mysqli_real_escape_string($con,$_POST['username']));
    $pass = htmlentities(mysqli_real_escape_string($con,$_POST['userpassword']));
    $email= htmlentities(mysqli_real_escape_string($con,$_POST['useremail']));
    $country = htmlentities(mysqli_real_escape_string($con,$_POST['usercountry']));
    $gender = htmlentities(mysqli_real_escape_string($con,$_POST['usergender']));
    $rand = rand(1,2);

    if($name === ""){
        echo "<script>alert('We can not verify your name!')</script>";
    }
    if(strlen($pass) < 8){
        echo "<script>alert('Password should be minimum 8 characters!')</script>";
        exit();
    }
    $check_email = "select * from users where user_email='$email'";
    $run_email = mysqli_query($con, $check_email);

    $check = mysqli_num_rows($run_email);
    if($check === 1){
        echo "<script>alert('Email already exist, please try again!')</script>";
        echo "<script>window.open('sign_up.php','_self')</script>";
        exit;
    }
    if($rand === 1)
        $profile_pic = "images/index.png";
    else if($rand === 2)
        $profile_pic = "images/man.png";
    $insert = "insert into users (user_name,user_pass,user_email,user_profile,user_country,user_gender) values('{$name}',md5('{$pass}'),'{$email}','{$profile_pic}','{$country}','{$gender}')";
    $query = mysqli_query($con, $insert);

    if($query){
        echo "<script>window.open('sign_in.php','_self')</script>";
        echo "<script>alert('Congratulations '{$name}', your account has been created successfully!')</script>";
    }
    else{
        echo "<script>alert('Registration failed, try again!')</script>";
        echo "<script>window.open('sign_up.php','_self')</script>";
    }
}   

?>