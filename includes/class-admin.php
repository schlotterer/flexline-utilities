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
                    'title'       => 'Theme Documentation',
                    'description' => 'Renders the FlexLine theme documentation tab.',
                    'usage'       => '[flexline_theme_docs]',
                ),
                array(
                    'title'       => 'Page Title',
                    'description' => 'Outputs the current page title.',
                    'usage'       => '[flexline_page_title]',
                ),
                array(
                    'title'       => 'Site Name',
                    'description' => 'Outputs the site name.',
                    'usage'       => '[flexline_site_name]',
                ),
                array(
                    'title'       => 'Copyright Year',
                    'description' => 'Displays the current year or a range from a starting year to the current year.',
                    'usage'       => array(
                        '[flexline_copyright_year]',
                        '[flexline_copyright_year starting_year="2015"]',
                        '[flexline_copyright_year starting_year="2010" separator=" - "]',
                    ),
                ),
            );
            ?>
            <table class="widefat fixed striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Usage</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ( $shortcodes as $shortcode ) : ?>
                    <tr>
                        <td><?php echo esc_html( $shortcode['title'] ); ?></td>
                        <td><?php echo esc_html( $shortcode['description'] ); ?></td>
                        <td><?php
                            $usage = $shortcode['usage'];
                            $usage_output = '';
                            if ( is_array( $usage ) ) {
                                foreach ( $usage as $usage_item ) {
                                    $usage_output .= '<code style="display: block; margin-bottom: 5px;">' . esc_html($usage_item) . '</code>';
                                }
                            }else{
                                $usage_output = '<code>' . esc_html($usage) . '</code>';
                            }
                            echo  $usage_output;
                        ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php
    }
}

