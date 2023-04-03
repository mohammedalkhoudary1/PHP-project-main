<?php
$page_title = "update food";
include("partial/menu.php");
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "select * from food where id = '$id'";
    $res = mysqli_query($conn, $sql);
    if($res && $res->num_rows>0){
        $food = $res->fetch_assoc();
        $id = $food['id'];
        $title = $food['title'];
        $description = $food['description'];
        $price = $food['price'];
        $old_image_name = $food['image'];
        $old_category = $food['cat_id'];
        $featured = $food['featured'];
        $active = $food['active'];
    }else {
        header("location:manage-food.php");
    }
}else {
    header("location:manage-food.php");
}
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Food</h1>
        <br><br>

        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">

                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Description:</td>
                    <td>
                        <textarea name="description" cols="30" rows="5"><?php echo $description; ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price:</td>
                    <td>
                        <input type="number" name="price" value="<?php echo $price; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Current Image:</td>
                    <td>
                        <img src="<?php echo "../".$old_image_name ?>" width="80">
                    </td>
                </tr>

                <tr>
                    <td>Select New Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Category:</td>
                    <td>
                        <select name="category">
                            <?php
                            $res = mysqli_query($conn, "select id, title from category");
                            if($res && $res->num_rows>0){
                                while($food1 = $res->fetch_assoc()){
                                    $id = $food1['id'];
                                    $title = $food1['title'];
                                    // echo "<option value='$id'> $title</option>";
                                ?>
                            <option <?php if($old_category == $id){echo "selected";} ?> value='<?php echo $id;?>'>
                                <?php echo $title; ?></option>
                            <?php        }  }else {
                                echo "<option value='0'>No Category Found</option>";
                            }
                        ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name="featured" value="Yes"
                            <?php echo ($featured == "Yes")?  "checked":""?>> Yes
                        <input type="radio" name="featured" value="No" <?php echo ($featured == "No")?  "checked":""?>>
                        No
                    </td>
                </tr>

                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="Yes" <?php echo ($featured == "Yes")?  "checked":""?>>
                        Yes
                        <input type="radio" name="active" value="No" <?php echo ($featured == "No")?  "checked":""?>> No
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="id" value="">
                        <input type="hidden" name="current_image" value="">

                        <input type="submit" name="submit" value="Update Food" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>


    </div>
</div>

<?php
if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $featured = $_POST['featured'];
    $category = $_POST['category'];
    $active = $_POST['active'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != ""){
        $name = $_FILES['image']['name'];
        $temp = $_FILES['image']['tmp_name'];
        $ext = explode(".", $name);
        $ext = end($ext);
        $image_name = "images/category/".$title.".".$ext;
        move_uploaded_file($temp, "../".$image_name);
    }else {
        $image_name = $old_image_name;
    }

    
    $sql = "UPDATE food SET description = '$description', cat_id = '$category', price = '$price', title = '$title', featured = '$featured', active = '$active', image = '$image_name' where id ='$id'";
    $res = mysqli_query($conn, $sql);
    // print_r($res);
     if($res){
         $_SESSION['food'] = "<div class = 'success'> food is updated </div>";
         header("location:manage-food.php");
     }else {
         $_SESSION['food'] = "<div class = 'error'> food is updated </div>";
         header("location:manage-food.php");
     }
}
include("partial/footer.php");
?>