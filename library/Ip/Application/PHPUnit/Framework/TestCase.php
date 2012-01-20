<?php
class Ip_Application_PHPUnit_Framework_TestCase extends PHPUnit_Framework_TestCase {
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