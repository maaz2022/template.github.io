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
define( 'DB_NAME', 'temmplate' );

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
define( 'AUTH_KEY',         '%feSSQZrmf;(1>0xrrM}G^7e3P!KvE~XCo<.[ewL1|9BzuEOA,oWlOz-&6TxAVy#' );
define( 'SECURE_AUTH_KEY',  '(76fzMGOKJGL0m }xT4dOeazq+NOHNW4&voY:A:Eg785:zZ_@{R5rOO+6R&yHCF-' );
define( 'LOGGED_IN_KEY',    '[5Fs&[6FKU6gLqKs+C_|vkX*}0rFub$P_vwwPQ)pst]!v2+<r)#8uR(plZooV4Kf' );
define( 'NONCE_KEY',        'fW>Km,ctY.Nb*VxMi[Dm{ccFT{7 %J@%J:}C;[Yk@>6b]fMC}97sg!7Yk5+(p``k' );
define( 'AUTH_SALT',        '#}In)o6Pkp&8Y%xR?KC,uA-uwP?b#,Z!_Q^$w|tT/_Z{GZ`z-Ypp7fn-habkUs}U' );
define( 'SECURE_AUTH_SALT', '6H$>#ZOJG)]HxfBepN*{-DsN)lw6JG<s2cLRpKl~iz$aBD(fi7MIwY4IIcw))dFC' );
define( 'LOGGED_IN_SALT',   ';7 s21sKQ%b@uxP^uJ= [c:bPSBm:JcFgD/TmHEb#VH7xSB6Px.Ftd?MYicxs;r7' );
define( 'NONCE_SALT',       'p9l{{*/nq6DZ$2+a(I_i&JyC~gDl1t`*)@q>i)>@9Wy$ld!/m;nX]c:vpBcg)jjT' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
