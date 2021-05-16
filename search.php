<?php include "includes/header.php" ?>
<!-- Navigation -->
<?php include "includes/nav.php" ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <?php

            if (isset($_POST['submit'])) {
                $search = $_POST['search'];

                $query = "SELECT * FROM post_recipes WHERE post_recipes_tags LIKE '%$search%' ";
                $search_query = mysqli_query($connection, $query);
                if (!$search_query) {
                    die("query failed!" . mysqli_error($connection));
                }
                $count = mysqli_num_rows($search_query);
                if ($count == 0) {
                    echo "<h1> NO RESULT </h1>";
                } else {
                    while ($row = mysqli_fetch_assoc($search_query)) {
                        $post_recipes_title = $row['post_recipes_title'];
                        $post_recipes_author = $row['post_recipes_author'];
                        $post_recipes_date = $row['post_recipes_date'];
                        $post_recipes_img = $row['post_recipes_img'];
                        $post_recipes_ingredientes = $row['post_recipes_ingredientes'];

            ?>

                        <h1 class="page-header">
                            Page Heading
                            <small>Secondary Text</small>
                        </h1>
                        <!-- First Blog Post -->
                        <h2>
                            <a href="#"><?php echo $post_recipes_title ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php"><?php echo $post_recipes_author ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> Posted on: <?php echo $post_recipes_date ?></p>
                        <hr>
                        <img class="img-responsive" src="images/<?php echo $post_recipes_img; ?>" alt="">
                        <hr>
                        <p><?php echo $post_recipes_ingredientes ?></p>
                        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>

            <?php }
                }
            }; ?>

        </div>

        <!-- Blog Sidebar Widgets Column -->

        <?php include "includes/sidebar.php" ?>
    </div>
    <!-- /.row -->

    <hr>

    <?php include "includes/footer.php" ?>