<?php
    require "db.php";
    if(isset($_GET['id']))
    {
        $stmt = $pdo->prepare('select * from posts where id = ?');
        $stmt->execute([$_GET['id']]);
        $post = $stmt->fetch();
    }
    if($post) {
        $stmt1 = $pdo->prepare('delete from posts where id= ?');
        $stmt1->execute([$_GET['id']]);
        unlink(dirname(__FILE__).'/'.$post['img_path']);
    }
    header('Location: index.php');
?>