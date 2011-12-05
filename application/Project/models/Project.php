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
 * @subpackage  Model
 * @desc           Project business model
 * @author         Dev1 Lyon <devlyon1@cleo-consulting.fr>
 * @copyright      DEV LYON
 * @license        http://framework.zend.com/new-bsd   New BSD License
 * @version        Release : 1.0 (2011-12-01)
 *
 */
/**
 * @category       Bugtrack
 * @package        Project
 * @subpackage  Model
 * @desc           Project business model
 * @author         Dev1 Lyon <devlyon1@cleo-consulting.fr>
 * @copyright      DEV LYON
 * @license        http://framework.zend.com/new-bsd   New BSD License
 * @version        Release : 1.0 (2011-12-01)
 *
 */

class Project_Model_Project
{
    /**
     * Project's ref (formerly DB primary key)
     * @var integer
     */
    private $_id;
    /**
     * Project's name
     * @var string
     */
    private $_name;
    /**
     * Project's description
     * @var string
     */
    private $_description;
    /**
     * Project's status
     * @var string
     */
    private $_status;
    /**
     * Project's date creation
     * @var int epoch
     */
    private $_date;
    /**
     * Project's homepage URL
     * @var string
     */
    private $_homepageUrl;
    /**
     * Project's documentation url
     * @var string
     */
    private $_docUrl;
    /**
     * Project's 
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
	 * @param integer $_id
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
	 * @param string $_status
	 */
	public function setStatus($_status) {
		$this->_status = $_status;
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
	 * @return the $_homepageUrl
	 */
	public function getHomepageUrl() {
		return $this->_homepageUrl;
	}

	/**
	 * @param string $_homepageUrl
	 */
	public function setHomepageUrl($_homepageUrl) {
		$this->_homepageUrl = $_homepageUrl;
	}

	/**
	 * @return the $_docUrl
	 */
	public function getDocUrl() {
		return $this->_docUrl;
	}

	/**
	 * @param string $_docUrl
	 */
	public function setDocUrl($_docUrl) {
		$this->_docUrl = $_docUrl;
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