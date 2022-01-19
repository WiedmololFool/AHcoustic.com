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
    <title>Гитарист</title>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/tabs.css">
    <link rel="stylesheet" href="../assets/css/guitarist.css">
</head>

<body>
<div class = "page">
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
            <h1><?php
                $guitaristId = $_GET['id'];
                $strSQL = "SELECT * FROM `SongTable` WHERE GuitaristId = '$guitaristId'";
                $strSQLW = "";
                $guitarist = mysqli_fetch_assoc($mysql->query("SELECT * FROM `GuitaristTable` WHERE Id = '$guitaristId'"));
                echo $guitarist['Name']; ?></h1>

            <?php
            echo " <div class='guitarist-block'><img src='../$guitarist[Img]' alt='' height='500px' class='guitarist-photo'> <p>$guitarist[Description]</p>
 <br> <a href='$guitarist[Link]' target='_blank'><img src='../assets/img/yt.png' height='50px' align='middle'> &#128073 Канал на YouTube</a></div>";
            ?>
            <div class="arrangements-content">
                <h2>Аранжировки гитариста</h2>
                <form action="index.php?id=<?php echo $guitarist['Id'] ?>" method=post>
                    <div class="input__box">
                        <input type="text" placeholder="&#x1F50E;&#xFE0E Название композиции..." name="txtSong" size=20
                               maxlength=50 value=""
                               class="search">
                        <input type=submit name=cmdPost value="Применить" class="button input">
                        <input type=submit name=cmdClear value="Очистить" class="button input">
                    </div>

                    <?php


                    if (!empty($_POST['txtSong']))
                    {
                        $strSQLW = "  AND Name LIKE '%" . $_POST['txtSong'] . "%' ";
                    }

                    if ($strSQLW != "")
                    {
                        $strSQL = $strSQL . $strSQLW;
                    }

                    $r = $mysql->query($strSQL);
                    if (mysqli_num_rows($r) > 0)
                    {
                        for ($i = 0; $i < mysqli_num_rows($r); $i++)
                        {
                            $song = mysqli_fetch_array($r);
                            echo "<div class='video'><h2>$song[Name]</h2> <div class='video-container'><iframe width=800' height='450' src='$song[Video]' frameborder='0' allowfullscreen class='yt-video'></iframe></div> <h3> &#128073 Скачать <a href='../" . $song['Tabs'] . "'>табулатуру</a></h3><br></div>";
                        }
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