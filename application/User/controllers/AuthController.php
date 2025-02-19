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
 * @package        User
 * @subpackage  Controller
 * @desc              User authentication controller
 * @author           Dev1 Lyon <devlyon1@cleo-consulting.fr>
 * @copyright      DEV LYON
 * @license          http://framework.zend.com/new-bsd   New BSD License
 * @version         Release : 1.0 (2011-12-01)
 *
 */
/**
 * @category       Bugtrack
 * @package        User
 * @subpackage  Controller
 * @desc              User authentication controller
 * @author           Dev1 Lyon <devlyon1@cleo-consulting.fr>
 * @copyright      DEV LYON
 * @license          http://framework.zend.com/new-bsd   New BSD License
 * @version         Release : 1.0 (2011-12-01)
 *
 */
class User_AuthController extends Zend_Controller_Action
{
    
    public function init()
    {
        $this->userService = new User_Service_Staffmembre();
    }
    
    public function loginAction()
    {
        $form = new User_Form_Login();
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($_POST)) {
                
                $user = $this->userService->findByLogin($form->getValue('login'));
                if ( false ===  $user) {
                    $this->_helper->FlashMessenger('utilisateur  inconnu');
                } else {
                    $user->setPassword($form->getValue('password'));
                    if ($this->userService->authenticate($user)) {
                        $this->_redirect('/index/index');
                    } else {
                        $this->_helper->FlashMessenger('Echec d\'identification');
                    }
                }
            } 
        }
        $this->view->messages = $this->_helper->getHelper('FlashMessenger')->getMessages();
        $this->view->loginForm = $form;
    }
    
    public function logoutAction()
    {
        $this->userService->logout();
        $this->_redirect('/');
    }
}