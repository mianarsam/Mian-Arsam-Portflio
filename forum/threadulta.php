<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome To @imers-Coding Forums</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>

    <!-- NABBAR -->
    <?php include'partials/_dbconnect.php';  ?>
    <?php include'partials/_header.php';  ?>
    
 
    <?php   
         $id = $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE thread_id=$id"; 
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $title = $row['thread_title'];
        $desc = $row['thread_desc'];
        $thread_user_id=$row['thread_user_id'];
        $sql2 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $posted_by=$row2['user_email'];
    
         }
    ?>


<?php
      $showAlert=false;
$method= $_SERVER['REQUEST_METHOD'];
if($method=='POST'){
    // INESRT
    $comment=$_POST['comment'];
    $comment = str_replace( "<", "&lt;",$comment);
    $comment = str_replace( ">", "&gt;",$comment);
    $sno=$_POST['sno'];
    
 
    $sql = "INSERT INTO `comments` ( `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ( '$comment', '$id', '$sno', current_timestamp())"; 
    $result = mysqli_query($conn, $sql);
    $showAlert = true;
    if($showAlert){ 
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your Comment Has Been Inserted
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
     }
}

?>






<!-- JUMBOTRON -->
<div class="container my-4">
    <div class="p-5 mb-4 bg-body-secondary rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold"><?php echo $title; ?></h1>
            <p class="col-md-8 fs-4"><?php echo $desc; ?></p>
                <hr class="my-2">
                <p>No Spam / Advertising / Self-promote in the forums. ...
                    Do not post copyright-infringing material. ...
                    Do not post “offensive” posts, links or images. ...
                    Do not cross post questions. ...
                    Do not PM users asking for help. ...
                    Remain respectful of other members at all times.</p>
            <p class="text-success">Posted by: <strong> <em> <?php    echo "$posted_by"?></em> </strong></p>
        </div>
    </div>
    </div>

   <?php
     if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=="true"){ 
   echo '<div class="container">
        <h1 class="text-center py-2">Post a Comment</h1>
        <form action=" '.$_SERVER["REQUEST_URI"].'  " method="post">
     
            <div class="mb-3">
                <label for="comment" class="form-label">Type Your Comment</label>
                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                <input type="hidden" name="sno" value="'. $_SESSION["sno"]. '">
            </div>

            <button type="submit" class="btn btn-primary">Post Comment</button>
        </form>
    </div>';
     }
     else{

        echo '<div class="container">
        <h1 class="text-center py-2">Post a Comment</h1>
            <h2> <span class="badge bg-success">Please Login First To Post a Comment</span></h2>
            <button class="btn btn-warning"  data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
        </div>' 
       ;
        }

?>
    <div class="container">
        <h1 class="text-center py-2"> Discussions </h1>

         <?php     $id=$_GET['threadid'];
    $sql = "SELECT * FROM `comments` WHERE thread_id=$id"; 
         $result = mysqli_query($conn, $sql);
         $noResult=true;
         while($row = mysqli_fetch_assoc($result)){
            $noResult=false;
            $id=$row['comment_id'];
            $content=$row['comment_content'];
              $comment_time = $row['comment_time'];
              $comment_by= $row['comment_by']; 
              $sql2 = "SELECT user_email FROM `users` WHERE sno='$comment_by'";
              $result2 = mysqli_query($conn, $sql2);
              $row2 = mysqli_fetch_assoc($result2);
              
     

      echo '<div class="d-flex ">
        <div class="flex-shrink-0">
          <img src="img/default-avatar-placeholder-profile-icon-male-vector-23889994.jpg" alt="..." width="54px">
        </div>
        <div class="flex-grow-1 ms-3">
           
          '.$content.'
        </div> <p class="font-weight-bold my-0">'. $row2['user_email'] .' at '. $comment_time. '</p>
      </div>';
    }
    if($noResult){
        echo '<div class="container my-2">
        <div class="p-5 text-center bg-body-secondary rounded-3">
          <h4 class="text-body-emphasis">  <strong> No Comments yet</strong></h4>
          <p class="lead">
           Be the first person to post a comment
          </p>
        </div>
      </div>';
    }
    
        ?> 
    
   
   
   
    <!-- FOOTER -->

    <?php  include'partials/_footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>