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
 * @desc           User data mapper
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
 * @desc           User data mapper
 * @author         Dev1 Lyon <devlyon1@cleo-consulting.fr>
 * @copyright      DEV LYON
 * @license        http://framework.zend.com/new-bsd   New BSD License
 * @version        Release : 1.0 (2011-12-02)
 *
 */
 

class Project_Model_Mapper_Project
{
    private $_dbTable;
    
    public function __construct()
    {
        $this->_dbTable = new Project_Model_DbTable_Project();
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
           $project = new Project_Model_Project();
           $project = $this->_rowToObject($row);
           return $project;
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
               $project = $this->_rowToObject($row);
               $projects[] = $project;
           }
           return $projects;
    }
    
    private function _rowToObject(Zend_Db_Table_Row $row)
    {
    	$userRow = $row->findParentRow('User_Model_DbTable_Staffmembre', 'Staffmembre');
        $user = new User_Model_Staffmembre();
        $user->setId($userRow->usm_id)
		     ->setName($userRow->usm_name);
        $project = new Project_Model_Project();
        $project->setId($row->proj_id)
				->setName($row->proj_name)
				->setDescription($row->proj_desc)
				->setDate($row->proj_date)
				->setStatus($row->proj_statut)
				->setHomepageUrl($row->proj_hpurl)
				->setDocUrl($row->proj_docurl)
				->setUser($user);
		return $project;
    }
}