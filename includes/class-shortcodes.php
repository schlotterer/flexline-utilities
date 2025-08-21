<?php
namespace FlexLine_Utilities;

class Shortcodes {

    public static function init() {
        add_shortcode( 'flexline_copyright_year', array( __CLASS__, 'flexline_copyright_year_shortcode' ) );
        add_shortcode( 'flexline_docs', array( __CLASS__, 'flexline_docs_shortcode' ) );
        add_shortcode( 'flexline_site_name', array( __CLASS__, 'flexline_site_name_shortcode' ) );
        add_shortcode( 'flexline_page_title', array( __CLASS__, 'flexline_page_title_shortcode' ) );
    }

    /**
     * Generates a shortcode for displaying the current year or a range from a specific starting year to the current year.
     *
     * @param array $atts {
     *     Optional. An array of attributes to customize the output.
     *
     *     @type string $starting_year The year from which to start the range. If not specified, only the current year will be displayed.
     *     @type string $separator The character or string to separate the starting year and the current year. Default is ' - '.
     * }
     *
     * @return string The formatted copyright year text. If the starting year is specified and differs from the current year,
     *                it returns a range (e.g., "2015 - 2021"). If the starting year is the current year or not provided, it returns just the current year.
     *
     * @usage To display just the current year: [flexline_copyright_year]
     *        To display a range from a specific year to the current year: [flexline_copyright_year starting_year="2015"]
     *        To customize the separator in the range: [flexline_copyright_year starting_year="2010" separator=" to "]
     */
    public static function flexline_copyright_year_shortcode( $atts ) {
        // Setup defaults.
        $args = shortcode_atts(
            array(
                'starting_year' => '',
                'separator'     => ' - ',
            ),
            $atts
        );
    
        $current_year = gmdate( 'Y' );
    
        // Return current year if starting year is empty.
        if ( ! $args['starting_year'] ) {
            return $current_year;
        }
    
        return esc_html( $args['starting_year'] . $args['separator'] . $current_year );
    }

    /**
     * Shortcode to display the main phone number with optional custom link and text.
     *
     * @param array $atts Shortcode attributes - 'link' for custom URL, 'text' for custom link text.
     * @return string HTML content for the phone number link.
     */
    public static function flexline_doc_shortcode( ) {
        $flexline_docs = '';

        return $flexline_docs;
    }

    /**
     * Shortcode to display the site name.
     *
     * @return string The formatted site name.
     * @usage [flexline_site_name] this is for use primarily in starter content.
     */
    public static function flexline_site_name_shortcode() {
        // Start output buffering.
        ob_start();
        // Get the site name.
        $site_name = get_bloginfo( 'name' ) ? esc_html( get_bloginfo( 'name' ) ): 'flexline';
        // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        echo  $site_name; // Escaped earlier.
        // Return the buffered content.
        return ob_get_clean();
    }

    /**
     * Shortcode to display the page title.
     *
     * @return string The formatted page title.
     * @usage [flexline_page_title] this is for use primarily in starter content.
     */
    public static function flexline_page_title_shortcode() {
        // Get the page title.
        $page_title = get_the_title();

        // Start output buffering.
        ob_start();
        // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        echo  $page_title; // Escaped earlier.
        // Return the buffered content.
        return ob_get_clean();
    }
    
}