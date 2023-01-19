<?php

/*
 * Set post views count using post meta
 */

//CHAMAR A FUNÇÃO COM ID DO POST LOGO DEPOIS DO HEADER CODE =====>>>>  setPostViews(get_the_ID()); 
function setPostViews($postID)
{
    $countKey = 'post_views_count';
    $count = get_post_meta($postID, $countKey, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $countKey);
        add_post_meta($postID, $countKey, '0');
    } else {
        $count++;
        update_post_meta($postID, $countKey, $count);
    }
}


//REMOVER O COMENTÁRIO PARA ATIVAR
//add_filter('get_custom_logo', 'wecodeart_com');
function wecodeart_com()
{
    $custom_logo_id = get_theme_mod('custom_logo');
    $html = sprintf(
        '<a href="LINK CUSTOM AQUI" class="custom-logo-link" rel="home" itemprop="url">%2$s</a>',
        esc_url('www.google.com'),
        wp_get_attachment_image($custom_logo_id, 'full', false, array(
            'class'    => 'custom-logo',
        ))
    );
    return $html;
}



// Pagination
function new_pagination($post_type_collection, $paged)
{
    $big = 999999999; // need an unlikely integer

    $pagination = paginate_links(array(
        'format' => '?paged=%#%',
        'current' => max(1, $paged),
        'type' => 'plain',
        'prev_text' => '',
        'next_text' => '',
        'total' => $post_type_collection->max_num_pages
    ));

    if (!empty($pagination)) {
        return '<div class="pagination">' . $pagination . '</div>';
    }
}