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
 * @desc           IssueComment data mapper
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
 * @desc           IssueComment data mapper
 * @author         Dev1 Lyon <devlyon1@cleo-consulting.fr>
 * @copyright      DEV LYON
 * @license        http://framework.zend.com/new-bsd   New BSD License
 * @version        Release : 1.0 (2011-12-02)
 *
 */
 

class Project_Model_Mapper_IssueComment
{
    private $_dbTable;
    
    public function __construct()
    {
        $this->_dbTable = new Project_Model_DbTable_IssueComment();
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
           $issueComment = new Project_Model_IssueComment();
           $issueComment = $this->_rowToObject($row);
           return $issueComment;
    }
    
    public function findByName($name)
    {
           $where = 'proj_name = ?';
           $query = $this->getDbTable()
                         ->select()
                         ->where($where, $name);
           $rowSet = $this->getDbTable()->fetchAll($query); 
           if ( !$rowSet->current()) {
               return false;
           }
           $row = $rowSet->current();
           $issueComment = $this->_rowToObject($row); 
           return $issueComment;
    }
    
    public function getList()
    {
           $rowSet = $this->getDbTable()->fetchAll(); 
           if ( 0 === count($rowSet) ) {
               return false;
           }
           $users = array();
           foreach ($rowSet as $row) {
               $issueComment = $this->_rowToObject($row);
               $issueComments[] = $issueComment;
           }
           return $issueComments;
    }
    
    private function _rowToObject(Zend_Db_Table_Row $row)
    {
    	$issueRow = $row->findParentRow('Project_Model_Issue', 'Issue');
        $issue = new Project_Model_Issue();
        $issue->setId($issueRow->iss_id)
		      ->setName($issueRow->iss_name);
    	
    	$userRow = $row->findParentRow('User_Model_DbTable_Staffmembre', 'Staffmembre');
        $user = new User_Model_Staffmembre();
        $user->setId($userRow->usm_id)
		     ->setName($userRow->usm_name);
		     
        $issueComment = new Project_Model_IssueComment();
        $issueComment->setId($row->isc_id)
				     ->setContent($row->isc_content)
				     ->setDate($row->isc_date)
				     ->setIssue($issue)
				     ->setUser($user);
		return $issueComment;
    }
}