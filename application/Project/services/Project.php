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
 * @subpackage     Service
 * @desc           Project service layer
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
 * @desc           Project service layer
 * @author         Dev1 Lyon <devlyon1@cleo-consulting.fr>
 * @copyright      DEV LYON
 * @license        http://framework.zend.com/new-bsd   New BSD License
 * @version        Release : 1.0 (2011-12-01)
 *
 */
class Project_Service_Project
{
	 const STAFF_MEMBER_UPDATED = 'projectUpdated';
     const STAFF_MEMBER_UPDATE_FAILED = 'projectUpdateFailed';
     const STAFF_MEMBER_CREATED = 'projectCreated';
     const STAFF_MEMBER_CREATION_FAILED = 'projectCreationFailed';
     /**
      * Retrieves all projects entries at storage layer level
      * @return multitype:Project_Model_Project
      */
     public function getList()
     {
          $projectMapper = new Project_Model_Mapper_Project();
          return $projectMapper->getList();
     }
     
     /**
      * Deletes a project entry at storage layer level
      * @param Project_Model_Project $project
      * @return boolean
      */
     public function delete(Project_Model_Project $project)
     {
         $projectDelete = new Project_Model_Mapper_Project();
         return $projectDelete->delete($project);
     }
     
     /**
      * Saves a project  entry at storage layer level (insert or update)
      * @param  Project_Model_Project $project
      * @throws Exception if update process failed
      * @return  Project_Model_Project $project
      */
     public function save(Project_Model_Project $project)
     {
        $projectMapper = new Project_Model_Mapper_Project();
        if ((int)$project->getId() !== 0){
            try {
                $projectMapper->update($project);
                return self::STAFF_MEMBER_UPDATED;
            } catch (Exception $e) {
                return self::STAFF_MEMBER_UPDATE_FAILED;
            }
        } else {
            try {
                $projectMapper->insert($project);
                return self::STAFF_MEMBER_CREATED;
            } catch (Exception $e) {
                return self::STAFF_MEMBER_CREATED_FAILED;
            }
        }
     }
     
     /**
      * Retrieves a project given its id at storage layer level
      * @param integer $projectId
      * @return Project_Model_Project|boolean
      */
     public function find($projectId)
     {
          $projectFind = new Project_Model_Mapper_Project();
          
          if ((int) $projectId !== 0) {
             $project = $projectFind->find((int) $projectId);
             return $project;
          } else {
              return false;
          }
     }
}