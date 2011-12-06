<?php 

class Project_Service_ProjectTest extends PHPUnit_Framework_TestCase
{

    public function testGetlistMethodShouldReturnArrayOfProjectObjects()
    {
        $ProjectService = new Project_Service_Project();
        $result = $ProjectService->getList();
        $this->assertInternalType('array', $result);
        if (is_array($result)) {
            $isProjectObject = true;
            foreach ($result as $project) {
                if (!($project instanceof Project_Model_Project)) {
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
        $project->setName('DemoProject')
                ->setDescription('DescriptionProject');
        $projectService = new Project_Service_project();
        $result = $projectService->save($project);
        $this->assertEquals ($projectService::PROJECT_CREATED, $result);
    	
    	
    }
  
	public function testSaveMethodWithExistingProjectGivenShouldReturnSuccessConstant() 
    {
        $project = new Project_Model_Project();
        $project->setId(1)
                ->setName('DemoProject');
        $projectService = new Project_Service_project();
        $result = $projectService->save($project);
        $this->assertEquals ($projectService::PROJECT_UPDATED, $result);
    }
    
	
    
	
}