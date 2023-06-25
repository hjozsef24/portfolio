<?php

function language_switcher()
{
    $args = array(
        'show_names' => 0,
        'show_flags' => 1,
        'hide_if_empty' => 1,
        'hide_current' => 1,
        'echo' => 0,
        'raw' => 1
    );

    $languages = pll_the_languages($args);

    foreach ($languages as $language) {
        $language_switcher = '<a class="my-auto" href="'. $language['url'] .'">'. $language['flag'] . '</a>';
    }

    return $language_switcher;
}
