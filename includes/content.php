<?php
require_once "db.php";
?>
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>

            <!-- First Blog Post -->
            <?php
            $sql = "SELECT * FROM `posts`";
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
                echo "0 results";
                $conn->close();
            }
            $conn->close();
            ?>


            <!-- <h2>
                <a href="#">Blog Post Title</a>
            </h2>
            <p class="lead">
                by <a href="index.php">Start Bootstrap</a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:00 PM</p>
            <hr>
            <img class="img-responsive" src="http://placehold.it/900x300" alt="">
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, veritatis, tempora, necessitatibus inventore nisi quam quia repellat ut tempore laborum possimus eum dicta id animi corrupti debitis ipsum officiis rerum.</p>
            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr> -->

        </div>

        <!-- Blog Sidebar Widgets Column -->


    </div>
    <!-- /.row -->

    <hr>