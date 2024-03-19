<?php
$placeholder = '';
$links = $args['links'];
$current_url = $args['current_url'];
$current_url = $current_url ? trailingslashit($current_url) : '';

foreach ($links as $link) {
    if ($link['link']['url'] === $current_url) {
        $placeholder = $link['link']['title'];
        break;
    }
}
?>

<div class="js-custom-dropdown custom-dropdown">
    <p class="selected-option placeholder__selected"><?= $placeholder; ?></p>

    <?php if ($links) : ?>
        <div class="dropdown-list">
            <?php
            foreach ($links as $l) :
                $l_url = $l['link'];
            ?>
                <a href="<?= $l_url['url']; ?>"><?= $l_url['title'] ?></a>
            <?php endforeach; ?>
        </div>

        <select class="js-original-select original-select d-none">
            <?php
            foreach ($links as $l) :
                $l_url = $l['link'];
            ?>
                <option value="<?= $l_url['url']; ?>"><?= $l_url['title'] ?></option>
            <?php endforeach; ?>
        </select>
    <?php endif; ?>
</div>