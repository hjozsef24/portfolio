<?php 
if (function_exists('yoast_breadcrumb')) : 
$full_width = $args['full_width'];
$columns = $full_width ? "col-12" : "col-xl-8 col-12";
?>

    <section class="section__breadcrumb">
        <div class="container-fluid <?= $full_width ? "px-0" : ""; ?>">
            <div class="row justify-content-center">
                <div class="<?= $columns; ?>">
                    <?php yoast_breadcrumb('<div id="breadcrumbs">', '</div>'); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>