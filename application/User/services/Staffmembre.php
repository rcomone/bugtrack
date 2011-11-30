<?php 

class User_Service_Staffmembre 
{
     /**
      * Instanciate, populates a user object and creates it  at storage layer level
      * @param array $params user properties
      * @return User_Model_Staffmembre
      */
     public function create(array $params) 
     {
          // TODO - Implement
         $user = new User_Model_Staffmembre();
         // ... peupler l'objet utilisateur
         // ... enregistrement / persistance
         return $user;
     }
     
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
      * Updates a user  entry at storage layer level
      * @param  User_Model_Staffmembre $user
      * @throws Exception if update process failed
      * @return  User_Model_Staffmembre $user
      */
     public function update(User_Model_Staffmembre $user)
     {
          // TODO - Implement
          return $user;
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