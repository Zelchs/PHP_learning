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

            // INSERT query

            if (isset($_POST['submit'])) {
                $catName = $_POST['cat_name'];

                if ($catName == "" || empty($catName)) {
                    echo "Please fill up this field";
                } else {
                    $sql = "INSERT INTO `categories` (cat_title) VALUES ('{$catName}')";

                    if ($conn->query($sql) === FALSE) {
                        die("Error: " . $sql . "<br>" . $conn->error);
                    }
                }
            }
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

            <!--  -->

            <?php

            if (isset($_GET['edit'])) {
                $id = $_GET['edit'];
                $sql = "SELECT * FROM categories WHERE cat_id = '{$id}'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $id = $row['cat_id'];
                        $value = $row['cat_title'];

                        $html = "<form action='' method='post'>";
                        $html .= "<div class='form-group'>";
                        $html .= "<label for='cat_name'>Update Category</label>";
                        $html .= "<input type='text' class='form-control' value='{$value}' name='update_name'>";
                        $html .= "</div>";
                        $html .= "<div class='form-group'>";
                        $html .= "<input type='submit' class='btn btn-primary' name='submit_update' value='Update'>";
                        $html .= "</div>";
                        $html .= "</form>";

                        echo $html;
                    }

                    // UPDATE query
                    if (isset($_POST['submit_update'])) {
                        $catTitle = $_POST['update_name'];

                        if ($catTitle == "" || empty($catTitle)) {
                            echo "Please fill up this field";
                        } else {
                            $sql = "UPDATE categories SET cat_title='$catTitle' WHERE cat_id='$id'";

                            if ($conn->query($sql) === TRUE) {
                                header("Location: categories.php");
                            } else {
                                echo "Error updating record: " . $conn->error;
                            }
                        }
                    }
                } else {
                    header("Location: categories.php");
                }
            }

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
                    $sql = "SELECT * FROM categories";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $id = $row['cat_id'];
                            $title = $row['cat_title'];
                            echo "<tr>";
                            echo "<td>{$id}</td>";
                            echo "<td>{$title}</td>";
                            echo "<td><a href='categories.php?edit={$id}'>Edit</a></td>";
                            echo "<td><a href='categories.php?delete={$id}'>Delete</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "0 results";
                    }

                    if (isset($_GET['delete'])) {
                        $id = $_GET['delete'];
                        $sql = "DELETE FROM categories WHERE cat_id='{$id}'";

                        if ($conn->query($sql) === TRUE) {
                            echo "Record deleted successfully";
                        } else {
                            echo "Error deleting record: " . $conn->error;
                        }
                        header("Location: categories.php");
                    }
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