<?php 
/**
 * Bugtrack
 *  
 *  LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 * 
 * @category       Bugtrack
 * @package        Project
 * @subpackage     Model
 * @desc           Jalon model
 * @author         Dev1 Lyon <devlyon1@cleo-consulting.fr>
 * @copyright      DEV LYON
 * @license        http://framework.zend.com/new-bsd   New BSD License
 * @version        Release : 1.0 (2011-12-01)
 *
 */
/**
 * @category       Bugtrack
 * @package        Project
 * @subpackage     Model
 * @desc           Jalon model
 * @author         Dev1 Lyon <devlyon1@cleo-consulting.fr>
 * @copyright      DEV LYON
 * @license        http://framework.zend.com/new-bsd   New BSD License
 * @version        Release : 1.0 (2011-12-01)
 *
 */
 
class Project_Model_Jalon
{
    /**
     * Jalon's ref (formerly DB primary key)
     * @var int
     */
    private $_id;
    
    /**
     * Jalon's name
     * @var string
     */
    private $_name;
    
    /**
     * Jalon's description
     * @var string
     */
    private $_description;
    
    /**
     * Jalon's creation date
     * @var int epoch
     */
    private $_date;
    
    /**
     * Project's jalon
     * @var Project_Model_Project
     */
    private $_project;
    
    /**
     * @return the $_id
     */
    public function getId() {
        return $this->_id;
    }

    /**
     * @param int $_id
     */
    public function setId($_id) {
        $this->_id = $_id;
        return $this;
    }

    /**
     * @return the $_name
     */
    public function getName() {
        return $this->_name;
    }

    /**
     * @param string $_name
     */
    public function setName($_name) {
        $this->_name = $_name;
        return $this;
    }

    /**
     * @return the $_description
     */
    public function getDescription() {
        return $this->_description;
    }

    /**
     * @param string $_description
     */
    public function setDescription($_description) {
        $this->_description = $_description;
        return $this;
    }

    /**
     * @return the $_date
     */
    public function getDate() {
        return $this->_date;
    }

    /**
     * @param int $_date
     */
    public function setDate($_date) {
        $this->_date = $_date;
        return $this;
    }

    /**
     * @return the $_project
     */
    public function getProject() {
        return $this->_project;
        return $this;
    }

    /**
     * @param Project_Model_Project $_project
     */
    public function setProject(Project_Model_Project $_project) {
        $this->_project = $_project;
        return $this;
    }
}