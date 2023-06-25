<?php $title = $slide['title']; ?>
<?php $text = $slide['text']; ?>
<?php $image = $slide['image']; ?>
<?php $overlay = $slide['overlay']; ?>

<div>
    <div class="slider--slide <?php echo $overlay ? 'has-overlay' : ''; ?>">
        <?php if ($image) : ?>
            <img src="<?php echo $image['url']; ?>" alt="<?php get_image_alt($image); ?>">
        <?php endif; ?>

        <div class="slider--slide--text__wrapper">
            <?php if ($title) : ?>
                <h1 class="responsive-40"><?php echo $title; ?></h1>
            <?php endif; ?>

            <?php if ($text) : ?>
                <p class="responsive-20"><?php echo $text; ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>