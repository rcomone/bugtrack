<?php
class User_Form_Save extends Zend_Form
{
    
    public function init() 
    {
    	
    	$firstnameField = new Zend_Form_Element_Text('firstname');
        $firstnameField->addValidator(new Zend_Validate_Alnum());
        $firstnameField->setRequired(true);
        
        $lastnameField = new Zend_Form_Element_Text('lastname');
        $lastnameField->addValidator(new Zend_Validate_Alnum());
        $lastnameField->setRequired(true);
        
        $emailField = new Zend_Form_Element_Text('email');
        $emailField->addValidator(new Zend_Validate_EmailAddress());
        $emailField->setRequired(true);
        
        $loginField = new Zend_Form_Element_Text('login');
        $loginField->addValidator(new Zend_Validate_Alnum());
        $loginField->setRequired(true);
        
        $teamField = new Zend_Form_Element_Text('team');
        $teamField->addValidator(new Zend_Validate_Alnum());
        $teamField->setRequired(true);
        
        $idField = new Zend_Form_Element_Hidden('id'); 
        
        $passwordField = new Zend_Form_Element_Password('password');
        $passwordField->addValidator(new Zend_Validate_StringLength(
            array('min' => 6, 'max' => 18)
        ));
        
        
        $submitBtn = new Zend_Form_Element_Submit('submit');
        
        $this->addElements(
            array($firstnameField, $lastnameField, $emailField, $loginField, $passwordField, $teamField, $idField, $submitBtn)
        );
        
        $this->setAction('');
		
    }
    
}