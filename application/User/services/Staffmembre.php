<?php 

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
             if ('test' === $user->getLogin() && 'test' === $user->getPassword()) {
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
          // TODO - Implement
          if ($login === 'test') {
             $user = new User_Model_Staffmembre();
             $user->setLogin($login);
             return $user;
          } else {
              return false;
          }
     }
        
}