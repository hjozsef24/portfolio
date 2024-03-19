<?php
global $wp;
$title = get_sub_field('title');
$heading = get_sub_field('heading_type');
$links = get_sub_field('links');
$current_url = home_url($wp->request);

$tab_navigation_args = compact('links', 'current_url');
?>

<section class="section__tab-navigation">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-8 xol-12">
                <?php if ($title) : ?>
                    <<?= $heading; ?>>
                        <?= $title; ?>
                    </<?= $heading; ?>>
                <?php endif; ?>

                <?php if ($links) : ?>
                    <div class="tabs__wrapper d-md-flex d-none">
                        <?php
                        foreach ($links as $l) :
                            $l_url = $l['link'];
                            $btn_class = ($l_url['url'] == trailingslashit($current_url)) ? 'primary' : 'secondary'
                        ?>
                            <a class="btn btn--<?= $btn_class; ?> tab-button" href="<?= $l_url['url']; ?>">
                                <?= $l_url['title']; ?>
                            </a>
                        <?php endforeach; ?>
                    </div>

                    <div class="d-md-none d-block">
                        <?php get_template_part('template-parts/02_molecules/m-tabs-navigation', '', $tab_navigation_args); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php addScript('window.customDropdown();'); ?>