<div class="redes-sociais">
    <?php if(get_field('facebook', 'option')) : ?>
        <a href="<?php echo get_field('facebook', 'option'); ?>" title="Curta nossa página no Facebook" target="_blank" class="social-icon">
            <i class="fi flaticon-facebook"></i>
        </a>
    <?php endif; ?>
    <?php if(get_field('linkedin', 'option')) : ?>
        <a href="<?php echo get_field('linkedin', 'option'); ?>" title="Siga-nos no Linkedin" target="_blank" class="social-icon">
            <i class="fi flaticon-linkedin"></i>
        </a>
    <?php endif; ?>
    <?php if(get_field('youtube', 'option')) : ?>
        <a href="<?php echo get_field('youtube', 'option'); ?>" title="Inscreva-se em nosso canal" target="_blank" class="social-icon">
            <i class="fi flaticon-youtube"></i>
        </a>
    <?php endif; ?>
    <?php if(get_field('instagram', 'option')) : ?>
        <a href="<?php echo get_field('instagram', 'option'); ?>" title="Siga-nos no Instagram" target="_blank" class="social-icon">
            <i class="fi flaticon-instagram"></i>
        </a>
    <?php endif; ?>
    <?php if(get_field('twitter', 'option')) : ?>
        <a href="<?php echo get_field('twitter', 'option'); ?>" title="Siga-nos no Twitter" target="_blank" class="social-icon">
            <i class="fi flaticon-twitter"></i>
        </a>
    <?php endif; ?>
</div>