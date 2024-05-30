<?php
include 'partials/header.php'
?>

<section class="dashboard">
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
                <li><a href="add-user.php"><i class="uil uil-user-plus"></i>
                        <h5>Add User</h5>
                    </a>
                </li>
                <li><a href="manage-users.php" class="active"><i class="uil uil-users-alt"></i>
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
            </ul>
        </aside>
        <main>
            <h2>Manage Ctegories</h2>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Admin</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Alesso</td>
                        <td>Alesso</td>
                        <td><a href="edit-category.php" class="btn sm">Edit</a></td>
                        <td><a href="edit-category.php" class="btn sm danger">Delete</a></td>
                        <td>Yes</td>

                    </tr>
                    <tr>
                        <td>Steve Angelo</td>
                        <td>Steve Angelo</td>
                        <td><a href="edit-category.php" class="btn sm">Edit</a></td>
                        <td><a href="edit-category.php" class="btn sm danger">Delete</a></td>
                        <td>No</td>

                    </tr>
                    <tr>
                        <td>Sbastian Ingroso</td>
                        <td>Sbastian Ingroso</td>
                        <td><a href="edit-category.php" class="btn sm">Edit</a></td>
                        <td><a href="edit-category.php" class="btn sm danger">Delete</a></td>
                        <td>Yes</td>

                    </tr>
                </tbody>
            </table>
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