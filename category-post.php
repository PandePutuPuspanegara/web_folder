<?php

include 'partials/header.php';

if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE category_id=$id ORDER BY date_time DESC";
    $posts = mysqli_query($connection, $query);
    
}else{
    header('location: ' .ROOT_URL . 'blog.php');
    die();
}

?>



        
    </nav>

    <headaer class="category__title">
        <h2>
            <?php 
                        
                        $category_id = $id;
                        $category_query = "SELECT * FROM categories WHERE id=$category_id";
                        $category_result = mysqli_query($connection, $category_query);
                        $category = mysqli_fetch_assoc($category_result);
                        echo $category ['title'];


                        ?>
        </h2>
    </headaer>
        

        


    <section class="posts">
        <div class="container posts__container">
            <?php while($post = mysqli_fetch_assoc($posts)) : ?>
            <article class="post">
                <div class="post__thumbnail">
                    <img src="./images/<?= $post['thumbnail']?>">
                </div>
                <div class="post__info">
                    
                    
                    <h3 class="post__title">
                        <a href="<?=ROOT_URL ?>post.php?id=<?= $post['id'] ?>"><?=$post['title'] ?></a>
                    </h3>
                    <p class="post__body">
                        <?= substr($post['body'], 0, 200) ?>...
                    </p>
                    <div class="post__author">
                    <?php
                        $author_id = $post['author_id'];
                        $author_query = "SELECT * FROM users WHERE id=$author_id";
                        $author_result = mysqli_query($connection, $author_query);
                        $author = mysqli_fetch_assoc($author_result);
                    ?>
                        <div class="post__author-avatar">
                            <img src="./images/<?= $author['avatar']?>">
                        </div>
                        <div class="post__author-info">
                        <h5>By: <?= "{$author['firstname']} {$author['lastname']} "?></h5>
                            <small> <?= date("M d, Y - H:i", strtotime($post['date_time'])) ?></small>
                        </div>
                    </div>
                </div>
            </article>
            <?php endwhile ?>

            

            

            
        </div>
    </section>

<?php

    include 'partials/footer.php'

?>
    

   <script src="./js/main.js"></script>
</body>
</html>