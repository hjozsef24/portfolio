<?php
$section_title = get_sub_field('section_title');
$section_title_type = get_sub_field('section_title_type'); // Returns h1 or h2
$faqs = get_sub_field('faq');
?>

<section class="section__faq">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-12">
                <?php if ($section_title) : ?>
                    <<?= $section_title_type ?> class="section__faq__title">
                        <?= $section_title; ?>
                    </<?= $section_title_type ?>>
                <?php endif; ?>

                <?php
                foreach ($faqs as $f) {
                    $title = get_the_title($f);
                    $icon = get_field('icon', $f);
                    $content = get_field('content', $f);
                    $faq_card_args = compact('title', 'icon', 'content');
                    get_template_part('template-parts/02_molecules/cards/m-card-faq', '', $faq_card_args);
                }
                ?>

            </div>
        </div>
    </div>
</section>
<?php addScript('window.faqToggle();'); ?>