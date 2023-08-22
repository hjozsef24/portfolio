<div class="team-card">
    <?php if ($image) : ?>
        <img src="<?php echo $image['url']; ?>" alt="<?php echo get_image_alt($image) ?>" class="team-card__image ofi-cover-center-center">
    <?php endif; ?>

    <p class="team-card__name"><?php echo $name; ?></p>
    <p class="team-card__title"><?php echo $title; ?></p>
    <a href="mailto:<?php echo $email; ?>" class="team-card__email"><?php echo $email; ?></a>

    <?php if ($divider) : ?>
        <div class="team-card__divider__side"></div>
    <?php endif; ?>

</div>