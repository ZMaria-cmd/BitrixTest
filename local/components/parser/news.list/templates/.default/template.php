<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?php foreach ($arResult["ITEMS"] as $item): ?>
    <div class="col-lg-4">
        <div class="portfolio-item">
            <div class="team-member">
                <img class="mx-auto rounded-circle" src="<?php echo htmlspecialchars($item["PREVIEW_PICTURE_SRC"]); ?>" alt="<?php echo htmlspecialchars($item["NAME"]); ?>" />
                <h4><?php echo htmlspecialchars($item["NAME"]); ?></h4>
                <p class="text-muted"><?php echo htmlspecialchars($item["PREVIEW_TEXT"]); ?></p>

                <!-- Проверка наличия ссылок на соцсети -->
                <?php if ($item["TWITTER_URL"]): ?>
                    <a class="btn btn-dark btn-social mx-2" href="<?php echo htmlspecialchars($item["TWITTER_URL"]); ?>"><i class="fab fa-twitter"></i></a>
                <?php endif; ?>
                <?php if ($item["FACEBOOK_URL"]): ?>
                    <a class="btn btn-dark btn-social mx-2" href="<?php echo htmlspecialchars($item["FACEBOOK_URL"]); ?>"><i class="fab fa-facebook-f"></i></a>
                <?php endif; ?>
                <?php if ($item["INSTAGRAM_URL"]): ?>
                    <a class="btn btn-dark btn-social mx-2" href="<?php echo htmlspecialchars($item["INSTAGRAM_URL"]); ?>"><i class="fab fa-instagram"></i></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>


