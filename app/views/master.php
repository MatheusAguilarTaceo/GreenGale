
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['title']?></title>
    <!-- <script src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href= <?php echo HEADER?>>
    <link rel="stylesheet" href= <?php echo MAIN.$data['css']?>>
    <link rel="stylesheet" href= <?php echo FOOTER?>>

           
</head>
<body>
    <header>
        <?php require 'header_structure/header.php'?>
    </header>
    <main>
        <?php require $views; ?> 
    </main>
    <footer>
        <?php require 'footer.php'; ?> 
    </footer>
    <script src=<?php echo JS?>></script>    
    <script src=<?php echo JS2?>></script>    

</body> 

</html>