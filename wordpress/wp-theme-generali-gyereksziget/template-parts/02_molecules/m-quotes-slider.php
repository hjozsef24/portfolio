<?php if ($quote_title) : ?>
    <h2><?php echo $quote_title; ?></h2>
<?php endif; ?>

<div class="js-quotes-slider quotes-slides">
    <?php foreach ($quote_post as $id) : ?>
        <?php $quote = get_field('quote', $id, true); ?>
        <div class="quote-slide">
            <?php echo $quote; ?>
        </div>
    <?php endforeach; ?>
</div>