<?php
/**
 * Plugin Name: Sitecore - Plugin for current site
 * Plugin URI: http://marketingincolor.com
 * Description: Site specific code changes for current site
 * Version: 1.0
 * Author: Marketing In Color
 * Author URI: http://marketingincolor.com
 * License: GPL2
 *
 * Copyright 2014 Marketing In Color (email : developer@marketingincolor.com)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/**
 * Site-wide Security Features
 *  - Removal of the "generator" meta tag from all page content
 */
remove_action('wp_head', 'wp_generator');




