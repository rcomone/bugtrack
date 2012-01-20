<?php 

class Project_Service_JalonTest extends PHPUnit_Framework_TestCase
{
	public function testGetlistMethodShouldReturnArrayOfJalonObjects()
    {
        $jalonService = new Project_Service_Jalon();
        $result = $jalonService->getList();
        $this->assertInternalType('array', $result);
        if (is_array($result)) {
            $isJalonObject = true;
            foreach ($result as $jalon) {
                if (!($jalon instanceof Project_Model_Jalon)) {
                        $isJalonObject = false;
                }
            }
            $this->assertTrue($isJalonObject);
        }
    }
    
	public function testDeleteMethodShouldReturnTrue()
    {
    	$jalon = new Project_Model_Jalon();
    	$jalonService = new Project_Service_Jalon();
        $result = $userService->delete($jalon);
        $this->assertTrue($result);
    }
}