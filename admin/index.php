<?php
include 'partials/header.php';



//fetch post

$current_user_id = $_SESSION['user-id'];
$query = "SELECT id, title, category_id FROM posts WHERE author_id = $current_user_id ORDER BY id DESC";
$posts = mysqli_query($connection, $query);

?>

<section class="dashboard">
    <?php if(isset($_SESSION['add-post-success'])) :
        ?>
        <div class="alert__message success container">
                <p>
                    <?= $_SESSION['add-post-success'];
                        unset($_SESSION['add-post-success']);
                    ?>
                </p>
        </div>
    <?php endif ?>
    <?php if(isset($_SESSION['edit-post-success'])) :
        ?>
        <div class="alert__message success container">
                <p>
                    <?= $_SESSION['edit-post-success'];
                        unset($_SESSION['edit-post-success']);
                    ?>
                </p>
        </div>
    <?php endif ?>

    <div class="container dashboard__container">
        <aside>
            <ul>
                <li><a href="add-post.php"><i class="uil uil-postcard"></i>
                        <h5>Add Post</h5>
                    </a>
                </li>
                <li><a href="index.php" class="active"><i class="uil uil-pen"></i>
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

                <li><a href="manage-categories.php" ><i class="uil uil-list-ul"></i>
                        <h5>Manage Categories</h5>
                    </a>
                </li>
                <?php  endif?>
            </ul>
        </aside>
        <main>
            <h2>Manage Posts</h2>
            <?php if(mysqli_num_rows($posts)>0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>
                </thead>
                <tbody>
                    <?php while($post = mysqli_fetch_assoc($posts)) : ?>
                        <?PHP 
                            $category_id = $post['category_id'];
                            $category_query = "SELECT title FROM categories WHERE id=$category_id";
                            $category_result = mysqli_query($connection, $category_query);
                            $category = mysqli_fetch_assoc($category_result);
                        ?>
                        <tr>
                        <td><?= $post['title']?></td>
                        <td><?= $category['title']?></td>
                        <td><a href="<?= ROOT_URL ?>admin/edit-post.php?id=<?= $post['id']?>" class="btn sm">Edit</a></td>
                        <td><a href="<?= ROOT_URL ?>admin/delete-post.php?id=<?= $post['id']?>" class="btn sm danger">Delete</a></td>

                                              
                        

                    </tr>
                    <?php endwhile ?>
                    
                </tbody>
            </table>
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