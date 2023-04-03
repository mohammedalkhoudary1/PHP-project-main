<?php
$page_title = "update admin";
include('partial/menu.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "select * from admin where id = '$id'";
    $res = mysqli_query($conn, $sql);
    if($res && $res->num_rows>0){
        $admin = $res->fetch_assoc();
        $fullname = $admin['fullname'];
        $username = $admin['username'];
    }else {
        header("location:manage-admin.php");
    }
}else {
    header("location:manage-admin.php");
}
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>

        <br><br>


        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo $fullname; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username; ?>">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>


    </div>
</div>


<?php 
if(isset($_POST['submit'])){
    $fullname = $_POST['full_name'];
    $username = $_POST['username'];
    $sql = "update admin set username = '$username', fullname = '$fullname' where id = '$id'";
    $res = mysqli_query($conn, $sql);
    if($res){
        $_SESSION['admin'] = "<div class = 'success'> admin is updated </div>";
        header("location:manage-admin.php");
    }else {
        $_SESSION['admin'] = "<div class = 'error'> admin is not updated </div>";
        header("location:manage0admin.php");
    }
}

include('partial/footer.php');
?>