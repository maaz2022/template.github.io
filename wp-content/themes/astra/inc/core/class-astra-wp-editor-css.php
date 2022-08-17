<?php
/**
 * WordPress Block Editor CSS
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package     Astra
 * @author      Astra
 * @copyright   Copyright (c) 2022, Astra
 * @link        http://wpastra.com/
 * @since       Astra 3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * New modern WP-Block editor experience.
 */
class Astra_WP_Editor_CSS {

	/**
	 * Astra block editor block editor - padding preset CSS.
	 *
	 * @return array Devices specific padding spacings.
	 *
	 * @since 3.8.3
	 */
	public static function astra_get_block_spacings() {
		$wp_block_spacing_type     = astra_get_option( 'wp-blocks-ui' );
		$container_blocks_spacings = astra_get_option( 'wp-blocks-global-padding' );
		switch ( $wp_block_spacing_type ) {
			case 'compact':
				$desktop_top_block_space    = '2em';
				$desktop_right_block_space  = '2em';
				$desktop_bottom_block_space = '2em';
				$desktop_left_block_space   = '2em';
				$tablet_top_block_space     = '2em';
				$tablet_right_block_space   = '2em';
				$tablet_bottom_block_space  = '2em';
				$tablet_left_block_space    = '2em';
				$mobile_top_block_space     = '2em';
				$mobile_right_block_space   = '2em';
				$mobile_bottom_block_space  = '2em';
				$mobile_left_block_space    = '2em';
				break;
			case 'comfort':
				$desktop_top_block_space    = '3em';
				$desktop_right_block_space  = '3em';
				$desktop_bottom_block_space = '3em';
				$desktop_left_block_space   = '3em';
				$tablet_top_block_space     = '3em';
				$tablet_right_block_space   = '2em';
				$tablet_bottom_block_space  = '3em';
				$tablet_left_block_space    = '2em';
				$mobile_top_block_space     = '3em';
				$mobile_right_block_space   = '1.5em';
				$mobile_bottom_block_space  = '3em';
				$mobile_left_block_space    = '1.5em';
				break;
			case 'custom':
				$desktop_top_block_space    = astra_responsive_spacing( $container_blocks_spacings, 'top', 'desktop' );
				$desktop_right_block_space  = astra_responsive_spacing( $container_blocks_spacings, 'right', 'desktop' );
				$desktop_bottom_block_space = astra_responsive_spacing( $container_blocks_spacings, 'bottom', 'desktop' );
				$desktop_left_block_space   = astra_responsive_spacing( $container_blocks_spacings, 'left', 'desktop' );
				$tablet_top_block_space     = astra_responsive_spacing( $container_blocks_spacings, 'top', 'tablet' );
				$tablet_right_block_space   = astra_responsive_spacing( $container_blocks_spacings, 'right', 'tablet' );
				$tablet_bottom_block_space  = astra_responsive_spacing( $container_blocks_spacings, 'bottom', 'tablet' );
				$tablet_left_block_space    = astra_responsive_spacing( $container_blocks_spacings, 'left', 'tablet' );
				$mobile_top_block_space     = astra_responsive_spacing( $container_blocks_spacings, 'top', 'mobile' );
				$mobile_right_block_space   = astra_responsive_spacing( $container_blocks_spacings, 'right', 'mobile' );
				$mobile_bottom_block_space  = astra_responsive_spacing( $container_blocks_spacings, 'bottom', 'mobile' );
				$mobile_left_block_space    = astra_responsive_spacing( $container_blocks_spacings, 'left', 'mobile' );
				break;
			default:
				$desktop_top_block_space    = '';
				$desktop_right_block_space  = '';
				$desktop_bottom_block_space = '';
				$desktop_left_block_space   = '';
				$tablet_top_block_space     = '';
				$tablet_right_block_space   = '';
				$tablet_bottom_block_space  = '';
				$tablet_left_block_space    = '';
				$mobile_top_block_space     = '';
				$mobile_right_block_space   = '';
				$mobile_bottom_block_space  = '';
				$mobile_left_block_space    = '';
				break;
		}
		return array(
			'desktop' => array(
				'top'    => $desktop_top_block_space,
				'right'  => $desktop_right_block_space,
				'bottom' => $desktop_bottom_block_space,
				'left'   => $desktop_left_block_space,
			),
			'tablet'  => array(
				'top'    => $tablet_top_block_space,
				'right'  => $tablet_right_block_space,
				'bottom' => $tablet_bottom_block_space,
				'left'   => $tablet_left_block_space,
			),
			'mobile'  => array(
				'top'    => $mobile_top_block_space,
				'right'  => $mobile_right_block_space,
				'bottom' => $mobile_bottom_block_space,
				'left'   => $mobile_left_block_space,
			),
		);
	}

