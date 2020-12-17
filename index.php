<?php 
    include 'main.php';
    $stmt = $con->prepare('SELECT * FROM categories');
	$stmt->execute();
	$result = $stmt->get_result();
	$categories = $result->fetch_all(MYSQLI_ASSOC);
	$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
</head>

<body>
    <?php
    
    include 'nav.php';

    ?>
    <header id="header">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" id="imgSlide" src="img/k9.png" alt="First slide">
                    <div class="carousel-caption text-left">
                        <h5>A keyboard for every taste</h5>
                        <p class=" col-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae lacus tellus. Aliquam erat volutpat. Cras condimentum felis vel elit</p>
                        <button id="buyBtn" class="btn">SHOP NOW</button>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" id="imgSlide" src="img/k8.jpg" alt="Second slide">
                    <div class="carousel-caption text-left">
                        <h5>Top quality custom keyboards</h5>
                        <p class=" col-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae lacus tellus. Aliquam erat volutpat. Cras condimentum felis vel elit</p>
                        <button id="buyBtn" class="btn">SHOP NOW</button>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" id="imgSlide" src="img/k7.jpg" alt="Third slide">
                    <div class="carousel-caption text-left">
                        <h5>Top quality custom keyboards</h5>
                        <p class=" col-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae lacus tellus. Aliquam erat volutpat. Cras condimentum felis vel elit</p>
                        <button id="buyBtn" class="btn">SHOP NOW</button>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
    </header>
    <main class="my-5">
        <h2 class="text-center py-3">Best sellers</h2>
        <!--Carousel Wrapper-->
        <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
            <!--Slides-->
            <div class="carousel-inner" role="listbox">

                <!--First slide-->
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card mb-2">
                                <img class="card-img-top" id="bestSellerImg" src="img/p6.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">WASD V3 104-Key Doubleshot PBT</h4>
                                    <p class="card-text">274.99$</p>
                                    <a class="btn" id="addToCart" href="#">Add to cart</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 clearfix d-none d-md-block">
                            <div class="card mb-2">
                                <img class="card-img-top" id="bestSellerImg" src="img/p7.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Ducky One 2 Mini v2 RGB LED 60% </h4>
                                    <p class="card-text">349.99$</p>
                                    <a class="btn" id="addToCart" href="#">Add to cart</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 clearfix d-none d-md-block">
                            <div class="card mb-2">
                                <img class="card-img-top" id="bestSellerImg" src="img/p8.webp" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Vortex RACE 3 (ANSI)</h4>
                                    <p class="card-text">299.99$</p>
                                    <a class="btn" id="addToCart" href="#">Add to cart</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 clearfix d-none d-md-block">
                            <div class="card mb-2">
                                <img class="card-img-top" id="bestSellerImg" src="img/p5.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Leopold FC750PD</h4>
                                    <p class="card-text">249.99$</p>
                                    <a class="btn" id="addToCart" href="#">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--/.First slide-->

                <!--Second slide-->
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card mb-2">
                                <img class="card-img-top" id="bestSellerImg" src="img/p6.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">WASD V3 104-Key Doubleshot PBT</h4>
                                    <p class="card-text">274.99$</p>
                                    <a class="btn" id="addToCart" href="#">Add to cart</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 clearfix d-none d-md-block">
                            <div class="card mb-2">
                                <img class="card-img-top" id="bestSellerImg" src="img/p7.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Ducky One 2 Mini v2 RGB LED 60% </h4>
                                    <p class="card-text">349.99$</p>
                                    <a class="btn" id="addToCart" href="#">Add to cart</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 clearfix d-none d-md-block">
                            <div class="card mb-2">
                                <img class="card-img-top" id="bestSellerImg" src="img/p8.webp" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Vortex RACE 3 (ANSI)</h4>
                                    <p class="card-text">299.99$</p>
                                    <a class="btn" id="addToCart" href="#">Add to cart</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 clearfix d-none d-md-block">
                            <div class="card mb-2">
                                <img class="card-img-top" id="bestSellerImg" src="img/p5.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Leopold FC750PD</h4>
                                    <p class="card-text">249.99$</p>
                                    <a class="btn" id="addToCart" href="#">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--/.Second slide-->

                <!--Third slide-->
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card mb-2">
                                <img class="card-img-top" id="bestSellerImg" src="img/p6.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">WASD V3 104-Key Doubleshot PBT</h4>
                                    <p class="card-text">274.99$</p>
                                    <a class="btn" id="addToCart" href="#">Add to cart</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 clearfix d-none d-md-block">
                            <div class="card mb-2">
                                <img class="card-img-top" id="bestSellerImg" src="img/p7.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Ducky One 2 Mini v2 RGB LED 60% </h4>
                                    <p class="card-text">349.99$</p>
                                    <a class="btn" id="addToCart" href="#">Add to cart</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 clearfix d-none d-md-block">
                            <div class="card mb-2">
                                <img class="card-img-top" id="bestSellerImg" src="img/p8.webp" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Vortex RACE 3 (ANSI)</h4>
                                    <p class="card-text">299.99$</p>
                                    <a class="btn" id="addToCart" href="#">Add to cart</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 clearfix d-none d-md-block">
                            <div class="card mb-2">
                                <img class="card-img-top" id="bestSellerImg" src="img/p5.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title">Leopold FC750PD</h4>
                                    <p class="card-text">249.99$</p>
                                    <a class="btn" id="addToCart" href="#">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--/.Third slide-->

            </div>
            <!--/.Slides-->
            <!--Indicators-->
            <ol class="carousel-indicators my-3" id="bestSellersIndicator">
                <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
                <li data-target="#multi-item-example" data-slide-to="1"></li>
                <li data-target="#multi-item-example" data-slide-to="2"></li>
            </ol>
            <!--/.Indicators-->
        </div>
        <!--/.Carousel Wrapper-->
        <div class="bg-light py-5">
            <h4 class="text-center">Sign up for Our Newsletter </h4>
            <form class="m-auto d-flex justify-content-center py-5">
                <input placeholder="EMAIL ADDRESS" class="col-4 py-3" type="text">
                <input id="newsletterHover" class="btn col-2 border rounded-0 border-dark" type="submit">
            </form>
        </div>
        <section class="py-5" id="customKeycapsSection">
            <div class="d-flex justify-content-center">
                <img src="https://www.wasdkeyboards.com/pub/media/wysiwyg/hp/color_choice_animation.gif">
                <div class=" col-2 flex-column">
                    <h5 class="h3">Colors that fit you</h5>
                    <p>
                        With our keyboard designer tool, you can customize your keyboard to match your style. Choose from 21 different colors to make endless combinations.
                        That's over 324 quattuorquadragintillion (3.24E+137) different combinations!</p>
                    <input id="newsletterHover" class="btn col-8 border rounded-0 border-dark" type="submit" value="TRY IT OUT">
                </div>
            </div>
        </section>
        <section class="d-flex flex-wrap justify-content-center mb-5">
            <h4 class="text-center py-5 col-12">Categories</h4>
            <?php 
                foreach ($categories as $category) {?>
                <div class="d-flex border col-2 p-0 m-2">
                    <a href="products.php?category=<?=$category['id'] ?>">
                        <div class=" position-relative" id="catagory">
                            <img class="img-fluid" src="<?= $category['icon'] ?>">
                            <h5 id="catagoryText"><?= $category['name'] ?></h5>
                        </div>
                    </a>
                </div>
            <?php
                }
            ?>
        </section>
        <section class="bg-light col-12 d-flex justify-content-center p-5">
            <img src="img/freeShipping2.png">
        </section>

    </main>
    <footer>

    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>