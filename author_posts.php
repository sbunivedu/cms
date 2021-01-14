<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
  <!-- Navigation -->
  <?php include "includes/navigation.php"; ?>
  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

<?php
  if(isset($_GET['p_id'])){
    $the_post_id = $_GET['p_id'];
    $the_post_author = $_GET['author'];
  }

  $query = "SELECT * FROM posts WHERE BINARY post_author = '$the_post_author'";
  $select_all_posts_query = mysqli_query($connection, $query);
  while($row = mysqli_fetch_assoc($select_all_posts_query)){
    $post_id = $row['post_id'];
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_date = $row['post_date'];
    $post_image = $row['post_image'];
    $post_content = $row['post_content'];
?>
        <!-- First Blog Post -->
        <h2>
          <a href="post.php?p_id=<?= $post_id ?>"><?=$post_title?></a>
        </h2>
        <p class="lead">
          All posts by <?=$post_author?>
        </p>
        <p><span class="glyphicon glyphicon-time"></span> Posted on <?=$post_date?></p>
        <hr>
        <img class="img-responsive" src="images/<?=$post_image?>" alt="">
        <hr>
        <p><?=$post_content?></p>
        <hr>
<?php
  }
?>

    </div>
      <!-- Blog Sidebar Widgets Column -->
      <?php include "includes/sidebar.php"; ?>
    <!-- /.row -->

    <hr>

<?php include "includes/footer.php"; ?>
