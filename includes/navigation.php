<?php
require_once "db.php";
?>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><i class="fa fa-fw fa-home"></i></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

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

              <li><a href="admin/index.php"><i class="fa fa-fw fa-gear"></i>Admin</a></li>  
            </ul>
        </div>
    </div>
</nav>