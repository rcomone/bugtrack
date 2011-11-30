<?php 

class User_Service_StaffMembre 
{
     /**
      * Instanciate, populates a user object and creates it  at storage layer level
      * @param array $params user properties
      * @return User_Model_StaffMembre
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
      * @return multitype:User_Model_StaffMembre
      */
     public function getList()
     {
          // TODO - Implement
         return array(
             new User_Model_StaffMembre(),
             new User_Model_StaffMembre(),
             new User_Model_StaffMembre()
         );
     }
     
     /**
      * Deletes a user entry at storage layer level
      * @param User_Model_StaffMembre $user
      * @return boolean
      */
     public function delete(User_Model_StaffMembre $user)
     {
         // TODO - Implement
         return true;
     }
     
     /**
      * Updates a user  entry at storage layer level
      * @param  User_Model_StaffMembre $user
      * @throws Exception if update process failed
      * @return  User_Model_StaffMembre $user
      */
     public function update(User_Model_StaffMembre $user)
     {
          // TODO - Implement
          return $user;
     }
     
     /**
      * Authenticates a user
      * @param User_Model_StaffMembre $user
      * @return boolean
      */
     public function authenticate(User_Model_StaffMembre $user)
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
      * @return User_Model_StaffMembre|boolean
      */
     public function findByLogin($login)
     {
          // TODO - Implement
          if ($login === 'test') {
             $user = new User_Model_StaffMembre();
             $user->setLogin($login);
             return $user;
          } else {
              return false;
          }
     }
        
}