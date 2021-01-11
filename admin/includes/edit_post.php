<?php
if(isset($_GET['p_id'])){
  $the_post_id = $_GET['p_id'];
  $query = "SELECT * FROM posts WHERE post_id = {$the_post_id}";
  $select_post_by_id = mysqli_query($connection, $query);
  while($row = mysqli_fetch_assoc($select_post_by_id)){
    $post_id = $row['post_id'];
    $post_author = $row['post_author'];
    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_content = $row['post_content'];
    $post_tags = $row['post_tags'];
    $post_comment_count = $row['post_comment_count'];
    $post_date = $row['post_date'];


  // UPDATE POST
  if(isset($_POST['update_post'])){
    $post_author = $_POST['post_author'];
    $post_title = $_POST['post_title'];
    $post_category_id = $_POST['post_category'];
    $post_status = $_POST['post_status'];
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    $post_content = $_POST['post_content'];
    $post_tags = $_POST['post_tags'];

    move_uploaded_file($post_image_temp, "../images/$post_image");

    if(empty($post_image)){
      $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
      $select_image = mysqli_query($connection, $query);
      while($row = mysqli_fetch_assoc($select_image)){
        $post_image = $row['post_image'];
      }
    }
    $query = "UPDATE posts SET ";
    $query .= "post_title = '{$post_title}', ";
    $query .= "post_category_id = '{$post_category_id}', ";
    $query .= "post_date = now(), ";
    $query .= "post_author = '{$post_author}', ";
    $query .= "post_status = '{$post_status}', ";
    $query .= "post_tags = '{$post_tags}', ";
    $query .= "post_content = '{$post_content}', ";
    $query .= "post_image = '{$post_image}' ";
    $query .= "WHERE post_id = '{$the_post_id}' ";

    //global $connection;
    $update_post = mysqli_query($connection, $query);
    confirm_query($update_post);
?>
<p class="bg-success">
Post Updated. <a href="../post.php?p_id=<?=$the_post_id?>">View Post</a> or
<a href='posts.php'>Edit More Posts</a>
</p>
<?php
  }
?>
<form class="" action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" class="form-control" name="post_title" value="<?= $post_title ?>">
  </div>

  <div class="form-group">
    <label for="post_category">Post Category</label>
    <select class="" name="post_category" id="post_category">

<?php
$query = "SELECT * FROM categories ";
$select_categories = mysqli_query($connection, $query);
confirm_query($select_categories);
while($row = mysqli_fetch_assoc($select_categories)){
  $cat_id = $row['cat_id'];
  $cat_title = $row['cat_title'];
 ?>
      <option value="<?= $cat_id ?>"><?= $cat_title ?></option>
<?php
}
 ?>
    </select>
  </div>

  <div class="form-group">
    <label for="post_author">Post Author</label>
    <input type="text" class="form-control" name="post_author" value="<?= $post_author ?>">
  </div>
  <div>
    <select name="post_status" id="">
      <option value="<?=$post_status?>"><?=$post_status?></option>
<?php
if($post_status == "published"){
?>
      <option value="draft">draft</option>
<?php
}else{
?>
      <option value="published">published</option>
<?php
}
?>
    </select>
  </div>

  <div class="form-group">
    <label for="post_image">Post Image</label>
    <img width="100" src="../images/<?= $post_image ?>" alt="">
    <input type="file" name="image">
  </div>

  <div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input type="text" class="form-control" name="post_tags" value="<?= $post_tags ?>">
  </div>

  <div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea type="text" class="form-control" name="post_content" id="editor"
      cols="30" rols="10"><?= $post_content ?></textarea>
  </div>

  <div class="form-group">
    <input class="btn btn-primary" type="submit" name="update_post"
      value="Update Post">
  </div>
</form>

<?php
  }
}
?>
