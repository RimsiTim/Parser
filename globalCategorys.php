<?php
    session_start();
    require("vendor/components/connect.php");

    $idGlobal = $_GET['id'];
    $global_categorys = mysqli_query($link, "SELECT * FROM `global_categorys` 
    WHERE `id_global_categorys` = '$idGlobal'");
    $global_category = mysqli_fetch_assoc($global_categorys);

    $titlePage = "MusiEr - ".$global_category['name_global_categorys'];
    require("vendor/components/head.php");
    require("vendor/components/header.php");
?>
    
    <section class="sectionProduct">
        <div class="sectionProduct_bodyP">
            <?php $categorys = mysqli_query($link, 
                "SELECT * FROM `categorys` 
                    WHERE `id_global_category` = '$idGlobal'");
                    while($category = mysqli_fetch_assoc($categorys)){?>
                <a class="product" href="category.php?id=<?= $category['id_categorys'] ?>">
                    <div class="product_img">
                        <img src="/assets/images/categorys/<?= $category['img_categorys']?>" alt="">
                    </div>
                    <span>
                        <?= $category['name_categorys'] ?>
                    </span>
                </a>
            <?php }?>
        </div>
    </section>
    <section>

    </section>
<?php 
    require("vendor/components/footer.php");
?>

</html>