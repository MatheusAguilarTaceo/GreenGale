<?php
function travParDir($path, $level){
    if($level == 0){
        return $path;
    }else{
        $path = dirname($path);
        return travParDir($path, $level-1);
    }
}
?>
<h2>USER</h2>
<ul>
    <li> <?php echo $path = ($_SERVER['REQUEST_URI']); echo  '<br>'.travParDir($path, 2)?></li>
    <li><?php $user = $data['users']; print_r($user->nome."<br>" .$user->email."<br>".$user->id) ?> | <a href= "<?php echo travParDir($path, 2);?>" >Voltar</a></li>
</ul>