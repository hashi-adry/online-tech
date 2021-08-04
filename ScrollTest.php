<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Landing page</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="bootstrap-4.2.1-dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.min.css" rel="stylesheet">
    <style type="text/css">
        @media (min-width: 800px) and (max-width: 850px) {
            .navbar:not(.top-nav-collapse) {
                background: #1C2331 !important;
            }
        }

    </style>
</head>
<div class="container-fluid">
<div>
<!-- As a link -->
<nav class="navbar navbar-dark primary-color">
    <a class="navbar-brand" href="#" data-scroll-nav="0">Link 1</a>
    <a class="navbar-brand" href="#" data-scroll-nav="1">Link 2</a>
    <a class="navbar-brand" href="#" data-scroll-nav="2">Link 3</a>
</nav>

<br>

<!-- As a heading -->
<nav class="navbar navbar-light blue lighten-4">
    <span class="navbar-brand">Heading</span>
</nav>



<!--data scroll Index-->
<div data-scroll-index="0">
    <!-- Card Wider -->
    <div class="card card-cascade wider">

        <!-- Card image -->
        <div class="view view-cascade overlay">
            <img  class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/photo6.jpg" alt="Card image cap">
            <a href="#!">
                <div class="mask rgba-white-slight"></div>
            </a>
        </div>

        <!-- Card content -->
        <div class="card-body card-body-cascade text-center">

            <!-- Title -->
            <h4 class="card-title"><strong>Alison Belmont</strong></h4>
            <!-- Subtitle -->
            <h5 class="blue-text pb-2"><strong>Graffiti Artist</strong></h5>
            <!-- Text -->
            <p class="card-text">Sed ut perspiciatis unde omnis iste natus sit voluptatem accusantium doloremque laudantium, totam rem aperiam. </p>

            <!-- Linkedin -->
            <a class="px-2 fa-lg li-ic"><i class="fab fa-linkedin-in"></i></a>
            <!-- Twitter -->
            <a class="px-2 fa-lg tw-ic"><i class="fab fa-twitter"></i></a>
            <!-- Dribbble -->
            <a class="px-2 fa-lg fb-ic"><i class="fab fa-facebook-f"></i></a>

        </div>

    </div>
    <!-- Card Wider -->

    <!-- Card Narrower -->
    <div class="card card-cascade narrower">

        <!-- Card image -->
        <div class="view view-cascade overlay">
            <img  class="card-img-top" src="https://mdbootstrap.com/img/Photos/Lightbox/Thumbnail/img%20(147).jpg" alt="Card image cap">
            <a>
                <div class="mask rgba-white-slight"></div>
            </a>
        </div>

        <!-- Card content -->
        <div class="card-body card-body-cascade">

            <!-- Label -->
            <h5 class="pink-text pb-2 pt-1"><i class="fas fa-utensils"></i> Culinary</h5>
            <!-- Title -->
            <h4 class="font-weight-bold card-title">Cheat day inspirations</h4>
            <!-- Text -->
            <p class="card-text">Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi.</p>
            <!-- Button -->
            <a class="btn btn-unique">Button</a>

        </div>

    </div>
    <!-- Card Narrower -->

    <!-- Card Regular -->
    <div class="card card-cascade">

        <!-- Card image -->
        <div class="view view-cascade overlay">
            <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/men.jpg" alt="Card image cap">
            <a>
                <div class="mask rgba-white-slight"></div>
            </a>
        </div>

        <!-- Card content -->
        <div class="card-body card-body-cascade text-center">

            <!-- Title -->
            <h4 class="card-title"><strong>Billy Coleman</strong></h4>
            <!-- Subtitle -->
            <h6 class="font-weight-bold indigo-text py-2">Web developer</h6>
            <!-- Text -->
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus, ex, recusandae. Facere modi sunt, quod quibusdam.
            </p>

            <!-- Facebook -->
            <a type="button" class="btn-floating btn-small btn-fb"><i class="fab fa-facebook-f"></i></a>
            <!-- Twitter -->
            <a type="button" class="btn-floating btn-small btn-tw"><i class="fab fa-twitter"></i></a>
            <!-- Google + -->
            <a type="button" class="btn-floating btn-small btn-dribbble"><i class="fab fa-dribbble"></i></a>

        </div>

    </div>
    <!-- Card Regular -->
</div>
<div data-scroll-index="1">
    <div class="card" style="width: 20rem;">
        <div class="card-body">
            <h5 class="font-weight-bold mb-3">Panel title</h5>
            <p class="mb-0">Some quick example text to build on the panel title and make up the bulk of the panel's content.</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Cras justo odio</li>
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item">Vestibulum at eros</li>
        </ul>
        <div class="card-body">
            <a href="#!" class="card-link">Card link</a>
            <a href="#!" class="card-link">Another link</a>
        </div>
    </div>
</div>
<div data-scroll-index="2">
    <!-- Default form login -->
    <form class="text-center border border-light p-5">

        <p class="h4 mb-4">Sign in</p>

        <!-- Email -->
        <input type="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail">

        <!-- Password -->
        <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password">

        <div class="d-flex justify-content-around">
            <div>
                <!-- Remember me -->
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                    <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
                </div>
            </div>
            <div>
                <!-- Forgot password -->
                <a href="">Forgot password?</a>
            </div>
        </div>

        <!-- Sign in button -->
        <button class="btn btn-info btn-block my-4" type="submit">Sign in</button>

        <!-- Register -->
        <p>Not a member?
            <a href="">Register</a>
        </p>

        <!-- Social login -->
        <p>or sign in with:</p>

        <a type="button" class="light-blue-text mx-2">
            <i class="fab fa-facebook-f"></i>
        </a>
        <a type="button" class="light-blue-text mx-2">
            <i class="fab fa-twitter"></i>
        </a>
        <a type="button" class="light-blue-text mx-2">
            <i class="fab fa-linkedin-in"></i>
        </a>
        <a type="button" class="light-blue-text mx-2">
            <i class="fab fa-github"></i>
        </a>

    </form>
    <!-- Default form login -->
</div>
<!--end data scroll index-->
</div>
    <a data-scroll-goto="0">Back to top</a>
    <!-- JQuery -->
    <script type="text/javascript" src="bootstrap-4.2.1-dist/js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="bootstrap-4.2.1-dist/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="bootstrap-4.2.1-dist/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.min.js"></script>
<!-- Initializations -->
<script type="text/javascript" src="js/scrollIt.js"></script>
<script type="text/javascript">
    $(function(){
        $.scrollIt();
    });
</script>
</body>

</html>
