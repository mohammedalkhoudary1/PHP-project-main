<?php
$page_title = "manage food";

include("partial/menu.php");
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Food</h1>
        <?php
        if(isset($_SESSION['food'])){
            echo $_SESSION['food'];
            unset($_SESSION['food']);
        }
        ?>
        <br/><br/>

        <!-- Button to Add Admin -->
        <a href="add-food.php" class="btn-primary">Add Food</a>

        <br/><br/><br/>


        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>

            <?php 
            $sql = "SELECT * FROM food";
            $res = mysqli_query($conn, $sql);
            if($res && $res->num_rows>0){
                while($food = $res->fetch_assoc()){
                    $id = $food['id'];
                    $title = $food['title'];
                    $price = $food['price'];
                    $image_name = $food['image'];
                    $featured = $food['featured'];
                    $active = $food['active'];?>

                    <tr>
                        <td><?php echo $id?></td>
                        <td><?php echo $title?></td>
                        <td><?php echo $price?></td>
                        <td>
                            <img src="<?php echo "../".$image_name; ?>" width="50px">
                        </td>
                        <td><?php echo $featured?></td>
                        <td><?php echo $active?></td>
                        <td>
                            <a href="update-food.php?id=<?php echo $id; ?>" class="btn-secondary">Update Food</a>
                            <a href="delete-food.php?id=<?php echo $id; ?>" class="btn-danger">Delete Food</a>
                        </td>
                    </tr>
            <?php    }
            }else {
                echo "<tr>
                <td colspan='6'>
                    <div class='error'>No food Added.</div>
                </td>
            </tr>";
            }
            ?>

            


        </table>
    </div>

</div>

<?php
include("partial/footer.php");
?>