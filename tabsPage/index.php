<?php
require '../connect.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Табы и ноты</title>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/tabs.css">
</head>
<body>
<div class="page">
    <header class="header">
        <div class="header__content">
            <a href="../index.php" class="header__logo">
                AHcoustic.com
            </a>
            <nav class="nav">
                <a href="../index.php" class="menu__item ">Главная</a>
                <a href="index.php" class="menu__item active">Табы и ноты</a>
                <a href="../allGuitarists/index.php" class="menu__item ">Гитаристы</a>
            </nav>
        </div>
    </header>
    <div id="content" role="main" class="container tabshop">
        <div class="page-title-overlay">
            <div><h2 class="page-title">Табы и ноты на фингерстайл-аранжировки </h2></div>
            <div class="page-subtitle">Для Guitar Pro и в PDF</div>
        </div>

        <div class="content">
            <br>
            <p>
                Здесь вы найдете огромный архив файлов <b>фингерстайл табулатур</b> для гитары в формате
                <b>"pdf"</b> и <b>"gpx"</b> (для Guitar PRO). Программа Гитар ПРО – отличная платформа
                для музыкантов любого уровня. Скачивайте табулатуры и наслаждайтесь игрой на гитаре!
                Навигация по фингерстайл песням очень простая: для каждой композиции есть
                аудиодорожка для демо-прослушивания в Guitar PRO, видео на YouTube с исполнением на
                акустической гитаре, а также кнопка для скачивания соответствующих табов.
            </p>

            <h2>Аранжировки</h2>
            <form action="index.php" method=post>
                <div class="input__box">
                    <input type="text" placeholder="&#x1F50E;&#xFE0E Название композиции..." name="txtSong" size=20
                           maxlength=50 value=""
                           class="search">
                    <input type="text" placeholder="&#x1F50E;&#xFE0E Гитарист..." name="txtGuitarist" size=20 maxlength=50
                           value="" class="search">
                    <input type=submit name=cmdPost value="Применить" class="button input">
                    <input type=submit name=cmdClear value="Очистить" class="button input">
                </div>


                <table bgcolor="ffffff" width="100%" align="center" border="3">

                    <?php

                    Error_Reporting(E_ALL & ~E_NOTICE);
                    $strSQL = "SELECT * FROM `SongTable`";
                    $strSQLW = "";
                    if (!empty($_POST['txtSong']))
                    {
                        $strSQLW = $strSQLW . " (Name LIKE '%" . $_POST['txtSong'] . "%') ";
                    }
                    if (!empty($_POST['txtGuitarist']))
                    {
                        if ($strSQLW != "")
                        {
                            $strSQLW = $strSQLW . " and ";
                        }
                        $strSQLW = $strSQLW . " (GuitaristId = (SELECT Id from `GuitaristTable` WHERE Name LIKE '%" . $_POST['txtGuitarist'] . "%')) ";
                    }

                    if ($strSQLW != "")
                    {
                        $strSQL = $strSQL . " where " . $strSQLW;
                    }
                    //                $mysql = new mysqli("localhost", "root", '', "TabsDb");
                    //                if ($mysql->connect_error)
                    //                {
                    //                    echo('Error number: ' . $mysql->connect_errno . '<br>');
                    //                    die('Error: ' . $mysql->connect_error);
                    //                }

                    $mysql->query($strSQL);
                    $r = $mysql->query($strSQL);
                    if (mysqli_num_rows($r) > 0)
                    {
                        echo "
                        <tr style='color: #fff;' bgcolor='444444'>
                            <td>Название</td>
                            <td>Видео</td>
                            <td>Скачать</td>
                        </tr>";
                        for ($i = 0; $i < mysqli_num_rows($r); $i++)
                        {
                            $song = mysqli_fetch_array($r);
                            $guitarist = mysqli_fetch_assoc($mysql->query("SELECT * FROM `GuitaristTable` WHERE Id = '$song[GuitaristId]'"));
                            echo "                        <tr>
                            <td style='vertical-align: middle;'>
                                " . $song['Name'] . " - <a href='../guitarist/index.php?id=$guitarist[Id]'
                                                   target='' class='guitarist_name'>" . $guitarist['Name'] . "</a>
                                <div>
                                    <audio controls=''>
                                        <source src='../".$song['Demo']."' type='audio/mpeg'>
                                    </audio>
                                </div>
                            </td>
                            <td style='text-align: center; vertical-align: middle;'>
                            <a href=" . $song['Video'] . " target='_blank'>Видео</a>
                            </td>
                            <td style='text-align: center; vertical-align: middle;'>
                            <a href='../" . $song['Tabs'] . "'> Скачать </a>
                               
                            </td>
                        </tr>";
                        }
                    } else
                    {
                        echo "<div align=center><font face=Arial size=2>В результате поиска  записи не найдены.</font>\n</div>";
                    }
                    $mysql->close();
                    ?>
                </table>
            </form>
        </div>
    </div>
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