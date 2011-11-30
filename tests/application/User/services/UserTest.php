<?php 

class UserTest extends PHPUnit_Framework_TestCase
{

    
    public function testGetlistMethodShouldReturnArrayOfUserObjects()
    {
        $userService = new User_Service_Staffmembre();
        $result = $userService->getList();
        $this->assertInternalType('array', $result);
        if (is_array($result)) {
            $isUserObject = true;
            foreach ($result as $user) {
                if (!($user instanceof User_Model_Staffmembre)) {
                        $isUserObject = false;
                }
            }
            $this->assertTrue($isUserObject);
        }
    }
    
    public function testDeleteMethodShouldReturnTrue()
    {
        $user = new User_Model_Staffmembre();
        $userService = new User_Service_Staffmembre();
        $result = $userService->delete($user);
        $this->assertTrue($result);
    }
    
    public function testSaveMethodWithNewUserGivenShouldReturnSuccessConstant() 
    {
        $user = new User_Model_Staffmembre();
        $user->setLogin('test')
                ->setFirstname('test test');
        $userService = new User_Service_Staffmembre();
        $result = $userService->save($user);
        $this->assertEquals ($userService::STAFF_MEMBER_CREATED, $result);
    }
    
    public function testSaveMethodWithExistingUserGivenShouldReturnSuccessConstant() 
    {
        $user = new User_Model_Staffmembre();
        $user->setId(1)
                ->setLogin('test')
                ->setFirstname('test test');
        $userService = new User_Service_Staffmembre();
        $result = $userService->save($user);
        $this->assertEquals ($userService::STAFF_MEMBER_UPDATED, $result);
    }
    
    public function testAuthenticateMethodWithRightCredentialsGivenShouldReturnTrue()
    {
        $user = new User_Model_Staffmembre();
        $user->setLogin('test')
                ->setPassword('test');
        $userService = new User_Service_Staffmembre();
        $result = $userService->authenticate($user);
        $this->assertTrue($result);
    }
    
    public function testAuthenticateMethodWithWrongCredentialsGivenShouldReturnFalse()
    {
        $user = new User_Model_Staffmembre();
        $user->setLogin('testsdf')
                ->setPassword('testsdf');
        $userService = new User_Service_Staffmembre();
        $result = $userService->authenticate($user);
        $this->assertFalse($result);
    }
    
    public function testFindByLoginWithExistingLoginGivenShouldReturnUserObject()
    {
        $userService = new User_Service_Staffmembre();
        $result = $userService->findByLogin('test');
        $user = new User_Model_Staffmembre();
        $user->setLogin('test');
        $this->assertEquals($user, $result);
    }
    
    public function testFindByLoginWithNonExistingLoginGivenShouldReturnFalse()
    {
        $userService = new User_Service_Staffmembre();
        $result = $userService->findByLogin('testqsdfq');
        $this->assertFalse($result);
    }
}