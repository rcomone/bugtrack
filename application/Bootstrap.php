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
 * @desc           Bootstrap
 * @author         Dev1 Lyon <devlyon1@cleo-consulting.fr>
 * @copyright      DEV LYON
 * @license        http://framework.zend.com/new-bsd   New BSD License
 * @version        Release : 1.0 (2011-11-29)
 *
 */
/**
 * @category       Bugtrack
 * @desc           Main Bootstrap
 * @author         Dev1 Lyon <devlyon1@cleo-consulting.fr>
 * @copyright      DEV LYON
 * @license        http://framework.zend.com/new-bsd   New BSD License
 * @version        Release : 1.0 (2011-11-29)
 */
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	/**
	 * Initialize route
	 * @see Zend_Controller_Front
	 */
    protected function _initRouter()
    {
        $router = Zend_Controller_Front::getInstance()->getRouter();
        $routeConfig = new Zend_Config_Ini(CONFIG_PATH . DS . 'routes.ini', 'production');
        $router->addConfig($routeConfig, 'routes');
    }
    
    /**
	 * Initialize navigation
	 * @see Zend_Navigation
	 */
    protected function _initNavigation()
    {
        $navConfig = new Zend_Config_Xml(CONFIG_PATH . DS . 'navigation.xml', 'main');
        $navigation = new Zend_Navigation($navConfig);
        Zend_Registry::set('navigation', $navigation);
  
    }
}
