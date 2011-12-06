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
class Project_Service_Task
{
    
     /**
      * Retrieves all Task entries at storage layer level
      * @return multitype:Project_Model_Task
      */
     public function getList()
     {
          $taskMapper = new Project_Model_Mapper_Task();
         return $taskMapper->getList();
     }
     
     /**
      * Deletes a Task entry at storage layer level
      * @param Project_Model_Task $task
      * @return boolean
      */
     public function delete(Project_Model_Task $task)
     {
         $taskDelete = new Project_Model_Mapper_Issue();
         return $IssueDelete->delete($issue);
     }
     
     /**
      * Saves a Task Mapper  entry at storage layer level (insert or update)
      * @param  Project_Model_Task $task
      * @throws Exception if update process failed
      * @return  Project_Model_Issue $issue
      */
     public function save(Project_Model_Task $task)
     {
          $taskSave = new Project_Model_Mapper_Task();

		  $taskSave->save($task);
     }
     
     /**
      * Retrieves a Task given its id at storage layer level
      * @param integer $taskId
      * @return Project_Model_Task |boolean
      */
     public function find($taskId)
     {
          $taskFind = new Project_Model_Mapper_Task();
          
          if ((int) $taskId !== 0) {
             $task = $taskFind ->find((int) $taskId);
             return $task;
          } else {
              return false;
          }
     }

     
     
}