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
 * @package        Issue
 * @subpackage  Service
 * @desc           Jalon service layer
 * @author         Dev1 Lyon <devlyon1@cleo-consulting.fr>
 * @copyright      DEV LYON
 * @license        http://framework.zend.com/new-bsd   New BSD License
 * @version        Release : 1.0 (2011-12-01)
 *
 */
/**
 * @category       Bugtrack
 * @package        Project
 * @subpackage     Service
 * @desc           Jalon service layer
 * @author         Dev1 Lyon <devlyon1@cleo-consulting.fr>
 * @copyright      DEV LYON
 * @license        http://framework.zend.com/new-bsd   New BSD License
 * @version        Release : 1.0 (2011-12-01)
 *
 */
class Project_Service_Jalon
{
	const JALON_UPDATED = 'jalonUpdated';
	const JALON_UPDATE_FAILED = 'jalonUpdateFailed';
	const JALON_CREATED = 'jalonCreated';
	const JALON_CREATION_FAILED = 'jalonCreationFailed';
     
     /**
      * Retrieves all Jalon entries at storage layer level
      * @return multitype:Project_Model_Jalon
      */
     public function getList()
     {
         $jalonMapper = new Project_Model_Mapper_Jalon();
         return $jalonMapper->getList();
     }
     
     /**
      * Deletes a Jalon entry at storage layer level
      * @param Project_Model_Jalon $jalon
      * @return boolean
      */
     public function delete(Project_Model_Jalon $jalon)
     {
         $jalonDelete = new Project_Model_Mapper_Jalon();
         return $jalonDelete->delete($jalon);
     }
     
     /**
      * Saves a Jalon Mapper entry at storage layer level (insert or update)
      * @param  Project_Model_Jalon $jalon
      * @throws Exception if update process failed
      * @return  Project_Model_Jalon $jalon
      */
     public function save(Project_Model_Jalon $jalon)
     {
     	$jalonSave = new Project_Model_Mapper_Jalon();
		if ((int)$jalon->getId() !== 0){
			try {
				$jalonSave->update($jalon);
				return self::JALON_UPDATED;
			} catch (Exception $e) {
				return self::JALON_UPDATE_FAILED;
			}
		} else {
			try {
				$jalonSave->insert($jalon);
				return self::JALON_CREATED;
			} catch (Exception $e) {
				return self::JALON_CREATION_FAILED;
			}
		}
     }
     
     /**
      * Retrieves a Jalon given its id at storage layer level
      * @param integer $jalonId
      * @return Project_Model_Jalon | boolean
      */
     public function find($jalonId)
     {
		$jalonFind = new Project_Model_Mapper_Jalon();
		          
		if ((int) $jalonId !== 0) {
			$jalon = $jalonFind->find((int) $jalonId);
			return $jalon;
		} else {
			return false;
		}
     }
     
}