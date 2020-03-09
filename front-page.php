<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscores
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<section id="content-conference">
			<?php 
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'page' );

				endwhile;
			
		
				echo "<h2 class=\"conference\">".category_description(get_category_by_slug("conference"))."</h2>";
				
				// The Query
				$args = array(
					"category_name" => "conference",
					'posts_per_page' => 5,
					"orderby" => "date",
					"order" => "ASC"
				);
				$query1 = new WP_Query( $args );
				
				// The Loop
				while ( $query1->have_posts() ) {
					$query1->the_post();
					//echo '<h2>' . get_the_title() . '</h2>';
					//echo '<p>' . substr(get_the_excerpt(),0,200) . '</p>';
				}

				/* Restore original Post Data 
				* NB: Because we are using new WP_Query we aren't stomping on the 
				* original $wp_query and it does not need to be reset with 
				* wp_reset_query(). We just need to set the post data back up with
				* wp_reset_postdata().
				*/
				wp_reset_postdata();
				get_template_part('category-evenement');
			?>
		</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
