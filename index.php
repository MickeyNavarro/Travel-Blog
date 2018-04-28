<!-- Index page checks for the session if there is one. It also holds all of the links that are used in the showMenu.php -->
<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "Please login first <a href='showLogin.html'> here </a>";
    exit;
}

if (isset($_GET['pageNumber']))
    $blogPost = $_GET['pageNumber'];
    else
        $blogPost = 4;
        
        if ( $_SESSION['username']) {
            require_once 'showMenu.php';
            
            switch ($blogPost) {
                case 1:
                    require_once 'showSearch.php';
                    break;
                case 2:
                    require_once 'showAllPosts.php';
                    break;
                case 3:
                    require_once 'showAddForm.php';
                    break;
                case 4:
                    require_once 'showBlogWelcome.php';
                    break;
            }
        }
        else {
            echo "<h1>Blog Posts</h1>";
            echo "Please login first <a href='showLogin.html'>login here</a>";
            exit;
        }
        
?>