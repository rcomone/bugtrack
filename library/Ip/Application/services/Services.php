<?php
abstract class Ip_Application_services_Services {
    private $_mapper = array();
    /**
     * @return the $_mapper
     */
    public function getMapper ($classMapper = null)
    {
        if (is_null($classMapper)){
            $classMapper = str_replace('Service', 'Model_Mapper', get_class($this));
        }
        if(empty($this->_mapper[$classMapper])) {
            $this->_mapper[$classMapper] = new $classMapper;
        }
        return $this->_mapper[$classMapper];
    }
}