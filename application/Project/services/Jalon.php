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
 * @package        Jalon
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
class Project_Service_Jalon
{
    
     /**
      * Retrieves all Jalon entries at storage layer level
      * @return multitype:Project_Model_Jalon
      */
     public function getList()
     {
          $jalonMapper = new Project_Model_Mapper_Jalon();
         return  $jalonMapper->getList();
     }
     
     /**
      * Deletes a Jalon entry at storage layer level
      * @param Jalon_Model_Jalon $jalon
      * @return boolean
      */
     public function delete(Project_Model_Jalon $jalon)
     {
         $JalonDelete = new Project_Model_Mapper_Jalon();
         return $JalonDelete->delete($jalon);
     }
     
     /**
      * Saves a Jalon  entry at storage layer level (insert or update)
      * @param  Project_Model_Jalon $jalon
      * @throws Exception if update process failed
      * @return  Project_Model_Jalon $jalon
      */
     public function save(Project_Model_Jalon $jalon)
     {
          $JalonSave = new Project_Model_Mapper_Jalon();

		  $JalonSave->save($jalon);
     }
     
     /**
      * Retrieves a Jalon given its id at storage layer level
      * @param integer $jalonId
      * @return Project_Model_Jalon|boolean
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