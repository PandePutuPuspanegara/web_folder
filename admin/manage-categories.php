<?php
include 'partials/header.php';

$query ="SELECT * FROM categories ORDER BY title";
$categories =mysqli_query($connection,$query);
?>

<section class="dashboard">
    

    <?php if(isset($_SESSION['add-category-success'])) : 
        ?>
        <div class="alert__message success container">
                <p>
                    <?= $_SESSION['add-category-success'];
                        unset($_SESSION['add-category-success']);
                    ?>
                </p>
        </div>
    <?php elseif(isset($_SESSION['add-category'])) : 
        ?>
        <div class="alert__message error container">
                <p>
                    <?= $_SESSION['add-category'];
                        unset($_SESSION['add-category']);
                    ?>
                </p>
        </div>
    
    <?php endif?>
    <div class="container dashboard__container">

        <aside>
            <ul>
                <li><a href="add-post.php"><i class="uil uil-postcard"></i>
                        <h5>Add Post</h5>
                    </a>
                </li>
                <li><a href="index.php"><i class="uil uil-pen"></i>
                        <h5>Manage Post</h5>
                    </a>
                </li>
                <?php if(isset($_SESSION['user_is_admin'])): ?>
                <li><a href="add-user.php"><i class="uil uil-user-plus"></i>
                        <h5>Add User</h5>
                    </a>
                </li>
                <li><a href="manage-users.php"><i class="uil uil-users-alt"></i>
                        <h5>Manage User</h5>
                    </a>
                </li>

                <li><a href="add-category.php"><i class="uil uil-edit"></i>
                        <h5>Add Categories</h5>
                    </a>
                </li>

                <li><a href="manage-categories.php" class="active"><i class="uil uil-list-ul"></i>
                        <h5>Manage Categories</h5>
                    </a>
                </li>
                <?php endif ?>
            </ul>
        </aside>
        <main>
            <h2>Manage Ctegories</h2>
            <?php if(mysqli_num_rows($categories)>0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Edit</th>
                            <th>Delete</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php while($category = mysqli_fetch_assoc($categories)) :?>
                            <tr>
                                <td><?= $category['title']?></td>
                                <td><a href="<?= ROOT_URL ?>admin/edit-category.php?id=<?= $category['id']?>" class="btn sm">Edit</a></td>
                                <td><a href="<?= ROOT_URL ?>admin/delete-category.php?id=<?= $category['id']?>" class="btn sm danger">Delete</a></td>

                            </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="alert__message error"><?= "No categories found"?></div>
            <?php endif ?>
        </main>
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