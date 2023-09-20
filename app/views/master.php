
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['title']?></title>
    <!-- <script src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href= <?php echo CSS?>>
           
</head>
<body>
    <header class ="header">
        <?php require 'header_structure/header.php'?>
    </header>
    <main>
        <h1 class="main-txt"><?php echo $data['title']?></h1>
        <?php require $views; ?> 
    </main>
    <footer>
        <p>Cabeçalho</p>
    </footer>
    <!-- <script>src="<?php echo JS?>"</script>     -->
    <script src=<?php echo JS?>></script>    

</body> 
</html>