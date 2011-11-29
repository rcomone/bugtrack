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
 * @package        Core
 * @subpackage  Model
 * @desc               Mapper absrtaction
 * @author           Dev1 Lyon <devlyon1@cleo-consulting.fr>
 * @copyright      DEV LYON
 * @license           http://framework.zend.com/new-bsd   New BSD License
 * @version          Release : 1.0 (2011-11-29)
 */
/**
 * 
 * @category       Bugtrack
 * @package        Core
 * @subpackage  Model
 * @desc               Mapper absrtaction
 * @author           Dev1 Lyon <devlyon1@cleo-consulting.fr>
 * @copyright      DEV LYON
 * @license           http://framework.zend.com/new-bsd   New BSD License
 * @version          Release : 1.0 (2011-11-29)
 *
 */
abstract class Core_Model_Mapper_Abstract
{
    
    /**
     * DbTable adapter
     * @var Zend_Db_Table_Abstract
     */
    protected $_dbTable = null;

    /**
     * Finds an entry for a given id into database
     * @param integer $id  Numeric id of entry to find (primary key)
     * @throws Zend_Db_Table_Exception
     * @return  Mixed
     */
    public function find($id)
    {
        $rowSet = $this->_getDbTable()->find($id);
        if (!$row = $rowSet->current()) {
            throw new Zend_Db_Table_Exception('Enregistrement inexistant', 404);
        }
        return $this->_rowToObject($row);
    }
    
    /**
     * Returns an array of objects fetched from database
     * @return multitype:NULL 
     */
    public function getList()
    {
        $rowSet = $this->_getDbTable()->fetchAll();
        $objectList = array();
        foreach ($rowSet as $row) {
           $objectList[] = $this->_rowToObject($row);
        }
        return $objectList;
    }
    
    /**
     * Builds an object from a Zend_Db_Table_Row
     * @param Zend_Db_Table_Row $row
     * @return Mixed
     */
    abstract protected function _rowToObject(Zend_Db_Table_Row $row);
    
    /**
     * Retrieves or instanciates Zend_Db_Table object linked to mapper
     * @return Zend_Db_Table_Abstract
     */
    protected function _getDbTable()
    {
        if (null === $this->_dbTable) {
            $className = str_replace('Mapper', 'DbTable', get_class($this));
            $this->_dbTable = new $className;
        }
        return $this->_dbTable;
    }
    
}
