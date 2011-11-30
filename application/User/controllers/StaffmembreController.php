<?php 


class User_StaffmembreController extends Zend_Controller_Action
{
    
    public function listAction()
    {
        $service = new User_Service_Staffmembre();
        $this->view->staffmembres = $service->getList();
    }
}