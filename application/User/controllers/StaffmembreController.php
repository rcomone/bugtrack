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
 * @desc              User default controller
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
 * @desc              User default controller
 * @author           Dev1 Lyon <devlyon1@cleo-consulting.fr>
 * @copyright      DEV LYON
 * @license          http://framework.zend.com/new-bsd   New BSD License
 * @version         Release : 1.0 (2011-12-01)
 *
 */
class User_StaffmembreController extends Zend_Controller_Action
{
    
    public function listAction()
    {
        $service = new User_Service_Staffmembre();
        $this->view->staffmembres = $service->getList();
    }     
    public function createAction(){
		$form = new User_Form_Create();
			if ($this->getRequest()->isPost()) {
				if ($form->isValid($_POST)) {
					$this->userService = new User_Service_Staffmembre();
					$user = new User_Model_Staffmembre();
					
					$user->setFirstname($form->getValue('firstname'));
					$user->setLastname($form->getValue('lastname'));
					$user->setEmail($form->getValue('email'));
					$user->setLogin($form->getValue('login'));
					$user->setPassword($form->getValue('password'));
										
					$this->userService->save($user);
				}
			}
			 
		$this->view->createForm = $form;
    }
	public function teamlistAction()
    {
        $service = new User_Service_Staffmembre();
        $this->view->staffteams = $service->getTeamList();
    }
}