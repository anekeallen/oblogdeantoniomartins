<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'oblogd63_wp124' );

/** MySQL database username */
define( 'DB_USER', 'oblogd63_wp124' );

/** MySQL database password */
define( 'DB_PASSWORD', 'p1]4dSxs7)' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'h6n6jxfny5juiwdi0vx00gsxu7eh0vyn5pafbnhgdxeefstfropax4iayb0menpv' );
define( 'SECURE_AUTH_KEY',  'ka3wrzevubt8jxjmu7xxifvchug8sz90rbmqd4hlrdzmsud3h3oauyfzjofffhwk' );
define( 'LOGGED_IN_KEY',    'cc8ezbh8z38i9m2x2hadcvkzwmd7dkm7o0fewty4mbqxevsvlh35p3qb75rbvawj' );
define( 'NONCE_KEY',        'j6lsqrtzjbnngswnkvz8ghiejfe2mazse8q8aipobqnssy2qmrzjwqfhhsnxioym' );
define( 'AUTH_SALT',        'vko4h7nfpzjtvjuyo4ukql5qhyo7hpjxgsyprpmmryyiwk0rmf0s61iwmbkjvpjp' );
define( 'SECURE_AUTH_SALT', 'am6wb7m5ncxodok9r67q1x3nq685zrjhayf97b9x6gmb9mgropn7ydeefoj1vcnx' );
define( 'LOGGED_IN_SALT',   '3zhvefexbvvpo4jtsf2wggsl96fpp5w3stxailfn7e0ugpetse5ttdafk9ypwozw' );
define( 'NONCE_SALT',       'jhgh3qqpadztjnnzbba7rdgm2fctamjh0zu3ddisrauzalmi84a9m5ax7o97moxa' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpdt_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
