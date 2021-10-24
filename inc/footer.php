<?php 
// check if the key is there and correct
if (!defined('MAGIC')) { // quotes importantes
    echo "This access is forbidden";
    die; // do not do anything else
} elseif (MAGIC != "WAAWamazing") {
    echo "This access is even more forbidden";
    die;
}

?>


        <footer>
            <hr>
            <p>Follow us: <a href="https://www.facebook.com/WAAWgallery/" target="_BLANK">Facebook</a> / <a href="https://www.instagram.com/waawgallery/" target="_BLANK">Instagram</a> / <a href="about.php#newsletter">Newsletter</a></p>
            <p>© 2020 WAAW All Rights Reserved with the exception of the pictures that belong to their author.<br>
                Graphic Identity & Web Design by <a href="http://florianegrosset.com" target="_BLANK">Floriane Grosset</a></p>
        </footer>

    </body>
</html>