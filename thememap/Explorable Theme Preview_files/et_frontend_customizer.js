(function($){
	$(document).ready( function(){
		var customizer_prefix = 'et_customizer_',
			$customizer_style = $( '<style id="et_frontend_customizer"></style>' ).appendTo( 'head' ),
			et_customizer_color_scheme_prefix = 'et_color_scheme_',
			et_customizer_active_color_scheme = 'none',
			$main_customizer = $( '#customize-theme-controls' ),
			$color_schemes_select = $( '#et_customizer_color_schemes' ),
			$header_font_select = $( 'select#et_customizer_header_font' ),
			$body_font_select = $( 'select#et_customizer_body_font' );

		$('.color-picker-hex').wpColorPicker( {
			change: function(event, ui) {
				var $target 	= $( event.target ),
					target_id	= $target.attr( 'id' ).replace( customizer_prefix, '' ),
					to			= ui.color.toString();

				et_customizer_change_option( target_id, to );
			}
		} );

		// Close all open color picker boxes, when new one opens
		$( '.wp-color-result' ).click( function() {
			var $this_button = $(this).addClass( 'et_active_color_picker' ),
				$wp_picker_open = $( '.wp-picker-open' ).not( '.et_active_color_picker' );

			// Trigger a click on open color picker boxes to close them
			if ( $wp_picker_open.length )
				$wp_picker_open.click();

			$this_button.removeClass( 'et_active_color_picker' );
		} );

		$color_schemes_select.change( function() {
			var $this_option = $(this),
				color_scheme = $this_option.find('option:selected').val(),
				$body = $( 'body' ),
				body_classes = $body.attr( 'class' ),
				body_class;

			et_customizer_active_color_scheme = color_scheme;

			if ( color_scheme !== 'none' ) {
				et_set_initial_values( 'defaults' );
				$customizer_style.html( '' );
			}

			if ( 'default' === et_frontend_info.color_schemes ) {
				body_class = body_classes.replace( /et_color_scheme_[^\s]+/, '' );
				$body.attr( 'class', $.trim( body_class ) );

				if ( 'none' !== color_scheme  )
					$body.addClass( et_customizer_color_scheme_prefix + color_scheme );
			}

			if ( Modernizr.sessionstorage )
				sessionStorage.setItem( et_frontend_info.theme + '_' + $this_option.attr('id').replace( 'et_customizer_', '' ), color_scheme );
		} );

		$body_font_select.et_google_fonts();

		$header_font_select.et_google_fonts( {
			apply_font_to 	: et_frontend_info.heading_elements,
			used_for		: 'et_heading_font'
		} );

		$( '.et_google_font_main_select' ).change( function() {
			var $this_option = $(this);

			if ( Modernizr.sessionstorage )
				sessionStorage.setItem( et_frontend_info.theme + '_' + $this_option.attr('id').replace( 'et_customizer_', '' ), $this_option.val() );
		} );

		$main_customizer.find( '.control-section > h3' ).click( function() {
			var $this_element = $( this ),
				$options = $this_element.siblings( '.customize-section-content' ).addClass( 'et-heading-active' ),
				$active_sections = $( '.customize-section-content:visible' ).not( '.et-heading-active' );

			$this_element.toggleClass( 'et-customizer-open' ).closest( '.customize-section' ).toggleClass( 'open' );

			$active_sections.hide().siblings( 'h3' ).removeClass( 'et-customizer-open' ).closest( '.customize-section' ).removeClass( 'open' );

			if ( $options.is( ':visible' ) )
				$options.hide();
			else
				$options.show();

			$options.removeClass( 'et-heading-active' );
		} );

		$( '#et-customizer-toggle-button' ).click( function() {
			$( 'body' ).toggleClass( 'et-customizer-open' );
		} );

		$( '#et-customizer-reset-all' ).click( function() {
			et_set_initial_values( 'defaults' );
			$customizer_style.html( '' );
			$color_schemes_select.val( 'none' ).trigger( 'change' );
			$header_font_select.val( 'none' ).trigger( 'change' );
			$body_font_select.val( 'none' ).trigger( 'change' );
		} );

		if ( Modernizr.sessionstorage )
			et_set_initial_values( 'session' );

		function et_customizer_change_option( target_id, to ) {
			var $customizer_html = $customizer_style.html(),
				option_css = '',
				replace_regex = '',
				active_color_scheme = '',
				regex;

			if ( typeof et_frontend_customizer_change_color !== 'function' ) return;

			if ( et_customizer_active_color_scheme !== 'none' )
				active_color_scheme = '.' + et_customizer_color_scheme_prefix + et_customizer_active_color_scheme + ' ';

			option_css = et_frontend_customizer_change_color( target_id, active_color_scheme, to );

			// remove css for customizer element, if it's set already
			regex = new RegExp( to, "g" );
			replace_regex = option_css.replace( regex, '#[^;]+' );

			regex = new RegExp( replace_regex, "g" );
			$customizer_html = $customizer_html.replace( regex, '' );

			$customizer_style.html( $customizer_html + option_css );

			if ( Modernizr.sessionstorage )
				sessionStorage.setItem( et_frontend_info.theme + '_' + target_id, to );
		}

		function et_set_initial_values( mode ) {
			for ( var key in et_frontend_options ) {
				var settings 	= et_frontend_options[key],
					option_name = '#' + customizer_prefix + key,
					$current_option = $( option_name ),
					option_css	= '',
					default_color,
					saved_option;

				switch ( mode ) {
					case 'session' :
						saved_option = sessionStorage.getItem( et_frontend_info.theme + '_' + key );

						if ( saved_option ) {
							if ( $current_option.is('#et_customizer_color_schemes')
								 || $current_option.is( '#et_customizer_header_font' )
								 || $current_option.is( '#et_customizer_body_font' )
							)
								$current_option.val( saved_option ).trigger( 'change' );
							else
								$current_option.iris( 'option', 'color', saved_option );
						}
						break;
					case 'defaults' :
						if ( ! $current_option.hasClass( 'color-picker-hex' ) ) continue;

						default_color = $current_option.wpColorPicker('defaultColor');
						$current_option.iris( 'option', 'color', default_color );
						break;
				}
			}
		}
	} );
})(jQuery)