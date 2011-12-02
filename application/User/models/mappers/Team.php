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
 * @desc              Team data mapper
 * @author           Dev1 Lyon <devlyon1@cleo-consulting.fr>
 * @copyright      DEV LYON
 * @license          http://framework.zend.com/new-bsd   New BSD License
 * @version         Release : 1.0 (2011-12-02)
 *
 */
/**
 * @category       Bugtrack
 * @package        User
 * @subpackage  Model
 * @desc              Team data mapper
 * @author           Dev1 Lyon <devlyon1@cleo-consulting.fr>
 * @copyright      DEV LYON
 * @license          http://framework.zend.com/new-bsd   New BSD License
 * @version         Release : 1.0 (2011-12-02)
 *
 */
 

class User_Model_Mapper_Team
{
    private $_dbTable;
    
    public function __construct()
    {
        $this->_dbTable = new User_Model_DbTable_Team();
    }
    
    public function getDbTable()
    {
        return $this->_dbTable;
    }
    
    /**
     * Finds a team given its id (formerly primary key)
     * @param integer $id
     * @return boolean|User_Model_Team
     */
    public function find($id)
    {
           $rowSet = $this->getDbTable()->find((int) $id);  
           if ( !$rowSet->current()) {
               return false;
           }
           $row = $rowSet->current();
           $team = new User_Model_Team();
           $team = $this->_rowToObject($row);
           return $team;
    }
    
    /**
     * Finds a team given its name
     * @param string $name
     * @return boolean|User_Model_Team
     */
    public function findByName($name)
    {
           $where = 'ut_name = ?';
           $query = $this->getDbTable()
                                 ->select()
                                 ->where($where, $name);
           $rowSet = $this->getDbTable()->fetchAll($query); 
           if ( !$rowSet->current()) {
               return false;
           }
           $row = $rowSet->current();
           $team = $this->_rowToObject($row); 
           return $team;
    }
    
    /**
     * Retrieves teams stored in DB
     * @return boolean|multitype:User_Model_Team 
     */
    public function getList()
    {
           $rowSet = $this->getDbTable()->fetchAll(); 
           if ( 0 === count($rowSet) ) {
               return false;
           }
           $teams = array();
           foreach ($rowSet as $row) {
               $team = $this->_rowToObject($row);
               $teams[] = $team;
           }
           return $teams;
    }
    
    private function _rowToObject(Zend_Db_Table_Row $row)
    {
           $team = new User_Model_Team();
           $team->setId($row->ut_id)
                     ->setName($row->ut_name);
                     
           $users = array();
           $usersRowSet = $row->findDependentRowset('User_Model_DbTable_Staffmembre');
           foreach($usersRowSet as $userRow) {
               $user = new User_Model_Staffmembre();
               $user->setId($userRow->usm_id)
                       ->setFirstname($userRow->usm_firstname)
                       ->setLastname($userRow->usm_lastname)
                       ->setEmail($userRow->usm_email)
                       ->setLogin($userRow->usm_login)
                       ->setTeam($team);
               $users[] = $user;
           }
           $team->setUsers($users);
           return $team;
    }
}