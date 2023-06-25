<?php if ($sponsors_title) : ?>
    <h2><?php echo $sponsors_title; ?></h2>
<?php endif; ?>

<div class="js-sponsors-slider sponsors-slider slick-hider">
    <?php foreach ($sponsors as $sponsor) : ?>
        <?php $sponsor_url = $sponsor['url']; ?>
        <?php $sponsor_image = $sponsor['image']; ?>
        <?php if ($sponsor_url) : ?>
            <a target="_blank" href="<?php echo $sponsor_url; ?>">
                <img class="sponsors--image" src="<?php echo $sponsor_image['url']; ?>" alt="<?php echo get_image_alt($sponsor_image); ?>">
            </a>
        <?php else : ?>
            <div>
                <img class="sponsors--image" src="<?php echo $sponsor_image['url']; ?>" alt="<?php echo get_image_alt($sponsor_image); ?>">
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>