	/**
	 * Get dynamic CSS  required for the block editor to make editing experience similar to how it looks on frontend.
	 *
	 * @return String CSS to be loaded in the editor interface.
	 */
	public static function get_css() {

		$post_id     = astra_get_post_id();
		$is_site_rtl = is_rtl();
		$ltr_left    = $is_site_rtl ? 'right' : 'left';
		$ltr_right   = $is_site_rtl ? 'left' : 'right';

		$site_content_width          = astra_get_option( 'site-content-width', 1200 );
		$headings_font_family        = astra_get_option( 'headings-font-family' );
		$headings_font_weight        = astra_get_option( 'headings-font-weight' );
		$headings_text_transform     = astra_get_option( 'headings-text-transform' );
		$headings_line_height        = astra_get_option( 'headings-line-height' );
		$single_post_title_font_size = astra_get_option( 'font-size-entry-title' );
		$body_font_family            = astra_body_font_family();
		$para_margin_bottom          = astra_get_option( 'para-margin-bottom', '1.6' );
		$theme_color                 = astra_get_option( 'theme-color' );
		$heading_base_color          = astra_get_option( 'heading-base-color' );

		$highlight_theme_color = astra_get_foreground_color( $theme_color );

		$body_font_weight    = astra_get_option( 'body-font-weight' );
		$body_font_size      = astra_get_option( 'font-size-body' );
		$body_line_height    = astra_get_option( 'body-line-height' );
		$body_text_transform = astra_get_option( 'body-text-transform' );
		$text_color          = astra_get_option( 'text-color' );

		$heading_h1_font_size = astra_get_option( 'font-size-h1' );
		$heading_h2_font_size = astra_get_option( 'font-size-h2' );
		$heading_h3_font_size = astra_get_option( 'font-size-h3' );
		$heading_h4_font_size = astra_get_option( 'font-size-h4' );
		$heading_h5_font_size = astra_get_option( 'font-size-h5' );
		$heading_h6_font_size = astra_get_option( 'font-size-h6' );

		$link_color   = astra_get_option( 'link-color', $theme_color );
		$link_h_color = astra_get_option( 'link-h-color' );

		/**
		 * Button theme compatibility.
		 */
		$btn_color                = astra_get_option( 'button-color' );
		$btn_bg_color             = astra_get_option( 'button-bg-color', '', $theme_color );
		$btn_h_color              = astra_get_option( 'button-h-color' );
		$btn_bg_h_color           = astra_get_option( 'button-bg-h-color', '', $link_h_color );
		$btn_border_radius        = astra_get_option( 'button-radius' );
		$theme_btn_padding        = astra_get_option( 'theme-button-padding' );
		$btn_border_size          = astra_get_option( 'theme-button-border-group-border-size' );
		$btn_border_color         = astra_get_option( 'theme-button-border-group-border-color' );
		$btn_border_h_color       = astra_get_option( 'theme-button-border-group-border-h-color' );
		$theme_btn_font_family    = astra_get_option( 'font-family-button' );
		$theme_btn_font_size      = astra_get_option( 'font-size-button' );
		$theme_btn_font_weight    = astra_get_option( 'font-weight-button' );
		$theme_btn_text_transform = astra_get_option( 'text-transform-button' );
		$theme_btn_line_height    = astra_get_option( 'theme-btn-line-height' );
		$theme_btn_letter_spacing = astra_get_option( 'theme-btn-letter-spacing' );
		$theme_btn_top_border     = ( isset( $btn_border_size['top'] ) && ( '' !== $btn_border_size['top'] && '0' !== $btn_border_size['top'] ) ) ? astra_get_css_value( $btn_border_size['top'], 'px' ) : '';
		$theme_btn_right_border   = ( isset( $btn_border_size['right'] ) && ( '' !== $btn_border_size['right'] && '0' !== $btn_border_size['right'] ) ) ? astra_get_css_value( $btn_border_size['right'], 'px' ) : '';
		$theme_btn_left_border    = ( isset( $btn_border_size['left'] ) && ( '' !== $btn_border_size['left'] && '0' !== $btn_border_size['left'] ) ) ? astra_get_css_value( $btn_border_size['left'], 'px' ) : '';
		$theme_btn_bottom_border  = ( isset( $btn_border_size['bottom'] ) && ( '' !== $btn_border_size['bottom'] && '0' !== $btn_border_size['bottom'] ) ) ? astra_get_css_value( $btn_border_size['bottom'], 'px' ) : '';

		/**
		 * Headings typography.
		 */
		$h1_font_family    = astra_get_option( 'font-family-h1' );
		$h1_font_weight    = astra_get_option( 'font-weight-h1' );
		$h1_line_height    = astra_get_option( 'line-height-h1' );
		$h1_text_transform = astra_get_option( 'text-transform-h1' );

		$h2_font_family    = astra_get_option( 'font-family-h2' );
		$h2_font_weight    = astra_get_option( 'font-weight-h2' );
		$h2_line_height    = astra_get_option( 'line-height-h2' );
		$h2_text_transform = astra_get_option( 'text-transform-h2' );

		$h3_font_family    = astra_get_option( 'font-family-h3' );
		$h3_font_weight    = astra_get_option( 'font-weight-h3' );
		$h3_line_height    = astra_get_option( 'line-height-h3' );
		$h3_text_transform = astra_get_option( 'text-transform-h3' );

		$h4_font_family    = astra_get_option( 'font-family-h4' );
		$h4_font_weight    = astra_get_option( 'font-weight-h4' );
		$h4_line_height    = astra_get_option( 'line-height-h4' );
		$h4_text_transform = astra_get_option( 'text-transform-h4' );

		$h5_font_family    = astra_get_option( 'font-family-h5' );
		$h5_font_weight    = astra_get_option( 'font-weight-h5' );
		$h5_line_height    = astra_get_option( 'line-height-h5' );
		$h5_text_transform = astra_get_option( 'text-transform-h5' );

		$h6_font_family    = astra_get_option( 'font-family-h6' );
		$h6_font_weight    = astra_get_option( 'font-weight-h6' );
		$h6_line_height    = astra_get_option( 'line-height-h6' );
		$h6_text_transform = astra_get_option( 'text-transform-h6' );

		// Fallback for H1 - headings typography.
		if ( 'inherit' === $h1_font_family ) {
			$h1_font_family = $headings_font_family;
		}
		if ( 'inherit' === $h1_font_weight && 'inherit' === $headings_font_weight ) {
			$h1_font_weight = 'normal';
		}
		if ( '' == $h1_text_transform ) {
			$h1_text_transform = $headings_text_transform;
		}
		if ( '' == $h1_line_height ) {
			$h1_line_height = $headings_line_height;
		}

		// Fallback for H2 - headings typography.
		if ( 'inherit' === $h2_font_family ) {
			$h2_font_family = $headings_font_family;
		}
		if ( 'inherit' === $h2_font_weight && 'inherit' === $headings_font_weight ) {
			$h2_font_weight = 'normal';
		}
		if ( '' == $h2_text_transform ) {
			$h2_text_transform = $headings_text_transform;
		}
		if ( '' == $h2_line_height ) {
			$h2_line_height = $headings_line_height;
		}

		// Fallback for H3 - headings typography.
		if ( 'inherit' === $h3_font_family ) {
			$h3_font_family = $headings_font_family;
		}
		if ( 'inherit' === $h3_font_weight && 'inherit' === $headings_font_weight ) {
			$h3_font_weight = 'normal';
		}
		if ( '' == $h3_text_transform ) {
			$h3_text_transform = $headings_text_transform;
		}
		if ( '' == $h3_line_height ) {
			$h3_line_height = $headings_line_height;
		}

		// Fallback for H4 - headings typography.
		if ( 'inherit' === $h4_font_family ) {
			$h4_font_family = $headings_font_family;
		}
		if ( 'inherit' === $h4_font_weight && 'inherit' === $headings_font_weight ) {
			$h4_font_weight = 'normal';
		}
		if ( '' == $h4_text_transform ) {
			$h4_text_transform = $headings_text_transform;
		}
		if ( '' == $h4_line_height ) {
			$h4_line_height = $headings_line_height;
		}

		// Fallback for H5 - headings typography.
		if ( 'inherit' === $h5_font_family ) {
			$h5_font_family = $headings_font_family;
		}
		if ( 'inherit' === $h5_font_weight && 'inherit' === $headings_font_weight ) {
			$h5_font_weight = 'normal';
		}
		if ( '' == $h5_text_transform ) {
			$h5_text_transform = $headings_text_transform;
		}
		if ( '' == $h5_line_height ) {
			$h5_line_height = $headings_line_height;
		}

		// Fallback for H6 - headings typography.
		if ( 'inherit' === $h6_font_family ) {
			$h6_font_family = $headings_font_family;
		}
		if ( 'inherit' === $h6_font_weight && 'inherit' === $headings_font_weight ) {
			$h6_font_weight = 'normal';
		}
		if ( '' == $h6_text_transform ) {
			$h6_text_transform = $headings_text_transform;
		}
		if ( '' == $h6_line_height ) {
			$h6_line_height = $headings_line_height;
		}

		// Fallback for button settings.
		if ( empty( $btn_color ) ) {
			$btn_color = astra_get_foreground_color( $theme_color );
		}
		if ( empty( $btn_h_color ) ) {
			$btn_h_color = astra_get_foreground_color( $link_h_color );
		}

		if ( is_array( $body_font_size ) ) {
			$body_font_size_desktop = ( isset( $body_font_size['desktop'] ) && '' != $body_font_size['desktop'] ) ? $body_font_size['desktop'] : 15;
		} else {
			$body_font_size_desktop = ( '' != $body_font_size ) ? $body_font_size : 15;
		}

		$site_background    = astra_get_option( 'site-layout-outside-bg-obj-responsive' );
		$content_background = astra_get_option( 'content-bg-obj-responsive' );

		$background_style_data = astra_get_responsive_background_obj( $site_background, 'desktop' );
		if (
			empty( $background_style_data ) ||
			(
				( empty( $background_style_data['background-color'] ) || ';' === $background_style_data['background-color'] ) &&
				( empty( $background_style_data['background-image'] ) && 'none;' === $background_style_data['background-image'] )
			)
		) {
			$background_style_data = array(
				'background-color' => '#f5f5f5',
			);
		}

		// check the selection color in-case of empty/no theme color.
		$selection_text_color = ( 'transparent' === $highlight_theme_color ) ? '' : $highlight_theme_color;

		$astra_is_block_editor_v2_ui = astra_get_option( 'wp-blocks-v2-ui', true );
		$astra_container_width       = astra_get_option( 'site-content-width', 1200 ) . 'px';
		$block_appender_width        = $astra_is_block_editor_v2_ui ? 'var(--wp--custom--ast-content-width-size)' : 'var(--wp--custom--ast-wide-width-size)';

		$astra_wide_particular_selector = $astra_is_block_editor_v2_ui ? '.editor-styles-wrapper .block-editor-block-list__layout.is-root-container .block-list-appender' : '.editor-styles-wrapper .block-editor-block-list__layout.is-root-container > p, .editor-styles-wrapper .block-editor-block-list__layout.is-root-container .block-list-appender';

		$blocks_spacings = self::astra_get_block_spacings();

		$desktop_top_spacing    = isset( $blocks_spacings['desktop']['top'] ) ? $blocks_spacings['desktop']['top'] : '';
		$desktop_right_spacing  = isset( $blocks_spacings['desktop']['right'] ) ? $blocks_spacings['desktop']['right'] : '';
		$desktop_bottom_spacing = isset( $blocks_spacings['desktop']['bottom'] ) ? $blocks_spacings['desktop']['bottom'] : '';
		$desktop_left_spacing   = isset( $blocks_spacings['desktop']['left'] ) ? $blocks_spacings['desktop']['left'] : '';
		$tablet_top_spacing     = isset( $blocks_spacings['tablet']['top'] ) ? $blocks_spacings['tablet']['top'] : '';
		$tablet_right_spacing   = isset( $blocks_spacings['tablet']['right'] ) ? $blocks_spacings['tablet']['right'] : '';
		$tablet_bottom_spacing  = isset( $blocks_spacings['tablet']['bottom'] ) ? $blocks_spacings['tablet']['bottom'] : '';
		$tablet_left_spacing    = isset( $blocks_spacings['tablet']['left'] ) ? $blocks_spacings['tablet']['left'] : '';
		$mobile_top_spacing     = isset( $blocks_spacings['mobile']['top'] ) ? $blocks_spacings['mobile']['top'] : '';
		$mobile_right_spacing   = isset( $blocks_spacings['mobile']['right'] ) ? $blocks_spacings['mobile']['right'] : '';
		$mobile_bottom_spacing  = isset( $blocks_spacings['mobile']['bottom'] ) ? $blocks_spacings['mobile']['bottom'] : '';
		$mobile_left_spacing    = isset( $blocks_spacings['mobile']['left'] ) ? $blocks_spacings['mobile']['left'] : '';

		$ast_content_width = apply_filters( 'astra_block_content_width', $astra_is_block_editor_v2_ui ? $astra_container_width : '910px' );
		$ast_wide_width    = apply_filters( 'astra_block_wide_width', $astra_is_block_editor_v2_ui ? 'calc(' . esc_attr( $astra_container_width ) . ' + var(--wp--custom--ast-default-block-left-padding) + var(--wp--custom--ast-default-block-right-padding))' : $astra_container_width );

		$css = ':root, body .editor-styles-wrapper {
			--wp--custom--ast-default-block-top-padding: ' . $desktop_top_spacing . ';
			--wp--custom--ast-default-block-right-padding: ' . $desktop_right_spacing . ';
			--wp--custom--ast-default-block-bottom-padding: ' . $desktop_bottom_spacing . ';
			--wp--custom--ast-default-block-left-padding: ' . $desktop_left_spacing . ';
			--wp--custom--ast-content-width-size: ' . $ast_content_width . ';
			--wp--custom--ast-wide-width-size: ' . $ast_wide_width . ';
		}';

