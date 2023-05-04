@extends('layouts.animalsfront')
@section('body')
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="...">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.min.css">
        <link rel="stylesheet" href="css/slider.min.css">
        <link rel="stylesheet" href="css/lightbox.min.css">
        <link rel="stylesheet" href="css/datepicker.min.css">
        <link rel="stylesheet" href="css/timepicki.min.css">
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/style.default.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
       
    </head>
    <body>
        <div class="page-holder">
<!--             <header class="header"> -->
                <nav class="navbar navbar-default navbar-fixed-top">
                    <div class="container-fluid"> 
                        <div class="navbar-header">
                            <a class="navbar-brand" href="#">Seafoodtastic</a>
                            <div class="navbar-buttons">       
                                <button type="button" data-toggle="collapse" data-target=".navbar-collapse" class="navbar-toggle navbar-btn">Menu<i class="fa fa-align-justify"></i></button>
                            </div>
                        </div>
                        <div id="navigation" class="collapse navbar-collapse navbar-right">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="#hero">Home</a></li>
                                <li><a href="#about">About</a></li>
                                <li><a href="#contact">Contact</a></li>  
                                <li><a href="#gallery">Products</a></li>  
                                
                                 <div class="btn-group">     
                                <li><li><a href="#gallery"></a></li></li>
                                <button type="button" class="btn btn-primary dropdown-toggle"
                                   data-toggle="dropdown">
                                   <span class="caret"></span>
                                   <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                   <li><a href="#category">Category</a></li>
                                   <li><a href="#prices">Prices</a></li>
                                </ul>
                                 </div>
                                                               
                      
                             <ul class="nav navbar-nav navbar-right">
                                <li><a href="#"><span class ="glyphicon glyphicon-envelope">SignUp</a></li>
                                <li><a href="#"><span class ="glyphicon glyphicon-plus"> Login</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
       <!--      </header> -->

            <section id="hero" class="hero">
                <div id="slider" class="sl-slider-wrapper">

                    <div class="sl-slider">
             
                        <div class="sl-slide bg-1" data-orientation="vertical" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
                            <div class="sl-slide-inner" style="background-image: url(img/BG1.jpg);">
                                <div class="container">
                                    <h1><span class="bg-primary ">Welcome to Seafoodtastic.</span></h1>
                                    <p class="bg-primary">"The place where you buy cheap and good quality seafood products." </p>
                                </div>
                            </div>
                        </div>

                        <div class="sl-slide bg-2" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
                            <div class="sl-slide-inner" style="background-image: url(img/BG2.jpg);">
                                <div class="container">
                                    <h1> <span class="bg-primary ">Fresh products everyday!</span></h1>
                                    <p class="bg-primary ">We ensure that our product is always fresh.</p>
                                </div>
                            </div>
                        </div>
                      
                        <div class="sl-slide bg-3" data-orientation="vertical" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
                            <div class="sl-slide-inner" style="background-image: url(img/BG3.jpg);">
                                <div class="container">
                                    <h1><span class="bg-primary">"Bigger and Better"</span></h2>
                                    <p class="bg-primary">The most special seafood products is here with us, So buy now!</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <nav id="nav-dots" class="nav-dots">
                        <span class="nav-dot-current"></span>
                        <span></span>
                        <span></span>
                    </nav>
                    <a id="scroll-down" href="#about" class="hidden-xs"></a>
            </section>

            <section id="details" class="details">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="heading text-center">
                                <p>Call Us Now For</p>
                                <h5>Inquiries</h5>
                            </div>
                            <a href="tel:9870988764" class="phone">9997813545</a>
                        </div>

                        <div class="col-sm-6">
                            <div class="heading text-center">
                                <h5>'Check our Products'</h5>
                            </div>
                            <a href="#gallery" class="reviews btn-unique"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </section>
  

    
            <footer id="mainFooter" class="mainFooter">

            </footer>
        
       
            <div id="scrollTop" class="btn-unique">
                <i class="fa fa-angle-up"></i>
            </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script> 
        <script src="js/jquery.ba-cond.min.js"></script>
        <script src="js/jquery.slitslider.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/lightbox.min.js"></script>
        <script src="js/datepicker.min.js"></script>
        <script src="js/datepicker.en.min.js"></script>
        <script src="js/timepicki.min.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/smooth.scroll.min.js"></script>
        <script src="js/script.js"></script>

    </body>
</html>
@endsection
