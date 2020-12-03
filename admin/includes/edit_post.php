<?php
if (isset($_GET['p_id'])) {
    global $conn;
    $id = $_GET['p_id'];
    $sql = "SELECT * FROM posts WHERE post_id = '{$id}'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $author = $row["post_author"];
            $title = $row["post_title"];
            $category = $row['post_category_id'];
            $status = $row['post_status'];
            $image = $row["post_image"];
            $comments = $row['post_comment_count'];
            $created = $row["post_date"];
            $content = $row["post_content"];
        }

        if (isset($_POST['edit-post'])) {
            $author = $_POST['author'];
            $title = $_POST['title'];
            $category = $_POST['category'];
            $status = ['status'];
            $image = $_FILES['image']['name'];
            $image_temp = $_FILES['image']['tmp_name'];
            $content = $_POST['content'];


            move_uploaded_file($image_temp, "../images/$image");

            if ($title == "" || empty($title)) {
                echo "Please fill up all fields";
            } else {
                
                $sql = "UPDATE posts SET 
                post_title='$title', 
                post_author='$author', 
                post_category_id='$category', 
                post_status='$status', 
                post_image='$image', 
                post_content='$content' 
                WHERE post_id='$id'";

                if ($conn->query($sql) === TRUE) {
                    header("Location: posts.php");
                } else {
                    die("Error updating record: " . $conn->error);
                }
            }
        }
    } else {
        header("Location: posts.php");
    }
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" value="<?php echo $title; ?>">
    </div>
    <div class="form-group">
        <label for="category">Category</label>
        <select class="form-control" name="category">
            <?php
            selectCategory();
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="author">Author</label>
        <input type="text" name="author" class="form-control" value="<?php echo $author; ?>">
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <input type="text" name="status" class="form-control" value="<?php echo $status; ?>">
    </div>
    <div class="form-group">
        <img src="../images/<?php echo $image; ?>" width='100' alt="">
        <input type="file" name="image" class="form-control" value="<?php echo $image; ?>">
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea type="text" name="content" cols="30" rows="10" class="form-control"><?php echo $content; ?></textarea>
    </div>
    <div class="form-group">
        <input type="submit" name="edit-post" class="btn btn-primary" value="Save Changes">
    </div>
</form>