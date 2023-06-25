<?php
/* Function to get References card */
function get_references_card($id)
{
    $title = get_the_title($id);
    $thumbnail = get_field('thumbnail', $id);
    $permalink = get_the_permalink($id);

    set_query_var('id', $id);
    set_query_var('title', $title);
    set_query_var('thumbnail', $thumbnail);
    set_query_var('permalink', $permalink);
    set_query_var('gallery', false);

    get_template_part('template-parts/03_organisms/o-card');
}


/* Function to get Developments card */
function get_developments_card($id)
{
    $title = get_the_title($id);
    $thumbnail = get_field('thumbnail', $id);
    $gallery = get_field('gallery', $id);
    $location = get_field('location', $id);
    $price = get_field('price', $id);
    $currency = get_field('currency', 'options');
    $price_tag = $price . ' ' . $currency;
    $permalink = get_the_permalink($id);

    if ($gallery) {
        set_query_var('gallery', $gallery);
        set_query_var('thumbnail', false);
    } elseif ($thumbnail) {
        set_query_var('thumbnail', $thumbnail);
        set_query_var('gallery', false);
    } else {
        set_query_var('gallery', false);
        set_query_var('thumbnail', false);
    }

    if($location){
        set_query_var('location', $location);
    } else {
        set_query_var('location', false);
    }


    set_query_var('id', $id);
    set_query_var('bedrooms', false);
    set_query_var('title', $title);
    set_query_var('price', $price_tag);
    set_query_var('permalink', $permalink);

    get_template_part('template-parts/03_organisms/o-card');
}

function get_highlighted_developments_card($id)
{

    $title = get_the_title($id);
    $thumbnail = get_field('thumbnail', $id);
    $location = get_field('location', $id);
    $permalink = get_the_permalink($id);

    set_query_var('id', $id);
    set_query_var('title', $title);
    set_query_var('wishlist', false);
    set_query_var('location', $location);
    set_query_var('thumbnail', $thumbnail);
    set_query_var('permalink', $permalink);

    get_template_part('template-parts/03_organisms/o-card');
}

/* 
* Function to get Individual Product cards, which are not Apartments or Furniture Packages
*/
function get_individual_product_card($id, $price = true)
{
    $product = wc_get_product($id);
    $product_type = get_field('product_type', $id);

    if($product_type == 'individual-product'){
        $permalink = false;
    } else {
        $permalink = $product->get_permalink();
    }
    $title = $product->get_name();
    $short_description = $product->get_short_description();
    $dimensions = $product->get_attribute('pa_dimensions');
    $material = $product->get_attribute('pa_material');
    $collection_brand = $product->get_attribute('pa_collection-brand-name');

    $thumbnail_id = get_post_thumbnail_id($id);
    $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'single-post-thumbnail');
    $thumbnail_alt = get_post_meta(get_post_thumbnail_id($id), '_wp_attachment_image_alt', TRUE);
    $thumbnail_title = get_the_title($thumbnail_id);
    $thumbnail = array(
        'url' => $thumbnail_url[0],
        'alt' => $thumbnail_alt,
        'title' => $thumbnail_title
    );

    if ($price) {
        $price = $product->get_price_html();
    } else {
        set_query_var('price', false);
    }

    set_query_var('id', $id);
    set_query_var('title', $title);
    set_query_var('price', $price);
    set_query_var('gallery', false);
    set_query_var('location', false);
    set_query_var('thumbnail', $thumbnail);
    set_query_var('collection_brand', $collection_brand);
    set_query_var('permalink', $permalink);
    set_query_var('dimensions', $dimensions);
    set_query_var('material', $material);
    set_query_var('short_description', $short_description);

    get_template_part('template-parts/03_organisms/o-card');
}


