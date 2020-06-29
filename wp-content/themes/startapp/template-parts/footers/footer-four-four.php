<?php
/**
 * Template part for displaying the "4 + 4 Columns" footer
 *
 * @author 8guild
 */

if ( startapp_is_active_sidebars( array(
	'footer-column-1',
	'footer-column-2',
	'footer-column-3',
	'footer-column-4',
) ) ) :
	?>
	<div class="footer-row">
		<div class="<?php startapp_footer_fullwidth_class(); ?>">
			<div class="row">

				<?php if ( is_active_sidebar( 'footer-column-1' ) ) : ?>
					<div class="col-md-3 col-sm-6">
						<?php dynamic_sidebar( 'footer-column-1' ); ?>
					</div>
				<?php endif; ?>

				<?php if ( is_active_sidebar( 'footer-column-2' ) ) : ?>
					<div class="col-md-3 col-sm-6">
						<?php dynamic_sidebar( 'footer-column-2' ); ?>
					</div>
				<?php endif; ?>

				<div class="clearfix visible-sm"></div>

				<?php if ( is_active_sidebar( 'footer-column-3' ) ) : ?>
					<div class="col-md-3 col-sm-6">
						<?php dynamic_sidebar( 'footer-column-3' ); ?>
					</div>
				<?php endif; ?>

				<?php if ( is_active_sidebar( 'footer-column-4' ) ) : ?>
					<div class="col-md-3 col-sm-6">
						<?php dynamic_sidebar( 'footer-column-4' ); ?>
					</div>
				<?php endif; ?>

			</div>
		</div>
	</div>
	<?php
endif;

if ( startapp_is_active_sidebars( array(
	'footer-column-5',
	'footer-column-6',
	'footer-column-7',
	'footer-column-8',
) ) ) :
	?>
	<div class="footer-row second-row">
		<div class="<?php startapp_footer_fullwidth_class(); ?>">
			<div class="row">

				<?php if ( is_active_sidebar( 'footer-column-5' ) ) : ?>
					<div class="col-md-3 col-sm-6">
						<?php dynamic_sidebar( 'footer-column-5' ); ?>
					</div>
				<?php endif; ?>

				<?php if ( is_active_sidebar( 'footer-column-6' ) ) : ?>
					<div class="col-md-3 col-sm-6">
						<?php dynamic_sidebar( 'footer-column-6' ); ?>
					</div>
				<?php endif; ?>

				<div class="clearfix visible-sm"></div>

				<?php if ( is_active_sidebar( 'footer-column-7' ) ) : ?>
					<div class="col-md-3 col-sm-6">
						<?php dynamic_sidebar( 'footer-column-7' ); ?>
					</div>
				<?php endif; ?>

				<?php if ( is_active_sidebar( 'footer-column-8' ) ) : ?>
					<div class="col-md-3 col-sm-6">
						<?php dynamic_sidebar( 'footer-column-8' ); ?>
					</div>
				<?php endif; ?>

			</div>
		</div>
	</div>
	<?php
endif;