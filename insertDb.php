<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вставка начальных данных в БД</title>
</head>
<body>
<?php
require 'connect.php';

$mysql->query("SET NAMES 'utf8'");


$mysql->query("DROP TABLE SongTable");
$mysql->query("DROP TABLE GuitaristTable");


$mysql->query("CREATE TABLE `GuitaristTable`
             (Id INT NOT NULL auto_increment,
              Name VARCHAR(100) NOT NULL,
              Link VARCHAR(100),
              Description VARCHAR(10000),
              Img VARCHAR(100), 
              PRIMARY KEY(Id))");

$mysql->query("insert into `GuitaristTable`(`Name`, `Link`,`Description`,`Img`)
                                Values
                                ('Максим Ярушкин',
                                 'https://www.youtube.com/c/GoFingerstyle/featured',
                                 'Максим Ярушкин — гитарист, участник известного гитарного проекта «Ярушкин и Аксенов» (победители Art&Music’2013) и дуэта «Fancy Days», победитель конкурса «Queen meets fingerstyle» от Kibin guitars, преподаватель и аранжировщик. Начал свою концертную деятельность в родном Новосибирске, сейчас живет в Санкт-Петербурге.',
                                 'assets/img/Yarushkin.jpg'),
                                ('Eiro Nareth',
                                 'https://www.youtube.com/c/Meskalito',
                                 'Я Эйро Нарет. В настоящее время занимаюсь конструированием гитарных аранжировок песен (в основном рок-групп), ноты и табы которых либо труднодоступны, либо вообще отсутствуют в Интернете. Так же имею в своем арсенале пару видео-уроков, которые помогут начинающим начать, а продолжающим продолжить.

Пару слов о прошлом.

Едва минули первые дни игры на гитаре, как предо мной нависла суровая и гнетущая проблема — отсутствие табулатур или нот желаемых песен, что затронуло тонкие струны мести в глубине души…

Долгие дни и ночи я проводил в глубоком подполье, тренируясь, оттачивая навыки и накапливая Силу для Великой Борьбы — борьбы за право на жизнь новых гитарных аранжировок любимых песен.',
                                 'assets/img/Eiro_Nareth.jpg'),                        
                                ('Sungha Jung',
                                 'https://www.youtube.com/c/sunghajung',
                                 'Sungha Jung – молодой гитарист-виртуоз, выбравший для игры на гитаре один из самых сложных стилей – Fingerstyle. В свои 17 лет' 
                                 ' Sungha Jung уже имеет 690 видеофайлов на YouTube , которые просмотрели более 700 миллионов человек, завоевал 11 наград на YouTube,'
                                 ' 6 из которых – «№ 1 в рейтинге». Он является кумиром и творческим вдохновителем многих начинающих музыкантов по всему миру, играть '
                                 'с ним на одной сцене – честь для любого музыканта. Ему удалось удивить своей игрой Томаса Либа (гитариста-виртуоза), Мартина Тэйлора из Англии, '
                                 'Йоко Оно – вдову Джона Леннона, а также многих других известных и безымянных пользователей всемирной паутины под названием «интернет»,'
                                 ' давших ему прозвище «гитара Prodigy» или «корейский Август Раш». Йоко Оно написала комментарий, всколыхнувший все интернет-сообщество, к видеоролику'
                                 ' Sungha на YouTube,: « Я только что стала свидетелем твоего исполнения'
                                 ' «All you need is love». Это было превосходно! Джон Леннон был бы счастлив, что ты так хорошо исполнил его песню».',
                                 'assets/img/Sungha_Jung.jpg'),   
                                ('Artem Mironenko',
                                 'https://www.youtube.com/c/MironenkoArtem',
                                 'Меня зовут Артем Мироненко, мне 20 лет. Я студент Днепропетровского Национального Университета, мех-мат факультета.' 
                                 ' Очень люблю гитару и отдаю предпочтение стилю fingerstyle. В 2002 году начал обучение в музыкальной школе, собственно, тогда и начал заниматься гитарой, ' 
                                 'и музыкой в целом. После 5 лет игры репертуара, который не всегда мне нравился, желание играть пропало. Долгое время я не брал гитару в руки, до того момента' 
                                 ' как увидел в сети ролик Sungha jung «Пираты Карибского моря», с большим трудом у меня получилось повторить это произведение. Сейчас, я имею десяток своих ' 
                                 'фингерстайл аранжировок, в дальнейшем, хочу улучшить их качество и разнообразие, а еще мечтаю о написании собственных полноценных произведений)',
                                 'assets/img/Artem_Mironenko.jpg'),       
                                ('Tommy Emmanuel',
                                 'https://www.youtube.com/channel/UCL-0gAth4u6Wp-9_98XU3nA',
                                 '«Человек-обаяние», «человек – представление», заполняющий собой всю сцену, «великий импровизатор» – все эти эпитеты можно применить всего лишь к одному гитаристу, известному миру как Томми Эммануэль. Этот человек поражает своей неутомимостью в поисках искусства в себе и окружающем мире, находясь в постоянном движении и развитии. По признанию самого Томми, к собственному звучанию он пришел только лет в 35, а до этого много учился и искал свои звуки.
Его концерты всегда отличаются особым диалогом со зрителем. Он никогда не работает по ранее прописанному сет-листу, а просто выходит на сцену и играет, поддаваясь полету фантазии, веянию настроения зрителя. '
                                 'Если его на концерте попросят сыграть любую песню, даже не из его репертуара, он сыграет только лишь для того, чтобы сделать кого-то счастливым. «Люди – это самое важное для меня», — признается Томми.
                                  ',
                                 'assets/img/Tommy_Emmanuel.jpg')
                                       
                                ");

$mysql->query("CREATE TABLE `SongTable`
             (Id INT NOT NULL auto_increment,
              Name VARCHAR(100) NOT NULL,
              GuitaristId INT NOT NULL,
              Demo VARCHAR(100),
              Video VARCHAR(100),
              Tabs VARCHAR(100) NOT NULL,
              PRIMARY KEY (Id),
              FOREIGN KEY (GuitaristId) REFERENCES GuitaristTable (Id))");


$mysql->query("INSERT INTO `SongTable`(`Name`, `GuitaristId`, `Demo`, `Video`, `Tabs`)
                                VALUES 
                                ('Wicked game',
                                (SELECT Id FROM GuitaristTable WHERE Name ='Максим Ярушкин'),
                                'demo/Wicked_game.mp3',
                                'https://www.youtube.com/embed/DPDIWim0pt4',
                                'tabs/Wicked_game.zip'),
                                ('Take me to church',
                                (SELECT Id FROM GuitaristTable WHERE Name ='Максим Ярушкин'),
                                'demo/Take_me_to_church.mp3',
                                'https://www.youtube.com/embed/XcaIYkHSerw',
                                'tabs/Take_me_to_church.zip'),
                                ('The Man Who Sold the World',       
                                (SELECT Id FROM GuitaristTable WHERE Name ='Максим Ярушкин'),
                                'demo/The_Man_Who_Sold_the_World.mp3',
                                'https://www.youtube.com/embed/t5Xp_tyGjvE',
                                'tabs/The_Man_Who_Sold_the_World.zip'),            
                                ('Песенка о морском дьяволе',       
                                (SELECT Id FROM GuitaristTable WHERE Name ='Максим Ярушкин'),
                                'demo/Песенка_о_морском_дьяволе.mp3',
                                'https://www.youtube.com/embed/esR5OfDJsjM',
                                'tabs/Песенка_о_морском_дьяволе.zip'),                                
                                ('Я то что надо',       
                                (SELECT Id FROM GuitaristTable WHERE Name ='Максим Ярушкин'),
                                'demo/Я_то_что_надо.mp3',
                                'https://www.youtube.com/embed/vc02fL8RR7g',
                                'tabs/Я_то_что_надо.zip'),     
                                ('Выдыхай',
                                (SELECT Id FROM GuitaristTable WHERE Name ='Eiro Nareth'),
                                'demo/Выдыхай.mp3',
                                'https://www.youtube.com/embed/OmMGGb-lFdM',
                                'tabs/Выдыхай.zip'),                                
                                ('Hotel California',
                                (SELECT Id FROM GuitaristTable WHERE Name ='Eiro Nareth'),
                                'demo/Hotel_California.mp3',
                                'https://www.youtube.com/embed/FEgo1J8dNr8',
                                'tabs/Hotel_California.zip'),                  
                                ('Shape Of My Heart',
                                (SELECT Id FROM GuitaristTable WHERE Name ='Eiro Nareth'),
                                'demo/Shape_Of_My_Heart.mp3',
                                'https://www.youtube.com/embed/h8MKLOn4GNo',
                                'tabs/Shape_Of_My_Heart.zip'),  
                                ('Hello',
                                (SELECT Id FROM GuitaristTable WHERE Name ='Eiro Nareth'),
                                'demo/Hello.mp3',
                                'https://www.youtube.com/embed/MGHrwSxM8hs',
                                'tabs/Hello.zip'),   
                                ('Last Christmas',       
                                (SELECT Id FROM GuitaristTable WHERE Name ='Eiro Nareth'),
                                'demo/Last_Christmas.mp3',
                                'https://www.youtube.com/embed/GaSw9Ig2Rfs',
                                'tabs/Last_Christmas.zip'),               
                                ('Dark Necessities',       
                                (SELECT Id FROM GuitaristTable WHERE Name ='Artem Mironenko'),
                                'demo/Dark_Necessities.mp3',
                                'https://www.youtube.com/embed/7FR8Z8pUtEM',
                                'tabs/Dark_Necessities.zip'),     
                                ('Sail',       
                                (SELECT Id FROM GuitaristTable WHERE Name ='Artem Mironenko'),
                                'demo/Sail.mp3',
                                'https://www.youtube.com/embed/KfYh3DDDI40',
                                'tabs/Sail.zip'),  
                                ('Трава у дома',       
                                (SELECT Id FROM GuitaristTable WHERE Name ='Artem Mironenko'),
                                'demo/Trava_u_doma.mp3',
                                'https://www.youtube.com/embed/B3k-g5UCWBs',
                                'tabs/Trava_u_doma.zip'),        
                                ('In My Mind',       
                                (SELECT Id FROM GuitaristTable WHERE Name ='Artem Mironenko'),
                                'demo/In_My_Mind.mp3',
                                'https://www.youtube.com/embed/YT8RAUlLK3I',
                                'tabs/In_My_Mind.zip'),    
                                ('Pink Panther',       
                                (SELECT Id FROM GuitaristTable WHERE Name ='Artem Mironenko'),
                                'demo/Pink_Panther.mp3',
                                'https://www.youtube.com/embed/hm_NCHubdxg',
                                'tabs/Pink_Panther.zip'),     
                                ('Take On Me',       
                                (SELECT Id FROM GuitaristTable WHERE Name ='Sungha Jung'),
                                'demo/Take_On_Me.mp3',
                                'https://www.youtube.com/embed/pgmJJqpMuxU',
                                'tabs/Take_On_Me.zip'),                       
                                ('Billie Jean',       
                                (SELECT Id FROM GuitaristTable WHERE Name ='Sungha Jung'),
                                'demo/Billie_Jean.mp3',
                                'https://www.youtube.com/embed/CgVqX0a49HM',
                                'tabs/Billie_Jean.zip'),  
                                ('Merry Christmas',       
                                (SELECT Id FROM GuitaristTable WHERE Name ='Sungha Jung'),
                                'demo/Merry_Christmas.mp3',
                                'https://www.youtube.com/embed/aIUi86_Hscw',
                                'tabs/Merry_Christmas.zip'),          
                                ('Bad Habits',       
                                (SELECT Id FROM GuitaristTable WHERE Name ='Sungha Jung'),
                                'demo/Bad_Habits.mp3',
                                'https://www.youtube.com/embed/K8Ojitszl68',
                                'tabs/Bad_Habits.zip'),     
                                ('Flower Dance',       
                                (SELECT Id FROM GuitaristTable WHERE Name ='Sungha Jung'),
                                'demo/Flower_Dance.mp3',
                                'https://www.youtube.com/embed/ILTHidJwGkA',
                                'tabs/Flower_Dance.zip'),              
                                ('Stevies Blues',       
                                (SELECT Id FROM GuitaristTable WHERE Name ='Tommy Emmanuel'),
                                'demo/Stevies_Blues.mp3',
                                'https://www.youtube.com/embed/nnZgFMIFqkw',
                                'tabs/Stevies_Blues.zip'),
                                ('Guitar Boogie',       
                                (SELECT Id FROM GuitaristTable WHERE Name ='Tommy Emmanuel'),
                                'demo/Guitar_Boogie.mp3',
                                'https://www.youtube.com/embed/sV1e-iSo5As',
                                'tabs/Guitar_Boogie.zip'),  
                                ('Halfway Home',       
                                (SELECT Id FROM GuitaristTable WHERE Name ='Tommy Emmanuel'),
                                'demo/Halfway_Home.mp3',
                                'https://www.youtube.com/embed/qkKcd51QCiE',
                                'tabs/Halfway_Home.zip')
                                       
                               ;");



$mysql->close();
echo "<br><br><div align=center><font face=Arial size=2><b>Данные успешно вставлены</b></font></div>";
?>
</body>
</html>