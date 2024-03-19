<?php
$text_content = get_sub_field('text_content');
if ($text_content) :
?>
    <div class="wysiwyg__wrapper"><?= $text_content; ?></div>
<?php endif; ?>