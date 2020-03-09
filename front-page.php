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

			<?php 
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'page' );

				endwhile;
				
				echo "<h2>".category_description(get_category_by_slug("atelier"))."</h2>";

				// The Query
				$args = array(
					"category_name" => "atelier",
					'posts_per_page' => 16,
					"orderby" => "date",
					"order" => "ASC"
				);
				$query1 = new WP_Query( $args );
				
				// The Loop
				while ( $query1->have_posts() ) {
					$query1->the_post();
					echo '<p>' . get_the_title(), '___', get_post_field('post_name'), '___', get_the_author_meta( 'display_name', $post->post_author ) . '</p>';
				}

				/* Restore original Post Data 
				* NB: Because we are using new WP_Query we aren't stomping on the 
				* original $wp_query and it does not need to be reset with 
				* wp_reset_query(). We just need to set the post data back up with
				* wp_reset_postdata().
				*/
				wp_reset_postdata();
				//get_template_part('category-evenement');
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
