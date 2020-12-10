<?php 
    include 'main.php';
    checkLoggedIn($con);
    $stmt = $con->prepare('SELECT isAdmin FROM accounts WHERE id = ?');
    $stmt->bind_param('i', $_SESSION['id']);
    $stmt->execute();
    $stmt->bind_result($isAdmin);
    $stmt->fetch();
    $stmt->close();
    $_SESSION['isAdmin'] = (bool)$isAdmin;
    if ($_SESSION['isAdmin'] == true) {

    }
    else {
        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
</head>
<body>
    <nav class="d-flex bg-light pb-2 navbar-fixed-top border-bottom justify-content-between" id="navBar">
        <div class="d-flex col-6">
            <img class="img-fluid m-3" id="logo" src="img/wasd-logo.png">
            <div class="container m-0">
                <p id="notice">Free Shipping on All Orders!</p>
                <ul class="nav col-12 justify-content-between text-dark">
                    <li><a href="index.php" class="text-dark">Home</a></li>
                    <li><a href="#" class="text-dark">Full Boards</a></li>
                    <li><a href="#" class="text-dark">Switches</a></li>
                    <li><a href="#" class="text-dark">Keycaps</a></li>
                    <li><a href="#" class="text-dark">Accessories</a></li>
                </ul>
            </div>
        </div>
        <?php 
            if ($_SESSION['name'] != '') { ?>
                <div class="dropdown show mt-4 mr-4">
                <a class="mr-5 align-self-center align-items-center dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="d-flex justify-content-center align-items-center">
                            <i class="far fa-user-circle fa-2x text-secondary"></i>
                        <p class="m-0"><?php echo $_SESSION['name'] ?></p>
                    </div>
                    
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="#">Orders</a>
                    <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
                </div>
        <?php
            }
            else {?>
                <a class="mr-5 align-self-center" href="login.php"><i class="fas fa-sign-in-alt fa-2x text-secondary "></i></a>
        <?php } ?>
       
    </nav>
    <main id="header" class="d-flex my-5 flex-wrap">
        <div class="border rounded p-5 col-3 m-3" id="adminProducts">
            <h5>Products</h5>
            <div>
                <p class="m-0 mt-2">Add new product</p>
                <button class="addProductBtn">Add</button>
            </div>
            <div>
                <p class="m-0 mt-2">Manage products</p>
                <button>Manage</button>
            </div>
            <div>
                <p class="m-0 mt-2">Manage product showcase</p>
                <button>Manage</button>
            </div>
        </div>
        <div class="border rounded p-5 col-3 m-3" id="adminOrders">
            <h5>Orders</h5>
            <div>
                <p class="m-0 mt-2">View orders</p>
                <button>View</button>
            </div>
            <div>
                <p class="m-0 mt-2">Manage orders</p>
                <button>Manage</button>
            </div>
        </div>
        <div class="border rounded p-5 col-3 m-3" id="adminAccounts">
            <h5>Accounts</h5>
            <div>
                <p class="m-0 mt-2">View Accounts</p>
                <button>View</button>
            </div>
            <div>
                <p class="m-0 mt-2">Manage accounts</p>
                <button>Manage</button>
            </div>
        </div>
    </main>
    <script>
        	document.querySelector(".addProductBtn").onclick = e => {
            let adp_underlay = document.createElement('div');
            adp_underlay.className = 'adp-underlay';
            document.body.appendChild(adp_underlay);
            let adp = document.createElement('div');
            adp
            adp.className = 'adp';
            adp.innerHTML = `
            <button class="adpBtn w-25 button bg-danger text-light border-0">X</button>
            <h3>Create product</h3>
            <form class="postForm d-flex flex-column" action="home.php" method="post" onsubmit="updatePosts"()>
                <input type="file" name="post_img"><br><br>
                <input type="text" name="post_name" placeholder="name" required>
                <input type="text" name="post_price" placeholder="price" required>
                <input type="text" name="post_manufactur" placeholder="manufactur">
                <select id="cars" name="post_type"  required>
                    <option value="volvo">Volvo</option>
                    <option value="saab">Saab</option>
                    <option value="fiat">Fiat</option>
                    <option value="audi">Audi</option>
                </select>
                <textarea name="description" required style="resize: none; placeholder="Write your description here:" required></textarea>
                <input type="submit">
            </form>
            `;
            document.body.appendChild(adp);
            document.querySelector(".adpBtn").onclick = e => {
                e.preventDefault();
                document.body.removeChild(adp_underlay);
                document.body.removeChild(adp);
            }

}

    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>