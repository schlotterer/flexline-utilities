<?php
namespace FlexLine_Utilities;

class Admin {
    public static function init() {
        add_submenu_page(
            'flexline_theme_options',
            'FlexLine Utilities',
            'FlexLine Utilities',
            'manage_options',
            'flexline-utilities',
            [ __CLASS__, 'render_page' ]
        );
    }

    public static function render_page() {
        ?>
        <div class="wrap">
            <h1>FlexLine Utilities</h1>
            <h2>Shortcodes</h2>
            <table class="widefat fixed striped">
                <thead>
                    <tr>
                        <th>Shortcode</th>
                        <th>Usage</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><code>[flexline_copyright_year]</code></td>
                        <td><code>[flexline_copyright_year starting_year="2015"]</code></td>
                    </tr>
                    <tr>
                        <td><code>[flexline_theme_docs]</code></td>
                        <td><code>[flexline_theme_docs]</code></td>
                    </tr>
                    <tr>
                        <td><code>[flexline_site_name]</code></td>
                        <td><code>[flexline_site_name]</code></td>
                    </tr>
                    <tr>
                        <td><code>[flexline_page_title]</code></td>
                        <td><code>[flexline_page_title]</code></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php
    }
}

