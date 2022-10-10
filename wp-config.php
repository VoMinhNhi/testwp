<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'testwp' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'v,g<8tXF-Z5}Ar^moD.DdEV8n&IQ!70o%:5jmg3^9kg?Gpti]Fq=z-nq+41X|()d' );
define( 'SECURE_AUTH_KEY',  '5F?oqo9tUuzX:2V(N#PWN|fge}In~8Vu?+UU~_Ucr[w_O )bi=;`XjFMiaY33pS`' );
define( 'LOGGED_IN_KEY',    'zO2rU2)lk[Rsm~`JGEI}h*U&l:nUgYvwf=YPJirVGh$d2=~w_w{0Lp>,so}HhgF5' );
define( 'NONCE_KEY',        'moG3W?azn~@*}dUiDt>G:e}2=>xOsI#Yz$I)w{zX;F<i9!?_%e:XCL[@@u=Lz9 #' );
define( 'AUTH_SALT',        '<IhqrWUPX&g9SJgY/YT>3&xE{&H2cu]R7}oCy!5CQj]CZM-91/IbL>AeQQ QCGYT' );
define( 'SECURE_AUTH_SALT', 'l|,LYX)UHn[t~c^8(&uutB|Fw|FtkL+(PB1|U8C!j?m-H+BE<$fFMku%0cT>P7]_' );
define( 'LOGGED_IN_SALT',   'Sx5p{.rl&.D)DoEo6O&L;rL_^CK/H/b[q%J]@qmAtn_u6%V.PKw}+Bk|d$6L{MCm' );
define( 'NONCE_SALT',       '88%]5Git:&S[p;7/!$<}v>3[IEn Wah}khNa<_=nuth9g@[^s*EB8w(LedV|5,@=' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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

//define( 'WP_DEBUG', false );

// Bật sửa lỗi giúp tìm lỗi nhanh hơn
define('WP_DEBUG', true);
define('WP_DEBUG_DISPLAY', false);
define('WP_DEBUG_LOG', true);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
