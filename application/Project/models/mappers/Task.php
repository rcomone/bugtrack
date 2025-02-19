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
 * @desc           Task data mapper
 * @author         Dev1 Lyon <devlyon1@cleo-consulting.fr>
 * @copyright      DEV LYON
 * @license        http://framework.zend.com/new-bsd   New BSD License
 * @version        Release : 1.0 (2011-12-02)
 *
 */
/**
 * @category       Bugtrack
 * @package        Project
 * @subpackage     Model
 * @desc           Task data mapper
 * @author         Dev1 Lyon <devlyon1@cleo-consulting.fr>
 * @copyright      DEV LYON
 * @license        http://framework.zend.com/new-bsd   New BSD License
 * @version        Release : 1.0 (2011-12-02)
 *
 */
 

class Project_Model_Mapper_Task
{
    private $_dbTable;
    
    public function __construct()
    {
        $this->_dbTable = new Project_Model_DbTable_Task();
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
           $project = new Project_Model_Task();
           $project = $this->_rowToObject($row);
           return $project;
    }
    
    public function findByName($name)
    {
           $where = 'tsk_name = ?';
           $query = $this->getDbTable()
                                 ->select()
                                 ->where($where, $name);
           $rowSet = $this->getDbTable()->fetchAll($query); 
           if ( !$rowSet->current()) {
               return false;
           }
           $row = $rowSet->current();
           $task = $this->rowToObject($row); 
           return $task;
    }
    
    public function getList()
    {
           $rowSet = $this->getDbTable()->fetchAll(); 
           if ( 0 === count($rowSet) ) {
               return false;
           }
           $users = array();
           foreach ($rowSet as $row) {
               $task = $this->rowToObject($row);
               $tasks[] = $task;
           }
           return $tasks;
    }
    
    
	public function delete ($id) 
    {
    	$where= 'tsk_id ='.$id;
    	$rowSet = $this->getDbTable()->fetchRow($where);
    	
         if ( !$rowSet->current()) {
               return false;
           }    	
           
        $rowSet->delete();
    }    
    
    
    private function insert($data) {
    	
    	return $this->getDbTable()->insert($data);
    	
    }
    
    
    private function update ($data)
    {
    	
    	$where = $this->getDbTable()
    		->getAdapter()
    		->quoteInto('tsk_id = ?', $data['tsk_id']);
    	
    	return $this->getDbTable()->update($data, $where);
    }
    
    
    public function save (Project_Model_Task $task) {
    	
    	$data = $this->_objectToRow($task);
    
    if (0===(int) $data['task_id']) {
            unset($data['task_id']);
            try {
            	$this->insert($data);
            } catch (Zend_Db_Table_Exception $e) {
                throw $e;
            }
        }
    else {
    		$this->update($data);	
    }
    
    }
    
   
    public function rowToObject(Zend_Db_Table_Row $row)
    {
    	$taskRow = $row->findParentRow('Project_Model_TaskStatus', 'TaskStatus');
        $status = new Project_Model_Mapper_Task();
        $status ->setId($taskRow->tskstu_id);
        
        $userRow = $row->findParentRow('User_Model_DbTable_Staffmembre', 'Staffmembre');
        $user = new User_Model_Staffmembre();
        $user->setId($userRow->usm_id);
        
        $task = new Project_Model_Task();
        $task->setId($row->tsk_id)
			   ->setName($row->tsk_name)
			   ->setDescription($row->jal_description)
			   ->setDate($row->tsk_date)
			   ->setExpectedDate($row->tsk_expectDate)
			   ->setDescription($row->tsk_desc)
			   ->setStatus($status)
			   ->setUser($user); 
		return $task;
    }
    
}