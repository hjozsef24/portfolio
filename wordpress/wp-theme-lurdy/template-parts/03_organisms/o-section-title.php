<?php $title = $args['title']; ?>

<?php if ($title) : ?>
    <section class="section__title">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1><?= $title ?></h1>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>