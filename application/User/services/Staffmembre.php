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
          $userMapper = new User_Model_Mapper_Staffmembre();
          return $userMapper->getList();
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

         try {
                  $userMapper = new User_Model_Mapper_Staffmembre();
                  $userMapper->save($user);
                  return self::STAFF_MEMBER_CREATED;
         } catch (Exception $e) {
                  return self::STAFF_MEMBER_CREATION_FAILED;
         }

     }
     
     /**
      * Authenticates a user
      * @param User_Model_Staffmembre $user
      * @return boolean
      */
     public function authenticate(User_Model_Staffmembre $user)
     {
            $authAdapter = new Zend_Auth_Adapter_DbTable();
            $authAdapter->setTableName('user_staffmembre')
                                ->setIdentityColumn('usm_login')
                                ->setCredentialColumn('usm_password')
                                ->setIdentity($user->getLogin())
                                ->setCredential($user->getPassword());
                                
            $auth = Zend_Auth::getInstance();
            $result = $auth->authenticate($authAdapter);
            
            switch ($result->getCode()) {
                case Zend_Auth_Result::SUCCESS : 
                    $identity = $authAdapter->getResultRowObject(null, 'usm_password');
                    $auth->getStorage()->write($identity);
                    return true;
                    break;
                default : 
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
     
     /**
      * Retrieves a user given its idn at storage layer level
      * @param integer $id
      * @return User_Model_Staffmembre|boolean
      */
     public function find($id)
     {
          $userMapper = new User_Model_Mapper_Staffmembre();
          return $userMapper->find($id);
     }
     
     /**
      * @return boolean
      */
     public function logout()
     {
         Zend_Auth::getInstance()->clearIdentity();
         // Comme il s'agit d'un intranet, nous pouvons supprimer complètement la session
         if (!Zend_Session::isDestroyed()) {
             Zend_Session::destroy();
         }
         return true;
     }
     
     /**
      * @return boolean
      */
     public function hasIdentity()
     {
         return Zend_Auth::getInstance()->hasIdentity();
     }
      
     public function getTeamList()
     {
         $teamMapper = new User_Model_Mapper_Team();
         return $teamMapper->getList();
     }
}