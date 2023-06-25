<?php if ($counted_results) : ?>
    <p class="filter--results">
        <?php echo $counted_results . ' ' . __('results', 'ua'); ?>
    </p>
<?php else : ?>
    <p class="js-results-counter filter--results"></p>
<?php endif; ?>