<?php
addPost();
?>




<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control">
    </div>
    <div class="form-group">
    <label for="category">Category</label>
    <select class="form-control" name="category" >
      <?php
      selectCategory();
      ?>
    </select>
  </div>
    <div class="form-group">
        <label for="author">Author</label>
        <input type="text" name="author" class="form-control">
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <input type="text" name="status" class="form-control">
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image" class="form-control">
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea type="text" name="content" cols="30" rows="10" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" name="submit-post" class="btn btn-primary" value="Publish">
    </div>
</form>