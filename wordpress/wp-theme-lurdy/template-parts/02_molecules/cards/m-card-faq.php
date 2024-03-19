<?php
$title = $args['title'];
$icon = $args['icon'];
$content = $args['content'];
?>

<div class="js-faq-card faq-card">
    <div class="faq-card__header js-faq-card-header">
        
        <?php if ($icon) : ?>
            <img src="<?= $icon['url']; ?>" alt="<?= get_image_alt($icon); ?>" class="faq-card__header__icon ofi-contain-center-center">
        <?php endif; ?>

        <h4 class="js-faq-title faq-card__header__title"><?php echo $title; ?></h4>

        <span class="js-faq-card-chevron faq-card__header__chevron"></span>
    </div>

    <div class="js-faq-card-body faq-card__body wysiwyg__wrapper">
        <?php if ($content) : ?>
            <?php echo $content; ?>
        <?php endif; ?>
    </div>
</div>