<?php
    session_start();
    require("vendor/components/connect.php");
    $titlePage = "MusiEr - отзывы";
    require("vendor/components/head.php");
    require("vendor/components/header.php");
?>
<section class="sectionMain Review">
    <div class="banner_header">
        Узнай что говорят посетители о нашем сайте.
    </div>
    <div class="banner_grids">
    <?php 
        $reviews = mysqli_query($link, "SELECT `reviews`.*, `users`.`email_users`
        FROM `reviews` 
            LEFT JOIN `users` ON `reviews`.`user_id` = `users`.`id_users`
            WHERE `reviews`.`status_view` = 1
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
        <a href="<?php if($_SESSION['users']){echo "users.php";}else{echo "signIn.php";} ?>" class="reviewAdd">
            Оставаить отзыв
        </a>
    </div>
</section>
<?php 
    require("vendor/components/footer.php");
?>

</html>