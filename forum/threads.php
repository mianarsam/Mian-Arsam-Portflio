<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome To @imers-Coding Forums</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<style>
</style>

<body>

    <!-- NABBAR -->
    <?php include'partials/_dbconnect.php';  ?>
    <?php include'partials/_header.php';  ?>



    

    <?php     $id=$_GET['catid'];
    $sql = "SELECT * FROM `categories` WHERE category_id=$id"; 
         $result = mysqli_query($conn, $sql);
         while($row = mysqli_fetch_assoc($result)){
            $catname=$row['category_name'];
            $catdesc=$row['category_description'];
         
    
    
         }
    ?>


    <?php
      $showAlert=false;
$method= $_SERVER['REQUEST_METHOD'];
if($method=='POST'){
    // INESRT
    $th_title=$_POST['title'];
    $th_desc=$_POST['desc'];
    $th_desc = str_replace( "<", "&lt;","$th_desc");
    $th_desc = str_replace( ">", "&lt;","$th_desc");
    $th_title = str_replace( ">", "&lt;","$th_title");
    $th_title = str_replace( "<", "&lt;","$th_title");
    $sno = $_POST['sno']; 
    $sql = "INSERT INTO `threads` ( `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ( '$th_title', '$th_desc', '$id', '$sno', current_timestamp())"; 
    $result = mysqli_query($conn, $sql);
    $showAlert=true;
    
    if($showAlert){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong>Your Problem Has Been Inserted
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    } 
}
?>
          


    <!-- JUMBOTRON -->
    <div class="container my-4">
        <div class="p-5 mb-4 bg-body-secondary rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">
                    <?php echo $catname; ?>
                </h1>
                <p class="col-md-8 fs-4">
                    <?php echo $catdesc; ?>
                </p>
                <hr class="my-2">
                <p>No Spam / Advertising / Self-promote in the forums. ...
                    Do not post copyright-infringing material. ...
                    Do not post “offensive” posts, links or images. ...
                    Do not cross post questions. ...
                    Do not PM users asking for help. ...
                    Remain respectful of other members at all times.</p>
                <button class="btn btn-success btn-lg" type="button">Learn more</button>
            </div>
        </div>
    </div>



    <?php
  
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=="true"){ 
   echo  '<div class="container">
        <h1 class="text-center py-2">Ask a Question</h1>
        <form action="  '. $_SERVER["REQUEST_URI"].'  " method="post">
    <div class="mb-3">
        <label for="title" class="form-label">Problem Title</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Keep Your title short as possible</div>
    </div>
    <div class="mb-3">
        <label for="desc" class="form-label">Elaborate Your Concern</label>
        <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
        <input type="hidden" name="sno" value="'. $_SESSION["sno"]. '">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>';
    }
    else{

    echo '<div class="container">
    <h1 class="text-center py-2">Ask a Question</h1>
        <h2> <span class="badge bg-success">Please Login First To Ask a Question</span></h2>
        <button class="btn btn-warning"  data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
    </div>' 
   ;
    }
    ?>



    <div class="container my-4">
        <h1 class="text-center py-2">Browse Questions</h1>

        <?php     $id=$_GET['catid'];
    $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id"; 
         $result = mysqli_query($conn, $sql);
         $noResult=true;
         while($row = mysqli_fetch_assoc($result)){
            $noResult=false;
            $id=$row['thread_id'];
            $title=$row['thread_title'];
            $desc=$row['thread_desc'];
            $thread_time = $row['timestamp']; 
            $thread_user_id = $row['thread_user_id']; 
            $sql2 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
            

      echo '<div class="d-flex  my-2">
        <div class="flex-shrink-0">
          <img src="img/default-avatar-placeholder-profile-icon-male-vector-23889994.jpg" alt="..." width="54px">
        </div>
        <div class="flex-grow-1 ms-3">
       
            <h5 class="mt-0">  <a href="threadulta.php?threadid='.$id.'" id="imp">'.$title.'</a> </h5>
          '.$desc.' 
        </div> <p class="font-weight-bold my-0"> Asked by : '. $row2['user_email'] .' at '. $thread_time. '</p>
      </div>';
    }


if($noResult){
    echo '<div class="container my-2">
    <div class="p-5 text-center bg-body-secondary rounded-3">
      <p class="text-body-emphasis">  <strong> No Questions yet</strong></p>
      <p class="lead">
       Be the first person to ask a question
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