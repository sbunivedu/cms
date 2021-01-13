<?php
include "includes/admin_header.php";
include "functions.php";

if(isset($_SESSION['username'])){
  $username = $_SESSION['username'];
  $query = "SELECT * FROM users WHERE username = '{$username}' ";
  $select_user_profile_query = mysqli_query($connection, $query);
  while($row = mysqli_fetch_assoc($select_user_profile_query)){
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_image = $row['user_image'];
    $user_role = $row['user_role'];
    $user_password = $row['user_password'];
  }
}

if(isset($_POST['edit_user'])){
  $user_firstname = $_POST['user_firstname'];
  $user_lastname = $_POST['user_lastname'];
  $user_role = $_POST['user_role'];
  $username = $_POST['username'];
  $user_email = $_POST['user_email'];
  $user_password = $_POST['user_password'];
//  $post_date = date('d-m-y');

  $query = "UPDATE users SET ";
  $query .= "user_firstname = '{$user_firstname}', ";
  $query .= "user_lastname = '{$user_lastname}', ";
  $query .= "user_role = '{$user_role}', ";
  $query .= "username = '{$username}', ";
  $query .= "user_password = '{$user_password}' ";
  $query .= "WHERE user_id = {$user_id}";

  $edit_user_query = mysqli_query($connection, $query);
  confirm_query($edit_user_query);
}
?>
<div id="wrapper">
<?php
include "includes/admin_navigation.php";
 ?>
  <div id="page-wrapper">
    <div class="container-fluid">
      <!-- Page Heading -->
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">
            Welcome to admin <small>Author</small>
          </h1>
          <form class="" action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="user_firstname">Firstname</label>
              <input type="text" class="form-control" value="<?=$user_firstname?>" name="user_firstname">
            </div>

            <div class="form-group">
              <label for="user_lastname">Lastname</label>
              <input type="text" class="form-control" value="<?=$user_lastname?>" name="user_lastname">
            </div>

            <div class="form-group">
              <select class="" name="user_role" id="user_role">
                <option value="<?=$user_role?>"><?=$user_role?></option>
          <?php
            if($user_role == 'admin'){
              echo "<option value='subscriber'>subscriber</option>";
            }else{
              echo "<option value='admin'>admin</option>";
            }
          ?>
              </select>
            </div>

            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" value="<?=$username?>" name="username">
            </div>

            <div class="form-group">
              <label for="user_email">Email</label>
              <input type="email" class="form-control" value="<?=$user_email?>" name="user_email">
            </div>

            <div class="form-group">
              <label for="user_password">Password</label>
              <input type="password" class="form-control" value="<?=$user_password?>" name="user_password">
            </div>

            <div class="form-group">
              <input class="btn btn-primary" type="submit" name="edit_user"
                value="Update Profile">
            </div>
          </form>
        </div>
      </div>
        <!-- /.container-fluid -->
    </div>
        <!-- /#page-wrapper -->
</div>
    <!-- /#wrapper -->
<?php include "includes/admin_footer.php" ?>
