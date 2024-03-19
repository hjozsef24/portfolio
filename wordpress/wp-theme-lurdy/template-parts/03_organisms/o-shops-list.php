<?php
$section_title = get_sub_field('section_title');
$shops = get_sub_field('shops');
$placeholder = array(
    'url' => get_template_directory_uri() . '/src/assets/images/placeholder.png',
    'title' => 'Placeholder',
    'alt' => 'Placeholder'
);
?>

<section class="section__shops-list">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-12">
                <?php if ($section_title) : ?>
                    <h4><?= $section_title; ?></h4>
                <?php endif; ?>

                <?php if ($shops) : ?>
                    <div class="cards__wrapper">
                        <?php
                        foreach ($shops as $s) :
                            $permalink = get_the_permalink($s);
                            $logo = get_field('logo', $s);
                            $logo = $logo ? $logo : $placeholder;
                            $title = false;

                            $shop_card_args = compact('permalink', 'logo', 'title');
                            get_template_part('template-parts/02_molecules/cards/m-card-shop', '', $shop_card_args)
                        ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>