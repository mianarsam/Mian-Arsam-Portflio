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
#pic {
    border: 2px solid white;
    border-radius: 107px;
}
</style>

<body>

    <!-- NABBAR -->
    <?php include'partials/_dbconnect.php';  ?>
    <?php include'partials/_header.php';  ?>
    <div class="container my-4">

        <div class="row featurette d-flex justify-content-center align-items-center">
            <div class="col-md-5 order-md-1">
                <img class="img-fluid" src="img/channels4_profile.jpg" id="pic" alt="">
            </div>

            <div class="col-md-7 order-md-2">
                <h1 class="featurette-heading fw-normal lh-1 my-2 text-center"><strong>About Us</strong> </h1>
                <p class="lead">Another featurette? Of course. More placeholder content here to give you an idea of how
                    this layout would work with some actual real-world content in place. Lorem ipsum dolor sit amet
                    consectetur adipisicing elit. Illum rem eaque error quia eligendi quis eos consequuntur tempora
                    similique, laudantium magni totam architecto, non a voluptatem alias minima, provident impedit?</p>
            </div>

        </div>
    </div>

    <div class="container my-5 " id="col">
        <div class="position-relative p-5 text-center text-muted bg-success border border-dashed rounded-5   ">

            <svg class="bi mt-5 mb-3" width="48" height="48">
                <use xlink:href="#check2-circle"></use>
            </svg>
            <h1 class=" text-light mb-4">Join @imers Forums Now</h1>
            <p class="col-lg-6 mx-auto mb-4 text-light fs-5">
              <em>  A  forum is an online discussion board where people can ask questions, share their experiences, and
                discuss topics of mutual interest. Forums are an excellent way to create social connections and a sense
                of community. They can also help you to cultivate an interest group about a particular subject 
                In @imers forums you can ask probelms abouts any programing language and also write a answer to other's probelms.
                Now we have only 3 (PYTHON,CSS,JAVASCRIPT) languages in our categories.
                Click the button below for free signup.
                 
            </em>
            <p class="col-lg-6 mx-auto mb-4 text-light fs-5">
              <em>  
                In @imers forums you can ask probelms abouts any programing language and also write a answer to other's probelms.
                Now we have only 3 (PYTHON,CSS,JAVASCRIPT) languages in our categories.
                Click the button below for free signup.
                 
            </em>
            </p>
            <button class="btn btn-warning"  data-bs-toggle="modal" data-bs-target="#signupModal">Free Signup</button>
        </div>' 
        </div>
    </div>

   


    
    <!-- FOOTER -->

    <?php  include'partials/_footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>