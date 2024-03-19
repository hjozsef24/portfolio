<?php
$icon_list = get_sub_field('icon_list');
if ($icon_list) :
?>
    <div class="icon-list__wrapper">
        <?php
        foreach ($icon_list as $il) :
            $image = $il['icon'];
            $text = $il['text'];
        ?>
            <div class="icon-list__item">
                <?php if ($image) : ?>
                    <img src="<?= $image['url']; ?>" alt="<?= get_image_alt($image); ?>">
                <?php endif; ?>

                <?php if ($text) : ?>
                    <p><?= $text; ?></p>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>

<?php endif; ?>