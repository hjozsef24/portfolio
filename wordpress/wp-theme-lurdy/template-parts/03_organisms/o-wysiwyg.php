<?php
$wysiwyg = get_sub_field('wysiwyg');
if (!$wysiwyg) {
    return;
}
?>

<section class="section__wysiwyg">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-12">
                <div class="wysiwyg__wrapper">
                    <?= $wysiwyg; ?>
                </div>
            </div>
        </div>
    </div>
</section>