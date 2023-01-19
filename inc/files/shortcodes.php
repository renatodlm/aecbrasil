<?php
function artigos_shortcode( $attrs, $cotent){
    extract(shortcode_atts(array(
        'ids' => '0',
        'type' => 'post'
    ),$attrs ));
    $ids_explode = explode(",", $ids);

    $ctps_entregas = new WP_Query(array('post_type' => $type, 'post__in' => $ids_explode));


    $html .= "<ul>";

    foreach ($ctps_entregas->posts as $tipo_entrega) {
        echo '<li><a class="posts-populares" href="' . $tipo_entrega->guid . '">' . $tipo_entrega->post_title . '</a></li>';
    };
    $html .= "</ul>";

    return $html;
}

add_shortcode('populares', 'artigos_shortcode');


function shortcode_destaque( $attrs, $cotent){
    extract(shortcode_atts(array(
        'txt' => 'Insira seu texto aqui.',
        'button_txt' => 'Clique Aqui',
        'link' => '#',
        'target' => '_blank'
    ),$attrs ));

    $html = '<div class="rounded-0 alert bg-cor-principal alert-dismissible fade show text-white text-center" role="alert"><div class="p-3 d-sm-inline-block">' . $txt .'</div><a href="' . $link . '" target="' . $target . '"><button class="btn btn-promocao text-white"><strong>' . $button_txt . '</strong></button></a><button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

    return $html;
}

add_shortcode('promocao', 'shortcode_destaque');
