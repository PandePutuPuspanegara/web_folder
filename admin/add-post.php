<?php
include 'partials/header.php';

$query = "SELECT * FROM categories";
$categories = mysqli_query($connection, $query);

$title = $_SESSION['add-post-data']['title']?? null;
$body = $_SESSION['add-post-data']['body'] ?? null;

unset($_SESSION['add-post-data']);


?>

<section class="form__section">
    <div class="container form__section-container">
        <h2>Add Post</h2>
        <?php if(isset($_SESSION['add-post'])) : ?>
        <div class="alert__message error">
            <p><?= $_SESSION['add-post'];
            unset($_SESSION['add-post']);
            ?></p>
        </div>
        <?php endif ?>
        <form action="<?= ROOT_URL ?>admin/add-post-logic.php" enctype="multipart/form-data" method="POST">
            <input type="text" name="title"  placeholder="Title" >
            <select name="category">
                <?php while($category = mysqli_fetch_assoc($categories)): ?>
                <option value="<?= $category['id']?>"><?=$category['title']?></option>
                <?php endwhile ?>
                
            </select>
            <textarea rows="10" name="body" placeholder="body"><?= $body?></textarea>
            <?php if(isset($_SESSION['user_is_admin'])): ?>
            <div class="form__control inline">
                <input type="checkbox" name="is_featured" value="1" id="is_featured" checked>
                <label for="is_featured">Featured</label>
            </div>
            <?php endif ?>
            <div class="form__control">
                <label for="thumbnail">Add Thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail">
            </div>
            <button type="submit" name="submit" class="btn">Add Post</button>


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