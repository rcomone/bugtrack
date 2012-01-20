<?php 


class User_Model_StaffmemberTest extends PHPUnit_Framework_Testcase
{
    public function testGettersAndSettersAreWorkingFine()
    {
        $user = new User_Model_Staffmembre();
        $user->setId(1)
                ->setFirstname('testfn')
                ->setLastname('testln')
                ->setLogin('testl')
                ->setEmail('teste')
                ->setPassword('testp');
       $this->assertEquals(1, $user->getId());    
       $this->assertEquals('testfn', $user->getFirstname());
       $this->assertEquals('testln', $user->getLastname());
       $this->assertEquals('testl', $user->getLogin());
       $this->assertEquals('teste', $user->getEmail());
       $this->assertEquals('testp', $user->getPassword());   
    }
}