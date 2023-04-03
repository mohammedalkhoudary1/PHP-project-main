<?php
$page_title = "add food";

include("partial/menu.php");
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>

        <br><br>



        <form action="" method="POST" enctype="multipart/form-data">
        
            <table class="tbl-30">

                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Title of the Food">
                    </td>
                </tr>

                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Description of the Food."></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>

                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Category: </td>
                    <td>
                        <select name="category">
                            <?php
                            $res = mysqli_query($conn, "select id, title from category");
                            if($res && $res->num_rows>0){
                                while($cat = $res->fetch_assoc()){
                                    $id = $cat['id'];
                                    $title = $cat['title'];
                                    echo "<option value='$id'> $title</option>";
                                }
                            }else {
                                echo "<option value='0'>No Category Found</option>";
                            }
                            ?>

                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes 
                        <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes 
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>

        


    </div>
</div>

<?php
if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];
    if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != ""){
        $name = $_FILES['image']['name'];
        $temp = $_FILES['image']['tmp_name'];
        $ext = explode(".",$name);
        $ext = end($ext);
        $image_name = "images/food/".$title.".".$ext;
        move_uploaded_file($temp, "../".$image_name);
    }else {
        $image_name = "images/logo.png";
    }

    $sql = "INSERT INTO food SET title = '$title', description = '$description', price = '$price',
    featured = '$featured', active = '$active', image = '$image_name', cat_id = '$category'";

    
     $res = mysqli_query($conn, $sql);
    if($res){
        $_SESSION['food'] = "<div class = 'success'>food is added</div>";
        header("location:manage-food.php");
    }else {
        $_SESSION['food'] = "<div class = 'error'>food is not added</div>";
        header("location:manage-food.php");
    }

}
include("partial/footer.php");
?>