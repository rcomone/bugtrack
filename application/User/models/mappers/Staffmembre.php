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
 * @desc              User data mapper
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
 * @desc              User data mapper
 * @author           Dev1 Lyon <devlyon1@cleo-consulting.fr>
 * @copyright      DEV LYON
 * @license          http://framework.zend.com/new-bsd   New BSD License
 * @version         Release : 1.0 (2011-12-02)
 *
 */
 

class User_Model_Mapper_Staffmembre
{
    private $_dbTable;
    
    public function __construct()
    {
        $this->_dbTable = new User_Model_DbTable_Staffmembre();
    }
    
    public function getDbTable()
    {
        return $this->_dbTable;
    }
    
    public function find($id)
    {
           $rowSet = $this->getDbTable()->find((int) $id);  
           if ( !$rowSet->current()) {
               return false;
           }
           $row = $rowSet->current();
           $user = new User_Model_Staffmembre();
           $user = $this->_rowToObject($row);
           return $user;
    }
    
    public function findByLogin($login)
    {
           $where = 'usm_login = ?';
           $query = $this->getDbTable()
                                 ->select()
                                 ->where($where, $login);
           $rowSet = $this->getDbTable()->fetchAll($query); 
           if ( !$rowSet->current()) {
               return false;
           }
           $row = $rowSet->current();
           $user = $this->_rowToObject($row); 
           return $user;
    }
    
    public function getList()
    {
           $rowSet = $this->getDbTable()->fetchAll(); 
           if ( 0 === count($rowSet) ) {
               return false;
           }
           $users = array();
           foreach ($rowSet as $row) {
               $user = $this->_rowToObject($row);
               $users[] = $user;
           }
           return $users;
    }
    
    private function _rowToObject(Zend_Db_Table_Row $row)
    {
           $teamRow = $row->findParentRow('User_Model_DbTable_Team', 'Team');
           $team = new User_Model_Team();
           $team->setId($teamRow->ut_id)
                     ->setName($teamRow->ut_name);
           $user = new User_Model_Staffmembre();
           $user->setId($row->usm_id)
                ->setFirstname($row->usm_firstname)
                ->setLastname($row->usm_lastname)
                ->setEmail($row->usm_email)
                ->setLogin($row->usm_login)
                ->setTeam($team);
           return $user;
    }
    
    public function create(User_Model_Staffmembre $user){
    	$data = array(
	            'usm_firstname'   => $user->getFirstname(),
    			'usm_lastname'    => $user->getLastname(),
    			'usm_email'  	  => $user->getEmail(),
    			'usm_login'  	  => $user->getLogin(),
    			'usm_password'    => $user->getPassword()    	
	    );
	    print_r($data);
	    
	    try{
       		$this->getDbTable()->insert($data);
	    } catch (Exception $e) {
	    	$e->getMessage();
	    }
    }
}












