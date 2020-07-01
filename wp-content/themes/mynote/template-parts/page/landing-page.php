<?php
/**
 * Template Name: Landing page
 *
 * @author Terry Lin
 * @link https://terryl.in/
 *
 * @package WordPress
 * @subpackage Mynote
 * @since 1.0.0.7
 * @version 1.0.7.7
 */

$custom_header_css = '';
$intro_style = '';
if ( has_post_thumbnail() ) {
    $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
	$intro_style = ' bg-cover" style="background-image: url(' . esc_url( $backgroundImg[0] ) . ')"';
	$custom_header_css = 'has-custom-header';
}

?>

<div class="data-schema">
	<main role="main" class="main-header <?php echo $custom_header_css; ?>">
		<div class="section-intro d-flex align-items-center<?php echo $intro_style; ?>">
			<div class="container px-responsive">
				<div class="d-md-flex align-items-center">
					<div class="col-12 col-md-7 text-center text-md-left" style="min-height: 100%; overflow: hidden" >
						<h1 class="mb-3"><?php the_title(); ?></h1>
                        <?php if ( has_excerpt() ) : ?> 
						<p class="mb4 desc-text" id="header-desc-text"><?php echo get_the_excerpt(); ?></p>
                        <?php endif; ?>
					</div>
					<?php if ( is_active_sidebar( 'sidebar-5' ) ) : ?>
					<div class="col-12 col-md-5">
						<aside class="home-intro-sidebar">
							<div class="container px-responsive">
								<div class="row my-4">
									<?php dynamic_sidebar( 'sidebar-5' ); ?>
								</div>
							</div>
						</aside>
					</div>
					<?php else : ?>
						<p class="p-5"><?php mynote_category_labels(); ?></p>
					<?php endif; ?>
				</div>
			</div>
			<div class="scroll-area">
				<a href="#main-container"><i class="fas fa-arrow-down"></i></a>
			</div>
		</div>
		<div class="container my-4">
			<div class="row">
				<section id="main-container" class="col" role="main">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : ?>
					<?php the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'markdown-body' ); ?>>
						<div itemprop="articleBody">
							<?php the_content(); ?>
							<?php
								wp_link_pages(
									array(
										'before' => '<div class="page-links">' . __( 'Pages:', 'mynote' ),
										'after'  => '</div>',
									)
								);
							?>
						</div>
					</article>
					<?php endwhile; ?>
				<?php else : ?>
					<article>
						<h1><?php esc_html_e( 'Sorry, nothing to display.', 'mynote' ); ?></h1>
					</article>
				<?php endif; ?>
				</section>
			</div><!-- .row -->
		</div><!-- .container -->

		<div class="container">
			<div class="row row-layout-choice-home">
				<section id="main-container" class="<?php echo esc_attr( mynote_main_container_css() ); ?>">
					<?php
						if ( get_query_var( 'paged' ) ) {
							$paged = get_query_var( 'paged' );
						} elseif ( get_query_var( 'page' ) ) {
							$paged = get_query_var( 'page' );
						} else {
							$paged = 1;
						}
						$posts_per_page = get_option( 'posts_per_page' );
					
						$args = array( 'post_type' => 'post', 'posts_per_page' => $posts_per_page, 'paged' => $paged );
						$wp_query = new WP_Query( $args );
					?>
					<?php get_template_part( 'loop' ); ?>
					<?php get_template_part( 'pagination' ); ?>
				</section>

				<?php if ( mynote_is_sidebar() ) : ?>
				<aside id="aside-container" class="col-lg-4 col-md-4 col-sm-12" role="complementary">
					<?php get_sidebar( 'home' ); ?>
				</aside>
				<?php endif; ?>
			</div>
		</div>
	</main>

    <br class="clearfix" />

</div><!-- .data-schema -->
