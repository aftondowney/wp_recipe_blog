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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpressDB');

/** MySQL database username */
define('DB_USER', 'wordpress_admin');

/** MySQL database password */
define('DB_PASSWORD', 'wordpress');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '+!gF8XYc}Z~dFt6uST,OnA{Js/{<>{;)d0lKXn+o0DJ[a/_m7+RDj&|q4&w#GlW9');
define('SECURE_AUTH_KEY',  '>emb:F%z+IQdsOB^Lx0;wWS2MdM$4HkJa_O@n#C~8D;:9&sb%VYe7idAInJ>k$S3');
define('LOGGED_IN_KEY',    '&KI//9]Nx+ym|u}n %]^gMv!h0/*sJ.(rr_0O>$B($aUv!uac(-m;TK-0%Wd[p:_');
define('NONCE_KEY',        'lnGVpY&foFZaE_s@9r/ +F8BngZp4{H&M#8!{P7k)+hNv?K4 xp%+ehDbwy!5sZO');
define('AUTH_SALT',        'FBfPr d_I4yUkmdyKu}(e*0/TG*i2[-(Tyc}9Fv&*ZQ1!R_Qbw/kl7jo*U):.zsl');
define('SECURE_AUTH_SALT', 'j~a~sNU/z!(EZb=/_OR/6wl*#fWjn_WtunQH]E [&PXPwPc7JipiEf=2,1by8!j5');
define('LOGGED_IN_SALT',   '8rCfJ`DdSo.2=G0DKs[8~t978`>&L)~Y @G$<+]USGp0H~6(M=}pm+v-xz(MGUW^');
define('NONCE_SALT',       'GhDF #(zc GIw64j]!hd.>GFqi*V( Ry|~,HPR;33l}0W4.N&El4S`j0Zw9@o>y!');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
