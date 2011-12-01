<?php 


class User_Plugin_Auth extends Zend_Controller_Plugin_Abstract
{
    public function dispatchLoopStartup(Zend_Controller_Request_Abstract $request)
    {
        $auth = Zend_Auth::getInstance();
        if (!$auth->hasIdentity()) {
            $request->setModuleName('User')
                         ->setControllerName('auth')
                         ->setActionName('login')
                         ->setDispatched(true);
        }
    }
}