<?php
include("../config/constants.php");
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM food WHERE id = '$id'";
    $res = mysqli_query($conn, $sql);
    if($res){
        $_SESSION['food'] = "<div class = 'success'> food is deleted </div>";
        header("location:manage-food.php");
    }else {
        $_SESSION['food'] = "<div class = 'error'> food is not deleted </div>";
        header("location:manage-food.php");
    }
    
}else {
    header("location:manage-category.php");
}
?>