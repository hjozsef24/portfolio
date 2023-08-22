<?php

/* Function to get publication card template part by id */
function get_publication_card($id)
{
    $title = get_the_title($id);
    $title = wp_trim_words($title, 6, '...');
    $permalink = get_permalink($id);
    $date = get_the_date('d/m/Y', $id);
    $excerpt = get_field('excerpt', $id);
    $excerpt = wp_trim_words($excerpt, 23, '...');
    $content = get_field('content', $id);
    $main_image = get_field('main_image', $id);
    $estimated_reading_time = estimated_reading_time($content);
    $post_categories = get_the_terms($id, 'publications-category');

    set_query_var('permalink', $permalink);
    set_query_var('post_categories', $post_categories);
    set_query_var('main_image', $main_image);
    set_query_var('date', $date);
    set_query_var('estimated_reading_time', $estimated_reading_time);
    set_query_var('title', $title);
    set_query_var('excerpt', $excerpt);

    get_template_part('template-parts/02_molecules/cards/m-publication-card');
  
}

/* Function to get team card by id, optionally add divider */
function get_team_card($id, $divider){
    $name = get_the_title($id);
    $image = get_field('image', $id);
    $title = get_field('title', $id);
    $title = $title->name;
    $email = get_field('email', $id);

    set_query_var('name', $name);
    set_query_var('image', $image);
    set_query_var('title', $title);
    set_query_var('email', $email);
    set_query_var('divider', $divider);

    get_template_part('template-parts/02_molecules/cards/m-team-card'); 
}