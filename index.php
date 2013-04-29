<?php get_header(); ?>
	
<h2>Latest posts </h2>	
<div class="grid-100">
	
<?php if (have_posts()) : ?>
   <?php while (have_posts()) : the_post(); ?>
	  <h2><?php the_title(); ?></h2>
	  <?php the_content(); ?> 
		
	<?php endwhile; ?>	
<?php endif; ?>
	
</div>

<?php get_footer(); ?>