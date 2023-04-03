<?php
$page_title = "add category";

include("partial/menu.php");
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>

        <br><br>



        <br><br>

        <!-- Add CAtegory Form Starts -->
        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Category Title">
                    </td>
                </tr>

                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes" checked> Yes
                        <input type="radio" name="featured" value="No"> No 
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes" checked> Yes
                        <input type="radio" name="active" value="No"> No 
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>
        <!-- Add CAtegory Form Ends -->


    </div>
</div>

<?php

if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];
    if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != ""){
        $name = $_FILES['image']['name'];
        $temp = $_FILES['image']['tmp_name'];
        $ext = explode(".", $name);
        $ext = end($ext);
        $image_name = "images/category/".$title.".".$ext;
        move_uploaded_file($temp, "../".$image_name);
    }else {
        $image_name = "images/logo.png";
    }

    $sql = "insert into category set title = '$title', featured = '$featured', active = '$active', image_name = '$image_name'";
    $res = mysqli_query($conn, $sql);
    if($res){
        $_SESSION['category'] = "<div class = 'success'> category is added </div>";
        header("location:manage-category.php");
    }else{
        $_SESSION['category'] = "<div class = 'error'> category is not added </div>";
        header("location:manage-category.php");
    }
}
include("partial/footer.php");
?>