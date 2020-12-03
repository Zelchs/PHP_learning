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

            if (isset($_GET['post_id'])) {
                $post_id = $_GET['post_id'];

                $sql = "SELECT * FROM `posts` WHERE post_id='$post_id'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $id = $row['post_id'];
                        $title = $row["post_title"];
                        $author = $row["post_author"];
                        $created = $row["post_date"];
                        $image = $row["post_image"];
                        $content = $row["post_content"];

                        echo "<h2><a href='post.php?post_id={$id}'>{$title}</a></h2>";
                        echo "<p class='lead'>by <a href='#'>{$author}</a></p>";
                        echo "<p><span class='glyphicon glyphicon-time'></span> Posted on {$created}</p><hr>";
                        echo "<img class='img-responsive' src='images/{$image}' alt='view'><hr>";
                        echo "<p>{$content}</p><hr>";
                    }
                } else {
                    echo "<h1>No results.</h1>";
                }
            } else {
                include "includes/content.php";
            }
            ?>
<div class="well">
            <h4>Leave a Comment:</h4>
            <form role="form">
                <div class="form-group">
                    <textarea class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <hr>

        <!-- Posted Comments -->

        <!-- Comment -->
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="http://placehold.it/64x64" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">Start Bootstrap
                    <small>August 25, 2014 at 9:30 PM</small>
                </h4>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </div>

        <!-- Comment -->
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="http://placehold.it/64x64" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">Start Bootstrap
                    <small>August 25, 2014 at 9:30 PM</small>
                </h4>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                <!-- Nested Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Nested Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>
                <!-- End Nested Comment -->
            </div>
        </div>
        </div>
        <hr>
        

        <?php



        include "includes/sidebar.php";

        ?>
        <!-- Blog Comments -->

        <!-- Comments Form -->
        

        <?php


        include "includes/footer.php";
