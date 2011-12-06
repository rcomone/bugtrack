<?php
/**
 * Bugtrack
 * 
 * LICENSE
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
 * @desc           Issue service layer
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
 * @desc           Issue service layer
 * @author         Dev1 Lyon <devlyon1@cleo-consulting.fr>
 * @copyright      DEV LYON
 * @license        http://framework.zend.com/new-bsd   New BSD License
 * @version        Release : 1.0 (2011-12-01)
 *
 */
class Project_Service_Issue
{
    const ISSUE_UPDATED = 'issueUpdated';
    const ISSUE_UPDATE_FAILED = 'issueUpdateFailed';
    const ISSUE_CREATED = 'issueCreated';
    const ISSUE_CREATION_FAILED = 'issueCreationFailed';
    /**
     * Retrieves all Issue entries at storage layer level
     * @return multitype:Project_Model_Issue
     */
    public function getList ()
    {
        $issueMapper = new Project_Model_Mapper_Issue();
        return $issueMapper->getList();
    }
 
     /**
      * Deletes a issue entry at storage layer level
      * @param Project_Model_Issue $issue
      * @return boolean
      */
     public function delete(Project_Model_Issue $issue)
     {
         $issueDelete = new Project_Model_Mapper_Issue();
         return $issueDelete->delete($issue);
     }
     
     /**
      * Saves a issue entry at storage layer level (insert or update)
      * @param  Project_Model_Issue $issue
      * @throws Exception if update process failed
      * @return mixed const
      */
     public function save(Project_Model_Issue $issue)
     {
        $issueMapper = new Project_Model_Mapper_Issue();
        if ((int)$issue->getId() !== 0){
            try {
                $issueMapper->update($issue);
                return self::ISSUE_UPDATED;
            } catch (Exception $e) {
                return self::ISSUE_UPDATE_FAILED;
            }
        } else {
            try {
                $issueMapper->insert($issue);
                return self::ISSUE_CREATED;
            } catch (Exception $e) {
                return self::ISSUE_CREATED_FAILED;
            }
        }
     }
 
     /**
      * Retrieves a project given its id at storage layer level
      * @param integer $projectId
      * @return Project_Model_Project|boolean
      */
     public function find($issueId)
     {
          $issueFind = new Project_Model_Mapper_Issue();
          if ((int)$issueId !== 0) {
             $issue = $issueFind->find((int)$issueId);
             return $issue;
          } else {
              return false;
          }
     }
 }