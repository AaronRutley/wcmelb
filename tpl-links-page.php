<?php /* Template Name: Links  Page */ ?>

<?php get_header(); ?>

<div class="grid-100 page-copy">
<h1 class="page-title"><span class="entypo-link"><?php the_field("page_heading"); ?></h1>
</div>

<?php if(get_field('links')): ?>
<div class="links-wrap">
 <ul>
	<?php while(the_repeater_field('links')): ?>
	<li><a href="<?php the_sub_field('url'); ?>" target="_blank"><?php the_sub_field('name'); ?><span class="entypo-right-open-big"></span></a></li>
	<?php endwhile; ?>
</ul>
</div>
<?php endif; ?> 				
	
<?php get_footer(); ?>