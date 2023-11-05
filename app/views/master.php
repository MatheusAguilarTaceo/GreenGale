
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['title-menu']?></title>

    <link rel="stylesheet" href= <?php echo CSS.'root.css'?>>
    <link rel="stylesheet" href= <?php echo CSS.'header.css'?>>
    <link rel="stylesheet" href= <?php echo CSS.$data['css']?>>
    <link rel="stylesheet" href= <?php echo CSS.'footer.css'?>>

           
</head>
<body>
    <header>
        <?php require 'header_structure/header.php'?>
    </header>
    <main>
        <?php require $views ?> 
    </main>
    <footer>
        <?php require 'footer.php'; ?> 
    </footer>
    <script src=<?php echo JS.'index.js'?>></script>    
    <script src=<?php echo JS.$data['js']?>></script>    

</body> 

</html>