<?php
/**
 * Helpers Functions
 *
 * @package Magazine_O
 */
 if( !function_exists( 'magazine_o_google_fonts' ) ) :

 	/**
     * Returns Font's URL.
     *
     * @since 1.0.0
     * @return string Fonts URL.
     */
    function magazine_o_google_fonts()
    {

        $fonts_url = '';
        $fonts = array();
        $subsets = 'latin,latin-ext';
        
	
	/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Chivo font: on or off', 'magazine-o')) {
            $fonts[] = 'Chivo:400,400i,700,700i';
        }

	
        /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Josefin Sans font: on or off', 'magazine-o')) {
            $fonts[] = 'Josefin+Sans:400,400i,700,700i';
        }

        /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Poppins font: on or off', 'magazine-o')) {
            $fonts[] = 'Poppins:300,300i,400,400i,600,600i,700,700i,800,800i';
        }

        if ($fonts) {
            $fonts_url = add_query_arg(array(
                'family' => urldecode(implode('|', $fonts)),
                'subset' => urldecode($subsets),
            ), 'https://fonts.googleapis.com/css');
        }
        return $fonts_url;
    }

 endif;

 