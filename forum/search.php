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
#no{
    list-style: none;
}

</style>

<body>

    <!-- NABBAR -->
    <?php include'partials/_dbconnect.php';  ?>
    <?php include'partials/_header.php';  ?>



    <div class="container my-5">
        <h1>
            Search Results For <em> <?php  echo $_GET['search']?></em></h1>

        <?php
         $noresults = true;
        $query = $_GET["search"];
        $sql = "select * from threads where match (thread_title, thread_desc) against ('$query')";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $noresults = false;

            $title = $row['thread_title'];
            $desc = $row['thread_desc']; 
            $thread_id= $row['thread_id'];
            $url = "threadulta.php?threadid=". $thread_id;
            echo '  <div class="resuts  my-4">

            <h3> <a   href="'.$url.'" id="imp"> '.$title.'</a>
            </h3>
            <p  >'.$desc.'</p>
        
   
';

}

if($noresults){
    echo  '<div class="my-5">
    <div class="p-5 text-center bg-body-secondary">
      <div class="container py-5">
        <h1 class="text-body-emphasis">No Search Results Found</h1>
        <p class="col-lg-8 mx-auto lead">
        Suggestions: <ul>
                                <li id="no" >Make sure that all words are spelled correctly.</li>
                                <li id="no">Try different keywords.</li>
                                <li id="no">Try more general keywords. </li></ul>
         </p>
      </div>
    </div>
  </div>';
 }

    ?>
 </div> 


        <!-- FOOTER -->
        <?php  include'partials/_footer.php';?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
        </script>
</body>

</html>