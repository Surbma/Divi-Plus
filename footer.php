<?php
if ( et_theme_builder_overrides_layout( ET_THEME_BUILDER_HEADER_LAYOUT_POST_TYPE ) || et_theme_builder_overrides_layout( ET_THEME_BUILDER_FOOTER_LAYOUT_POST_TYPE ) ) {
    // Skip rendering anything as this partial is being buffered anyway.
    // In addition, avoids get_sidebar() issues since that uses
    // locate_template() with require_once.
    return;
}

/**
 * Fires after the main content, before the footer is output.
 *
 * @since 3.10
 */
do_action( 'et_after_main_content' );

if ( 'on' === et_get_option( 'divi_back_to_top', 'false' ) ) : ?>

	<span class="et_pb_scroll_top et-pb-icon"></span>

<?php endif;

if ( ! is_page_template( 'page-template-blank.php' ) ) : ?>

			<footer id="main-footer">
				<?php get_sidebar( 'footer' ); ?>


		<?php
			if ( has_nav_menu( 'footer-menu' ) ) : ?>

				<div id="et-footer-nav">
					<div class="container">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'footer-menu',
								'depth'          => '1',
								'menu_class'     => 'bottom-nav',
								'container'      => '',
								'fallback_cb'    => '',
							) );
						?>
					</div>
				</div> <!-- #et-footer-nav -->

			<?php endif; ?>

				<div id="footer-bottom">
					<div class="container clearfix">
				<?php
					if ( false !== et_get_option( 'show_footer_social_icons', true ) ) {
						get_template_part( 'includes/social_icons', 'footer' );
					}

					$options = get_option( 'pwp_control_option' );
					$divi_plus_footer_credits = '';
					if ( $options['backlink'] != '1' && defined( 'DIVI_PLUS_FOOTER_CREDS' ) ) $divi_plus_footer_credits = DIVI_PLUS_FOOTER_CREDS;

					$divi_plus_default_footer_credits = '<a href="' . get_bloginfo( 'url' ) . '" title="' . get_bloginfo( 'name' ) . ' - ' . get_bloginfo( 'description' ) . '">' . get_bloginfo( 'name' ) . '</a>';

					$disable_custom_credits = et_get_option( 'disable_custom_footer_credits', false );

					$divi_footer_credits = et_get_option( 'custom_footer_credits', '' );

					$credits_format = '<div id="footer-info">%1$s</div>';

					if ( $disable_custom_credits ) {
						$footer_credits = $divi_plus_footer_credits;
					}
					elseif ( '' === trim( $divi_footer_credits ) ) {
						$footer_credits = $divi_plus_default_footer_credits . $divi_plus_footer_credits;
					}
					else {
						$footer_credits = $divi_footer_credits . $divi_plus_footer_credits;
					}

					$final_footer_credits = et_get_safe_localization( sprintf( $credits_format, $footer_credits ) );
					echo $final_footer_credits;
				?>
					</div>	<!-- .container -->
				</div>
			</footer> <!-- #main-footer -->
		</div> <!-- #et-main-area -->

<?php endif; // ! is_page_template( 'page-template-blank.php' ) ?>

	</div> <!-- #page-container -->

	<?php wp_footer(); ?>
</body>
</html>
