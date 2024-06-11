<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link https://fr.wordpress.org/support/article/editing-wp-config-php/ Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'wp_cinema');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'admin');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'admin');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '_}E75nISq(a0^Yj<pHZEAjqk>smnb=w#qpMLtv|-U6b*I)$0|8-^1H[A>h<?_%y4');
define('SECURE_AUTH_KEY',  'Jw21%Z^8/k)/0LXa&$0Fs#+e9M&F`0u4,@|upc_xBm/:!+}o.HUw.7+HPHoNyv7w');
define('LOGGED_IN_KEY',    '4ZKjs2RA4x40v7m1mNy5>(4zNru9e5>pB/F#W4-d.w[HOgs1alrZM4T!u.<I$G,;');
define('NONCE_KEY',        'K1|zO}#)SgK5Iv:wiDJ*h}DK;,6o$be*3mzQokF$_^L:_?7Ag%4VvVy&U+s`*Q}I');
define('AUTH_SALT',        '&.xXmc%yQaqsN2zuQWW!LpI[qsTtP_+`tV`ji_;v=-7yOd}>)(`;n2g8N,3|!y}<');
define('SECURE_AUTH_SALT', 'j[wmh5nw<$`XrP|kx%]E_4RDk`mIxWCf8n:j+4qUO&U=]Gm&#Tl-7pNIWCe)$_[Q');
define('LOGGED_IN_SALT',   '4x$m`0IK8eM!8OafUPo`Q?JjnTt-gd-N.y6I1G&*8JfiuI5MjgMG/ny9C%E%)$,f');
define('NONCE_SALT',       'r;`*ERq7w@UR*RX#$t#xA._)r<ih&<ag>;{Q,WppSp00Xa[%&.8+G}%Jk#9$fK<{');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs et développeuses : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs et développeuses d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur la documentation.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');


require_once ABSPATH . 'vendor/autoload.php';

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
