<?php
include 'partials/header.php';
$title = $_SESSION['add-category-data']['title'] ?? null;
$description = $_SESSION['add-category-data']['description'] ?? null;

unset($_SESSION['add-category-data']);

?>
<section class="form__section">
    <div class="container form__section-container">
        <h2>Add Category</h2>
        <?php if(isset($_SESSION['add-category'])) : 
        ?>
        <div class="alert__message error container">
                <p>
                    <?= $_SESSION['add-category'];
                        unset($_SESSION['add-category']);
                    ?>
                </p>
        </div>
        <?php endif?>

        <form action="<?= ROOT_URL ?>admin/add-category-logic.php" method="POST">
            <input type="text" value="<?= $title?>" name="title" placeholder="Title">
            <textarea rows="4" value="<?= $description?>" name="description" placeholder="Description"></textarea>
            <button type="submit" name="submit" class="btn">Add Category</button>
            

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