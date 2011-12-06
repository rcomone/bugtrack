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
 * @desc           Issue data mapper
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
 * @desc           Issue data mapper
 * @author         Dev1 Lyon <devlyon1@cleo-consulting.fr>
 * @copyright      DEV LYON
 * @license        http://framework.zend.com/new-bsd   New BSD License
 * @version        Release : 1.0 (2011-12-02)
 *
 */
 

class Project_Model_Mapper_Issue
{
    private $_dbTable;
    
    public function __construct()
    {
        $this->_dbTable = new Project_Model_DbTable_Issue();
    }
    
    public function getDbTable()
    {
        return $this->_dbTable;
    }
    
    public function find($id)
    {
           $rowSet = $this->getDbTable()->find((int)$id);  
           if ( !$rowSet->current()) {
               return false;
           }
           $row = $rowSet->current();
           $issue = new Project_Model_Issue();
           $issue = $this->_rowToObject($row);
           return $issue;
    }
    
    public function findByName($name)
    {
           $where = 'iss_name = ?';
           $query = $this->getDbTable()
                                 ->select()
                                 ->where($where, $name);
           $rowSet = $this->getDbTable()->fetchAll($query); 
           if ( !$rowSet->current()) {
               return false;
           }
           $row = $rowSet->current();
           $project = $this->_rowToObject($row); 
           return $project;
    }
    
    public function getList()
    {
           $rowSet = $this->getDbTable()->fetchAll(); 
           if ( 0 === count($rowSet) ) {
               return false;
           }
           $users = array();
           foreach ($rowSet as $row) {
               $issue = $this->_rowToObject($row);
               $issues[] = $issue;
           }
           return $issues;
    }
    
    public function delete($id)
    {
    	$where = 'iss_id =' . $id;
        $rowSet = $this->getDbTable()->fetchRow($where);
        if (! $rowSet->current()) {
            return false;
        }
        $rowSet->delete();
    }
    
	public function save(Project_Model_Issue $issue)
    {
        $data = $this->_objectToRow($issue);
        if (0 === (int)$data['iss_id']) {
            unset($data['iss_id']);
            try {
                $this->insert($data);
            } catch (Zend_Db_Table_Exception $e) {
                throw $e;
            }
        } else {
            $this->update($data);
        }
    }
    
	private function insert($data)
    {
        return $this->getDbTable()->insert($data);
    }
    
    private function update($data)
    {
    	$where = $this->getDbTable()->getAdapter()->quoteInto('iss_id = ?', $data['iss_id']);
    	return $this->getDbTable()->update($data, $where);
    }
    
    private function _objectToRow(Project_Model_Issue $issue)
    {
    	$issueRow['iss_id'] = $issue->getId();
    	$issueRow['iss_name'] = $issue->getName();
    	$issueRow['iss_desc'] = $issue->getDescription();
    	$issueRow['istyp_id'] = $issue->getType()->getId();
    	$issueRow['istut_id'] = $issue->getStatus()->getId();
    	$issueRow['iss_date'] = $issue->getDate();
    	$issueRow['usm_id'] = $issue->getUser()->getId();
    	$issueRow['proj_id'] = $issue->getProject()->getId();
    	
    	return $issueRow;
    }
    
    private function _rowToObject(Zend_Db_Table_Row $row)
    {
    	$statusRow = $row->findParentRow('Project_Model_DbTable_IssueStatus', 'IssueStatus');
        $status = new Project_Model_IssueStatus();
        $status->setId($statusRow->istut_id)
		       ->setTitle($statusRow->istut_title);
		       
    	$typeRow = $row->findParentRow('Project_Model_DbTable_IssueType', 'IssueType');
        $type = new Project_Model_IssueType();
        $type->setId($typeRow->istyp_id)
		     ->setTitle($typeRow->istyp_title);
		     
    	$projectRow = $row->findParentRow('Project_Model_DbTable_Project', 'Project');
    	$projectMapper = new Project_Model_Mapper_Project();
        $project = new Project_Model_Project();
        $project = $projectMapper->rowToObject($projectRow);
        
    	$userRow = $row->findParentRow('User_Model_DbTable_Staffmembre', 'Staffmembre');
        $user = new User_Model_Staffmembre();
        $user->setId($userRow->usm_id)
             ->setLogin($userRow->usm_login);
             
        $issue = new Project_Model_Issue();
        $issue->setId($row->iss_id)
			  ->setName($row->iss_name)
			  ->setDescription($row->iss_desc)
			  ->setDate($row->iss_date)
			  ->setStatus($status)
			  ->setType($type)
			  ->setProject($project)
			  ->setUser($user);
		return $issue;
    }
}