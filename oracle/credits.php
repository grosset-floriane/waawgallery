<?php
    define('MAGIC', "WAAWamazing");
    require  "../classes/InfoPage.php";

    $newPage = new InfoPage("/oracle/", $conn);
    $head = $newPage->getHead($newPage->pageData);
    $header = $newPage->getHeader($newPage->pageData);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Bibliomancy Oracle / Credits</title>
    <?php echo $head; ?>
</head>
<body class="credits work">
<?php echo $header;?>
    

    <main>
        <header>
            <a href="index.php"><img src="assets/img/bibliomancyTitle2.gif" class="title-oracle" alt="Bibliomancy Oracle blinky title"></a>
        
        </header>
        

        <p class="credits">
            Created by <a href="https://cargocollective.com/LucilaMayol/">Lucila Mayol</a><br>
            Commissioned by WAAW Gallery<br>
            Design: <a href="https://cargocollective.com/LucilaMayol/">Lucila Mayol</a><br>
            Web Implementation: <a href="https://florianegrosset.com">Floriane Grosset</a><br>
            Algorithm: <a href="https://sedb.no/">Sindre S&oslash;rensen</a><br>
            Book Library: <a href="https://www.gutenberg.org/">Project Gutenberg</a><br>
            Produced with the support of: <a href="https://kulturradet.no/">Kulturr&aring;det</a><br>
            2020


        </p>
    </main>


    
</body>
</html>