/* 
* Function to get Product cards, which are not Individual Products
* Generally used for Homes for Sales and Apartments
*/
function get_product_card($id, $gallery = false, $location = false)
{
    $product = wc_get_product($id);
    $permalink = $product->get_permalink();
    $title = $product->get_name();
    $price = $product->get_price_html();
    $style = $product->get_attribute('pa_style');
    $project = $product->get_attribute('pa_project');
    $bedrooms = $product->get_attribute('pa_number-of-rooms');
    $bathrooms = $product->get_attribute('pa_bathrooms');

    $thumbnail_id = get_post_thumbnail_id($id);
    $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'single-post-thumbnail');
    $thumbnail_alt = get_post_meta(get_post_thumbnail_id($id), '_wp_attachment_image_alt', TRUE);
    $thumbnail_title = get_the_title($thumbnail_id);
    $thumbnail = array(
        'url' => $thumbnail_url[0],
        'alt' => $thumbnail_alt,
        'title' => $thumbnail_title
    );

    set_query_var('size', false);
    set_query_var('price', $price);
    set_query_var('title', $title);
    set_query_var('wishlist', true);
    set_query_var('gallery', false);
    set_query_var('location', false);
    set_query_var('thumbnail', $thumbnail);
    set_query_var('bedrooms', $bedrooms);
    set_query_var('bathrooms', $bathrooms);
    set_query_var('permalink', $permalink);

    if ($style) {
        set_query_var('style', $style);
    }

    if ($project) {
        set_query_var('project', $project);
    }

    if ($gallery) {
        set_query_var('gallery', $gallery);
    }

    if ($location) {
        set_query_var('location', $location);
    }


    get_template_part('template-parts/03_organisms/o-card');
}


/* Function to get Home For Sale card */
function get_home_for_sale_card($id)
{
    $title = get_the_title($id);
    $permalink = get_the_permalink($id);
    $thumbnail = get_field('thumbnail', $id);
    $project = get_field('project', $id);
    $attributes = get_field('attributes', $id);
    $completion = $attributes['year_of_compliation'];
    $rooms = $attributes['number_of_rooms'];
    $size = $attributes['size'];
    $price = get_field('price', $id);

    set_query_var('id', $id);
    set_query_var('title', $title);
    set_query_var('permalink', $permalink);
    set_query_var('thumbnail', $thumbnail);
    set_query_var('project', $project);
    set_query_var('completion', $completion);
    set_query_var('rooms', $rooms);
    set_query_var('size', $size);
    set_query_var('price', $price);

    get_template_part('template-parts/03_organisms/o-card');
}


/* 
* Function to get Shop The Look popup card 
* Used in modded devvn_ihotspot plugin
*/

function get_shop_the_look_card($id, $wishlist = true)
{
    $product = wc_get_product($id);
    $title = get_the_title($id);
    $permalink = get_the_permalink($id);
    $completion = $product->get_attribute('pa_year-of-completion');
    $collection_brand = $product->get_attribute('pa_collection-brand-name');

    $thumbnail_id = get_post_thumbnail_id($id);
    $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'single-post-thumbnail');
    $thumbnail_alt = get_post_meta(get_post_thumbnail_id($id), '_wp_attachment_image_alt', TRUE);
    $thumbnail_title = get_the_title($thumbnail_id);
    $thumbnail = array(
        'url' => $thumbnail_url[0],
        'alt' => $thumbnail_alt,
        'title' => $thumbnail_title
    );

    set_query_var('id', $id);
    set_query_var('title', $title);
    set_query_var('permalink', $permalink);
    set_query_var('thumbnail', $thumbnail);
    set_query_var('completion', $completion);
    set_query_var('wishlist', $wishlist);
    set_query_var('dimensions', false);
    set_query_var('material', false);
    set_query_var('collection_brand', $collection_brand);

    get_template_part('template-parts/03_organisms/o-card');
}

/* 
* Function to get Similar Projects card on Shop The Look product pages
*/
function get_similar_shop_the_look_product_card($id)
{

    $product = wc_get_product($id);

    $permalink = $product->get_permalink();

    $thumbnail_id = get_post_thumbnail_id($id);
    $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'single-post-thumbnail');
    $thumbnail_alt = get_post_meta(get_post_thumbnail_id($id), '_wp_attachment_image_alt', TRUE);
    $thumbnail_title = get_the_title($thumbnail_id);
    $thumbnail = array(
        'url' => $thumbnail_url[0],
        'alt' => $thumbnail_alt,
        'title' => $thumbnail_title
    );

    $title = $product->get_name();
    $price = $product->get_price_html();
    $completion = $product->get_attribute('pa_year-of-completion');
    $size = $product->get_attribute('pa_size');
    $project = $product->get_attribute('pa_project');
    $rooms = $product->get_attribute('pa_number-of-rooms');

    set_query_var('id', $id);
    set_query_var('title', $title);
    set_query_var('thumbnail', $thumbnail);
    set_query_var('permalink', $permalink);
    set_query_var('price', $price);
    set_query_var('completion', $completion);
    set_query_var('dimensions', false);
    set_query_var('material', false);
    set_query_var('size', $size);
    set_query_var('project', $project);
    set_query_var('rooms', $rooms);

    get_template_part('template-parts/03_organisms/o-card');
}
