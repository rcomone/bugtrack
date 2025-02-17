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
           $project = $this->rowToObject($row); 
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
               $project = $this->rowToObject($row);
               $projects[] = $project;
           }
           return $projects;
    }

	public function delete($id) 
    {
        $where = 'proj_id =' . $id;
        $rowSet = $this->getDbTable()->fetchRow($where);
        if (! $rowSet->current()) {
            return false;
        }
        $rowSet->delete();
    }
    
    public function rowToObject(Zend_Db_Table_Row $row)
    {
        $userRow = $row->findParentRow('User_Model_DbTable_Staffmembre', 'Staffmembre');
        $user = new User_Model_Staffmembre();
        $user->setId($userRow->usm_id)
             ->setLogin($userRow->usm_login);
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
    
    public function insert(Project_Model_Project $project)
    {
        $data = $this->_objectToRow($project);
        unset($data['proj_id']);
        return $this->getDbTable()->insert($data);
    }
    
    public function update(Project_Model_Project $project)
    {
        $data = $this->_objectToRow($project);
        $where = $this->getDbTable()->getAdapter()->quoteInto('proj_id = ?', $data['proj_id']);
        return $this->getDbTable()->update($data, $where);
    } 
    
 	private function _objectToRow(Project_Model_Project $project)
    {
        $projectRow['proj_id'] = $project->getId();
        $projectRow['proj_name'] = $project->getName();
        $projectRow['proj_desc'] = $project->getDescription();
        $projectRow['proj_date'] = $project->getDate();
        $projectRow['proj_statut'] = $project->getStatus();
        $projectRow['proj_hpurl'] = $project->getHomepageUrl();
        $projectRow['proj_docurl'] = $project->getDocUrl();
        $projectRow['usm_id'] = $project->getUser()->getId();
        
        return $projectRow;
    }
}