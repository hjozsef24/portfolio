<div class="card-contact">
    <?php
    switch ($type):
        case 'text':
            echo '<div>';
            break;

        case 'address':
            echo '<a href="https://maps.google.com/?q=' . $description . '">';
            break;

        case 'link':
            echo '<a href="' . $description . '">';
            break;

        case 'mail':
            echo '<a href="mailto:' . $description . '">';
            break;

        case 'phone':
            echo '<a href="tel:' . $description . '">';
            break;
    endswitch;
    ?>

    <?php if ($icon) : ?>
        <img src="<?php echo $icon['url']; ?>" alt="<?php echo get_image_alt($icon); ?>" class="card-contact-image">
    <?php endif; ?>

    <?php if ($title) : ?>
        <p class="card-contact-title"><?php echo $title; ?></p>
    <?php endif; ?>

    <?php if ($description) : ?>
        <p class="card-contact-description"><?php echo $description; ?></p>
    <?php endif; ?>

    
    <?php if ($type === 'text') : ?>
        </div>
    <?php else : ?>
        </a>
    <?php endif; ?>
</div>