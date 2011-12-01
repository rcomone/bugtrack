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
 * @subpackage  Form
 * @desc              User authentication form
 * @author           Dev1 Lyon <devlyon1@cleo-consulting.fr>
 * @copyright      DEV LYON
 * @license          http://framework.zend.com/new-bsd   New BSD License
 * @version         Release : 1.0 (2011-12-01)
 *
 */
/**
 * @category       Bugtrack
 * @package        User
 * @subpackage  Form
 * @desc              User authentication form
 * @author           Dev1 Lyon <devlyon1@cleo-consulting.fr>
 * @copyright      DEV LYON
 * @license          http://framework.zend.com/new-bsd   New BSD License
 * @version         Release : 1.0 (2011-12-01)
 *
 */
class User_Form_Login extends Zend_Form
{
    
    public function init() 
    {
        $loginField = new Zend_Form_Element_Text('login');
        $loginField->addValidator(new Zend_Validate_Alnum());
        $loginField->setRequired(true);
        
        $passwordField = new Zend_Form_Element_Password('password');
        $passwordField->addValidator(new Zend_Validate_StringLength(
            array('min' => 6, 'max' => 18)
        ));
        
        $submitBtn = new Zend_Form_Element_Submit('submit');
        
        $this->addElements(
            array($loginField, $passwordField, $submitBtn)
        );

    }
    
}