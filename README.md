# Web4SL Plugin

**Web4SL** is a WordPress plugin that adds custom theme options, shortcodes, and a click-to-call button for enhanced site functionality.

## Features

- Custom theme options for phone, address, and fallback settings.
- Shortcodes for displaying contact information and other dynamic content.
- Click-to-call button that dynamically adapts based on customizer settings.
- Integration with Yoast SEO for schema updates.

## Installation

1. **Upload the Plugin Files:**
   - Upload the `web4sl` folder to the `/wp-content/plugins/` directory of your WordPress site.

2. **Activate the Plugin:**
   - Go to the 'Plugins' menu in WordPress and activate the Web4SL plugin.

## Usage

### Theme Options

Access theme options from the WordPress admin menu under 'Web4SL'. Customize settings such as menu icon usage, phone settings, address details, and fallback image.

### Shortcodes

Use the following shortcodes in your posts, pages, or widgets:

- **[web4sl_site_name]** - Displays the site name.
- **[web4sl_city_state]** - Displays the city and state.
- **[web4sl_phone_number]** - Generates a telephone link or anchor link.
  - `[web4sl_phone_number]`
  - `[web4sl_phone_number link="tel:1234567890"]`
  - `[web4sl_phone_number text="Custom Text"]`
  - `[web4sl_phone_number link="http://example.com" text="Custom Text"]`
- **[web4sl_contact_info]** - Displays contact information.
- **[web4sl_copyright_year]** - Displays the current year or a range from a specific starting year to the current year.
  - `[web4sl_copyright_year]`
  - `[web4sl_copyright_year starting_year="2015"]`
  - `[web4sl_copyright_year starting_year="2010" separator=" to "]`

### Click-to-Call Button

The plugin dynamically creates a click-to-call button based on customizer settings. It will be displayed in the site header if configured.

## Changelog

### 1.0.0
- Initial release with theme options, shortcodes, click-to-call button, and Yoast SEO schema integration.

## License

This plugin is licensed under the MIT.# flexline-utilities
