<?php
session_start();
include "../config/base_url.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/all.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>AlmatyTau</title>
</head>
<body>
    <?php
        include "header.php"
    ?>
        <!-- Modal войти -->
    <?php
        include "login.php"
    ?>
        <!-- Modal -->
    <?php
        include "registration.php"
    ?>
        <main>
            <div class="carousel slide" id="carouselControls" data-bs-ride="carousel" >
                <div class="carousel-inner ">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="../img/12.jpg" alt="">
                        <p class="position-absolute top-50 start-50 translate-middle" style="font-size: 35px; color:white;">Цитаты про горы 
                            <br><span id="textWrap"></span>
                        </p>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../img/tau.jpg" alt="">
                        <p class="position-absolute top-50 start-50 translate-middle" style="font-size: 35px; color: white;">Цитаты про горы                           
                            <br><span id="textWrap"></span>
                        </p>
                    </div>
                    <div class="carousel-item">
                        <p class="position-absolute top-50 start-50 translate-middle" style="font-size: 35px; color: white;">Цитаты про горы 
                            <br>
                            <span id="textWrap"></span>
                        </p>
                        <img class="d-block w-100" src="../img/zalatau.jpg" alt="">
                    </div>

                    
                   
                </div>
                <a class="carousel-control-prev" role="button" href="#carouselControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" role="button" href="#carouselControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
                
            </div>
              
        </main>
        <h2 class="text-center my-5">Высокогорные области</h2>
        <div class="row p-3 mt-5">
            <div class="col-md-4  col-sm-6 text-center">
                <h4>Гора Белуха</h4>
                <svg xmlns="" width="3em" height="3em" fill="currentColor" class="bi bi-android" viewBox="0 0 16 16">
                    <img src="https://www.kp.ru/russia/wp-content/uploads/2019/12/beluha-1330-530x322.jpg" alt="" style="height: 200px; width: 400px;">
                </svg>
                <p>4506 м - высочайшая вершина Алтая и Сибири располагается на северо-востоке Восточного Казахстана на границе Казахстана и России. Склоны ее двуглавой вершины покрыты вечными снегами и ледниками (Берельский, Катунский и др.) на площади около 70 км2.
                    Белуха представляет собой интересный объект для альпинизма и горного туризма. В то же время это, по многим легендам, - священная гора. Здесь, по преданиям буддистов, располагалась легендарная заоблачная страна богов Шамбала и отсюда великий Будда - Гаутама пришел в Индию.
                    По другим поверьям энергетический мост связывает Белуху с Эверестом. Здесь находится "пуп" Земли, также энергетически связанный с Космосом, дарующий людям заряд бодрости и здоровья.
                    Тот, кто хоть однажды увидел Белуху, на всю жизнь заполнит ее божественную сверкающую двуглавую вершину. Белуха является символом Алтая.</p>
            </div>
            <div class="col-md-4 col-sm-6 text-center ">
                <h4>Южный Алтай</h4>
                <svg xmlns="" width="3em" height="3em" fill="currentColor" class="bi bi-android" viewBox="0 0 16 16">
                    <img src="data:image/jpeg;base64,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" alt="" style="height: 200px; width: 400px;"  >
                </svg>
                <p>расположен между рекой Бухтарма на севере, озером Зайсан и рекой Черный Иртыш на юге. Иртышская долина разделяет его с западной стороны от Калбинского хребта. На востоке он граничит с плоскогорьем Укок. К западу и юго-западу от этого места протянулись две цепи горных хребтов. Их разделяют реки Курчум и Каракоба. Горные хребты Тарбагатай (2739 м), Сарымсакты (3373 м), Нарын (2400 м) входят в северную горную часть, а хребты Южный Алтай (3483 м), Сарытау (3300 м), Курчум (2644 м) образуют южную часть. Между хребтами Азутау и Сарытау на высоте 1449 м расположена Маркакольская котловина. Западная граница Южного Алтая проходит через горную цепь Холзун. На государственной границе Казахстана с Россией расположен самый высокий хребет Алтая-Катунский. Его вершина – Музтау (4506 м).</p>
            </div>
            <div class="col-md-4 col-sm-6 text-center">
                <h4>Рудный Алтай</h4>
                    <svg xmlns="" width="3em" height="3em" fill="currentColor" class="bi bi-android" viewBox="0 0 16 16">
                        <img src="https://otkryvai.kz/wp-content/uploads/2021/01/20200803_101144.jpg" alt="" style="height: 200px; width: 400px;">    
                    </svg>
                <p>в пределы Казахстана заходит западными отрогами Алтайских гор. Рудный Алтай состоит из Ульбинского (2300 м), Ивановского (2775 м), Убинского (2100 м) горных хребтов, которые находятся на северо-западе Южного Алтая. Они простираются от горного хребта Катунь и возвышенности Укок.
                    Восточная часть Западного Алтая сильно расчленена и представляет собой высокогорье, на вершинах которого лежат вечные снега и ледники. В недрах Западного Алтая найдены многочисленные полезные ископаемые: медь, цинк, олово, свинец, вольфрам, серебро, золото и другие металлы. Поэтому Западный Алтай и называют Рудным Алтаем.
                </p>
            </div>
            <div class="col-md-4 col-sm-6 text-center">
                <h4>Жунгарский Алатау</h4>
                <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" fill="currentColor" class="bi bi-android" viewBox="0 0 16 16">
                    <img src="https://c1.35photo.pro/photos_temp/sizes/565/2825102_500n.jpg" alt="" style="height: 200px; width: 400px;">
                </svg>
                <p>
                    расположен в восточной части Казахстана и имеет протяжение с запада-юго-запада навосток-северо-восток вдоль границы Казахстана и Китая между рекой Или и озером Алаколь. 
                    На востоке он отграничен Жунгарскскими воротами от находящихся на территории Китая хребтов Барлык и Майли, на юге - отделен от Тянь-Шаня долиной реки Или. Общая протяженность Жунгарскского Алатау около 400 км. Средняя высота Жунгарсккого Алатау 3580 м. Основные хребты Жунгарсккого Алатау поднимаются выше 4000 м, северная, главная цепь - до 4560 м (гора Семенова-Тян-Шанского в истоках рек Большой и Малый Баскан). Средняя высота хребтов Токсамбай и Тышкантау - 3770 м, высшая точка первого из них 4062 м, второго - 4359 м. Значительно превышая уровень снеговой линии, хребты имеют снежные вершины и ледники длиной до 8 км. На запад, юго-запад и северо-запад от высоких снежных цепей отходит множество отрогов. 
                </p>
            </div>
            <div class="col-md-4 col-sm-6 text-center">
                <h4>Пик Хан-Тенгри</h4>
                <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" fill="currentColor" class="bi bi-android" viewBox="0 0 16 16">
                    <img src="https://tengritravel.kz/userdata/u187/2020-11/resize/757876c99fd15e09644cd38a5d019573.jpeg" alt="" style="height: 200px; width: 400px;">
                </svg>
                <p>(Повелитель духов), наивысшая точка Казахстана (6995 м), считается одной из красивейших вершин Центрального Тянь-Шаня. Мраморная вершина в виде остроконечной пирамиды видна почти отовсюду. Гора издревле окутана легендами. Ее еще называют Тенгритау (Гора Бога) или Кантау (Кровавая гора), за красный оттенок, который вершина приобретает в часы заката. Это самый северный семитысячник мира. Пик Хан-Тенгри труднодоступен, поэтому чрезвычайно интересен как для альпинистов, так и для любителей приключенческого туризма. Казахстану принадлежит северная часть горы. Восхождение по «Северной Стене Хан-Тенгри» является заветной мечтой многих альпинистов.

                    На запад от массива Хан-Тенгри отходит целый ряд хребтов. Наиболее крупный из них – Терскей Алатау. По его восточной ветви Казахстан граничит с Кыргызстаном.
                    
                    В северный Тянь-Шань входят хребты Кетмень, Кунгей Алатау, Заилийский Алатау, Чу-Илийские горы (Жельтау, Айтау), Кыргызский Алатау.
                </p>
            </div>
            <div class="col-md-4 col-sm-6 text-center">
                <h4>Тургеньское ущелье</h4>
                <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" fill="currentColor" class="bi bi-android" viewBox="0 0 16 16">
                    <img src="https://almaty-pohod.info/uploads/images/202111/image_750x_619bbea555be7.jpg" alt="" style="height: 200px; width: 400px;">
                </svg>
                <p>богат горячими источниками, водопадами, хвойными и смешанными лесами, альпийскими и субальпийскими лугами, озерами и родниками, лекарственными растениями и ягодами, оно уходит вглубь на 44 км до огромного плато Ассы. Тургенское ущелье славится водопадами – их около семи. Водопад Медвежий притягивает своей 30-метровой высотой среди нависающих скал и зеленых елей. А водопад Бозгуль известен мощным потоком воды, пробившим в скале целый туннель. Скалы в урочище хранят отпечатки растений доледникового периода. Ущелье знаменито реликтовыми Чин-Тургенскими моховыми ельниками, стелющимися по земле образующими сплошной еловый ковер.

                    Самое популярное место в ущелье – Ботан-егерская станция. Здесь, при слиянии трех рек, Тургенское ущелье достигает наибольшей глубины – 920 м. Вдоль реки Асы находятся древние курганы и наскальные рисунки. В ущелье немало древних сакских и уйсуньских могил.
                </p>
            </div>
        </div>

        <!-- анимация -->
        <div class="container text-center my-5">
            <!-- <p>
            <a href="#multiCollapse1" aria-controls="multiCollapse1" role="button" aria-expanded="false" data-bs-toggle="collapse" class="btn btn-secondaty">
                Нажми на меня
            </a>
            <a href="#multiCollapse2" aria-controls="multiCollapse1" role="button" aria-expanded="false" data-bs-toggle="collapse" class="btn btn-secondaty">
                Попробуй еще раз
            </a>
            <a href="#multiCollapse2" data-bs-target=".multi-collapse" aria-controls="multiCollapse1" role="button" aria-expanded="false" data-bs-toggle="collapse" class="btn btn-secondaty">
                Я открою тебе карты
            </a>
            
                <button class="btn-btn-secondary" type="button" data-bs-toggle="collapse" 
                data-bs-target="#multiCollapse2" aria-expanded="false" aria-controls="multiCollapse2">world</button>
                <button class="btn-btn-secondary" type="button" data-bs-toggle="collapse" 
                data-bs-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapse1 multiCollapse2">World</button> 
            </p>
             -->
            <div class="row">
                <div class="col">
                    <div class="collapse multi-collapse show" id="multiCollapse1">
                        <div class="card card-body">
                            <img class="w-100" src="../img/tim1.JPG" alt="">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="collapse multi-collapse show" id="multiCollapse2">
                        <div class="card card-body">
                            <img class="w-100" src="../img/tim2.JPG" alt="">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="collapse multi-collapse show" id="multiCollapse1">
                        <div class="card card-body">
                            <img class="w-100" src="../img/tim4.JPG" alt="">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="collapse multi-collapse show" id="multiCollapse2">
                        <div class="card card-body">
                            <img class="w-100" src="../img/tim6.JPG" alt="">
                        </div>
                    </div>
                </div>
                
            </div>
        </div> 
