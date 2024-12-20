<?php
/**
 * WPConfig file for the WPScan vulnerability test bench
 * Copyright (C) 2023  Automattic, Inc
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * LICENSE file in the root of the repo for details.
 *
 * @package wpscan.vulnerability-test-bench
 */

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/** Authentication Unique Keys and Salts. */
define( 'AUTH_KEY', 'QNQqlmXChDIqjaxRSDXBTmVLjWhcCcaKckBtRQVZPSzybmtQnUjZdfbyrhJIUBLB' );
define( 'SECURE_AUTH_KEY', 'memSQQjixnFcONrnRaZOaKhxDjCGYixlQXJoPmvumclVlWWLigbxrQODBdQJQssm' );
define( 'LOGGED_IN_KEY', 'FiPoFhHzunUHZIyQOpkTCRLNLzpEmdClbiipVUYRhXtKtiViwYJJwzIZAHCNmzlT' );
define( 'NONCE_KEY', 'NPeUYcTpkBWuEXOTknffohKUhifMKuDtMGUnVCNWcPxXvUWePoVYrvtgcqTmwBJI' );
define( 'AUTH_SALT', 'AGAlYgeQLzofHKUewnBQvtJneiLkzFfgHnFDFMCXPZgThRkXuwPOnSMKEICaokjl' );
define( 'SECURE_AUTH_SALT', 'hunEpeXJEUrhzWgXXzPwsAelYPMtCsRJcmDAlRGbsInZAQnJrkHvcvJvnocIURCP' );
define( 'LOGGED_IN_SALT', 'vedGGsbjJHdcNatUAAAbOvjDUTjuIqvvOewkIzBFaNvUFcDvZkrbBRHUgGDWrOrf' );
define( 'NONCE_SALT', 'DxzoTDzBxZGTovBHqNOWwQPjdOWKSxXpTgxrWuIQTSwYvPyxCxWBkIvfkIeKONVO' );

// Absolute path to the WordPress directory.
defined( 'ABSPATH' ) || define( 'ABSPATH', dirname( __FILE__ ) . '/' );

// Include for settings managed by ddev.
$ddev_settings = dirname( __FILE__ ) . '/wp-config-ddev.php';
if ( is_readable( $ddev_settings ) && ! defined( 'DB_USER' ) && getenv( 'IS_DDEV_PROJECT' ) === 'true' ) {
	require_once $ddev_settings;
}

// Define some useful constantd for vulnerability testing:
//
// 1. Don't allow editor+ to add unfiltered html to titles etc.
define( 'DISALLOW_UNFILTERED_HTML', true );

// 2. Don't allow file edits
define( 'DISALLOW_FILE_EDIT', true );

// 3. Don't allow admins to install/update plugins or themes (disabled by default)
// defined( 'DISALLOW_FILE_MODS', true );

// 4. Setting the site as a multisite by default
define( 'WP_ALLOW_MULTISITE', false );
define( 'MULTISITE', false );
define( 'SUBDOMAIN_INSTALL', false );
$base = '/';
define( 'DOMAIN_CURRENT_SITE', preg_replace( '/https?:\/\//', '', getenv( 'DDEV_PRIMARY_URL' ) ) );
define( 'PATH_CURRENT_SITE', '/' );
define( 'SITE_ID_CURRENT_SITE', 1 );
define( 'BLOG_ID_CURRENT_SITE', 1 );

// Include wp-settings.php.
if ( file_exists( ABSPATH . '/wp-settings.php' ) ) {
	require_once ABSPATH . '/wp-settings.php';
}
