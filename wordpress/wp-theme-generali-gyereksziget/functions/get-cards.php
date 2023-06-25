<?php
/* Function to create the dates and time string for the exact program */
function get_program_times($program_dates, $exact_time = null)
{
    $program_time = "";
    $all_dates = get_terms('programs-category-dates', array('hide_empty' => true));
    if ($all_dates == $program_dates) {
        $program_time .= __('Minden nap', 'gyereksziget') . ' ' . $exact_time;
    } else {
        foreach ($program_dates as $program_date) {
            $program_time .= $program_date->name . ", ";
        }
        $program_time = substr($program_time, 0, -2);
        if($exact_time){
            $program_time .= ' ' . $exact_time;
        }
    }
    return $program_time;
}

function get_programs_timestamp($program_dates, $exact_time = null)
{
    $program_times = [];
    foreach ($program_dates as $i => $program_date) {
        $term_id = $program_date->term_id;
        $date_month = get_field('date_format', 'programs-category-dates_'.$term_id);

        if ($exact_time) {
            $exact_times =  explode('-', $exact_time);
            $start_hour = $exact_times[0];
            $end_hour = $exact_times[1];

            $date_month_starts = strtotime($date_month . ' ' . $start_hour);
            $date_month_ends = strtotime($date_month . ' ' . $end_hour);
            $program_times[$i]['start'] = $date_month_starts;
            $program_times[$i]['end'] = $date_month_ends;
        } else {
            $date_month_starts = strtotime($date_month);
            $date_month_ends = strtotime($date_month);
            $program_times[$i]['start'] = $date_month_starts;
            $program_times[$i]['end'] = $date_month_ends;
        }
    }
    return $program_times;
}

/* Function to create program card */
function get_program_card($id)
{
    $title = get_the_title($id);
    $permalink = get_the_permalink($id);
    $thumbnail = get_field('thumbnail', $id);
    $exact_time = get_field('exact_time', $id);
    $excerpt = get_field('short_description', $id);

    $program_ages = get_the_terms($id, 'programs-category-ages');
    $age_ids = [];
    foreach ($program_ages as $age) {
        $age_ids[] = $age->term_id;
    }
    $age_ids = htmlspecialchars(json_encode((array) $age_ids), ENT_QUOTES, 'UTF-8');

    $program_types = get_the_terms($id, 'programs-category-types');
    $type_ids = [];
    foreach ($program_types as $type) {
        $type_ids[] = $type->term_id;
    }
    $type_ids = htmlspecialchars(json_encode((array) $type_ids), ENT_QUOTES, 'UTF-8');

    $program_place = get_the_terms($id, 'programs-category-places');
    $program_place_name = $program_place[0]->name;

    $program_dates = get_the_terms($id, 'programs-category-dates');
    $program_date_ids = [];
    foreach ($program_dates as $program_date) {
        $program_date_ids[] = $program_date->term_id;
    }
    $date_ids = htmlspecialchars(json_encode((array) $program_date_ids), ENT_QUOTES, 'UTF-8');
    $program_times = get_program_times($program_dates, $exact_time);
    $timestamp = get_programs_timestamp($program_dates, $exact_time);
    $timestamp = htmlspecialchars(json_encode((array) $timestamp), ENT_QUOTES, 'UTF-8');;

    set_query_var('id', $id);
    set_query_var('title', $title);
    set_query_var('excerpt', $excerpt);
    set_query_var('age_ids', $age_ids);
    set_query_var('type_ids', $type_ids);
    set_query_var('date_ids', $date_ids);
    set_query_var('permalink', $permalink);
    set_query_var('thumbnail', $thumbnail);
    set_query_var('timestamp', $timestamp);
    set_query_var('program_ages', $program_ages);
    set_query_var('program_types', $program_types);
    set_query_var('program_times', $program_times);
    set_query_var('program_place_name', $program_place_name);
    get_template_part('template-parts/03_organisms/o-card-program-card');
}

/* Function to create places card */
function get_places_card($id, $taxonomy)
{
    $title = get_term($id)->name;
    $permalink = get_term_link($id, $taxonomy);
    $thumbnail = get_field('thumbnail', $taxonomy . '_' . $id);
    $excerpt = wp_strip_all_tags(term_description($id));
    $excerpt = wp_trim_words($excerpt, 25);

    set_query_var('id', $id);
    set_query_var('title', $title);
    set_query_var('excerpt', $excerpt);
    set_query_var('permalink', $permalink);
    set_query_var('thumbnail', $thumbnail);
    set_query_var('program_times', false);
    set_query_var('program_age_name', false);
    set_query_var('program_type_name', false);
    set_query_var('program_place_name', false);
    get_template_part('template-parts/03_organisms/o-card-program-card');
}

function get_news_card($id)
{
    $title = get_the_title($id);
    $date = get_the_date('Y.m.d', $id);
    $permalink = get_the_permalink($id);
    $thumbnail = get_field('thumbnail', $id);
    $excerpt = get_field('excerpt', $id);
    $excerpt = wp_trim_words($excerpt, 25);
    $news_text_content = get_flexible_content_text($id);
    $reading_time = estimated_reading_time($news_text_content);

    set_query_var('id', $id);
    set_query_var('date', $date);
    set_query_var('title', $title);
    set_query_var('excerpt', $excerpt);
    set_query_var('permalink', $permalink);
    set_query_var('thumbnail', $thumbnail);
    set_query_var('program_ages', false);
    set_query_var('program_types', false);
    set_query_var('program_type_name', false);
    set_query_var('program_place_name', false);
    set_query_var('reading_time', $reading_time);

    get_template_part('template-parts/03_organisms/o-card-program-card');
}
