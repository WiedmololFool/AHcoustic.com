<?php
require '../connect.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Гитаристы</title>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/tabs.css">
    <link rel="stylesheet" href="../assets/css/grid.css">
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
                <a href="../tabsPage/index.php" class="menu__item">Табы и ноты</a>
                <a href="../allGuitarists/index.php" class="menu__item active">Гитаристы</a>
            </nav>
        </div>
    </header>
    <div id="content" role="main" class="container tabshop">
        <div class="page-title-overlay">
            <div><h2 class="page-title">Гитаристы </h2></div>
            <div class="page-subtitle"></div>
        </div>
        <div class="content">
            <br>
            <form action="index.php" method=post>
                <div class="input__box">
                    <input type="text" placeholder="&#x1F50E;&#xFE0E Гитарист..." name="txtGuitarist" size=20
                           maxlength=50 value="" class="search">
                    <input type=submit name=cmdPost value="Применить" class="button input">
                    <input type=submit name=cmdClear value="Очистить" class="button input">
                </div>
                <br>
                <div>
                    <?php
                    $strSQL = "SELECT * FROM `GuitaristTable` ";
                    $strSQLW = "";

                    if (!empty($_POST['txtGuitarist']))
                    {
                        $strSQLW = "  WHERE Name LIKE '%" . $_POST['txtGuitarist'] . "%' ";
                    }

                    if ($strSQLW != "")
                    {
                        $strSQL = $strSQL . $strSQLW;
                    }

                    $r = $mysql->query($strSQL);
                    if (mysqli_num_rows($r) > 0)
                    {
                        echo " <div class='grid'>";
                        for ($i = 0; $i < mysqli_num_rows($r); $i++)
                        {
                            $guitarist = mysqli_fetch_array($r);
//                        echo "<h1><a href='guitarist.php?id=$author[Id]'>".$author[Name]."</a></h1>";
//                        echo "<br>";
//                        echo "  <a href='guitarist.php?id=$author[Id]''><img src='$author[Img]' alt='' height='500px'></a><br>";
//                        echo "<p>", substr($author[Description], 0, 500)," . . .</p>";
                            echo " 
           
                <div><div><a href='../guitarist/index.php?id=$guitarist[Id]''><img src='../$guitarist[Img]' alt='' height='300px'></a><h3><a href='../guitarist/index.php?id=$guitarist[Id]'>" . $guitarist['Name'] . "</a></h3></div></div>
                ";
                        }
                        echo "</div>";
                    }
                    ?>
                </div>
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