		// Overriding the previous CSS vars in customizer because there is block editor in customizer widget, where if any container block is used in sidebar widgets then as customizer widget editor is already small (left panel) the blocks does not looks good.
		if ( is_customize_preview() ) {
			$css = '';
		}

		/** @psalm-suppress InvalidScalarArgument */ // phpcs:ignore Generic.Commenting.DocComment.MissingShort
		$html_font_size = astra_get_font_css_value( (int) $body_font_size_desktop * 6.25, '%' );
		/** @psalm-suppress InvalidScalarArgument */ // phpcs:ignore Generic.Commenting.DocComment.MissingShort

		$desktop_css = array(
			':root'                            => Astra_Global_Palette::generate_global_palette_style(),
			'html'                             => array(
				'font-size' => $html_font_size,
			),
			$astra_wide_particular_selector    => array(
				'max-width' => esc_attr( $block_appender_width ),
				'margin'    => '0 auto',
			),
			'.editor-styles-wrapper a'         => array(
				'color' => esc_attr( $link_color ),
			),
			'.block-editor-block-list__block'  => array(
				'color' => esc_attr( $text_color ),
			),
			'.block-editor-block-list__layout.is-root-container > .wp-block-group, .block-editor-block-list__layout.is-root-container > [data-align="wide"] > .wp-block-group, .block-editor-block-list__layout.is-root-container > [data-align="full"] > .wp-block-group, .block-editor-block-list__layout.is-root-container > .wp-block-cover, .block-editor-block-list__layout.is-root-container > [data-align="wide"] > .wp-block-cover, .block-editor-block-list__layout.is-root-container > [data-align="full"] > .wp-block-cover, .block-editor-block-list__layout.is-root-container > .wp-block-columns, .block-editor-block-list__layout.is-root-container > [data-align="wide"] > .wp-block-columns, .block-editor-block-list__layout.is-root-container > [data-align="full"] > .wp-block-columns' => array(
				'padding-top'    => 'var(--wp--custom--ast-default-block-top-padding)',
				'padding-right'  => 'var(--wp--custom--ast-default-block-right-padding)',
				'padding-bottom' => 'var(--wp--custom--ast-default-block-bottom-padding)',
				'padding-left'   => 'var(--wp--custom--ast-default-block-left-padding)',
			),
			// Global selection CSS.
			'.block-editor-block-list__layout .block-editor-block-list__block ::selection,.block-editor-block-list__layout .block-editor-block-list__block.is-multi-selected .editor-block-list__block-edit:before' => array(
				'background-color' => esc_attr( $theme_color ),
			),
			'.block-editor-block-list__layout .block-editor-block-list__block ::selection, .block-editor-block-list__layout .block-editor-block-list__block.is-multi-selected .editor-block-list__block-edit' => array(
				'color' => esc_attr( $selection_text_color ),
			),

			'#editor .edit-post-visual-editor' => $background_style_data,
			'.edit-post-visual-editor .editor-styles-wrapper' => astra_get_responsive_background_obj( $content_background, 'desktop' ),

			'.editor-styles-wrapper, #customize-controls .editor-styles-wrapper' => array(
				'font-family'    => astra_get_font_family( $body_font_family ),
				'font-weight'    => esc_attr( $body_font_weight ),
				'font-size'      => astra_responsive_font( $body_font_size, 'desktop' ),
				'line-height'    => esc_attr( $body_line_height ),
				'text-transform' => esc_attr( $body_text_transform ),
			),
			'.editor-styles-wrapper .editor-post-title__input' => array(
				'font-size' => astra_responsive_font( $single_post_title_font_size, 'desktop', '30' ),
			),
			'.editor-styles-wrapper h1, .editor-styles-wrapper h2, .editor-styles-wrapper h3, .editor-styles-wrapper h4, .editor-styles-wrapper h5, .editor-styles-wrapper h6' => array(
				'font-family'    => astra_get_css_value( $headings_font_family, 'font' ),
				'font-weight'    => astra_get_css_value( $headings_font_weight, 'font' ),
				'text-transform' => esc_attr( $headings_text_transform ),
				'line-height'    => esc_attr( $headings_line_height ),
				'color'          => esc_attr( $heading_base_color ),
			),

			// Headings H1 - H6 typography.
			'.editor-styles-wrapper h1'        => array(
				'font-size'      => astra_responsive_font( $heading_h1_font_size, 'desktop' ),
				'font-family'    => astra_get_css_value( $h1_font_family, 'font' ),
				'font-weight'    => astra_get_css_value( $h1_font_weight, 'font' ),
				'line-height'    => esc_attr( $h1_line_height ),
				'text-transform' => esc_attr( $h1_text_transform ),
			),
			'.editor-styles-wrapper h2'        => array(
				'font-size'      => astra_responsive_font( $heading_h2_font_size, 'desktop' ),
				'font-family'    => astra_get_css_value( $h2_font_family, 'font' ),
				'font-weight'    => astra_get_css_value( $h2_font_weight, 'font' ),
				'line-height'    => esc_attr( $h2_line_height ),
				'text-transform' => esc_attr( $h2_text_transform ),
			),
			'.editor-styles-wrapper h3, #customize-controls .editor-styles-wrapper h3' => array(
				'font-size'      => astra_responsive_font( $heading_h3_font_size, 'desktop' ),
				'font-family'    => astra_get_css_value( $h3_font_family, 'font' ),
				'font-weight'    => astra_get_css_value( $h3_font_weight, 'font' ),
				'line-height'    => esc_attr( $h3_line_height ),
				'text-transform' => esc_attr( $h3_text_transform ),
			),
			'.editor-styles-wrapper h4'        => array(
				'font-size'      => astra_responsive_font( $heading_h4_font_size, 'desktop' ),
				'font-family'    => astra_get_css_value( $h4_font_family, 'font' ),
				'font-weight'    => astra_get_css_value( $h4_font_weight, 'font' ),
				'line-height'    => esc_attr( $h4_line_height ),
				'text-transform' => esc_attr( $h4_text_transform ),
			),
			'.editor-styles-wrapper h5'        => array(
				'font-size'      => astra_responsive_font( $heading_h5_font_size, 'desktop' ),
				'font-family'    => astra_get_css_value( $h5_font_family, 'font' ),
				'font-weight'    => astra_get_css_value( $h5_font_weight, 'font' ),
				'line-height'    => esc_attr( $h5_line_height ),
				'text-transform' => esc_attr( $h5_text_transform ),
			),
			'.editor-styles-wrapper h6'        => array(
				'font-size'      => astra_responsive_font( $heading_h6_font_size, 'desktop' ),
				'font-family'    => astra_get_css_value( $h6_font_family, 'font' ),
				'font-weight'    => astra_get_css_value( $h6_font_weight, 'font' ),
				'line-height'    => esc_attr( $h6_line_height ),
				'text-transform' => esc_attr( $h6_text_transform ),
			),
			'.editor-styles-wrapper .block-editor-block-list__layout.is-root-container p' => array(
				'margin-bottom' => astra_get_css_value( $para_margin_bottom, 'em' ),
			),
			'.editor-styles-wrapper .wp-block-quote:not(.has-text-align-right):not(.has-text-align-center)' => array(
				'border-' . esc_attr( $ltr_left ) => '5px solid rgba(0, 0, 0, 0.05)',
			),

			// Gutenberg button compatibility for default styling.
			'.wp-block-button .wp-block-button__link, .block-editor-writing-flow .wp-block-search .wp-block-search__inside-wrapper .wp-block-search__button, .block-editor-writing-flow .wp-block-file .wp-block-file__button' => array(
				'border-style'        => ( $theme_btn_top_border || $theme_btn_right_border || $theme_btn_left_border || $theme_btn_bottom_border ) ? 'solid' : '',
				'border-top-width'    => $theme_btn_top_border,
				'border-right-width'  => $theme_btn_right_border,
				'border-left-width'   => $theme_btn_left_border,
				'border-bottom-width' => $theme_btn_bottom_border,
				'color'               => esc_attr( $btn_color ),
				'border-color'        => empty( $btn_border_color ) ? esc_attr( $btn_bg_color ) : esc_attr( $btn_border_color ),
				'background-color'    => esc_attr( $btn_bg_color ),
				'font-family'         => astra_get_font_family( $theme_btn_font_family ),
				'font-weight'         => esc_attr( $theme_btn_font_weight ),
				'line-height'         => esc_attr( $theme_btn_line_height ),
				'text-transform'      => esc_attr( $theme_btn_text_transform ),
				'letter-spacing'      => astra_get_css_value( $theme_btn_letter_spacing, 'px' ),
				'font-size'           => astra_responsive_font( $theme_btn_font_size, 'desktop' ),
				'border-radius'       => astra_get_css_value( $btn_border_radius, 'px' ),
				'padding-top'         => astra_responsive_spacing( $theme_btn_padding, 'top', 'desktop' ),
				'padding-right'       => astra_responsive_spacing( $theme_btn_padding, 'right', 'desktop' ),
				'padding-bottom'      => astra_responsive_spacing( $theme_btn_padding, 'bottom', 'desktop' ),
				'padding-left'        => astra_responsive_spacing( $theme_btn_padding, 'left', 'desktop' ),
			),
			'.wp-block-button .wp-block-button__link:hover, .wp-block-button .wp-block-button__link:focus, .block-editor-writing-flow .wp-block-search .wp-block-search__inside-wrapper .wp-block-search__button:hover, .block-editor-writing-flow .wp-block-search .wp-block-search__inside-wrapper .wp-block-search__button:focus, .block-editor-writing-flow .wp-block-file .wp-block-file__button:hover, .block-editor-writing-flow .wp-block-file .wp-block-file__button:focus' => array(
				'color'            => esc_attr( $btn_h_color ),
				'background-color' => esc_attr( $btn_bg_h_color ),
				'border-color'     => empty( $btn_border_h_color ) ? esc_attr( $btn_bg_h_color ) : esc_attr( $btn_border_h_color ),
			),
		);

