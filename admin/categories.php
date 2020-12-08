<?php include "includes/admin_header.php" ?>

    <div id="wrapper">

<?php include "includes/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small>Author</small>
                        </h1>
                        <div class="col-xs-6">
                        <form action="">
                          <div class="form-group">
                            <label for="cat-title">Add Category</label>
                            <input class="form-control" type="text" name="cat_title">
                          </div>
                          <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                          </div>
                        </form><!-- Add Category Form -->
                      </div>
                      <div class="col-xs-6">
<?php
$query = "SELECT * FROM categories LIMIT 3";
$select_categories = mysqli_query($connection, $query);
 ?>
                        <table class="table table-border table-hover">
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>Category Title</th>
                            </tr>
                          </thead>
                          <tbody>
<?php
while($row = mysqli_fetch_assoc($select_categories)){
  $cat_id = $row['cat_id'];
  $cat_title = $row['cat_title'];
?>

                           <tr>
                             <td><?=$cat_id?></td>
                             <td><?=$cat_title?></td>
                           </tr>
<?php
}
 ?>
                          </tbody>
                        </table>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include "includes/admin_footer.php" ?>