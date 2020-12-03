<?php


function insertCategories()
{
    global $conn;

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
}

function findAllCategories()
{
    global $conn;
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
}

function selectCategory(){
    global $conn;

    $sql = "SELECT * FROM categories";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $catId = $row['cat_id'];
            $title = $row['cat_title'];
            echo "<option value='$catId'>$title</option>";
        }
    } else {
        echo "<option>No categories yet.</option>";
    }

}

function updateCategory()
{
    global $conn;
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

            //

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
                        die("Error updating record: " . $conn->error);
                    }
                }
            }
        } else {
            header("Location: categories.php");
        }
    }
}

function deleteCategory()
{

    if (isset($_GET['delete'])) {
        global $conn;
        $id = $_GET['delete'];
        $sql = "DELETE FROM categories WHERE cat_id='{$id}'";

        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            die("Error deleting record: " . $conn->error);
        }
        header("Location: categories.php");
    }
}

function findAllPosts()
{
    global $conn;

    $sql = "SELECT * FROM `posts`";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row['post_id'];
            $author = $row["post_author"];
            $title = $row["post_title"];
            $category = $row['post_category_id'];
            $status = $row['post_status'];
            $image = $row["post_image"];
            $comments = $row['post_comment_count'];
            $created = $row["post_date"];
            $content = $row["post_content"];

            $html = "<tr>";
            $html .= "<td>{$id}</td>";
            $html .= "<td>{$author}</td>";
            $html .= "<td>{$title}</td>";
            // $html .= "<td>{$content}</td>";
            $html .= "<td>{$category}</td>";
            $html .= "<td>{$status}</td>";
            $html .= "<td><img class='img-thumbnail img-fluid' width='100' src='../images/{$image}' alt='view'></td>";
            $html .= "<td>{$comments}</td>";
            $html .= "<td>{$created}</td>";
            $html .= "<td><a href='posts.php?source=edit_post&p_id={$id}'>Edit</a></td>";
            $html .= "<td><a href='posts.php?delete_post={$id}'>Delete</a></td>";
            $html .= "</tr>";

            echo $html;
        }
    } else {
        echo "<h1>No results.</h1>";
    }
}

function addPost() {
    global $conn;
    if (isset($_POST['submit-post'])) {
        $title = $_POST['title'];
        $category = $_POST['category'];
        $author = $_POST['author'];
        $status = $_POST['status'];
      
        $image = $_FILES['image']['name'];
        $image_temp = $_FILES['image']['tmp_name'];
      
        $content = $_POST['content'];
        $commentCount = 4;
      
      move_uploaded_file($image_temp, "../images/$image");
      
      $sql = "INSERT INTO posts (post_category_id, post_title, post_author, post_image, post_content, post_comment_count, post_status)
      VALUES ('$category', '$title', '$author', '$image', '$content', '$commentCount', '$status')";
      
      if ($conn->query($sql) === TRUE) {
          echo "New record created successfully";
        } else {
         die("Error: " . $sql . "<br>" . $conn->error);
        }
      }
}

function deletePost(){
    if (isset($_GET['delete_post'])) {
        global $conn;
        $id = $_GET['delete_post'];
        $sql = "DELETE FROM posts WHERE post_id='{$id}'";

        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            die("Error deleting record: " . $conn->error);
        }
        header("Location: posts.php");
    }
}


?>
