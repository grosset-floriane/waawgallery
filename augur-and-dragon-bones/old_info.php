<?php
    define('MAGIC', "WAAWamazing");

    require('../../private/accessWAAW.php');
    $conn = new mysqli($host, $username, $password, $database);

    // Test connection
    if($conn->connect_error) {
        die ($conn->connect_error);
    }

    $query = "SELECT * FROM pages_infos
                    WHERE id = 5";
    $result = $conn->query($query);
    if($result->num_rows < 1) {
        // not fount 
        echo "no rows";
        die;
    } else {
        $data = [];
        while($pageData = $result->fetch_assoc()) {
            array_push($data, $pageData);
        }
    }

    $data = $data[0];
    var_dump($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'inc/head.php';?>
<title><?php echo $data["title"];?></title>
    <link rel="icon" href="assets/img/favicon.png" type="image/x-icon">
    <?php include("../inc/functions.php"); 
    printMetaTags($data);
    ?>
    
</head>
<body class="info">
<?php include '../inc/header.php'; ?>

<main>
    <h1><a href="https://waawgallery.com"><img src="../img/logoLightBlue.png" alt="Logo WAAW gallery" class="logo"></a></h1>
    <h2><?php echo $data["title"];?></h2>
    <p>Opening 27th November at 7pm online on WAAW</p>
    <p><a href="<?php echo $data["facebook_event"];?>" target="_BLANK">Facebook event</a></p>
    <hr>
    <section class="intro-sandy">
        <?php echo $data["description"];?>
    </section>
    <hr>
    <section class="presentation-sandy">

    <?php echo $data["artist_bio"];?>
    </section>
    
    <div class="buttons">
        <p class="enter-button"><a href="/augur-and-dragon-bones/">Enter the work</a></p>
    </div>



</main>

<?php  include '../inc/footer.php'; ?>

</body>
</html>