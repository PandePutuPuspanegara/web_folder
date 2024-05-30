<?php
include 'partials/header.php';

$category_query ="SELECT * FROM categories";
$categories = mysqli_query($connection,$category_query);

if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $post = mysqli_fetch_assoc($result);
    
}else{
    header('location: ' .ROOT_URL .'admin/');
    die();

}


?>

<section class="form__section">
    <div class="container form__section-container">
        <h2>Edit Post</h2>
        <form action="<?= ROOT_URL?>admin/edit-post-logic.php" enctype="multipart/form-data" method="POST">
            <input type="hidden" name="id" value="<?= $post['id']?>" >
            <input type="hidden" name="previous_thumbnail_name" value="<?= $post['thumbnail']?>" >
            <input type="text" name="title" value="<?= $post['title'] ?>" placeholder="Title" >
            <select name="category">
                <?php while($category = mysqli_fetch_assoc($categories)) : ?>
                    <option value="<?= $category['id']?>"><?= $category['title'] ?></option>
                <?php endwhile ?>
                

            </select>
            <textarea rows="10" name="body" placeholder="body"><?= $post['body']?></textarea>
            <div class="form__control inline">
                <input type="checkbox" name="is_featured" id="is featured" value="1" checked>
                <label for="is_featured">Featured</label>
            </div>
            <div class="form__control">
                <label for="thumbnail">Change Thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail">
            </div>
            <button type="submit" name="submit" class="btn">Update Post</button>


        </form>
    </div>
</section>

<footer>
    <div class="footer__socials">
        <a href="https//:youtube.com"><i class="uil uil-youtube"></i></a>
        <a href="https//:facebook.com"><i class="uil uil-facebook"></i></a>
        <a href="https//:instagram.com"><i class="uil uil-instagram"></i></i></a>
        <a href="https//:twitter.com"><i class="uil uil-twitter"></i></a>
    </div>
    <div class="container footer__container">
        <article>
            <h4>Categories</h4>
            <ul>
                <li><a href="">Category</a></li>
                <li><a href="">Category</a></li>
                <li><a href="">Category</a></li>
                <li><a href="">Category</a></li>
                <li><a href="">Category</a></li>
                <li><a href="">Category</a></li>

            </ul>
        </article>
        <article>
            <h4>Online Support</h4>
            <ul>
                <li><a href="">Category</a></li>
                <li><a href="">Category</a></li>
                <li><a href="">Category</a></li>
                <li><a href="">Category</a></li>
                <li><a href="">Category</a></li>
                <li><a href="">Category</a></li>

            </ul>
        </article>
        <article>
            <h4>Blog</h4>
            <ul>
                <li><a href="">Category</a></li>
                <li><a href="">Category</a></li>
                <li><a href="">Category</a></li>
                <li><a href="">Category</a></li>
                <li><a href="">Category</a></li>
                <li><a href="">Category</a></li>

            </ul>
        </article>
        <article>
            <h4>Permalinks</h4>
            <ul>
                <li><a href="">Category</a></li>
                <li><a href="">Category</a></li>
                <li><a href="">Category</a></li>
                <li><a href="">Category</a></li>
                <li><a href="">Category</a></li>
                <li><a href="">Category</a></li>

            </ul>
        </article>
    </div>
    <div class="footer__copyright">
        <small>Copyright &copy; PARENTION 2023</small>
    </div>
</footer>

</body>