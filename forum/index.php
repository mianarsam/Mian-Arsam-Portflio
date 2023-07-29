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
    

    <!-- CROUSEL -->
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/pexels-thirdman-5981929.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/pexels-josh-sorenson-1714205 (2).jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/pexels-tima-miroshnichenko-6499021 (2).jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- CARD -->
    <div class="container my-3 text-center">
        <h2 class="text-center">@imers - Browse Categories</h2>
        <div class="row">

        <?php 
         $sql = "SELECT * FROM `categories`"; 
         $result = mysqli_query($conn, $sql);
         while($row = mysqli_fetch_assoc($result)){
            $id = $row['category_id'];
            $cat=$row['category_name'];
            $desc=$row['category_description'];
        //   echo $row['category_id'];
        //   echo $row['category_name'];


        echo ' <div class="col  my-3 ">
        <div class="card text-center" style="width: 18rem;">
            <img src="img/card-'.$id.'.png"  class="card-img-top " alt="...">
            <div class="card-body">
                <h5 class="card-title"> <a href="threads.php?catid='.$id.'"  id="imp"> '.$cat.'</a></h5>
                <p class="card-text"  >'. substr($desc,0,90) .'....</p>
                <a   href="threads.php?catid='.$id.'"    class="btn btn-primary"   >Veiw Threads</a>
            </div>
        </div>
    </div>' ;

}

?>
</div>
</div>

    <!-- FOOTER -->
    <?php  include'partials/_footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>