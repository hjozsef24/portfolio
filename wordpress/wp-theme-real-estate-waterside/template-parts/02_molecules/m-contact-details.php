<?php foreach ($contacts as $contact) : ?>
    <?php $icon = $contact['icon']; ?>
    <?php $text = $contact['text']; ?>
    <?php $type = $contact['type']; ?>

    <?php
    switch ($type):
        case 'location':
            $href = "http://maps.google.com/?q=" . $text;
            break;
        case 'phone':
            $href = "tel:" . preg_replace('/\D+/', '', $text);
            break;
        case 'email':
            $href = "mailto:" . $text;
            break;
    endswitch;
    ?>

    <div class="contacts__contact-details">
        <?php if ($icon) : ?>
            <img src="<?php echo $icon['url']; ?>" alt="<?php echo get_image_alt($icon); ?>" class="ofi-contain-center-center">
        <?php endif; ?>

        <?php if ($type == "other") : ?>
            <p><?php echo $text; ?></p>
        <?php else : ?>
            <a href="<?php echo $href; ?>"><?php echo $text; ?></a>
        <?php endif; ?>

    </div>
<?php endforeach; ?>