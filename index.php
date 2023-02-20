<?php session_start();
require_once 'admin\\database.php';

if (isset($_SESSION['notification'])) {
    echo "<script>alert('{$_SESSION['notification']}')</script>";
    unset($_SESSION['notification']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Star Organic</title>
    <!-- jquery cdn-->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <!-- way point plugin-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>
    <!-- count up plugin (fixed bug decrease counting number when scroll to counting section agqain)-->
    <script src="vendor/counter up/jquery.counterup.js"></script>
    <!-- swiper.js-->
    <script src="vendor/swiper/swiper.min.js"></script>
    <!-- import fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <!-- Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all"> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- font awesome-->
    <link rel="stylesheet" href="vendor/fontawesome/css/all.css">
    <!-- swiper-->
    <link rel="stylesheet" href="vendor/swiper/swiper.min.css">
    <!--customer stylesheet-->
    <link rel="stylesheet" href="css/index_style.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/imgs-overlay-effect.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- customer javascript-->
    <script src="js/showMenuOnScroll.js"></script>
    <script src="js/toggleMenu.js"></script>
    <script src="js/DropMenu.js"></script>
    <script src="js/ScrollToTop.js"></script>
</head>

<body>
    <div id="page">
        <div id="head">
            <div id="nav">
                <!--begin nav-->
                <!-- responsive -->
                <button class="hamburger">
                    <span></span>
                </button>

                <div id="menu">
                    <div id="logo">
                        <a href="index.php#about"><img src="imgs/logo.png" alt="logo"></a>
                    </div>

                    <a href="index.php">Home</a>
                    <div class="dropdown-item">
                        <a href="#" id="drop">Product <span class="cheveron"></span></a>
                        <div class="subitem">
                            <?php
                            $conn = connect();
                            $prd = $conn->query("SELECT * FROM category WHERE status = 1");
                            while ($row = $prd->fetch_assoc()) {
                                echo "
                                    <a href='product.php?id={$row['categoryID']}#prd'>{$row['categoryName']}</a>
                                ";
                            }
                            $conn->close();
                            ?>
                        </div>
                    </div>
                    <a href="contact.php#ct">Contact Us</a>
                    <a href="gallery.php">Gallery</a>
                    <?php if (isset($_SESSION['login']) && $_SESSION['login'] === true) { ?>
                        <a href='useraccount.php'><i class="fas fa-user"></i>Account</a>
                        <a href="logout.php"><i class="fas fa-power-off"></i>LogOut</a>
                    <?php } else { ?>
                        <a href="login.php#page-title">Login</a>
                    <?php } ?>
                </div>
                <!-- Search  -->
                <!-- <div id="search-box">
                    <input type="text" name="search-text" placeholder="Type to search">
                    <a href="#" id="search-btn">
                        <i class="fas fa-search"></i>
                    </a>
                </div> -->

            </div><!-- end nav-->
            <!-- Banner -->
            <div id="banner">
                <!--Begin banner-->
                <img src="imgs/logo.png" alt="logo-banner" id="logo-img">
                <p class="welcome">Welcome to Star Organic farm</p>
                <h1 class="introduction">Our farm has everything you need for a healthy meal</h1>
            </div>
            <!--End banner-->
        </div>
        <!--End head-->

        <div id="content">

            <div id="about" class="container">
                <!--begin about and use home.css-->
                <div id="about-text" class="col-lg-12 text-center">
                    <h3>Something about our farm</h3>
                    <!--Create a line to seperate-->
                    <span class="separator"></span>
                    <!--index_style.css-->
                    <p>Star Organic farm is commenced in the year 1988. Company is involved in trading and manufacturing a wide range of Organic Products and spices to the consumers all around the global market. Company has wide variety of collection of products lies of
                        Nutritious cereals, Pulses, Spices and Condiments, Cooking Oils, Fruit Pulps, Agro Products, Oils, Wheat and Wheat Flour, Rice and Rice products and so on.
                    </p>
                </div>
            </div>
            <!--End about div-->

            <h3 class="welcome" id="product_heading">
                <span class="separator"></span>
                Our product
                <span class="separator"></span>
            </h3>

            <div id="products" class="container-fluid">
                <!--Begin product use css in file imgs-overlay-effect-->
                <!-- show full images for desktop-->
                <div class="wrapper row" id="for_desktop">
                    <figure id="product1" class="col-md-3">
                        <div class="img-container">
                            <a href="product.php?id=1#prd"><img src="imgs/fruit.jpg" alt="" class="img-responsive"></a>
                        </div>
                        <figcaption>
                            <h3>Fruit</h3>
                            <a href="product.php?id=1#prd" class="snip1582">See More</a>
                        </figcaption>
                    </figure>
                    <figure id="product2" class="col-md-3">
                        <div class="img-container">
                            <a href="product.php?id=2#prd"><img src="imgs/rice.jpg" alt="" class="img-responsive"></a>
                        </div>
                        <figcaption>
                            <h3>Rice</h3>
                            <a href="product.php?id=2#prd" class="snip1582">See More</a>
                        </figcaption>
                    </figure>
                    <figure id="product3" class="col-md-3">
                        <div class="img-container">
                            <a href="product.php?id=4#prd"><img src="imgs/oils.jpg" alt="" class="img-responsive"></a>
                        </div>
                        <figcaption>
                            <h3>Oils</h3>
                            <a href="product.php?id=4#prd" class="snip1582">See More</a>
                        </figcaption>
                    </figure>
                    <figure id="product4" class="col-md-3">
                        <div class="img-container">
                            <a href="product.php?id=3#prd"><img src="imgs/condiments.jpg" alt="" class="img-responsive"></a>
                        </div>
                        <figcaption>
                            <h3>Condiments and Spice</h3>
                            <a href="product.php?id=3#prd" class="snip1582">See More</a>
                        </figcaption>
                    </figure>
                </div>

                <!-- slide show for mobile devices using swiper library-->
                <!-- Folder vendor/swiper -->
                <div class="swiper-container" id="for_mobile">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="image-wrapper">
                                <img src="imgs/fruit.jpg" alt="">
                            </div>
                            <div class="product-details">
                                <h3>Fruit Pulp.</h3>

                                <a href="fruit-product.php" class="product-btn">See More</a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="image-wrapper">
                                <img src="imgs/rice.jpg" alt="">
                            </div>
                            <div class="product-details">
                                <h3 style="color: #111;">Rice and rice products.</h3>

                                <a href="rice-rice-product.php" class="product-btn">See More</a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="image-wrapper">
                                <img src="imgs/oils.jpg" alt="">
                            </div>
                            <div class="product-details">
                                <h3>Oils.</h3>

                                <a href="oils-product.php" class="product-btn">See More</a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="image-wrapper">
                                <img src="imgs/condiments.jpg" alt="">
                            </div>
                            <div class="product-details">
                                <h3>Condiments and Spices</h3>

                                <a href="condiments-product.php" class="product-btn">See More</a>
                            </div>
                        </div>
                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div><!-- end product section-->

            <span class="separator"></span>

            <!-- Special offer -->
            <section class="about py-lg-4 py-md-3 py-sm-3 py-3" id="about">
                <div class="container py-lg-5 py-md-5 py-sm-4 py-4">
                    <h3 class="title text-center mb-lg-5 mb-md-4  mb-sm-4 mb-3">Special Offer Product</h3>
                    <span class="separator"></span>
                    <div class="row banner-below-w3l">
                        <div class="col-lg-4 col-md-6 col-sm-6 text-center banner-agile-flowers">
                            <img src="imgs/rice2.jpg" class="img-thumbnail" alt="">
                            <div class="banner-right-icon">
                                <h4 class="pt-3">Eight fragrant rice</h4>
                                <a href="product.php?id=2#prd" class="snip1582">Wanna Buy?</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 text-center banner-agile-flowers">
                            <img src="imgs/fruit2.jpg" class="img-thumbnail" alt="">
                            <div class="banner-right-icon">
                                <h4 class="pt-3">Fresh Fruit</h4>
                                <a href="product.php?id=1#prd" class="snip1582">Wanna Buy? </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 text-center banner-agile-flowers">
                            <img src="imgs/oils2.jpg" class="img-thumbnail" alt="">
                            <div class="banner-right-icon">
                                <h4 class="pt-3">Olive Oil</h4>
                                <a href="product.php?id=4#prd" class="snip1582">Wanna Buy?</a>
                            </div>
                        </div>
                        <!-- Sale off -->
                        <div class="toys-grids-upper">
                            <div class="about-toys-off">
                                <h2>Sale off <span>10%</span> next month</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Begin gallery for desktop -->
            <div id="gallery" class="container-fluid">
                <div id="gallery-text">
                    <span class="separator"></span>
                    <h3>Our Beautyful Farm</h3>
                    <span class="separator"></span>
                </div>
                <div class="gallery-desktop">
                    <div class="row">
                        <div class="box col-md-3 col-sm-3">
                            <div class="imgBox">
                                <img src="imgs/cow.jpg" alt="" class="img-responsive">
                            </div>
                            <div class="content">
                                <h2>Happy cow</h2>
                                <p>Don't you see these healthy cow?</p>
                                <a href="gallery.php" class="gallery-btn">Want more?</a>
                            </div>
                        </div>

                        <div class="box col-md-3 col-sm-3">
                            <div class="imgBox">
                                <img src="imgs/oilve.jpg" alt="" class="img-responsive">
                            </div>
                            <div class="content">
                                <h2>Olive trees</h2>
                                <p>I know you want perfect skin, ma'am</p>
                                <a href="gallery.php" class="gallery-btn">Want more?</a>
                            </div>
                        </div>

                        <div class="box col-md-3 col-sm-3">
                            <div class="imgBox">
                                <img src="imgs/farmer.jpg" alt="" class="img-responsive">
                            </div>
                            <div class="content">
                                <h2>Experienced farmers</h2>
                                <p>Without them, we wouldn't be where we are today</p>
                                <a href="gallery.php" class="gallery-btn">Want more?</a>
                            </div>
                        </div>
                        <div class="box col-md-3 col-sm-3">
                            <div class="imgBox">
                                <img src="imgs/seed.jpg" alt="" class="img-responsive">
                            </div>
                            <div class="content">
                                <h2>Good seeds</h2>
                                <p>We have all kinds of seeds all over the country and some parts of the world</p>
                                <a href="gallery.php" class="gallery-btn">Want more?</a>
                            </div>
                        </div>
                    </div> <!-- end row 1-->

                    <div class="row">
                        <div class="box col-md-3 col-sm-3">
                            <div class="imgBox">
                                <img src="imgs/tractor.jpg" alt="" class="img-responsive">
                            </div>
                            <div class="content">
                                <h2>Modern Equipment</h2>
                                <p>The most modern equipment is always updated every day</p>
                                <a href="gallery.php" class="gallery-btn">Want more?</a>
                            </div>
                        </div>
                        <div class="box col-md-3 col-sm-3">
                            <div class="imgBox">
                                <img src="imgs/soil.jpg" alt="" class="img-responsive">
                            </div>
                            <div class="content">
                                <h2>Perfect soil</h2>
                                <p>Good soils and minerals for crops make up the majority of our farm area</p>
                                <a href="gallery.php" class="gallery-btn">Want more?</a>
                            </div>
                        </div>
                        <div class="box col-md-3 col-sm-3">
                            <div class="imgBox">
                                <img src="imgs/peace.jpg" alt="" class="img-responsive">
                            </div>
                            <div class="content">
                                <h2>Peaceful Place</h2>
                                <p>This scene helps us farmers relax after hours of hard work, and maybe you too.</p>
                                <a href="gallery.php" class="gallery-btn">Want more?</a>
                            </div>
                        </div>
                        <div class="box col-md-3 col-sm-3">
                            <div class="imgBox">
                                <img src="imgs/fresh.jpg" alt="" class="img-responsive">
                            </div>
                            <div class="content">
                                <h2>Fresh & Clean Fruits</h2>
                                <p>Our pride is when we can create products like this</p>
                                <a href="gallery.php" class="gallery-btn">Want more?</a>
                            </div>
                        </div>
                    </div> <!-- end row 2-->
                </div> <!-- end gallery for desktop-->

                <!-- 3d slide show for mobile using swipe.js-->
                <!-- vendor/swiper -->
                <div class="swiper-gallery" id="gallery-mobile">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide" id="gallery-slide">
                            <div class="gallery-imgBox">
                                <img src="imgs/cow.jpg" alt="">
                            </div>
                            <div class="img-details">
                                <h2>Happy cow</h2>
                                <p>Don't you see these healthy cow?</p>
                                <a href="gallery.php" class="gallery-btn">Want more?</a>
                            </div>
                        </div>
                        <div class="swiper-slide" id="gallery-slide">
                            <div class="gallery-imgBox">
                                <img src="imgs/oilve.jpg" alt="">
                            </div>
                            <div class="img-details">
                                <h2>Olive trees</h2>
                                <p>I know you want perfect skin, ma'am</p>
                                <a href="gallery.php" class="gallery-btn">Want more?</a>
                            </div>
                        </div>
                        <div class="swiper-slide" id="gallery-slide">
                            <div class="gallery-imgBox">
                                <img src="imgs/farmer.jpg" alt="">
                            </div>
                            <div class="img-details">
                                <h2>Experienced farmers</h2>
                                <p>Without them, we wouldn't be where we are today</p>
                                <a href="gallery.php" class="gallery-btn">Want more?</a>
                            </div>
                        </div>
                        <div class="swiper-slide" id="gallery-slide">
                            <div class="gallery-imgBox">
                                <img src="imgs/seed.jpg" alt="">
                            </div>
                            <div class="img-details">
                                <h2>Good seeds</h2>
                                <p>We have all kinds of seeds all over the country and some parts of the world</p>
                                <a href="gallery.php" class="gallery-btn">Want more?</a>
                            </div>
                        </div>
                        <div class="swiper-slide" id="gallery-slide">
                            <div class="gallery-imgBox">
                                <img src="imgs/tractor.jpg" alt="">
                            </div>
                            <div class="img-details">
                                <h2>Modern Equipment</h2>
                                <p>The most modern equipment is always updated by us every day</p>
                                <a href="gallery.php" class="gallery-btn">Want more?</a>
                            </div>
                        </div>
                        <div class="swiper-slide" id="gallery-slide">
                            <div class="gallery-imgBox">
                                <img src="imgs/soil.jpg" alt="">
                            </div>
                            <div class="img-details">
                                <h2>Perfect soil</h2>
                                <p>Good soils and minerals for crops make up the majority of our farm area</p>
                                <a href="gallery.php" class="gallery-btn">Want more?</a>
                            </div>
                        </div>
                        <div class="swiper-slide" id="gallery-slide">
                            <div class="gallery-imgBox">
                                <img src="imgs/peace.jpg" alt="">
                            </div>
                            <div class="img-details">
                                <h2>Peaceful Place</h2>
                                <p>This scene helps us farmers relax after hours of hard work, and maybe you too.</p>
                                <a href="gallery.php" class="gallery-btn">Want more?</a>
                            </div>
                        </div>
                        <div class="swiper-slide" id="gallery-slide">
                            <div class="gallery-imgBox">
                                <img src="imgs/fresh.jpg" alt="">
                            </div>
                            <div class="img-details">
                                <h2>Fresh & Clean Fruits</h2>
                                <p>Our pride is when we can create products like this</p>
                                <a href="gallery.php" class="gallery-btn">Want more?</a>
                            </div>
                        </div>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>

            </div>
            <!--End gallery-->

            <!-- Begin feedback -->
            <div id="feedback" class="container-fluid">
                <div class="feedback-heading">
                    <span class="separator"></span>
                    <h3>Happy customers</h3>
                    <span class="separator"></span>
                </div>
                <div class="feedback-container row">
                    <!-- Begin box 1 -->
                    <div class="feedback-box col-md-3 ">
                        <div class="icon">
                            <img src="imgs/hoang-oanh.jpg" alt="Hoang Oanh avatar" class="ava">
                        </div>
                        <div class="feedback-text">
                            <h3>Hoang Oanh</h3>
                            <p>I feel jealous of the farmers here when they see these peaceful scenes every day </p>
                        </div>
                    </div><!-- end box 1-->

                    <!-- Begin box 2 -->
                    <div class="feedback-box col-md-3 ">
                        <div class="icon">
                            <img src="imgs/thay-tuan.jpg" alt="thay Tuan avatar" class="ava">
                        </div>
                        <div class="feedback-text">
                            <h3>Tuan Nguyen</h3>
                            <p>My family believes in using this farm's products because it's fresh and healthy</p>

                        </div>
                    </div><!-- end box 2-->

                    <!-- Begin box 3 -->
                    <div class="feedback-box col-md-3 ">
                        <div class="icon">
                            <img src="imgs/uyen-aptech.jpg" alt="Uyen Aptech avatar" class="ava">
                        </div>
                        <div class="feedback-text">
                            <h3>Uyen Aptech</h3>
                            <p>We can see how this professionalism has produced products</p>

                        </div>
                    </div><!-- end box 3-->

                    <!-- Begin box 4 -->
                    <div class="feedback-box col-md-3 ">
                        <div class="icon">
                            <img src="imgs/thu-sukem.jpg" alt="Thu sukem avatar" class="ava">
                        </div>
                        <div class="feedback-text">
                            <h3>Thu Sukem</h3>
                            <p>This website always answers all questions of customers enthusiastically and thoughtfully, I am very satisfied with that</p>
                        </div>
                    </div><!-- end box 4-->
                </div>
                <!--End feedback-container -->
                <div id="feedback-button">
                    <a href="contact.php" class="snip1582">Tell us how you feel?</a>
                </div>
            </div> <!-- end feedback section-->


            <!-- Begin certificate -->
            <div class="certificate-sep">
                <span class="separator"></span>
                <h3>Our quality product</h3>
                <span class="separator"></span>
            </div>
            <div id="certificate">
                <div class="number col-md-6" id="count-up">
                    <!--number count using js in file vendor/countup-->
                    <!-- Use css in file home.css -->
                    <div class="col">
                        <!-- for snake border effect-->
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <div class="num ">
                            999
                        </div>
                        <p>Happy customers</p>

                    </div>
                    <div class="col">
                        <!-- for snake border effect-->
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <div class="num ">
                            100
                        </div>
                        <p>Farmers</p>

                    </div>

                    <div class="col">
                        <!-- for snake border effect-->
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <div class="num ">
                            11
                        </div>
                        <p>Years of farming</p>

                    </div>
                </div>
                <div class="certificate-text col-md-6 ">
                    <h4>Stay healthy</h4>
                    <h4>Something we have achieved</h4>
                    <span class="separator"></span>
                    <p style="text-align:center">With experienced farmers, modern equipment and carefully selected plant varieties, we are committed to product quality when it comes to consumers.</p>
                    <span class="separator"></span>
                    <div class="certificate-container">
                        <img src="imgs/brc-cc.png" alt="certificate 1">
                        <img src="imgs/GMP-cc.png" alt="certificate 2">
                        <img src="imgs/dmca-cc.png" alt="certificate 3">
                    </div>
                </div>

            </div> <!-- end  certificate div-->

            <?php include 'footer.php' ?>
    </div>
    <!--End page div-->

    <a href="#" class="UpToTop"><i class="fas fa-arrow-up"></i></a>

    <!-- Customer script-->
    <script>
        // swiper for product section
        var swiperProduct = new Swiper('.swiper-container', {
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
    <!-- swiper for gallery section-->
    <script>
        var swiperGallery = new Swiper('.swiper-gallery', {
            effect: 'coverflow',
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: 'auto',
            coverflowEffect: {
                rotate: 60,
                stretch: 0,
                depth: 500,
                modifier: 4,
                slideShadows: true,
            },
            pagination: {
                el: '.swiper-pagination',
            },
        });
    </script>
    <!-- counter up number-->
    <script>
        $(".num").counterUp({
            delay: 10,
            time: 2000
        });
    </script>
</body>

</html>