<?php
$mall_subtitle = $args['mall_subtitle'];
$mall_contacts = $args['mall_contacts'];
$conference_subtitle = $args['conference_subtitle'];
$conference_contacts = $args['conference_contacts'];

foreach (['mall' => $mall_contacts, 'conference' => $conference_contacts] as $type => $contacts) :
    if ($contacts) :
?>
        <div class="contact__inner__column">
            <?php if ($args[$type . '_subtitle']) : ?>
                <h4><?= $args[$type . '_subtitle']; ?></h4>
            <?php endif; ?>

            <?php foreach ($contacts as $contact) : ?>
                <?php
                $title = $contact['title'] ?? '';
                $contact_icon = $contact['contact_icon'] ?? '';
                $contact_name = $contact['contact_name'] ?? '';
                $contact_items = $contact['contacts'] ?? [];
                ?>

                <div class="contact__inner__column__block">
                    <?php if ($title) : ?>
                        <h5><?= $title; ?></h5>
                    <?php endif; ?>

                    <div class="icon-name__wrapper">
                        <?php if ($contact_icon) : ?>
                            <img src="<?= $contact_icon['url']; ?>" alt="<?= get_image_alt($contact_icon); ?>" class="ofi-contain-center-center">
                        <?php endif; ?>

                        <?php if ($contact_name) : ?>
                            <p><?= $contact_name; ?></p>
                        <?php endif; ?>
                    </div>

                    <?php
                    foreach ($contact_items as $item) :
                        $item_contact = $item['contact'] ?? '';
                        $item_type = $item['type'] ?? '';
                        $item_extra_information = $item['extra_information'] ?? '';
                        $item_extra_information_is_aligned_left = $item['extra_information_is_aligned_left'] ?? false;
                    ?>

                        <?php if ($item_contact) :
                            switch ($item_type):
                                case 'email':
                                    $item_contact = '<a class="'. ($item_extra_information_is_aligned_left ? 'order-2' : 'order-1') .'"  href="mailto:' . $item_contact . '">' . $item_contact . '</a>';
                                    break;
                                case 'phone':
                                    $item_contact = '<a class="'. ($item_extra_information_is_aligned_left ? 'order-2' : 'order-1') .'"  href="tel:' . $item_contact . '">' . $item_contact . '</a>';
                                    break;
                                case 'website':
                                    $item_contact = '<a class="'. ($item_extra_information_is_aligned_left ? 'order-2' : 'order-1') .'"  href="' . $item_contact . '">' . $item_contact . '</a>';
                                    break;
                                default:
                                    $item_contact = '<p class="'. ($item_extra_information_is_aligned_left ? 'order-2' : 'order-1') .'" >' . $item_contact . '</p>';
                            endswitch;
                        ?>
                            <div class="contact-item">
                                <?= $item_contact; ?>
                            <?php endif; ?>

                            <?php if ($item_extra_information) : ?>
                                <p class="<?= $item_extra_information_is_aligned_left ? 'order-1' : 'order-2' ?>"><?= $item_extra_information; ?></p>
                            <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
<?php endforeach; ?>