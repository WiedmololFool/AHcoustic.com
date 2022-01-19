<?php
require 'connect.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Главная</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/tabs.css">
</head>
<body>
<div class="page">
    <header class="header">
        <div class="header__content">
            <a href="index.php" class="header__logo">
                AHcoustic.com
            </a>
            <nav class="nav">
                <a href="index.php" class="menu__item active">Главная</a>
                <a href="tabsPage/index.php" class="menu__item">Табы и ноты</a>
                <a href="allGuitarists/index.php" class="menu__item">Гитаристы</a>
            </nav>
        </div>
    </header>
    <div id="content" role="main" class="container tabshop">
        <div class="page-title-overlay">
            <div><h2 class="page-title">Добро пожаловать на AHcoustic.com! </h2></div>
            <div class="page-subtitle">Сайт, посвященный акустической гитаре и фингерстайлу</div>
        </div>

        <div class="content">
            <p>
                <br>
            <p>Вам нравится <b>fingerstyle</b>?</p>
            <p>На нашем сайте вы найдете лучшие аранжировки, табы и исполнителей в данном гитарном направлении.</p>
            <br>
            <p><b>Фингерстайл</b> (англ. fingerstyle), также пальцевой метод, пальцевой стиль
                — техника игры на гитаре, чаще всего — акустической, при которой один гитарист ведёт
                одновременно партии соло, ритм и бас. Данная техника позволяет исполнителю создать впечатление
                нескольких одновременно звучащих инструментов. Кроме того, фингерстайл позволяет использовать гитару
                необычными способами, например, в том числе как ударный инструмент.</p>
            </p>

            <h2>Примеры фингерстайл аранжировок</h2>
            <?php

            Error_Reporting(E_ALL & ~E_NOTICE);
            $strSQL = "SELECT * FROM `SongTable` LIMIT 10";
            $mysql->query($strSQL);
            $r = $mysql->query($strSQL);
            if (mysqli_num_rows($r) > 0)
            {
                echo "<div class='slider-container'>";
                for ($i = 0; $i < mysqli_num_rows($r); $i++)
                {
                    $song = mysqli_fetch_array($r);
                    echo "      
        <div class='slide fade'>
             <div class='video-container'>
              <iframe src='$song[Video]' frameborder='0' width='800px' height='450px' allowfullscreen class='yt-video'></iframe>
            </div>
        </div>
           ";
                }
                echo " <a class = 'prev' onclick='plusSlides(-1)'>&#10094</a>
            <a class = 'next' onclick='plusSlides(1)'>&#10095</a>
        </div> ";
            } else
            {
                echo "<div align=center><font face=Arial size=2>В результате поиска  записи не найдены.</font>\n</div>";
            }
            $mysql->close();
            ?>

        </div>
    </div>
    <script src="assets/js/slider.js"></script>
    <script src="assets/js/menu.js"></script>
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-sub-content">
                Copyright © 2021 All rights reserved
            </div>
            <div class="footer-sub-content">
                написать мне: maxslon101@gmail.com
            </div>
        </div>
    </footer>
</div>
</body>
</html>