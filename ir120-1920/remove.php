<?php
require "db.php";
if (isset($_GET['id'])) {
    $stmt = $pdo->prepare('select * from posts where id = ?');
    $stmt->execute([$_GET['id']]);
    $post = $stmt-> fetch();
}
if($post) {
    $stmtl = $pdo -> prepare('delete from posts where id=?');
    $stmtl->execute([$_GET['id']]);
    unlink(dirname(__FILE__).'/'.$post['img_paths']);
}
header('Location: index.php');