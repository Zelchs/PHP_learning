<?php
require_once "db.php";
?>

<div class="col-md-4">
    <div class="well">
        <h4>Search Post</h4>
        <form action="search.php" method="post">
            <div class="input-group">
                <input name="search" type="text" class="form-control">
                <span class="input-group-btn">
                    <button name="submit" class="btn btn-default" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>
    </div>
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">

                    <?php
                    $sql = "SELECT * FROM categories";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $title = $row['cat_title'];
                            $id = $row['cat_id'];
                            echo "<li><a href='category.php?category={$id}'>{$title}</a></li>";
                        }
                    } else {
                        echo "0 results";
                        $conn->close();
                    }
                    ?>

            </div>
        </div>
    </div>
    <?php include "widget.php";?>
</div>