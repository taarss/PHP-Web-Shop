<?php 
    include 'main.php';
    $currentCategory = $_GET['category'];
    $stmt = $con->prepare('SELECT * FROM categories');
	$stmt->execute();
	$result = $stmt->get_result();
	$categories = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();

    $products;
    if ($currentCategory != "0") {
        $stmt = $con->prepare('SELECT * FROM products WHERE type = ?');
        $stmt->bind_param('s', $currentCategory);
        $stmt->execute();
        $result = $stmt->get_result();
        $products = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
    }
    else {
        $stmt = $con->prepare('SELECT * FROM products');
        $stmt->execute();
        $result = $stmt->get_result();
        $products = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
    }
    

    if (isset($_POST['newPage'])) {
        $newCategory = $_POST['newCategory'];
        header("Location: https://christianvillads.tech/opgaver/webShop/products.php?category=$newCategory");  
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
</head>

<body>
   <?php     include 'nav.php';?>
    <main class="d-flex justify-content-center">
        <div class="col-9 pt-5 mt-5" style="background-color: ghostWhite; min-height: 100vh">
                <div class="border-bottom d-flex justify-content-end">
                    <select class="productPageSearch mr-5 mb-3">
                        <option selected="selected" value=0>All Categories</option>
                    </select>
                </div>
                <div class="d-flex flex-wrap mt-5">
                    <?php foreach ($products as $key) {?>   
                        <div class="col-3 d-block ">
                            <div class="card mb-2 productPageContainer">
                                    <a href="product.php?id=<?=$key['id']?>">
                                        <img class="card-img-top productImg" src="<?=$key['img']?>" alt="Card image cap">
                                    </a>
                                    <div class="card-body">
                                        <h4 class="card-title"><?=$key['name']?></h4>
                                        <p class="card-text"><?=$key['price']?>.00$</p>
                                        <a class="btn" id="addToCart" href="#">Add to cart</a>
                                    </div>
                            </div>
                        </div>      
                   <?php }?>
                </div>
            </div>
    </main>
    
    <footer>

    </footer>
    <script src="js/productPage.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>