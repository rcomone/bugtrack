<?php 

class Project_Service_ProjectTest extends PHPUnit_Framework_TestCase
{

    
    public function testGetlistMethodShouldReturnArrayOfProjectObjects()
    {
        $projectService = new Project_Service_Project();
        $result = $projectService->getList();
        $this->assertInternalType('array', $result);
        if (is_array($result)) {
            $isProjectObject = true;
            foreach ($result as $user) {
                if (!($user instanceof Project_Model_Project)) {
                        $isProjectObject = false;
                }
            }
            $this->assertTrue($isProjectObject);
        }
    }
    
    public function testDeleteMethodShouldReturnTrue()
    {
        $project = new Project_Model_Project();
        $projectService = new Project_Service_Project();
        $result = $projectService->delete($project);
        $this->assertTrue($result);
    }
    
    public function testSaveMethodWithNewProjectGivenShouldReturnSuccessConstant() 
    {
        $project = new Project_Model_Project();
        $project->setName('test')
                    ->setDescription('test test');
        $projectService = new Project_Service_Project();
        $result = $projectService->save($project);
        $this->assertEquals ($projectService::PROJECT_CREATED, $result);
    }
    
    public function testSaveMethodWithExistingProjectGivenShouldReturnSuccessConstant() 
    {
        $project = new Project_Model_Project();
        $project->setId(1)
                     ->setName('test')
                     ->setDescription('test test');
        $projectService = new Project_Service_Project();
        $result = $projectService->save($project);
        $this->assertEquals ($projectService::PROJECT_UPDATED, $result);
    }

    public function testFindByLoginWithExistingLoginGivenShouldReturnUserObject()
    {
        $userService = new User_Service_Staffmembre();
        $result = $userService->findByLogin('test');
        $user = new User_Model_Staffmembre();
        $user->setLogin('test');
        $this->assertEquals($user, $result);
    }
}