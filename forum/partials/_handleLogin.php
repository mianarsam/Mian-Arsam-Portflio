<?php
session_start();
$showError = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $email = $_POST['emailLogin'];
    $pass = $_POST['loginPass'];

    $sql = "Select * from users where user_email='$email'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    if($numRows==1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($pass, $row['user_pass'])){
            session_start();
            $_SESSION['status']="you have been loggedin to your account ";
           
            $_SESSION['loggedin'] = true;
            $_SESSION['sno'] = $row['sno'];
            $_SESSION['useremail'] = $email;
            echo "logged in". $email;
        } 
      
    
        header("Location: /forum/index.php");  
    }
   
   
    header("Location: /forum/index.php");  
}

?>
<!-- <?php
$login = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $email = $_POST['emailLogin'];
    $pass = $_POST['loginPass'];

    $sql = "Select * from users where user_email='$email'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    if($numRows==1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($pass, $row['user_pass'])){
            $login = true;
            
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['sno'] = $row['sno'];
            $_SESSION['useremail'] = $email;
            echo "logged in". $email;
           
        } 
      
        header("Location: /forum/index.php");
      
    }
    header("Location: /forum/index.php");
    exit;
    if(isset($_SESSION['loggedin']) || $_SESSION['loggedin']==true){

        echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
        <strong>CONGRATULATIONS!</strong> Your Info Has Been Submited You Can Now Login23
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
     }
}


?> -->