<?php 


class Project_IndexController extends Zend_Controller_Action
{
    
    public function listAction()
    {
            $projectService = new Project_Service_Project();
            $this->view->projects = $projectService->getList();
    }
}