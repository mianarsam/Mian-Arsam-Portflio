<head><link rel="preconnect" href="https://fonts.googleapis.com"></head>
<style>
    body{
        font-family: 'Bebas Neue', sans-serif;

    }
    #imp {
    text-decoration: none;
}
#imp{
    color: black;
}
#imp:hover {
    color: green;
}
</style>
<?php

session_start();



echo '<nav class="navbar navbar-expand-lg navbar bg-success " data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/forum">@imers</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/forum">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
         
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                  Top  Categories
                </a>
                <ul class="dropdown-menu">';
                $sql = "SELECT category_name, category_id FROM `categories` LIMIT 3";
                $result = mysqli_query($conn, $sql); 
                while($row = mysqli_fetch_assoc($result)){
                  echo '<a class="dropdown-item" href="threads.php?catid='. $row['category_id']. '">' . $row['category_name']. '</a>'; 
                }


echo '</ul>
</li>';
                 
         echo '     
       
       </ul>';
        
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=="true"){
        echo '  <form class="d-flex" role="search" action="search.php" method="get">
                <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-warning" type="submit">Search</button>
               
               
            </form>
           <a href="partials/logout.php" role="button" class="btn btn-warning mx-2 my-2" >Logout</a> 
<h3 class="text-light mx-3">  <strong>Welcome </strong> <em>'.$_SESSION['useremail'].'</em> </h3> '  ;
          
        
           }
            
else{ 
      echo    '  
      <form class="d-flex" role="search" action="search.php" method="get">
      <input class="form-control me-2"  name="search" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-warning" type="submit">Search</button>
      </form>
      <div class="mx-3 my-3" >
                <button class="btn btn-warning"  data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                <button class="btn btn-warning"  data-bs-toggle="modal" data-bs-target="#signupModal">Sign Up</button>
            </div>';}
 echo      '  </div>
    </div>
</nav> '; 
include 'partials/_loginModal.php';
include 'partials/_signupModal.php';
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>CONGRATULATIONS!</strong> Your Info Has Been Submited You Can Now Login
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
 }  
 
 if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="false"){
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
    <strong>Error</strong> 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
          }
        //   if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=="true"){
       
            
        if(isset($_SESSION['status'])){
            echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
            <strong>CONGRATULATIONS!</strong> '.$_SESSION['useremail'].' '.$_SESSION['status'].'
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
            unset ($_SESSION['status']);
        } 
       
      
     