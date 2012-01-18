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
 * @desc           Issue Comment model
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
 * @desc           Issue Comment model
 * @author         Dev1 Lyon <devlyon1@cleo-consulting.fr>
 * @copyright      DEV LYON
 * @license        http://framework.zend.com/new-bsd   New BSD License
 * @version        Release : 1.0 (2011-12-01)
 *
 */
 
class Project_Model_IssueComment
{
    /**
     * IssueComment's ref (formerly DB primary key)
     * @var integer
     */
    private $_id;
    
    /**
     * IssueComment's user creator
     * @var User_Model_Staffmembre
     */
    private $_user;
    
    /**
     * IssueComment's issue
     * @var Project_Model_Issue
     */
    private $_issue;
    
    /**
     * IssueComment's content
     * @var string
     */
    private $_content;
    
    /**
     * IssueComment's creation date
     * @var int epoch
     */
    private $_date;
    
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
     * @return the $_issue
     */
    public function getIssue() {
        return $this->_issue;
    }

    /**
     * @param Project_Model_Issue $_issue
     */
    public function setIssue(Project_Model_Issue $_issue) {
        $this->_issue = $_issue;
        return $this;
    }

    /**
     * @return the $_content
     */
    public function getContent() {
        return $this->_content;
    }

    /**
     * @param string $_content
     */
    public function setContent($_content) {
        $this->_content = $_content;
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
}