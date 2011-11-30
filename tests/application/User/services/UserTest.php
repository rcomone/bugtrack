<?php 

class UserTest extends PHPUnit_Framework_TestCase
{
    public function testCreateMethodWithArrayGivenShouldReturnUserObject()
    {
        $userService = new User_Service_StaffMembre();
        $result = $userService->create(array());
        $this->assertInstanceOf('User_Model_StaffMembre', $result);
    }
    
}