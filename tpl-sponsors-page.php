<?php /* Template Name: Sponsors Page */ ?>

<?php get_header(); ?>

<div class="grid-100">
<h1 class="page-title"><span class="entypo-thumbs-up"></span><?php the_field("page_heading"); ?></h1>
<p><?php the_field("page_intro"); ?></p>
</div>


<?php while(the_flexible_field("sponsor_page")): ?>
<?php if(get_row_layout() == "heading_row"): // layout: File ?>

	<div class="grid-100">
   	  <h2><?php the_sub_field("heading"); ?></h2>
	</div>
			
<?php elseif(get_row_layout() == "sponsor_row"): // layout: File ?>
	
	<div class="sponsor-wrap">
	
		<a href="<?php the_sub_field("url"); ?>" target="_blank" class="sponsor-logo">
		<img src="<?php the_sub_field("logo"); ?>" alt="<?php the_sub_field("name"); ?> Logo" width="100%" />
		</a>
		
		<div class="sponsor-copy">
		    <h3><a href="<?php the_sub_field("url"); ?>" target="_blank"><?php the_sub_field("name"); ?></a></h3>
		    <p><?php the_sub_field("bio"); ?></p>
		    		
	
		
		</div>
	  	   
	<div class="clear"></div></div>
	
	
	<?php elseif(get_row_layout() == "cs_row"): // layout: File ?>
	<div class="grid-33 mobile-grid-100">
	<?php the_sub_field("name"); ?> - <a href="<?php the_sub_field("url"); ?>" class="cs"><?php the_sub_field("from"); ?></a>
	</div>
	    
<?php endif; ?>
<?php endwhile; ?>
 				
	
<?php get_footer(); ?>