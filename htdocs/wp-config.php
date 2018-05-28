<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clefs secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C'est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d'installation. Vous n'avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', '0fe_17312859_wp11');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', '0fe_17312859');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'test0000');

/** Adresse de l'hébergement MySQL. */
define('DB_HOST', 'sql207.0fees.us');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N'y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clefs uniques d'authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n'importe quel moment, afin d'invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'QDY{*Ad*3Y0PO|M|I;Z}}[FYyyuU$_Bb$!W-C#/*^plT.o:..sE|Htk4Q#2L|7M|');
define('SECURE_AUTH_KEY',  'CN<P`2x0>[_Q;|X}jHW`]yX;STjgn<o~-c.B- p#L9A4Man|  N(W1U %]:N7D9q');
define('LOGGED_IN_KEY',    '|oXeo0gN=?*aH|6DmX+s*)fhvg-IL-[3ca7 2:BoqTDD_k0@w0;(QU-Zq7H0!2*k');
define('NONCE_KEY',        'gCk7SS<M:zF7bpW74j-m!a01z+fmUG1]q[2lm-yMdM#hPe0-D,V)hZH:{0Mem.(2');
define('AUTH_SALT',        '`O2|@v&dWv1Y_3l0kKwmapDWJ?cuTAOpze8;/W)1(V#5upM Xh-BK,hE+5-l:1Ot');
define('SECURE_AUTH_SALT', '>bylRfQ]Lz3~G[^vD>|/45$]Dou6q~[A7|g$QyW|Jb[:Kc3@T(j/;+TAEE]$E*U`');
define('LOGGED_IN_SALT',   'C87wU2THur1s4/HOib$3E>j6U)LDT:kg->u.QsgzLp=xA%AJ}Nd_O&hU_LPrOGvS');
define('NONCE_SALT',       'MO3xva!(MR=FYV-;CC~,;N#36LE,|K9{WWx^yd @,Y`NP`;^9{gc!bPgJx}7ytdU');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N'utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés!
 */
$table_prefix  = 'wp_1';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l'affichage des
 * notifications d'erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d'extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 */
define('WP_DEBUG', false);

/* C'est tout, ne touchez pas à ce qui suit ! Bon blogging ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');