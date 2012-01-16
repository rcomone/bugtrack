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
    
    public function save(User_Model_Staffmembre $user) 
    {

       
        $data = $this->_objectToRow($user);
        
        if (0===(int) $data['usm_id']) {
            unset($data['usm_id']);
            //$data['ut_id'] = 2;

            try  {
                return $this->getDbTable()->insert($data);
            } catch (Zend_Db_Table_Exception $e) {
                throw $e;
            }
        } else {
            $where = $this->getDbTable()
                ->getAdapter()
                ->quoteInto('usm_id = ?', $user->getId());
           $result = $this->getDbTable()
                               ->update($data, $where);
          
        }
    }

	public function delete(User_Model_Staffmembre $user)
    {

		try  {
			$where = $this->getDbTable()
                ->getAdapter()
                ->quoteInto('usm_id = ?', $user->getId());

			$this->getDbTable()->delete($where);

		} catch (Zend_Db_Table_Exception $e) {
			throw $e;
		}
		
    }
    
    
    private function _rowToObject(Zend_Db_Table_Row $row)
    {
           $teamRow = $row->findParentRow('User_Model_DbTable_Team', 'Team');  
                   
           $team = new User_Model_Team();	
           if( $teamRow instanceof User_Model_Team) {	           
	           $team->setId($teamRow->ut_id)
	                     ->setName($teamRow->ut_name);
           }
           
           $user = new User_Model_Staffmembre();
           $user->setId($row->usm_id)
                   ->setFirstname($row->usm_firstname)
                   ->setLastname($row->usm_lastname)
                   ->setEmail($row->usm_email)
                   ->setLogin($row->usm_login);
           
		    if( $team instanceof User_Model_Team) {
	           $user->setTeam($team);
            }
                   
           return $user;
    }
    
    private function _objectToRow(User_Model_Staffmembre $user)
    {

        $userRow['usm_id'] = $user->getId();
        $userRow['usm_firstname'] = $user->getFirstname();
        $userRow['usm_lastname'] = $user->getLastname();
        $userRow['usm_email'] = $user->getEmail();
        $userRow['usm_login'] = $user->getLogin();
        $userRow['usm_password'] = $user->getPassword();
        $userRow['ut_id'] = $user->getTeam();                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       ;

        if( $user->getTeam() instanceof User_Model_Team) {
            $userRow['ut_id'] = $user->getTeam()->getId();
        }
        return $userRow;
        
    }
}