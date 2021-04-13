<?php get_header() ?>


<section class="hero hero-home" style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full'); ?>');">
	<div class="hero-home-content">
		<h1><?php the_content() ?></h1>
		<a class="btn btn-dark w-100" href="<?php the_field('stranka') ?>"><?php the_field('nazov') ?></a>
	</div><!-- / .hero-home-content -->
</section>

<?php echo get_template_part("template-parts/content", "instant-contact"); ?>


<?php echo get_template_part("template-parts/content", "actual-vystavy"); ?>


<?php echo get_template_part("template-parts/content", "actual-zbierky"); ?>


<?php echo get_template_part("template-parts/content", "actual-blog-list"); ?>


<?php get_footer() ?>
