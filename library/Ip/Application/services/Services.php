<?php
abstract class Ip_Application_Service_Services {
    private $_mapper;
    /**
     * @return the $_mapper
     */
    public function getMapper ()
    {
        if(is_null($this->_mapper)) {
            $classMapper = str_replace('Service', 'Model_Mapper', get_class($this));
            $this->_mapper = new $classMapper;
        }
        return $this->_mapper;
    }
}