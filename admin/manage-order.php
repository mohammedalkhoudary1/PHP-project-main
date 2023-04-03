<?php
$page_title = "manage order";
include("partial/menu.php");
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Order</h1>

        <br/><br/><br/>

        <!-- <a href="add-food.php" class="btn-primary">Add Order</a> -->
        <br><br>

        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Food</th>
                <th>Price</th>
                <th>Qty.</th>
                <th>Total</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Customer Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>


            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>

                </td>

                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <a href="update-order.php" class="btn-secondary">Update Order</a>
                </td>
            </tr>


        </table>
    </div>

</div>

<?php
include("partial/footer.php");
?>