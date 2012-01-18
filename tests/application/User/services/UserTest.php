<?php 

class User_Service_StaffmemberTest extends PHPUnit_Framework_TestCase
{
    public function testDependencyInjection()
    {
        // Instancie le service et accède au mapper
        $userService = new User_Service_Staffmembre();
        $userMapper = $userService->getUserMapper();
        
        // Créée les mocks pour DbTable DbAdapter et Rowset
        $dbTable = $this->_getCleanMock('Zend_Db_Table_Abstract');
        $dbAdapter = $this->_getCleanMock('Zend_Db_Adapter_Abstract');
        $rowset = $this->_getCleanMock('Zend_Db_Table_Rowset_Abstract');
        $row = $this->_getCleanMock('Zend_Db_Table_Row_Abstract');
        
        // Indique que la méthode getAdapter du DbTable renvoie un mock de DbAdapter
        $dbTable->expects($this->any())
                      ->method('getAdapter')
                      ->will($this->returnValue($dbAdapter));

        // peuple le mock Row
        $row->usm_id = 1;
        $row->usm_firstname = 'mock';
        $row->usm_lastname = 'Mock';
        $row->usm_email = 'mock@test.com';
        $row->usm_login = 'mock';
        $row->password = 'mockmd5';
        $row->ut_id = 1;
        
        
        // Indique que la méthode current du Rowset renvoie un row
        $rowset->expects($this->any())
                      ->method('current')
                      ->will($this->returnValue($row));

        // Indique que la méthode find du DbTable renvoie un mock de Rowset
        $dbTable->expects($this->any())
                      ->method('find')
                      ->will($this->returnValue($rowset));

        // Injecte le mock DbTable dans le mapper
        $userMapper->setDbTable($dbTable);
        
        // Appelle la méthode à tester
        $result = $userService->find(1);

    }

    protected function _getCleanMock($className)
     {
        $class = new ReflectionClass($className);
        $methods = $class->getMethods();
        $stubMethods = array();
        foreach ($methods as $method) {
            if ($method->isPublic() || ($method->isProtected()
            && $method->isAbstract())) {
                $stubMethods[] = $method->getName();
            }
        }
        $mocked = $this->getMock(
            $className,
            $stubMethods,
            array(),
            $className . '_MapperTestMock_' . uniqid(),
            false
        );
        return $mocked;
    }
}