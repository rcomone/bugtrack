<?php
abstract class Ip_Application_Service_Services {
    private $_mapper = array();
    /**
     * @return the $_mapper
     */
    public function getMapper ($classMapper = null)
    {
        if(is_null($this->_mapper)) {
            if (is_null($classMapper)){
                 $classMapper = str_replace('Service', 'Model_Mapper', get_class($this));
            }
            $this->_mapper = new $classMapper;
        }
        return $this->_mapper[$classMapper];
    }
}