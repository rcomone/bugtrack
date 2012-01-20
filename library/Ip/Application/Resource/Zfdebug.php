<?php
/**
 * CLEO Library
 * 
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 * 
 * @category   Ip
 * @package    Application
 * @subpackage Resource
 * @desc       ZfDebug 'as a resource' loader
 * @author     Jean-Baptiste MONIN <jb.monin@cleo-consulting.fr>
 * @copyright  Copyright (c) 2005-2011 CLEO CONSULTING
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    1.0 2010-11-13
 */

/**
 * @category   Ip
 * @package    Application
 * @subpackage Resource
 * @desc       ZfDebug 'as a resource' loader
 * @author     Jean-Baptiste MONIN <jb.monin@cleo-consulting.fr>
 * @copyright  Copyright (c) 2005-2011 CLEO CONSULTING
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    1.0 2010-11-13
 */
class Ip_Application_Resource_Zfdebug extends Zend_Application_Resource_ResourceAbstract
{
    /**
     * Options taken from config file through bootstrap
     * @var array
     */
    protected $_localOptions;

    /**
     * Zend_View instance
     * @var Zend_View
     */
    protected $_view;
    
    /* (non-PHPdoc)
     * @see Zend_Application_Resource_Resource::init()
     */
    public function init()
    {
        $this->_localOptions = $this->getOptions();
        # Returns view so bootstrap will store it in the registry
        if (null === $this->_view) {
            $this->_view = new Zend_View($this->_localOptions);
        }
        // Activation switch
        if( !$this->_localOptions['run'] ) 
             return;
         // Autoloader config
         $autoloader = Zend_Loader_Autoloader::getInstance();
         $autoloader->registerNamespace('ZFDebug');
         // Plugins switches
         $options = $this->_localOptions;
         // Manualy activated plugins
         $bootstrap = $this->getBootstrap();
         if (in_array('Database', $options['plugins'])) {
             if ($bootstrap->hasPluginResource('multidb')) {
                 $bootstrap->bootstrap('multidb');
                 $db = $bootstrap->getPluginResource('multidb')->getDb();
                 $dbIndex = array_search('Database', $options['plugins']);
                 unset($options['plugins'][$dbIndex]);
                 $options['plugins']['Database'] = array('adapter' => $db, 'explain' => true);
             }
         }
         if (in_array('Cache', $options['plugins'])) {
             if ($bootstrap->hasPluginResource('cacheManager')) {
                  $bootstrap->bootstrap('cacheManager');
                  $cache = $bootstrap->getPluginResource('cacheManager')->getOptions();
                  $cacheIndex = array_search('Cache', $options['plugins']);
                  unset($options['plugins'][$cacheIndex]);
                  $options['plugins']['Cache'] = array('backend' => $cache['frontcore']['backend']);
             }
         }
         if (in_array('File', $options['plugins'])) {
             $fileIndex = array_search('File', $options['plugins']);
             unset($options['plugins'][$fileIndex]);
             $options['plugins']['File'] = array('basepath' => APPLICATION_PATH);
         }
//print_r($options); exit;
         // Registers plugin
         $debugPlugin = new ZFDebug_Controller_Plugin_Debug($options);
         $bootstrap->bootstrap('frontController');
         $frontController = $bootstrap->getResource('frontController');
         $frontController->registerPlugin($debugPlugin);
    }
}