<?php
    include_once 'connectDB.php';
    if(isset($_POST['upload']) && isset($_FILES['my_image'])){

        $img_name = $_FILES['my_image']['name'];

        $sql = "INSERT INTO images(url) VALUES('$img_name')";

        $result = mysqli_query($conn, $sql);

        if($result){
            move_uploaded_file($_FILES['image']['tmp_name'], "img/" ,"$img_name");
        }
    }
?>