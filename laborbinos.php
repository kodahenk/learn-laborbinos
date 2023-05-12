<?php

/**
 * Eklenti önyükleme dosyasıdır.
 * Eklentinin çalışmaya başladığı yer.
 * Eklenti bilgileri (versiyon, link vb.) bu sayfada yer alır.
 * Eklenti tarafından kullanılan tüm bağımlılıkları içerir,
 * Eklentiyi etkinleştirme ve devre dışı bırakma fonksiyonları yer alır.
 *
 * @link              https://erdemclinic.com
 * @since             1.0.0
 * @package           Laborbinos
 *
 * @wordpress-plugin
 * Plugin Name:       laborbinos
 * Plugin URI:        https://erdemclinic.com
 * Description:       Type your plugin details in the form below, and a zip file will be generated for you.


 * Version:           1.0.0
 * Author:            Test Sistemleri
 * Author URI:        https://erdemclinic.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       laborbinos
 * Domain Path:       /languages
 */

// Dosya direk url'den çağrılırsa, buradan sonrası çalışmaz
// http://learn-plugin.test/wp-content/plugins/laborbinos/laborbinos.php
if (!defined('WPINC')) {
    // WPINC = wp-includes
    die;
}

/**
 * Mevcut eklenti versiyonu.
 * 1.0.0 ile başlar ve SemVer (https://semver.org) kullanır.
 * Eklentinin yeni versiyonu çıktıkça bu artar.
 */
define('LABORBINOS_VERSION', '1.0.0');

/**
 * The code that runs during plugin activation.
 * Bu eylem includes/class-laborbinos-activator.php dosyasında açıklanmıştır.
 */
function activate_laborbinos()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-laborbinos-activator.php';
    Laborbinos_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * Bu eylem includes/class-laborbinos-deactivator.php dosyasında açıklanmıştır.
 */
function deactivate_laborbinos()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-laborbinos-deactivator.php';
    Laborbinos_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_laborbinos');
register_deactivation_hook(__FILE__, 'deactivate_laborbinos');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-laborbinos.php';

/**
 * Eklentinin çalışmaya başladığı yer
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_laborbinos()
{

    $plugin = new Laborbinos();
    $plugin->run();

}
run_laborbinos();
