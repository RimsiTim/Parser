<?php
    session_start();
    require("vendor/components/connect.php");
    $search = $_GET['search'];

    $titlePage = "MusiEr - Страница поиска";
    require("vendor/components/head.php");
    require("vendor/components/header.php");
?>
    
    <section class="sectionProduct">
        <?php $shops = mysqli_query($link, 
            "SELECT * FROM `shops`
                    WHERE `search` != ''");
                while($shop = mysqli_fetch_assoc($shops)){?>
                <h4 class="title_shop"><a class="a" href="<?= $shop['url_shops']?>">
                    <?= $shop['name_shops'] ?></a>
                </h4>
            <div class="sectionProduct_bodyP2" 
            data-search="<?= $shop['search']?>" 
            data-search-val="<?= $search?>"
            data-idShop="<?= $shop['id_shops']?>">
                <img class="loader" src="/assets/images/loader.gif" alt="">
            </div>
        <?php }?>
    </section>
    <section>
    </section>
<?php 
    require("vendor/components/footer.php");
?>

</html>