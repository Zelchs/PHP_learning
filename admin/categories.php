<?php
include "includes/admin_header.php";
include "includes/admin_navigation.php";

?>

<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Welcome to Admin page
                    <small>Categories</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->
        <div class="col-xs-6">

            <?php
            insertCategories();
            ?>

            <form action="" method="post">
                <div class="form-group">
                    <label for="cat_name">New Category</label>
                    <input type="text" class="form-control" name="cat_name">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
                </div>
            </form>

            <?php
            updateCategory();
            ?>


        </div>
        <div class="col-xs-6">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Category Title</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    findAllCategories();
                    deleteCategory();
                    ?>

                </tbody>
            </table>
        </div>


    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include "includes/admin_footer.php"; ?>