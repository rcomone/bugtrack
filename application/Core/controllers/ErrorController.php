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
 * @desc           Error controller
 * @author         Dev1 Lyon <devlyon1@cleo-consulting.fr>
 * @copyright      DEV LYON
 * @license        http://framework.zend.com/new-bsd   New BSD License
 * @version        Release : 1.0 (2011-11-29)
 */

/**
 * @category       Bugtrack
 * @package        Core
 * @subpackage     Controller
 * @desc           Error controller
 * @author         Dev1 Lyon <devlyon1@cleo-consulting.fr>
 * @copyright      DEV LYON
 * @license        http://framework.zend.com/new-bsd   New BSD License
 * @version        Release : 1.0 (2011-11-29)
 */
class ErrorController extends Zend_Controller_Action
{
    public function errorAction()
    {
        $errorHandler = $this->_getParam('error_handler');
        $exception = $errorHandler->exception;
        
        $this->view->message = $exception->getMessage();
        $this->view->code = $exception->getCode();
        $this->view->trace = $exception->getTraceAsString();
        
    }
}
