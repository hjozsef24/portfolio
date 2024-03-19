<?php
$section_title = $args['section_title'];
$button = $args['button'];
?>

<?php if ($section_title || $button) : ?>
    <div class="section__header">
        <?php if ($section_title) : ?>
            <h2><?= $section_title; ?></h2>
        <?php endif; ?>

        <?php
        if ($button) :
            $target = $button['target'] ? $button['target'] : '_self';
        ?>
            <a href="<?= $button['url']; ?>" class="btn btn--secondary d-md-flex d-none" target="<?= esc_attr($target); ?>">
                <?= $button['title']; ?>
            </a>
        <?php endif; ?>
    </div>
<?php endif; ?>