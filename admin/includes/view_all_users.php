<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Id</th>
      <th>Username</th>
      <th>Firstname</th>
      <th>Lastname</th>
      <th>Email</th>
      <th>Role</th>
    </tr>
  </thead>
  <tbody>
<?php
$query = "SELECT * FROM users";
$select_users = mysqli_query($connection, $query);
while($row = mysqli_fetch_assoc($select_users)){
  $user_id = $row['user_id'];
  $username = $row['username'];
  $user_firstname = $row['user_firstname'];
  $user_lastname = $row['user_lastname'];
  $user_email = $row['user_email'];
  $user_image = $row['user_image'];
  $user_role = $row['user_role'];
?>
<tr>
  <td><?= $user_id ?></td>
  <td><?= $username ?></td>
  <td><?= $user_firstname ?></td>
  <td><?= $user_lastname ?></td>
  <td><?= $user_email ?></td>
  <td><?= $user_role ?></td>
  <td><a href='users.php?change_to_admin=<?= $user_id ?>'>Admin</a></td>
  <td><a href='users.php?change_to_subscriber=<?= $user_id ?>'>Subscriber</a></td>
  <td><a href='users.php?source=edit_user&edit_user=<?= $user_id ?>'>Edit</a></td>
  <td><a href='users.php?delete=<?= $user_id ?>'>Delete</a></td>
</tr>
<?php
}
?>
  </tbody>
</table>

<?php
if(isset($_GET['change_to_admin'])){
  $the_user_id = $_GET['change_to_admin'];
  $query = "UPDATE users SET user_role = 'admin' WHERE user_id = {$the_user_id}";
  $change_role_query = mysqli_query($connection, $query);
  header("Location: users.php");
}

if(isset($_GET['change_to_subscriber'])){
  $the_user_id = $_GET['change_to_subscriber'];
  $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = {$the_user_id}";
  $change_role_query = mysqli_query($connection, $query);
  header("Location: users.php");
}

if(isset($_GET['delete'])){
  $the_user_id = $_GET['delete'];
  $query = "DELETE FROM users WHERE user_id = {$the_user_id} ";
  $delete_user_query = mysqli_query($connection, $query);
  header("Location: users.php");
}
?>
