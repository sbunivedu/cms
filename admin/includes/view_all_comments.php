<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Id</th>
      <th>Author</th>
      <th>Comment</th>
      <th>Email</th>
      <th>Status</th>
      <th>In Response to</th>
      <th>Date</th>
      <th>Approve</th>
      <th>Unapprove</th>
      <th>Delete</th>

    </tr>
  </thead>
  <tbody>
<?php
$query = "SELECT * FROM comments";
$select_comments = mysqli_query($connection, $query);
while($row = mysqli_fetch_assoc($select_comments)){
  $comment_id = $row['comment_id'];
  $comment_post_id = $row['comment_post_id'];
  $comment_author = $row['comment_author'];
  $comment_content = $row['comment_content'];
  $comment_email = $row['comment_email'];
  $comment_status = $row['comment_status'];
  $comment_date = $row['comment_date'];
?>
<tr>
  <td><?= $comment_id ?></td>
  <td><?= $comment_author ?></td>
  <td><?= $comment_content ?></td>
  <td><?= $comment_email ?></td>
  <td><?= $comment_status ?></td>
  <td>Some Title</td>
  <td><?= $comment_date ?></td>
  <td><a href='posts.php?source=edit_post&p_id='>Approve</a></td>
  <td><a href='posts.php?delete='>Unapprove</a></td>
  <td><a href='posts.php?delete='>Delete</a></td>
  </tr>
<?php
}
?>

  </tbody>
</table>

<?php
if(isset($_GET['delete'])){
  $the_post_id = $_GET['delete'];
  $query = "DELETE FROM posts WHERE post_id = {$the_post_id} ";
  $delete_query = mysqli_query($connection, $query);
}
?>
