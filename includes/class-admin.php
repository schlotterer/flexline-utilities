<?php
namespace FlexLine_Utilities;

class Admin {
    public static function init() {
        // Hook admin menu.
        add_action('admin_menu', array(__CLASS__, 'add_admin_menu'));
    }

    public static function add_admin_menu() {
        add_theme_page(
            'FlexLine Utilities',
            'FlexLine Utilities',
            'manage_options',
            'flexline_utilities',
            array(__CLASS__, 'render_page')
        );
        
    }


    public static function render_page() {
        ?>
        <div class="wrap">
            <h1>FlexLine Utilities</h1>
            <h2>Shortcodes</h2>
            <?php
            $shortcodes = array(
                array(
                    'title'       => 'Copyright Year',
                    'description' => 'Displays the current year or a range from a starting year to the current year.',
                    'attributes'  => 'starting_year, separator',
                    'usage'       => array(
                        '[flexline_copyright_year starting_year="2015"]',
                        '[flexline_copyright_year]'
                    ),
                ),
                array(
                    'title'       => 'Theme Documentation',
                    'description' => 'Renders the FlexLine theme documentation tab.',
                    'attributes'  => '&mdash;',
                    'usage'       => '[flexline_theme_docs]',
                ),
                array(
                    'title'       => 'Site Name',
                    'description' => 'Outputs the site name.',
                    'attributes'  => '&mdash;',
                    'usage'       => '[flexline_site_name]',
                ),
                array(
                    'title'       => 'Page Title',
                    'description' => 'Outputs the current page title.',
                    'attributes'  => '&mdash;',
                    'usage'       => '[flexline_page_title]',
                ),
            );
            ?>
            <table class="widefat fixed striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Attributes</th>
                        <th>Usage</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ( $shortcodes as $shortcode ) : ?>
                    <tr>
                        <td><?php echo esc_html( $shortcode['title'] ); ?></td>
                        <td><?php echo esc_html( $shortcode['description'] ); ?></td>
                        <td><?php echo esc_html( $shortcode['attributes'] ); ?></td>
                        <td><code><?php
                            $usage = $shortcode['usage'];
                            if ( is_array( $usage ) ) {
                                $usage = implode( ', ', $usage );
                            }
                            echo esc_html( $usage );
                        ?></code></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php
    }
}

