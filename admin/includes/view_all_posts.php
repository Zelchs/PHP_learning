
<div class="row">
<div class="col-lg-12">
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Author</th>
                <th>Title</th>
                <!-- <th>Content</th> -->
                <th>Category</th>
                <th>Status</th>
                <th>Image</th>
                <th>Comments</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php 

            findAllPosts();
            deletePost();
            ?>
            
        </tbody>
    </table>
</div>
</div>