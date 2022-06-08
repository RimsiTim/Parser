<?php
    session_start();
    require("vendor/components/connect.php");
    
    $idCategory = $_GET['id'];
    $categorys = mysqli_query($link, "SELECT * FROM `categorys` 
    WHERE `id_categorys` = '$idCategory'");
    $category = mysqli_fetch_assoc($categorys);

    $titlePage = "MusiEr - ".$category['name_categorys'];
    require("vendor/components/head.php");
    require("vendor/components/header.php");
?>
    
    <section class="sectionProduct">
        <?php $shops = mysqli_query($link, 
            "SELECT `category_shops`.*, `shops`.*
                FROM `category_shops` 
                    LEFT JOIN `shops` ON `category_shops`.`id_shop` = `shops`.`id_shops`
                    WHERE `id_category` = '$idCategory'");
                while($shop = mysqli_fetch_assoc($shops)){?>
                <h4 class="title_shop"><a class="a" href="<?= $shop['url_shops']?>">
                    <?= $shop['name_shops'] ?></a>
                </h4>
            <div class="sectionProduct_bodyP" 
            data-idCat=<?= $shop['url_category_shops']?> 
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