<?php 
/**
 * Bugtrack
 *  
 *  LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 * 
 * @category       Bugtrack
 * @package        Core
 * @subpackage     Controller
 * @desc           Index controller
 * @author         Dev1 Lyon <devlyon1@cleo-consulting.fr>
 * @copyright      DEV LYON
 * @license        http://framework.zend.com/new-bsd   New BSD License
 * @version        Release : 1.0 (2011-11-29)
 */

/**
 * @category       Bugtrack
 * @package        Core
 * @subpackage     Controller
 * @desc           Index controller
 * @author         Dev1 Lyon <devlyon1@cleo-consulting.fr>
 * @copyright      DEV LYON
 * @license        http://framework.zend.com/new-bsd   New BSD License
 * @version        Release : 1.0 (2011-11-29)
 */
class IndexController extends Zend_Controller_Action
{
    public function indexAction()
    {
    	//Génération du log
        require_once (LIBRARY_PATH . DS . 'Ip/Formatter/Formatter.php');
		require_once (LIBRARY_PATH . DS . 'Ip/Logger/Logger.php');
		$logger = new Library_Ip_Formatter_Logger_Logger_File(new Library_Ip_Formatter_Formatter_String(), LOG_PATH . DS . 'logs_override.txt');
		$logger->write('Je suis un message de log formatté en TXT');
    }
}
