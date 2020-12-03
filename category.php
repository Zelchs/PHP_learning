<?php
include "includes/header.php";
include "includes/navigation.php";
?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1 class="page-header">
                Posts page
            </h1>


            
            <?php
if (isset($_GET['category'])) {
    $categoryId = $_GET['category'];

    $sql = "SELECT * FROM `posts` WHERE post_category_id='$categoryId' ORDER BY post_id DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row['post_id'];
                    $title = $row["post_title"];
                    $author = $row["post_author"];
                    $created = $row["post_date"];
                    $image = $row["post_image"];
                    $content = substr($row["post_content"], 0, 200);

                    echo "<h2><a href='post.php?post_id={$id}'>{$title}</a></h2>";
                    echo "<p class='lead'>by <a href='#'>{$author}</a></p>";
                    echo "<p><span class='glyphicon glyphicon-time'></span> Posted on {$created}</p><hr>";
                    echo "<img class='img-responsive' src='images/{$image}' alt='view'><hr>";
                    echo "<p>{$content} ...</p><a class='btn btn-primary' href='post.php?post_id={$id}'>Read More <span class='glyphicon glyphicon-chevron-right'></span></a><hr>";
                }
            } else {
                echo "<h1>No results on this category</h1>";
            }
}



            // include "includes/content.php";
            ?>
        </div>
        <hr>

        <?php

        include "includes/sidebar.php";




        include "includes/footer.php";
