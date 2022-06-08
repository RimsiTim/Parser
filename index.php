<?php
    session_start();
    require("vendor/components/connect.php");
    $titlePage = "MusiEr - каталог музыкальных инструментов";
    $index = 1;
    require("vendor/components/head.php");
    require("vendor/components/header.php");
?>
<section class=sectionMain>
    <div class="banner_header">
        MusiEr - пожалуй, лучший каталог-парсер музыкальных иснтрументов 
    </div>
    <div class="banner_text">
        Просто выбирайте, интересующую вас категорию товаров. Система все сделает сама, вам останется лишь ознакомитьтся с реузльтатами. 
    </div>
    <div class="banner_cat">
            <ul class="main_menu">
                <?php 
                    $global_categorys = mysqli_query($link, "SELECT * FROM `global_categorys` 
                    WHERE `view_global_categorys` = 1");
                    while($global_category = mysqli_fetch_assoc($global_categorys)){
                ?>
                    <li class="main_menu_li <?php if($global_category['id_global_categorys'] == $idGlobal){?>active<?php }?>">
                        <a class="a" 
                            href="globalCategorys.php?id=<?= $global_category['id_global_categorys']?>">
                            <?= $global_category['name_global_categorys']?>
                        </a>
                    </li>
                <?php 
                    }
                ?>
            </ul>
    </div>
</section>
<section class="sectionMain Shops">
    <div class="banner_header">
        Самая большая база музыкальных магазинов
    </div>
    <div class="banner_grids">
        <?php 
            $shops = mysqli_query($link, "SELECT `name_shops`, `url_shops`, `img_shops` 
                FROM `shops`");
            while($shop = mysqli_fetch_assoc($shops)){?>
            <a class="grids_greed" href="<?= $shop['url_shops']?>">
                <div class="grid_img">
                    <img src="/assets/images/shops/<?= $shop['img_shops']?>" alt="">
                </div>
                <div class="grid_title"><?= $shop['name_shops']?></div>
            </a>        
        <?php
            }
        ?>
        
    </div>
</section>
<section class="sectionMain Review">
    <div class="banner_header">
        Узнай что говорят посетители о нашем сайте.
    </div>
    <div class="banner_grids">
    <?php 
        $reviews = mysqli_query($link, "SELECT `reviews`.*, `users`.`email_users`
        FROM `reviews` 
            LEFT JOIN `users` ON `reviews`.`user_id` = `users`.`id_users`
            WHERE `reviews`.`status_main` = 1
            GROUP BY `reviews`.`id_reviews`");
        while($review = mysqli_fetch_assoc($reviews)){?>
            <div class="grids_review">
                <div class="review_name">
                    <?= $review['name_reviews']?>
                </div>
                <div class="review_text">
                    <?= $review['text_reviews']?>
                </div>
            </div>
        <?php }?>
    </div>
    <div class="grids_button">
        <a class="" href="reviews.php">
            Все отзывы
        </a>
        <a href="<?php if($_SESSION['users']){echo "users.php";}else{echo "signIn.php";} ?>" class="reviewAdd">
            Оставаить отзыв
        </a>
    </div>
</section>
<?php 
    require("vendor/components/footer.php");
?>

</html>