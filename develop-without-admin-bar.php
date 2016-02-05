<?php
/**
 * Develop without admin bar
 *
 * @package     DevelopWithputAdminBar
 * @author      Codice Ovvio
 * @copyright   2016 Codice Ovvio
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: Develop without admin bar
 * Plugin URI:  http://github.com/codiceovvio/develop-without-admin-bar
 * Description: Hides admin bar in frontend during development. Checks for WP-DEBUG in wp-config.php : if active, hides the bar, if not shows it.
 * Version:     1.0.0
 * Author:      Codice Ovvio
 * Author URI:  http://github.com/codiceovvio
 * Text Domain: none
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

/*
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
Online: http://www.gnu.org/licenses/gpl.txt
*/


function remove_admin_bar_when_developing() {

	if ( defined( 'WP_DEBUG' ) && true === WP_DEBUG ) {
		if ( is_user_logged_in() && current_user_can( 'administrator' ) && !is_admin() ) {
			show_admin_bar( false );
		}
	}
}
add_action( 'after_setup_theme', 'remove_admin_bar_when_developing' );

?>
