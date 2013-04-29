<?php get_header(); ?>
	
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>	

<div class="grid-80 prefix-10 suffix-10 page-copy">
<h1 class="page-title"><span class="entypo-<?php the_field('menu_icon'); ?>"><?php the_title(); ?></h1>
<?php the_content(); ?> 
</div>
<?php endwhile; ?>
<?php else : ?>
<?php endif; ?>

	
<?php get_footer(); ?>