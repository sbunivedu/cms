<?php
if(isset($_GET['edit_user'])){
  $the_user_id = $_GET['edit_user'];
  $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
  $select_users_query = mysqli_query($connection, $query);
  confirm_query($select_users_query);

  while($row = mysqli_fetch_assoc($select_users_query)){
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_password = $row['user_password'];
    $user_role = $row['user_role'];
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

  $query = "SELECT randSalt FROM users";
  $select_randsalt_query = mysqli_query($connection, $query);

  if(!$select_randsalt_query){
    die("QUERY FAILED ".mysqli_error($connection));
  }

  $row = mysqli_fetch_array($select_randsalt_query);
  $salt = $row['randSalt'];
  $hashed_password = crypt($user_password, $salt);

  $query = "UPDATE users SET ";
  $query .= "user_firstname = '{$user_firstname}', ";
  $query .= "user_lastname = '{$user_lastname}', ";
  $query .= "user_role = '{$user_role}', ";
  $query .= "username = '{$username}', ";
  $query .= "user_password = '{$hashed_password}' ";
  $query .= "WHERE user_id = {$the_user_id}";

  $edit_user_query = mysqli_query($connection, $query);
  confirm_query($edit_user_query);
}
?>

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
      value="Update User">
  </div>
</form>
