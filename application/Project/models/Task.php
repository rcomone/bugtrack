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
 * @desc           Task model
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
 * @desc           Task model
 * @author         Dev1 Lyon <devlyon1@cleo-consulting.fr>
 * @copyright      DEV LYON
 * @license        http://framework.zend.com/new-bsd   New BSD License
 * @version        Release : 1.0 (2011-12-01)
 *
 */
 
class Project_Model_Task
{
	/**
	 * Task's ref (formerly DB primary key)
	 * @var int
	 */
	private $_id;
	
	/**
	 * Task's name
	 * @var string
	 */
	private $_name;
	
	/**
	 * Task's date
	 * @var int epoch
	 */
	private $_date;
	
	/**
	 * Task's expected date end of task
	 * @var int epoch
	 */
	private $_expectedDate;
	
	/**
	 * Task's description
	 * @var string
	 */
	private $_description;
	
	/**
	 * Task's status
	 * @var Project_Model_TaskStatus
	 */
	private $_status;
	
	/**
	 * StaffMembre's task
	 * @var User_Model_Staffmembre
	 */
	private $_user;
	
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
	}

	/**
	 * @return the $_expectedDate
	 */
	public function getExpectedDate() {
		return $this->_expectedDate;
	}

	/**
	 * @param int $_expectedDate
	 */
	public function setExpectedDate($_expectedDate) {
		$this->_expectedDate = $_expectedDate;
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
	}

	/**
	 * @return the $_status
	 */
	public function getStatus() {
		return $this->_status;
	}

	/**
	 * @param Project_Model_TaskStatus $_status
	 */
	public function setStatus(Project_Model_TaskStatus $_status) {
		$this->_status = $_status;
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
	}

}