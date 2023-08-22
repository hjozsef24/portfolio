<?php $title = $card['title']; ?>
<?php $text = $card['text']; ?>

<div class="text-card">
    <?php if ($title) : ?>
        <h5 class="text-card__title"><?php echo $title; ?></h5>
    <?php endif; ?>

    <?php if($text): ?>
        <p class="text-card__text"><?php echo $text; ?></p>
    <?php endif; ?>
</div>