		$content_links_underline = astra_get_option( 'underline-content-links' );

		if ( $content_links_underline ) {
			$desktop_css['.edit-post-visual-editor a'] = array(
				'text-decoration' => 'underline',
			);

			$reset_underline_from_anchors = Astra_Dynamic_CSS::unset_builder_elements_underline();

			$excluding_anchor_selectors = $reset_underline_from_anchors ? '.edit-post-visual-editor a.uagb-tabs-list, .edit-post-visual-editor .uagb-ifb-cta a, .edit-post-visual-editor a.uagb-marketing-btn__link, .edit-post-visual-editor .uagb-post-grid a, .edit-post-visual-editor .uagb-toc__wrap a, .edit-post-visual-editor .uagb-taxomony-box a, .edit-post-visual-editor .uagb_review_block a' : '';

			$desktop_css[ $excluding_anchor_selectors ] = array(
				'text-decoration' => 'none',
			);
		}

		if ( $astra_is_block_editor_v2_ui ) {
			$single_post_continer_spacing = astra_get_option( 'single-post-inside-spacing' );
			$astra_continer_left_spacing  = defined( 'ASTRA_EXT_VER' ) && astra_responsive_spacing( $single_post_continer_spacing, 'left', 'desktop' ) ? astra_responsive_spacing( $single_post_continer_spacing, 'left', 'desktop' ) : '6.67em';
			$astra_continer_right_spacing = defined( 'ASTRA_EXT_VER' ) && astra_responsive_spacing( $single_post_continer_spacing, 'right', 'desktop', '6.67' ) ? astra_responsive_spacing( $single_post_continer_spacing, 'right', 'desktop', '6.67' ) : '6.67em';

			$alignwide_left_negative_margin  = $astra_continer_left_spacing ? 'calc(-1 * min(' . $astra_continer_left_spacing . ', 40px))' : '-40px';
			$alignwide_right_negative_margin = $astra_continer_right_spacing ? 'calc(-1 * min(' . $astra_continer_right_spacing . ', 40px))' : '-40px';

			$desktop_css['.editor-styles-wrapper .wp-block-latest-posts > li > a'] = array(
				'text-decoration' => 'none',
				'font-size'       => '1.25rem',
			);
			$desktop_css['.ast-separate-container .editor-styles-wrapper .block-editor-block-list__layout.is-root-container .alignwide, .ast-plain-container .editor-styles-wrapper .block-editor-block-list__layout.is-root-container .alignwide'] = array(
				'margin-left'  => $alignwide_left_negative_margin,
				'margin-right' => $alignwide_right_negative_margin,
			);
			$desktop_css['.ast-separate-container .editor-styles-wrapper .block-editor-block-list__layout.is-root-container .alignfull'] = array(
				'margin-left'  => $astra_continer_left_spacing,
				'margin-right' => $astra_continer_right_spacing,
			);
			$desktop_css['.ast-page-builder-template .editor-styles-wrapper .block-editor-block-list__layout.is-root-container > *.wp-block, .ast-page-builder-template .is-root-container > .alignfull > :where(:not(.alignleft):not(.alignright)), .editor-styles-wrapper .is-root-container > .wp-block-cover.alignfull .wp-block-cover__image-background'] = array(
				'max-width' => 'none',
			);
			$desktop_css['.ast-page-builder-template .is-root-container > .alignwide > :where(:not(.alignleft):not(.alignright)), .editor-styles-wrapper .is-root-container > .wp-block-cover.alignwide .wp-block-cover__image-background'] = array(
				'max-width' => 'var(--wp--custom--ast-wide-width-size)',
			);

			$desktop_css['.ast-page-builder-template .is-root-container > .inherit-container-width > *, .ast-page-builder-template .is-root-container > * > :where(:not(.alignleft):not(.alignright)), .is-root-container .wp-block-cover .wp-block-cover__inner-container, .editor-styles-wrapper .is-root-container > .wp-block-cover .wp-block-cover__inner-container,
			.is-root-container > .wp-block-cover .wp-block-cover__image-background'] = array(
				'max-width'    => 'var(--wp--custom--ast-content-width-size)', // phpcs:ignore WordPress.Arrays.ArrayIndentation.ItemNotAligned
				'margin-right' => 'auto', // phpcs:ignore WordPress.Arrays.ArrayIndentation.ItemNotAligned
				'margin-left'  => 'auto', // phpcs:ignore WordPress.Arrays.ArrayIndentation.ItemNotAligned
			); // phpcs:ignore WordPress.Arrays.ArrayIndentation.CloseBraceNotAligned
		} else {
			$desktop_css['.editor-styles-wrapper .wp-block-latest-posts > li > a'] = array(
				'text-decoration' => 'none',
				'color'           => esc_attr( $heading_base_color ),
			);
		}

