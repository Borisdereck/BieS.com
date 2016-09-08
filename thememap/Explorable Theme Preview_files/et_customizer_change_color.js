function et_frontend_customizer_change_color( target_id, active_color_scheme, to ) {
	var option_css = '';

	switch ( target_id ){
		case 'link_color' :
			option_css = active_color_scheme + 'a { color: ' + to + '; }';
			break;
		case 'font_color' :
			option_css = 'body' + active_color_scheme + ' { color: ' + to + '; }';
			break;
		case 'headings_color' :
			option_css = active_color_scheme + 'h1, ' + active_color_scheme + 'h2, ' + active_color_scheme + 'h3, ' + active_color_scheme + 'h4, ' + active_color_scheme + 'h5, ' + active_color_scheme + 'h6, ' + active_color_scheme + '.widget h4.widgettitle, ' + active_color_scheme + '.entry h2.title a, ' + active_color_scheme + 'h1.title, ' + active_color_scheme + '#comments, ' + active_color_scheme + '#reply-title { color: ' + to + '; }';
			break;
		case 'menu_link_color' :
			option_css = active_color_scheme + '#top-navigation a { color: ' + to + '; }';
			break;
		case 'active_color' :
			option_css = active_color_scheme + '#top-navigation li.current-menu-item > a, ' + active_color_scheme + '.et_mobile_menu li.current-menu-item > a { color: ' + to + '; }';
			break;
		case 'top_menu_bar' :
			option_css = active_color_scheme + '.nav li ul, ' + active_color_scheme + '.et_mobile_menu, ' + active_color_scheme + '#main-header { background-color: ' + to + '; }';
			option_css += active_color_scheme + '#top-navigation > nav > ul > li.current-menu-item > a:before, ' + active_color_scheme + '.mobile_nav:before { border-top-color: ' + to + '; }';
			break;
	}

	return option_css;
}