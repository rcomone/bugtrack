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
 * @desc           Issue Status model
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
 * @desc           Issue Status model
 * @author         Dev1 Lyon <devlyon1@cleo-consulting.fr>
 * @copyright      DEV LYON
 * @license        http://framework.zend.com/new-bsd   New BSD License
 * @version        Release : 1.0 (2011-12-01)
 *
 */
 
class Project_Model_IssueStatus
{
	/**
	 * IssueStatus's status (formerly DB primary key)
	 * @var int
	 */
	private $_id;
	
	/**
	 * IssueStatus's title
	 * @var string
	 */
	private $_title;
	
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
	 * @return the $_title
	 */
	public function getTitle() {
		return $this->_title;
	}

	/**
	 * @param string $_title
	 */
	public function setTitle($_title) {
		$this->_title = $_title;
	}
}