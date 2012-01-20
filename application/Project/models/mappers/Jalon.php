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
 * @desc           Jalon data mapper
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
 * @desc           Jalon data mapper
 * @author         Dev1 Lyon <devlyon1@cleo-consulting.fr>
 * @copyright      DEV LYON
 * @license        http://framework.zend.com/new-bsd   New BSD License
 * @version        Release : 1.0 (2011-12-02)
 *
 */
 

class Project_Model_Mapper_Jalon
{
    private $_dbTable;
    
    public function __construct()
    {
        $this->_dbTable = new Project_Model_DbTable_Jalon();
    }
    
    public function getDbTable()
    {
        return $this->_dbTable;
    }
    
    public function find($id)
    {
        $rowSet = $this->getDbTable()->find((int)$id);
        if (! $rowSet->current()) {
            return false;
        }
        $row = $rowSet->current();
        $project = new Project_Model_Jalon();
        $project = $this->_rowToObject($row);
        return $project;
    }
    
    public function findByName($name)
    {
        $where = 'jal_name = ?';
        $query = $this->getDbTable()
            ->select()
            ->where($where, $name);
        $rowSet = $this->getDbTable()->fetchAll($query);
        if (!$rowSet->current()) {
            return false;
        }
        $row = $rowSet->current();
        $jalon = $this->_rowToObject($row);
        return $jalon;
    }
    
    public function getList ()
    {
        $rowSet = $this->getDbTable()->fetchAll();
        if (0 === count($rowSet)) {
            return false;
        }
        $users = array();
        foreach ($rowSet as $row) {
            $jalon = $this->_rowToObject($row);
            $jalons[] = $jalon;
        }
        return $jalons;
    }
    
    public function delete ($id)
    {
        $where = 'jal_id =' . $id;
        $rowSet = $this->getDbTable()->fetchRow($where);
        if (! $rowSet->current()) {
            return false;
        }
        $rowSet->delete();
    }    
    
    public function insert(Project_Model_Jalon $jalon)
    {
    	$data = $this->_objectToRow($jalon);
        unset($data['jal_id']);
        return $this->getDbTable()->insert($data);    	
    }
    
    public function update(Project_Model_Jalon $jalon)
    {
    	$data = $this->_objectToRow($jalon);
        $where = $this->getDbTable()->getAdapter()->quoteInto('jal_id = ?', $data['jal_id']);
        return $this->getDbTable()->update($data, $where);
    }
    
    public function save(Project_Model_Jalon $jalon)
    {
        $data = $this->_objectToRow($jalon);
        if (0 === (int)$data['jal_id']) {
            unset($data['jal_id']);
            try {
                $this->insert($data);
            } catch (Zend_Db_Table_Exception $e) {
                throw $e;
            }
        } else {
            $this->update($data);
        }
    }
    
    private function _rowToObject(Zend_Db_Table_Row $row)
    {
    	$projectRow = $row->findParentRow('Project_Model_DbTable_Project', 'Project');
    	$projectMapper = new Project_Model_Mapper_Project();
        $project = new Project_Model_Project();
        $project = $projectMapper->rowToObject($projectRow);
        
        $jalon = new Project_Model_Jalon();
        $jalon->setId($row->jal_id)
			   ->setName($row->jal_name)
			   ->setDescription($row->jal_description)
			   ->setDate($row->jal_date)
			   ->setProject($project);
		return $jalon;
    }

    private function _objectToRow(Project_Model_Jalon $jalon)
    {
    	$jalonRow['jal_id'] = $jalon->getId();
    	$jalonRow['jal_name'] = $jalon->getName();
    	$jalonRow['jal_description'] = $jalon->getDescription();
    	$jalonRow['jal_date'] = $jalon->getDate();
    	$jalonRow['proj_id'] = $jalon->getProject()->getId();
    	
    	return $jalonRow;
    }
}