<?php
require_once 'Class/Revert.php';

$class = new Revert;
$result = $class->revString("Cat houSe elEpHant! cat, is 'cold' now third-part can`t");
?>

<html lang="RU">
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <title>Тестовое задание</title>
</head>
<body>
<p>Tac esuOh tnAhPele! tac, si 'dloc' won driht-trap nac`t</p>
<p><?= $result ?></p>
</body>
</html>
