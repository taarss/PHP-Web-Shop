<?php 
    include 'main.php';
      if ($_FILES['post_img']['name'] != "") {
        $uploadOk = 1;
        $allowed = array('jpg', 'jpeg', 'gif', 'png', strtolower(end(explode('.', $profile_pic))));
        $file_name = $_FILES['post_img']['name'];
        $file_extn = strtolower(end(explode('.', $file_name)));
        $file_temp = $_FILES['post_img']['tmp_name'];
        $check = getimagesize($_FILES["post_img"]["tmp_name"]);       
        if($check !== false) {
          //echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
        } else {
         echo "File is not an image.";
          $uploadOk = 0;
        }
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
          }      
        if (in_array($file_extn, $allowed) === true && $uploadOk == 1) {
            updateProduct($_POST['id'], $_POST['name'], $_POST['price'], $_POST['isOnSale'], $_POST['description'], $_POST['manufactur'], $_POST['saleValue'], $_POST['category'], $con);
            updateIcon($_POST['id'], $file_temp, $file_extn, $con);
        } elseif (in_array($file_extn, $allowed) === false) {
            echo 'Incorrect file type ';
            echo implode(',', $allowed);
        } else {
        echo 'fejl';
        }
      }
      else {
        updateProduct($_POST['id'], $_POST['name'], $_POST['price'], $_POST['isOnSale'], $_POST['description'], $_POST['manufactur'], $_POST['saleValue'], $_POST['category'], $con);
      }
    

    function updateIcon($id, $file_temp, $file_extn, $con){
      $file_path = 'uploads/' . substr(md5(time()), 0, 10) . '.' . $file_extn;
      move_uploaded_file($file_temp, $file_path);
      $stmt = $con->prepare('UPDATE products SET img = ? WHERE id = ?');
      $stmt->bind_param('si', $file_path, $id);
      $stmt->execute();
      $stmt->close();
    };
    function updateProduct($id, $name, $price, $isOnSale, $description, $manufactur, $saleValue, $category, $con)
    {
        if (strpos($saleValue, '%') !== false) {
            $saleValue = str_replace("%","",$saleValue);
        } 
        $stmt = $con->prepare('UPDATE products SET name = ?, price = ?, isOnSale = ?, description = ?, manufactur = ?, type = ?, saleValue = ? WHERE id = ?');
        $stmt->bind_param('ssissssi', $name, $price, $isOnSale, $description, $manufactur, $category, $saleValue, $id);
        $stmt->execute();
        $stmt->close(); 
    };
    header('Location: adminPanel.php');