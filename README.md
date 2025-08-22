# Web4SL Plugin

**FlexLine Utilities** is a WordPress plugin that adds custom theme options, shortcodes, and a click-to-call button for enhanced site functionality.

## Features

- Custom theme options for phone, address, and fallback settings.
- Shortcodes for displaying contact information and other dynamic content.
- Click-to-call button that dynamically adapts based on customizer settings.
- Integration with Yoast SEO for schema updates.

## Installation

1. **Upload the Plugin Files:**
   - Upload the `flexline` folder to the `/wp-content/plugins/` directory of your WordPress site.

2. **Activate the Plugin:**
   - Go to the 'Plugins' menu in WordPress and activate the Web4SL plugin.

## Usage

### Theme Options

Access theme options from the WordPress admin menu under 'Web4SL'. Customize settings such as menu icon usage, phone settings, address details, and fallback image.

### Shortcodes

Shortcodes are small bits of text wrapped in square brackets that WordPress replaces with dynamic content. Add them directly to your post, page, or widget content where you want the output to appear.

Use the following shortcodes in your posts, pages, or widgets:

- **[flexline_copyright_year]** – Displays the current year or a range from a specific starting year to the current year.
  - **Usage Examples:**
    - `[flexline_copyright_year]`
    - `[flexline_copyright_year starting_year="2015"]`
    - `[flexline_copyright_year starting_year="2010" separator=" to "]`
  - **Attributes:**
    - `starting_year` (optional) – Beginning year of the range.
    - `separator` (optional) – Text between the starting and current year. Default is ` - `.

- **[flexline_theme_docs]** – Displays the FlexLine theme documentation tab.
  - **Usage:** `[flexline_theme_docs]`
  - **Attributes:** None.

- **[flexline_site_name]** – Outputs the site's name.
  - **Usage:** `[flexline_site_name]`
  - **Attributes:** None.

- **[flexline_page_title]** – Outputs the current page title.
  - **Usage:** `[flexline_page_title]`
  - **Attributes:** None.


## Changelog

### 1.0.0
- Initial release with theme options, shortcodes, click-to-call button, and Yoast SEO schema integration.

## License

This plugin is licensed under the MIT.
