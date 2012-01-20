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
 * @desc           Issue model
 * @author         Dev1 Lyon <devlyon1@cleo-consulting.fr>
 * @copyright      DEV LYON
 * @license        http://framework.zend.com/new-bsd   New BSD License
 * @version        Release : 1.0 (2011-12-01)
 *
 */
/** 
 * 
 * @category       Bugtrack
 * @package        Project
 * @subpackage     Model
 * @desc           Issue model
 * @author         Dev1 Lyon <devlyon1@cleo-consulting.fr>
 * @copyright      DEV LYON
 * @license        http://framework.zend.com/new-bsd   New BSD License
 * @version        Release : 1.0 (2011-12-01)
 *
 */
 
class Project_Model_Issue
{
    /**
     * Issue's ref (formerly DB primary key)
     * @var integer
     */
    private $_id;
    
    /**
     * Issue's name
     * @var string
     */
    private $_name;
    
    /**
     * Issue's type
     * @var Project_Model_IssueType
     */
    private $_type;
    
    /**
     * Issue's status
     * @var Project_Model_IssueStatus
     */
    private $_status;
    
    /**
     * Issue's creation date
     * @var int epoch
     */
    private $_date;
    
    /**
     * Issue's description
     * @var string
     */
    private $_description;
    
    /**
     * Issue's user creator
     * @var User_Model_Staffmembre
     */
    private $_user;
    
    /**
     * Issue's project dependent
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
     * @param integer $_id
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
     * @return the $_type
     */
    public function getType() {
        return $this->_type;
    }

    /**
     * @param Project_Model_IssueType $_type
     */
    public function setType(Project_Model_IssueType $_type) {
        $this->_type = $_type;
        return $this;
    }

    /**
     * @return the $_status
     */
    public function getStatus() {
        return $this->_status;
    }

    /**
     * @param Project_Model_IssueStatus $_status
     */
    public function setStatus(Project_Model_IssueStatus $_status) {
        $this->_status = $_status;
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
     * @return the $_user
     */
    public function getUser() {
        return $this->_user;
    }

    /**
     * @param User_Model_Staffmembre $_user
     */
    public function setUser(User_Model_Staffmembre $_user) {
        $this->_user = $_user;
        return $this;
    }

    /**
     * @return the $_project
     */
    public function getProject() {
        return $this->_project;
    }

    /**
     * @param Project_Model_Project $_project
     */
    public function setProject(Project_Model_Project $_project) {
        $this->_project = $_project;
        return $this;
    }

}