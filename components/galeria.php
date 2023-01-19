<?php 
$images = get_field('galeria'); 
if( $images ): ?>
    <section class="galeria overflow-hidden">
        <?php foreach( $images as $image ): ?>
            <div class="slide">
                <a data-fancybox="gallery"  href="<?= esc_url($image['sizes']['galeria-lg']); ?>">
                    <img data-lazy="<?php echo esc_url($image['sizes']['galeria-sm']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                </a>
            </div>
        <?php endforeach; ?>
    </section>
<?php endif; ?>