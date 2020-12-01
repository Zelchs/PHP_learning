<?php
require_once "includes/db.php";
include "includes/header.php";
include "includes/navigation.php";
?>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1 class="page-header">
                Search Results
                <small>Here is what we have found...</small>
            </h1>

            <?php
            if (isset($_POST['submit'])) {
                $search = $_POST['search'];
                $sql = "SELECT * FROM posts WHERE post_title LIKE '%$search%'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $title = $row["post_title"];
                        $author = $row["post_author"];
                        $created = $row["post_date"];
                        $image = $row["post_image"];
                        $content = $row["post_content"];

                        echo "<h2><a href=''>{$title}</a></h2>";
                        echo "<p class='lead'>by <a href='#'>{$author}</a></p>";
                        echo "<p><span class='glyphicon glyphicon-time'></span> Posted on {$created}</p><hr>";
                        echo "<img class='img-responsive' src='images/{$image}' alt='view'><hr>";
                        echo "<p>{$content}</p><a class='btn btn-primary' href='#'>Read More <span class='glyphicon glyphicon-chevron-right'></span></a><hr>";
                    }
                } else {
                    echo "<h1>No results.</h1>";
                }
            } else {
                echo "<h2> Nothing to show here</h2>";
            }
            ?>

        </div>
    </div>
    <hr>

    <?php
    include "includes/sidebar.php";
    include "includes/footer.php";
    ?>