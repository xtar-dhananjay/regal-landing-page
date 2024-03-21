<?php 

    session_start();
    unset($_SESSION['username']);
    

    if (session_destroy()) {
        ?>
        <script>
        window.location="../index.php";
        </script>
    

    <?php
}
?>