<?php $gallery = get_field('galeria_k_clanku') ?>
<?php if ($gallery) : ?>

    <div class="glide-sub glide--ltr glide--carousel glide--swipeable">
        <div class="glide__track" data-glide-el="track">

            <ul class="glide__slides" id="gallery">

                <?php foreach ($gallery as $image) : ?>
                    <li class="glide__slide" data-src="<?php echo esc_url($image['url']); ?>">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                    </li>
                <?php endforeach; ?>

            </ul><!-- / .glide__slides -->

        </div><!-- / .glide__track -->

        <div class="glide__arrows" data-glide-el="controls">
            <button class="glide__arrow glide__arrow--left" data-glide-dir="<">
                <img src="<?php echo get_template_directory_uri(); ?>/images/arr-black-right.svg" width="20" height="10" alt="<?php _e('šípka vľavo', 'mnsk') ?>" style="transform: rotate(180deg);">
            </button>

            <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
                <img src="<?php echo get_template_directory_uri(); ?>/images/arr-black-right.svg" width="20" height="10" alt="<?php _e('šípka vpravo', 'mnsk') ?>">
            </button>
        </div><!-- / .glide__arrows -->
    </div><!-- / .glide-sub -->
<?php endif; ?>
