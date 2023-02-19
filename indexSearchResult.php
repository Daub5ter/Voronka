<?php
   require_once 'connect/connect.php';
   $title = $_POST['title'];
   $builder = $_POST['builder'];
   $adress = $_POST['adress'];
   $price = $_POST['price'];
   $priceperm = $_POST['priceperm'];
   $area = $_POST['area'];
   $godpos = $_POST['godpos'];
   $repair = $_POST['repair'];
   $des = $_POST['des'];
   $number = $_POST['number'];
   $immovables = mysqli_query($db, "SELECT * FROM `information`");
   $immovables = mysqli_fetch_all($immovables);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="styles/resetStyle.css">
   <link rel="stylesheet" href="styles/styleSearchResult.css">
   <title>Недвижонок</title>
</head>
<body>
   <header class="header">
      <ul class="header__list">
          <li class="header__item"><a href="index.html" class="logo"></a></li>
          <li class="header__item"><a class="header__link" href="#information">Избранные</a></li>
          <li class="header__item"><a class="header__link" href="#">ЛогинПользователя</a></li>
      </ul>
   </header>
   <section class="main">
      <p class="main__text">Купить кваритру в Кранодаре</p>
      <div class="main__search">
         <div class="dropdown">
            <div class="select">
               <span class="selected">Цена</span>
               <div class="caret"></div>
            </div>
            <ul class="menu">
               <li></li>
            </ul>
         </div>
         <div class="dropdown">
            <div class="select">
               <span class="selected">Комнат</span>
               <div class="caret"></div>
            </div>
            <ul class="menu">
               <li>1</li>
               <li>2</li>
               <li>3</li>
               <li class="active">4</li>
               <li>5</li>
               <li>6+</li>
            </ul>
         </div>
         <div class="dropdown">
            <div class="select">
               <span class="selected">Район</span>
               <div class="caret"></div>
            </div>
            <ul class="menu">
               <li>ЮМР</li>
               <li>СМР</li>
               <li>ЦЕНТР</li>
               <li class="active">ЗИП</li>
               <li>ЧМР</li>
               <li>ГМР</li>
               <li>ПМР</li>
               <li>КМР</li>
               <li>ФМР</li>
            </ul>
         </div>
         <div class="dropdown">
            <div class="select">
               <span class="selected">Цель</span>
               <div class="caret"></div>
            </div>
            <ul class="menu">
               <li>Жилая</li>
               <li class="active">Коммерческая</li>
            </ul>
         </div>
      </div>
      <button class="main__search_btn"><p class="main__search_btn_text">Подобрать</p></button>
   </section>
   <section>
   <?php
         foreach ($immovables as $immovable) {
            if ($immovable[13] > 0.5) {
               $cost_immovable10 = $immovable[4] * 0.14343 * 10 + $immovable[4];
               $cost_immovable10 = (int)$cost_immovable10;
               $bank_deposit10 = $immovable[4] * 1.061 ** 10;
               $bank_deposit10 = (int)$bank_deposit10;
               $rental10 = $immovable[4] * 0.14343 * 10 + 15000 * 10 * 10 + $immovable[4];
               $rental10 = (int)$rental10;
               $morcost_immovabletgage10 = $immovable[4] * 10 * 0.07283 + $immovable[4];
               $morcost_immovabletgage10 = (int)$morcost_immovabletgage10;

               $cost_immovable5 = $immovable[4] * 0.14343 * 5 + $immovable[4];
               $cost_immovabl50 = (int)$cost_immovable5;
               $bank_deposit5 = $immovable[4] * 1.061 ** 5;
               $bank_deposit5 = (int)$bank_deposit5;
               $rental5 = $immovable[4] * 0.14343 * 10 + 15000 * 10 * 5 + $immovable[4];
               $rental5 = (int)$rental5;
               $morcost_immovabletgage5 = $immovable[4] * 5 * 0.07283 + $immovable[4];
               $morcost_immovabletgage5 = (int)$morcost_immovabletgage5;
            } else {
               $cost_immovable10 = $immovable[4] * 0.1174 * 10 + $immovable[4];
               $cost_immovable10 = (int)$cost_immovable10;
               $bank_deposit10 = $immovable[4] * 1.061 ** 10;
               $bank_deposit10 = (int)$bank_deposit10;
               $rental10 = $immovable[4] * 0.1174 * 10 + 15000 * 10 * 10 + $immovable[4];
               $rental10 = (int)$rental10;
               $morcost_immovabletgage10 = $immovable[4] * 10 * 0.07283 + $immovable[4];
               $morcost_immovabletgage10 = (int)$morcost_immovabletgage10;

               $cost_immovable5 = $immovable[4] * 0.1174 * 5 + $immovable[4];
               $cost_immovable5 = (int)$cost_immovable5;
               $bank_deposit5 = $immovable[4] * 1.061 ** 5;
               $bank_deposit5 = (int)$bank_deposit5;
               $rental5 = $immovable[4] * 0.1174 * 10 + 15000 * 10 * 5 + $immovable[4];
               $rental5 = (int)$rental5;
               $morcost_immovabletgage5 = $immovable[4] * 5 * 0.07283 + $immovable[4];
               $morcost_immovabletgage5 = (int)$morcost_immovabletgage5;
           }
            ?>
      </div><div class="result">
         <div class="result__flat">
            <div class="result__favorites"><a class="result__favorites__link" href="#" onclick="return addFavorite(this);">&#x2665</a></div>
            <div class="result__info">
               <div class="result__block_first">
                  <img class="result__img" src="<?= $immovable[12]?>" alt="flat">
                  <img src="/images/graph1.jpeg" alt="graph" class="result__graph1">
               </div>
               <div class="result__block_second">
                  <p class="result__name"><?= $immovable[1]. ' в ' .$immovable[2]?></p>
                  <p class="result__name"><?= $immovable[4].' &#8381;' ?></p>
                  <p class="result__adress"><?= $immovable[3] ?></p>
                  <div class="result__box_desc"><p class="result__desc"><?= $immovable[9] ?></p></div>
                  <div class="result__graph2_info">
                     <img src="/images/graph2.jpeg" alt="graph" class="result__graph2">
                     <ul class="result__graph_list">
                        <li> Итог за 5 лет</li>
                        <li> <span class="square_yellow">▢</span><?= $morcost_immovabletgage5.' &#8381;' ?></li>
                        <li> <span class="square_green">▢</span><?= $cost_immovable5.' &#8381;' ?></li>
                        <li> <span class="square_red">▢</span><?= $bank_deposit5.' &#8381;' ?></li>
                        <li> <span class="square_aquamarine">▢</span><?= $rental5.' &#8381;' ?></li>
                        <br>
                        <li> Итог за 10 лет</li>
                        <li> <span class="square_yellow">▢</span><?= $morcost_immovabletgage10.' &#8381;' ?></li>
                        <li> <span class="square_green">▢</span><?= $cost_immovable10.' &#8381;' ?></li>
                        <li> <span class="square_red">▢</span><?= $bank_deposit5.' &#8381;' ?></li>
                        <li> <span class="square_aquamarine">▢</span><?= $rental5.' &#8381;' ?></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      <?php
         }
      ?>
   </section>
   <button class="bottom__search_btn"><p class="bottom__search_btn_text">Увидеть больше</p></button>
   <footer>
      <p class="footer__info">&#9400; Nedvizhonok. All rights reserved. </p>
   </footer>
   <script src="scripts/main.js"></script>
</body>
</html>