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
 * @package        User
 * @subpackage  Model
 * @desc              Team business model
 * @author           Dev1 Lyon <devlyon1@cleo-consulting.fr>
 * @copyright      DEV LYON
 * @license          http://framework.zend.com/new-bsd   New BSD License
 * @version         Release : 1.0 (2011-12-01)
 *
 */
/**
 * @category       Bugtrack
 * @package        User
 * @subpackage  Model
 * @desc              Team business model
 * @author           Dev1 Lyon <devlyon1@cleo-consulting.fr>
 * @copyright      DEV LYON
 * @license          http://framework.zend.com/new-bsd   New BSD License
 * @version         Release : 1.0 (2011-12-01)
 *
 */
class User_Model_Team
{
    /**
     * Team's ref (formerly DB primary key)
     * @var integer
     */
    private $_id;
    /**
     * Team's name
     * @var string
     */
    private $_name;
    
    /**
     * Team's belonging users.
     * @var multitype:User_Model_Staffmembre
     */
    private $_users;
	/**
     * @return the $_id
     */
    public function getId ()
    {
        return $this->_id;
    }

	/**
     * @param integer $_id
     */
    public function setId ($_id)
    {
        $this->_id = $_id;
        return $this;
    }
	/**
     * @return the $_name
     */
    public function getName ()
    {
        return $this->_name;
    }

	/**
     * @param string $_name
     */
    public function setName ($_name)
    {
        $this->_name = $_name;
        return $this;
    }
	/**
     * @return the $_users
     */
    public function getUsers ()
    {
        return $this->_users;
    }
	/**
     * @param multitype:User_Model_Staffmembre $_users
     */
    public function setUsers ($_users)
    {
        $this->_users = $_users;
        return $this;
    }


   
}