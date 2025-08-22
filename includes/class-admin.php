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
                    'tag'         => 'flexline_copyright_year',
                    'usage'       => '[flexline_copyright_year starting_year="2015"]',
                    'description' => 'Displays the current year or a range from a starting year to the current year.',
                    'attributes'  => 'starting_year, separator',
                ),
                array(
                    'tag'         => 'flexline_theme_docs',
                    'usage'       => '[flexline_theme_docs]',
                    'description' => 'Renders the FlexLine theme documentation tab.',
                    'attributes'  => '&mdash;',
                ),
                array(
                    'tag'         => 'flexline_site_name',
                    'usage'       => '[flexline_site_name]',
                    'description' => 'Outputs the site name.',
                    'attributes'  => '&mdash;',
                ),
                array(
                    'tag'         => 'flexline_page_title',
                    'usage'       => '[flexline_page_title]',
                    'description' => 'Outputs the current page title.',
                    'attributes'  => '&mdash;',
                ),
            );
            ?>
            <table class="widefat fixed striped">
                <thead>
                    <tr>
                        <th>Shortcode</th>
                        <th>Usage</th>
                        <th>Description</th>
                        <th>Attributes</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ( $shortcodes as $shortcode ) : ?>
                    <tr>
                        <td><code>[<?php echo esc_html( $shortcode['tag'] ); ?>]</code></td>
                        <td><code><?php echo esc_html( $shortcode['usage'] ); ?></code></td>
                        <td><?php echo esc_html( $shortcode['description'] ); ?></td>
                        <td><?php echo esc_html( $shortcode['attributes'] ); ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php
    }
}