<!-- анимация -->

        <div class="container">
            <div class="d-flex justify-content-center">
                    <img class="object-fit-contain border rounded" src="../img/tim5.JPG" style="height: 400px; width: 300px;" alt="">
                </div>
                <div class="w-100 my-2">
                    <p>Я стою на вершине горы. В лицо дует ветер. Иногда его порывы очень сильны и волосы так и развеваются. Но никто, ни на секунду не жалеет о том, что встал в три часа ночи, для того чтобы прийти и встретить рассвет где то на краю Вселенной. Немножко зябко и мы кутаемся в кофты, шарфики, все, что есть под рукой. Небо чистое, но вокруг достаточно темно. Как будто сумерки и уже вечер. И вот буквально на секунду этот мир застывает в ожидании. Смолкли птицы, даже ветер успокоился, и ты просто своим шестым чувством слышишь эту тишину. Секунда. И как будто из ниоткуда появляется огненно-красный диск. Сначала краешек, потом солнце медленно выползает из-за горы. Каждый из нас открыл новую страницу своей жизни. Забываешь, забываешь обо всем на свете. Все твои проблемы становятся настолько ничтожными, ты чувствуешь себя настолько единым с природой и Вселенной. Ты чувствуешь великое вдохновение. Становится легко дышать. Очень легко. В груди очень медленно начинает нарастать чувство уверенности в себе. Ты можешь все. Это чувство внутри тебя растет, крепнет, набирает силу. Ты никогда уже не будешь прежним. В тебе навсегда останется частичка чего-то вечного, частичка этой Вселенной и ты сам часть этой огромной Вселенной. Ты свободен от предрассудков, стереотипов, человеческих мнений.
                        Возникает ощущение, что ты немножко пересекаешь какую-то грань, ты пересекаешь границу своих возможностей и расширяешь их. Ты обретаешь силу. Ты свободен.</p>
                </div>
               
            </div>
        </div>
       
    <?php
        include "footer.php";
    ?>

<script src="../bootstrap/js/bootstrap.min.js"></script>    
<script src="../mainJs.js"></script>    
</body>
</html>