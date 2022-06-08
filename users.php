<?php
    session_start();
    if(!$_SESSION['users']){
        header("Location: index.php");
    }
    require("vendor/components/connect.php");
    $titlePage = "MusiEr - каталог музыкальных инструментов";
    require("vendor/components/head.php");
    require("vendor/components/header.php");
?>
    <section class="adminMain">
        <?php if($_SESSION['users']['status'] == 1){?>
            <div>
                <ul class="menuAdmin">
                    <li><a href="users.php?admin=menu">Меню</a></li>
                    <li><a href="users.php?admin=shops">Магазины</a></li>
                    <li><a href="users.php?admin=cat">Категории</a></li>
                    <li><a href="users.php?rev=1">Отзывы</a></li>
                </ul>
            </div>
            <div class="adminMain_">

            
            <?php if($_GET['admin']=='menu'){?>
                <div class="bodyAdmin">
                <h2>Список пунктов меню</h2>
                <?php 
                    $global_categorys = mysqli_query($link, "SELECT * FROM `global_categorys` 
                    ORDER BY `view_global_categorys` DESC");
                    while($global_category = mysqli_fetch_assoc($global_categorys)){
                    ?>
                    <form class="formShops" action="/vendor/functions/deleteGlobalCat.php" method="post">
                        <div class="sectionForm">
                            <span>Навзвание</span>
                            <input class="catName" type="text" data-id="<?= $global_category['id_global_categorys']?>" 
                                    value="<?= $global_category['name_global_categorys'] ?>">
                        </div>
                        <div class="sectionForm">
                            <span>Показать/Скрыть</span>
                            <input type="button" class="catView" data-id="<?= $global_category['id_global_categorys']?>" 
                                    value="<?php if($global_category['view_global_categorys'] == 1){
                                        echo 'Скрыть';}else{echo 'Показать';}?>">
                        </div>
                        <div class="sectionForm">
                            <span>Действия</span>
                            <div class="formShops_action">
                                <input class="catEdit" type="button" value="Сохранить">
                                <input name="GCid" type="hidden" value="<?= $global_category['id_global_categorys']?>">
                                <input type="submit" value="Удалить">
                            </div>
                        </div>
                    </form>
                    <?php }?>
                    <h2>Добавление пункта меню</h2>
                    <form class="formShops border_none" action="/vendor/functions/addGlobalCat.php" method="POST">
                        <div class="sectionForm">
                            <span>Навзвание</span>
                            <input name="name" type="text">
                        </div>
                        <div class="sectionForm">
                            <span>Действия</span>
                            <div class="formShops_action">
                                <input name="create" type="submit" value="Создать">
                            </div>
                        </div>
                    </form>
                </div>
        <?php }?>
        <?php if($_GET['admin']=='shops'){?>
                <div class="bodyAdmin">
                <h2>Список магазинов</h2>
                <?php 
                    $shops = mysqli_query($link, "SELECT * FROM `shops` 
                    ORDER BY `name_shops` ASC");
                    while($shop = mysqli_fetch_assoc($shops)){
                    ?>
                    <form class="formShops" action="/vendor/functions/editShops.php" method="post"  enctype="multipart/form-data">
                        <input type="hidden" name="id_shops" value="<?= $shop['id_shops']?>">
                        <div class="sectionForm">
                            <span>Имя магазина</span>
                            <input type="text" name="name_shops" value="<?= $shop['name_shops']?>">
                        </div>
                        <div class="sectionForm">
                            <span>Ссылка на магазин</span>
                            <input type="text" name="url_shops" value="<?= $shop['url_shops']?>">
                        </div>
                        <div class="sectionForm">
                            <span>Селектор с товаром</span>
                            <input type="text" name="par_html" value="<?= $shop['par_html']?>">
                        </div>
                        <div class="sectionForm">
                            <span>Селектор с названием</span>
                            <input type="text" name="par_name" value="<?= $shop['par_name']?>">
                        </div>
                        <div class="sectionForm">
                            <span>Аттрибут названия (при наличии)</span>
                            <input type="text" name="par_name_d" value="<?= $shop['par_name_d']?>">
                        </div>
                        <div class="sectionForm">
                            <span>Селетор с ценой</span>
                            <input type="text" name="par_price" value="<?= $shop['par_price']?>">
                        </div>
                        <div class="sectionForm">
                            <span>Аттрибут цены (при наличии)</span>
                            <input type="text" name="par_price_d" value="<?= $shop['par_price_d']?>">
                        </div>
                        <div class="sectionForm">
                            <span>Селектор с изображением</span>
                            <input type="text" name="par_img" value="<?= $shop['par_img']?>">
                        </div>
                        <div class="sectionForm">
                            <span>Аттрибут изображения (при наличии)</span>
                            <input type="text" name="par_img_d" value="<?= $shop['par_img_d']?>">
                        </div>
                        <div class="sectionForm">
                            <span>Селектор с cсылкой</span>
                            <input type="text" name="par_url" value="<?= $shop['par_url']?>">
                        </div>
                        <div class="sectionForm">
                            <span>Аттрибут ссылки (при наличии)</span>
                            <input type="text" name="par_url_d" value="<?= $shop['par_url_d']?>">
                        </div>
                        <div class="sectionForm">
                            <span>Страница с поиском</span>
                            <input type="text" name="search" value="<?= $shop['search']?>">
                        </div>


                        <div class="sectionForm">
                            <span>Селектор с товаром (Для поиска)</span>
                            <input type="text" name="search_html" value="<?= $shop['search_html']?>">
                        </div>
                        <div class="sectionForm">
                            <span>Селектор с названием  (Для поиска)</span>
                            <input type="text" name="search_name" value="<?= $shop['search_name']?>">
                        </div>
                        <div class="sectionForm">
                            <span>Аттрибут названия (при наличии)</span>
                            <input type="text" name="search_name_d" value="<?= $shop['search_name_d']?>">
                        </div>
                        <div class="sectionForm">
                            <span>Селетор с ценой  (Для поиска)</span>
                            <input type="text" name="search_price" value="<?= $shop['search_price']?>">
                        </div>
                        <div class="sectionForm">
                            <span>Аттрибут цены (при наличии)</span>
                            <input type="text" name="search_price_d" value="<?= $shop['search_price_d']?>">
                        </div>
                        <div class="sectionForm">
                            <span>Селектор с изображением  (Для поиска)</span>
                            <input type="text" name="search_img" value="<?= $shop['search_img']?>">
                        </div>
                        <div class="sectionForm">
                            <span>Аттрибут изображения (при наличии)</span>
                            <input type="text" name="search_img_d" value="<?= $shop['search_img_d']?>">
                        </div>
                        <div class="sectionForm">
                            <span>Селектор с cсылкой  (Для поиска)</span>
                            <input type="text" name="search_url" value="<?= $shop['search_url']?>">
                        </div>
                        <div class="sectionForm">
                            <span>Аттрибут ссылки (при наличии)</span>
                            <input type="text" name="search_url_d" value="<?= $shop['search_url_d']?>">
                        </div>
                        <div class="sectionForm">
                            <span>Изображение категории</span>
                            <input type="file" name="file">
                        </div>
                        <div class="sectionForm">
                            <span>Действия</span>
                            <div class="formShops_action">
                                <input type="submit" name="save" value="Сохранить">
                                <input type="submit" name="delete" value="Удалить">
                            </div>
                        </div>
                    </form>
                    <?php }?>
                    <h2>Добавление нового магазина</h2>
                    <form class="formShops" action="/vendor/functions/addShops.php" method="POST"  enctype="multipart/form-data">
                        <div class="sectionForm">
                            <span>Имя магазина</span>
                            <input type="text" name="name_shops" value="">
                        </div>
                        <div class="sectionForm">
                            <span>Ссылка на магазин</span>
                            <input type="text" name="url_shops" value="">
                        </div>
                        <div class="sectionForm">
                            <span>Селектор с товаром</span>
                            <input type="text" name="par_html" value="">
                        </div>
                        <div class="sectionForm">
                            <span>Селектор с названием</span>
                            <input type="text" name="par_name" value="">
                        </div>
                        <div class="sectionForm">
                            <span>Аттрибут названия (при наличии)</span>
                            <input type="text" name="par_name_d" value="">
                        </div>
                        <div class="sectionForm">
                            <span>Селетор с ценой</span>
                            <input type="text" name="par_price" value="">
                        </div>
                        <div class="sectionForm">
                            <span>Аттрибут цены (при наличии)</span>
                            <input type="text" name="par_price_d" value="">
                        </div>
                        <div class="sectionForm">
                            <span>Селектор с изображением</span>
                            <input type="text" name="par_img" value="">
                        </div>
                        <div class="sectionForm">
                            <span>Аттрибут изображения (при наличии)</span>
                            <input type="text" name="par_img_d" value="">
                        </div>
                        <div class="sectionForm">
                            <span>Селектор с cсылкой</span>
                            <input type="text" name="par_url" value="">
                        </div>
                        <div class="sectionForm">
                            <span>Аттрибут ссылки (при наличии)</span>
                            <input type="text" name="par_url_d" value="">
                        </div>
                        <div class="sectionForm">
                            <span>Страница с поиском</span>
                            <input type="text" name="search" value="">
                        </div>

                        <div class="sectionForm">
                            <span>Селектор с товаром (Для поиска)</span>
                            <input type="text" name="search_html" value="">
                        </div>
                        <div class="sectionForm">
                            <span>Селектор с названием  (Для поиска)</span>
                            <input type="text" name="search_name" value="">
                        </div>
                        <div class="sectionForm">
                            <span>Аттрибут названия (при наличии)</span>
                            <input type="text" name="search_name_d" value="">
                        </div>
                        <div class="sectionForm">
                            <span>Селетор с ценой  (Для поиска)</span>
                            <input type="text" name="search_price" value="">
                        </div>
                        <div class="sectionForm">
                            <span>Аттрибут цены (при наличии)</span>
                            <input type="text" name="search_price_d" value="">
                        </div>
                        <div class="sectionForm">
                            <span>Селектор с изображением  (Для поиска)</span>
                            <input type="text" name="search_img" value="">
                        </div>
                        <div class="sectionForm">
                            <span>Аттрибут изображения (при наличии)</span>
                            <input type="text" name="search_img_d" value="">
                        </div>
                        <div class="sectionForm">
                            <span>Селектор с cсылкой  (Для поиска)</span>
                            <input type="text" name="search_url" value="">
                        </div>
                        <div class="sectionForm">
                            <span>Аттрибут ссылки (при наличии)</span>
                            <input type="text" name="search_url_d" value="">
                        </div>
                        <div class="sectionForm">
                            <span>Изображение категории</span>
                            <input type="file" name="file">
                        </div>
                        <div class="sectionForm">
                            <span>Действия</span>
                            <div class="formShops_action">
                                <input name="create" type="submit" value="Создать">
                            </div>
                        </div>
                        
                    </form>
                </div>
        <?php }?>
        <?php if($_GET['admin']=='cat'){?>
            <div class="bodyAdmin">
                <div class="catsAdmin">
                <?php 
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                }
                    $global_categorys = mysqli_query($link, "SELECT * FROM `global_categorys`");
                    while($global_category = mysqli_fetch_assoc($global_categorys)){
                        if(!isset($id)){
                            $id = $global_category['id_global_categorys'];
                        }
                        ?>
                    <span class="catMenu 
                        <?php if($global_category['id_global_categorys'] == $id){echo 'active';}?>">
                        <a class="a" 
                            href="users.php?admin=cat&id=<?= $global_category['id_global_categorys']?>">
                            <?= $global_category['name_global_categorys']?>
                        </a>
                    </span>
                <?php }?>
                </div>
                <div>
                <h2>Список категорий</h2>
                <?php
                    $categorys = mysqli_query($link, "SELECT * FROM `categorys` 
                    WHERE `id_global_category` = '$id'");
                    while($category = mysqli_fetch_assoc($categorys)){
                        ?>
                    <form class="formShops" action="/vendor/functions/editCat.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="idGlobalCat" value="<?= $id?>">
                        <input type="hidden" name="id" value="<?= $category['id_categorys']?>">
                        <div class="sectionForm">
                            <span>Название категории</span>
                            <input type="text" name="name_categorys" value="<?= $category['name_categorys']?>">
                        </div>
                        <div class="sectionForm">
                            <span>Изображение категории</span>
                            <input type="file" name="file">
                        </div>
                        <div class="sectionForm">
                            <input class="" type="submit" name="save" value="Сохранить">
                            <input type="submit" name="delete" value="Удалить">
                        </div>
                        <div class="formShops_edit">
                            <a href="users.php?admin=cat&id=<?= $category['id_global_category']?>&idCat=<?= $category['id_categorys']?>&nameCat=<?= $category['name_categorys']?>">Редактировать</a>
                        </div>
                    </form>
                <?php }?>
                <form action="/vendor/functions/addCat.php" method="POST" enctype="multipart/form-data">
                        <h2>Добавление новой категории</h2>
                        <input type="hidden" name="idGlobalCat" value="<?= $id?>">
                        <div class="sectionForm">
                            <span>Название категории</span>
                            <input type="text" name="name_categorys" value="">
                        </div>
                        <div class="sectionForm">
                            <span>Изображение категории</span>
                            <input type="file" name="file">
                        </div>
                        <input type="submit" name="create" value="Создать">
                </form>
                </div>
                
            </div>
            <?php if(isset($_GET['idCat'])){ ?>
                <div class="bodyAdmin">
                    <h2>Cтраницы с товарами</h2>
                    <h4>Категория: <?= $_GET['nameCat']?></h4>
                    <?php 
                        // $categoryShops = mysqli_query($link, "SELECT `category_shops`.*, `shops`.`name_shops`
                        // FROM `category_shops` 
                        //     LEFT JOIN `shops` ON `category_shops`.`id_shop` = `shops`.`id_shops`
                        //     WHERE `id_category` = '{$_GET['idCat']}'");
                        $categoryShops = mysqli_query($link, "SELECT * FROM `category_shops`
                            WHERE `id_category` = '{$_GET['idCat']}'");
                        while($categoryShop = mysqli_fetch_assoc($categoryShops)){?>
                        <form class="formShops" action="/vendor/functions/editCategoryShops.php" method="post">
                        <div class="sectionForm">
                                <span>Cсылка на страницу с товарами</span>
                                <input type="text" name="url" value="<?= $categoryShop['url_category_shops'] ?>">
                            </div>
                            <div class="sectionForm">
                                <span>Магазин</span>
                                <select name="idShop" value="">
                                    <?php 
                                        $shops = mysqli_query($link, "SELECT `id_shops`, `name_shops` 
                                        FROM `shops`");
                                        while($shop = mysqli_fetch_assoc($shops)){?>
                                        <option value="<?= $shop['id_shops']?>" 
                                            <?php if($shop['id_shops'] == $categoryShop['id_shop']){ echo 'selected';}?>
                                            > 
                                            <?= $shop['name_shops']?>
                                        </option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="sectionForm">
                                <span>Действия</span>
                                <div class="formShops_action">
                                    <input type="hidden" name="id" value="<?= $categoryShop['id_category_shops']?>">
                                    <input type="hidden" name="idCat" value="<?= $_GET['idCat']?>">
                                    <input type="submit" name="save" value="Сохранить">
                                    <input type="submit" name="delete" value="Удалить">
                                </div>
                            </div>
                        </form>
                    <?php }?>
                    <h2>Добавление страницы с товарами</h2>
                    <form class="formShops" action="/vendor/functions/addCategoryShops.php" method="post">
                            
                            <div class="sectionForm">
                                <span>Cсылка на страницу с товарами</span>
                                <input type="text" name="url" value="">
                            </div>
                            <div class="sectionForm">
                                <span>Магазин</span>
                                <select name="idShop">
                                    <?php 
                                        $shops = mysqli_query($link, "SELECT `id_shops`, `name_shops` 
                                        FROM `shops`");
                                        while($shop = mysqli_fetch_assoc($shops)){?>
                                        <option value="<?= $shop['id_shops']?>"> 
                                            <?= $shop['name_shops']?>
                                        </option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="sectionForm">
                                <span>Действия</span>
                                <div class="formShops_action">
                                    <input type="hidden" name="idCat" value="<?= $_GET['idCat']?>">
                                    <input type="submit" name="create" value="Добавть страницу с товаром">
                                </div>
                            </div>
                        </form>
                </div>
            <?php }?>


        <?php } if($_GET['rev']=='1'){?>
            <div class="bodyAdmin">
                <h2>Отзывы на главной страницы</h2>
                <?php 
                    $reviews = mysqli_query($link, "SELECT `reviews`.*, `users`.`email_users`
                    FROM `reviews` 
                        LEFT JOIN `users` ON `reviews`.`user_id` = `users`.`id_users`
                        WHERE `reviews`.`status_main` = 1
                        GROUP BY `reviews`.`id_reviews`");
                    while($review = mysqli_fetch_assoc($reviews)){?>
                    <form class="formShops" action="/vendor/functions/editReview.php" method="post">
                        <div class="sectionForm">
                            <span>Имя</span>
                            <span class="spanRev"> <?= $review['name_reviews']?></span>
                        </div>
                        <div class="sectionForm">
                            <span>Email</span>
                            <span class="spanRev"> <?= $review['email_users']?></span>
                        </div>
                        <div class="sectionForm">
                            <span>Отзыв</span>
                            <span class="spanRev"><?= $review['text_reviews']?></span>
                        </div>
                        <div class="sectionForm">
                            <span>Действия</span>
                            <div class="formShops_action">
                                <input type="hidden" name="id" value="<?= $review['id_reviews']?>">
                                <input type="submit" name="deleteMain" value="Удалить с главной страницы">
                            </div>
                        </div>
                    </form>
                <?php }?>
                <h2>Отзывы доступные для просмотра</h2>
                <?php 
                    $reviews = mysqli_query($link, "SELECT `reviews`.*, `users`.`email_users`
                    FROM `reviews` 
                        LEFT JOIN `users` ON `reviews`.`user_id` = `users`.`id_users`
                        WHERE `reviews`.`status_view` = 1 AND `reviews`.`status_main` = 0
                        GROUP BY `reviews`.`id_reviews`");
                    while($review = mysqli_fetch_assoc($reviews)){?>
                    <form class="formShops" action="/vendor/functions/editReview.php" method="post">
                        <div class="sectionForm">
                            <span>Имя</span>
                            <span class="spanRev"> <?= $review['name_reviews']?></span>
                        </div>
                        <div class="sectionForm">
                            <span>Email</span>
                            <span class="spanRev"> <?= $review['email_users']?></span>
                        </div>
                        <div class="sectionForm">
                            <span>Отзыв</span>
                            <span class="spanRev"><?= $review['text_reviews']?></span>
                        </div>
                        <div class="sectionForm">
                            <span>Действия</span>
                            <div class="formShops_action">
                                <input type="hidden" name="id" value="<?= $review['id_reviews']?>">
                                <input type="submit" name="addMain" value="Добавить на главную">
                                <input type="submit" name="delete" value="Скрыть">
                            </div>
                        </div>
                    </form>
                <?php }?>
                <h2>На модерации</h2>
                <?php 
                    $reviews = mysqli_query($link, "SELECT `reviews`.*, `users`.`email_users`
                    FROM `reviews` 
                        LEFT JOIN `users` ON `reviews`.`user_id` = `users`.`id_users`
                        WHERE `reviews`.`status_view` = 0
                        GROUP BY `reviews`.`id_reviews` ORDER BY `reviews`.`id_reviews` DESC");
                    while($review = mysqli_fetch_assoc($reviews)){?>
                    <form class="formShops" action="/vendor/functions/editReview.php" method="post">
                        <div class="sectionForm">
                            <span>Имя</span>
                            <span class="spanRev"> <?= $review['name_reviews']?></span>
                        </div>
                        <div class="sectionForm">
                            <span>Email</span>
                            <span class="spanRev"> <?= $review['email_users']?></span>
                        </div>
                        <div class="sectionForm">
                            <span>Отзыв</span>
                            <span class="spanRev"><?= $review['text_reviews']?></span>
                        </div>
                        <div class="sectionForm">
                            <span>Действия</span>
                            <div class="formShops_action">
                                <input type="hidden" name="id" value="<?= $review['id_reviews']?>">
                                <input type="submit" name="add" value="Одобрить">
                            </div>
                        </div>
                    </form>
                <?php }?>
            </div>
        <?php }?>
        </div>
        <?php }?>
        
    </section>
    <?php if($_SESSION['users']['status'] != 1){?>
        <section class="form_aut">
            <div class="form_aut_">
                <form action="/vendor/functions/addReview.php" method="post">
                    <h2 class="form_title">
                        Оставьте свой отзыв
                    </h2>
                    <span>Отзывов оставленно ранее: 
                        <?php 
                            $reviews = mysqli_query($link, "SELECT `id_reviews` FROM `reviews` 
                                WHERE `user_id` = '{$_SESSION['users']['id']}'");
                                echo mysqli_num_rows($reviews);
                        ?>
                    </span>
                    <span>Введите ваше имя</span>
                    <input name="name" require type="text">
                    <span>Выш отзыв</span>
                    <textarea name="rev" cols="30" rows="10" require></textarea>
                    <input type="hidden" name="id" value="<?= $_SESSION['users']['id']; ?>">
                    <input name="add" value="Оставить отзыв" type="submit">
                </form>
            </div>
        </section>
    <?php }?>
<?php 
    require("vendor/components/footer.php");
?>

</html>