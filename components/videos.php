<?php 
$args = array( 
    'post_type' => 'videos',
    'posts_per_page' => 3,
);
$the_query = new WP_Query( $args ); 
?>
<?php if ( $the_query->have_posts() ) : $n=1;?>
    <div id="videos" class="videos">
        <div class="container">
            <div class="titulo">
                <h2>Vídeos</h2>
                <div class="linha"></div>
            </div>
            <div class="row d-flex justify-content-center">
                <?php while ( $the_query->have_posts() ) : $the_query->the_post();
                $video = get_field( 'video' ); 
                preg_match('/src="(.+?)"/', $video, $matches_url );
                $src = $matches_url[1];	
                preg_match('/embed(.*?)?feature/', $src, $matches_id );
                $id = $matches_id[1];
                $id = str_replace( str_split( '?/' ), '', $id );
                $video = preg_replace('~<iframe[^>]*\K(?=src)~i','data-',$video);
                $video = str_replace('youtube.com/embed/', 'youtube-nocookie.com/embed/', $video);
                ?>
                    <div class="col-lg-4 col-md-6 coluna-video" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="<?= $n; ?>00">
                        <div class="video-thumb" 
                        style="background-image: url(https://img.youtube.com/vi/<?= $id; ?>/hqdefault.jpg)">
                            <div class="play-button">
                                <i class="flaticon-play fi"></i>
                            </div>
                            <div class="overlay"></div>
                        </div>
                        <div class="video-embed">
                            <?= $video; ?>
                        </div>
                        <h3 class="titulo-video"><?php the_title(); ?></h3>
                    </div>
                <?php $n++; endwhile; ?>
            </div>
            <a href="<?php echo get_site_url(); ?>/videos/">
                <button class="bt bt-medio bt-primary margin-center">Ver todos os vídeos</button>
            </a>
        </div>
    </div>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>