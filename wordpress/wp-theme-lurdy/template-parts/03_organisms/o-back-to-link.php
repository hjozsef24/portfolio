<?php
$back_to_link = get_sub_field('back_to_link');

$url = $back_to_link ? $back_to_link['url'] : $args['url'];
$title = $back_to_link ? $back_to_link['title'] : $args['title'];

if ($url && $title) :
?>
    <section class="section__back-to-link">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-12">
                    <a href="<?= $url; ?>" class="btn btn--text back-to-link"><?= $title; ?></a>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>