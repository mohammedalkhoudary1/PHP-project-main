<?php
include "layouts/menu.php";
?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php
            $sql = "select * from category where featured = 'Yes' and active = 'Yes' limit 3";
            $res = mysqli_query($conn, $sql);

                while($row = $res->fetch_assoc()){
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];?>

                    <a href="category-foods.php?id=<?php echo $id?>">
                        <div class="box-3 float-container">
                            <img src="<?php echo $image_name?>" alt="<?php echo $title?>" class="img-responsive img-curve">
                            <h3 class="float-text text-white"><?php echo $title?></h3>
                        </div>
                    </a>
            <?php
                }
            ?>

            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
            $sql = "select * from food where featured = 'Yes' and active = 'Yes' limit 6";
            $res = mysqli_query($conn, $sql);
            if($res->num_rows>0){
                while($row = $res->fetch_assoc()){
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image'];?>
                    <div class="food-menu-box">
                    <div class="food-menu-img">
                        <img src="<?php echo $image_name?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                    </div>

                    <div class="food-menu-desc">
                        <h4><?php echo $title?></h4>
                        <p class="food-price"><?php echo $price?></p>
                        <p class="food-detail">
                        <?php echo $description?>
                        </p>
                        <br>

                        <a href="order.html" class="btn btn-primary">Order Now</a>
                    </div>
                </div>
            

            <?php
             }
          }
            ?>


            <div class="clearfix"></div>
        </div>
        
        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

<?php
include "layouts/footer.php";
?>