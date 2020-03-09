  
<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscore
 */

get_header();
?>
            <?php      
			echo "<h2>". category_description( get_category_by_slug('atelier')) . "</h2>"; 
			?>
		
			<section id="atelier">
			<?php

			$args2 = array(
				"category_name" => "atelier",
				'posts_per_page' => 16,
				"orderby" => "date",
				"order" => "ASC"
			);
			$query2 = new WP_Query( $args2 );

			while ( $query2->have_posts() ) :
				$query2->the_post();
				//echo  '<p>'. get_the_date('j / m') . '</p>';
				$heure = (int) substr(get_post_field('post_name'), -2, 2);
				$formateur = (int) get_the_author_meta( 'display_name', $post->post_author );
				$gridArea = $heure;
				// echo '<p>' .$gridArea . '</p>' ;
				echo '<h2 style="grid-area:'. $gridArea . '">' . substr(get_the_title(), 3), get_post_field('post_name'), get_the_author().'</h2>';
			endwhile;
			?>
        	</section>
<?php
get_sidebar();
get_footer();