		$tablet_css = array(
			':root, body .editor-styles-wrapper' => array(
				'--wp--custom--ast-default-block-top-padding' => $tablet_top_spacing,
				'--wp--custom--ast-default-block-right-padding' => $tablet_right_spacing,
				'--wp--custom--ast-default-block-bottom-padding' => $tablet_bottom_spacing,
				'--wp--custom--ast-default-block-left-padding' => $tablet_left_spacing,
			),
			'.editor-styles-wrapper .editor-post-title__input' => array(
				'font-size' => astra_responsive_font( $single_post_title_font_size, 'tablet', '30' ),
			),
			// Heading H1 - H6 font size.
			'.editor-styles-wrapper h1'          => array(
				'font-size' => astra_responsive_font( $heading_h1_font_size, 'tablet', '30' ),
			),
			'.editor-styles-wrapper h2'          => array(
				'font-size' => astra_responsive_font( $heading_h2_font_size, 'tablet', '25' ),
			),
			'.editor-styles-wrapper h3'          => array(
				'font-size' => astra_responsive_font( $heading_h3_font_size, 'tablet', '20' ),
			),
			'.editor-styles-wrapper h4'          => array(
				'font-size' => astra_responsive_font( $heading_h4_font_size, 'tablet' ),
			),
			'.editor-styles-wrapper h5'          => array(
				'font-size' => astra_responsive_font( $heading_h5_font_size, 'tablet' ),
			),
			'.editor-styles-wrapper h6'          => array(
				'font-size' => astra_responsive_font( $heading_h6_font_size, 'tablet' ),
			),
			'#editor .edit-post-visual-editor'   => astra_get_responsive_background_obj( $site_background, 'tablet' ),
			'.edit-post-visual-editor .editor-styles-wrapper' => astra_get_responsive_background_obj( $content_background, 'tablet' ),
		);

