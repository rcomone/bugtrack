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
 * @package        User
 * @subpackage  Service
 * @desc              User service layer
 * @author           Dev1 Lyon <devlyon1@cleo-consulting.fr>
 * @copyright      DEV LYON
 * @license          http://framework.zend.com/new-bsd   New BSD License
 * @version         Release : 1.0 (2011-12-01)
 *
 */
/**
 * @category       Bugtrack
 * @package        User
 * @subpackage  Service
 * @desc              User service layer
 * @author           Dev1 Lyon <devlyon1@cleo-consulting.fr>
 * @copyright      DEV LYON
 * @license          http://framework.zend.com/new-bsd   New BSD License
 * @version         Release : 1.0 (2011-12-01)
 *
 */
class User_Service_Staffmembre
{
     const STAFF_MEMBER_UPDATED = 'staffMemberUpdated';
     const STAFF_MEMBER_UPDATE_FAILED = 'staffMemberUpdateFailed';
     const STAFF_MEMBER_CREATED = 'staffMemberCreated';
     const STAFF_MEMBER_CREATION_FAILED = 'staffMemberCreationFailed';
     /**
      * Retrieves all user entries at storage layer level
      * @return multitype:User_Model_Staffmembre
      */
     public function getList()
     {
          // TODO - Implement
         return array(
             new User_Model_Staffmembre(),
             new User_Model_Staffmembre(),
             new User_Model_Staffmembre()
         );
     }
     
     /**
      * Deletes a user entry at storage layer level
      * @param User_Model_Staffmembre $user
      * @return boolean
      */
     public function delete(User_Model_Staffmembre $user)
     {
         // TODO - Implement
         return true;
     }
     
     /**
      * Saves a user  entry at storage layer level (insert or update)
      * @param  User_Model_Staffmembre $user
      * @throws Exception if update process failed
      * @return  User_Model_Staffmembre $user
      */
     public function save(User_Model_Staffmembre $user)
     {
          // TODO - Implement
          if ((int) $user->getId() !== 0 ) {
              try {
                  // update
                  return self::STAFF_MEMBER_UPDATED;
              } catch (Exception $e) {
                  return self::STAFF_MEMBER_UPDATE_FAILED;
              }
              
          } else {
              try {
                  // insert
                  return self::STAFF_MEMBER_CREATED;
              } catch (Exception $e) {
                  return self::STAFF_MEMBER_CREATION_FAILED;
              }
          }


     }
     
     /**
      * Authenticates a user
      * @param User_Model_Staffmembre $user
      * @return boolean
      */
     public function authenticate(User_Model_Staffmembre $user)
     {
             // TODO - Implement
             if ('test' === $user->getLogin() && 'testtest' === $user->getPassword()) {
                  return true;
             } else {
                 return false;
             }
     }
     
     /**
      * Retrieves a user given its login at storage layer level
      * @param string $login
      * @return User_Model_Staffmembre|boolean
      */
     public function findByLogin($login)
     {
          $userMapper = new User_Model_Mapper_Staffmembre();
          return $userMapper->findByLogin($login);
     }
     
}