		$mobile_css = array(
			':root, body .editor-styles-wrapper' => array(
				'--wp--custom--ast-default-block-top-padding' => $mobile_top_spacing,
				'--wp--custom--ast-default-block-right-padding' => $mobile_right_spacing,
				'--wp--custom--ast-default-block-bottom-padding' => $mobile_bottom_spacing,
				'--wp--custom--ast-default-block-left-padding' => $mobile_left_spacing,
			),
			'.editor-styles-wrapper .editor-post-title__input' => array(
				'font-size' => astra_responsive_font( $single_post_title_font_size, 'mobile', '30' ),
			),
			// Heading H1 - H6 font size.
			'.editor-styles-wrapper h1'          => array(
				'font-size' => astra_responsive_font( $heading_h1_font_size, 'mobile', '30' ),
			),
			'.editor-styles-wrapper h2'          => array(
				'font-size' => astra_responsive_font( $heading_h2_font_size, 'mobile', '25' ),
			),
			'.editor-styles-wrapper h3'          => array(
				'font-size' => astra_responsive_font( $heading_h3_font_size, 'mobile', '20' ),
			),
			'.editor-styles-wrapper h4'          => array(
				'font-size' => astra_responsive_font( $heading_h4_font_size, 'mobile' ),
			),
			'.editor-styles-wrapper h5'          => array(
				'font-size' => astra_responsive_font( $heading_h5_font_size, 'mobile' ),
			),
			'.editor-styles-wrapper h6'          => array(
				'font-size' => astra_responsive_font( $heading_h6_font_size, 'mobile' ),
			),
			'#editor .edit-post-visual-editor'   => astra_get_responsive_background_obj( $site_background, 'mobile' ),
			'.edit-post-visual-editor .editor-styles-wrapper' => astra_get_responsive_background_obj( $content_background, 'mobile' ),
		);

		$css .= astra_parse_css( $desktop_css );
		/** @psalm-suppress InvalidArgument */ // phpcs:ignore Generic.Commenting.DocComment.MissingShort
		$css .= astra_parse_css( $tablet_css, '', astra_get_tablet_breakpoint() );
		/** @psalm-suppress InvalidArgument */ // phpcs:ignore Generic.Commenting.DocComment.MissingShort
		$css .= astra_parse_css( $mobile_css, '', astra_get_mobile_breakpoint() );
		/** @psalm-suppress InvalidArgument */ // phpcs:ignore Generic.Commenting.DocComment.MissingShort

		return $css;
	}
}
