<?php 


class User_Model_Staffmembre
{
    /**
     * User's ref (formerly DB primary key)
     * @var integer
     */
    private $_id;
    /**
     * User's firstname
     * @var string
     */
    private $_firstname;
    /**
     * User's lastname
     * @var string
     */
    private $_lastname;
    /**
     * user's email address
     * @var unknown_type
     */
    private $_email;
    /**
     * user's login
     * @var string
     */
    private $_login;
    /**
     * user's password
     * @var string
     */
    private $_password;
    /**
     * user's team
     * @var User_Model_Team
     */
    private $_team;
	/**
     * @return the $_id
     */
    public function getId ()
    {
        return $this->_id;
    }

	/**
     * @param integer $_id
     */
    public function setId ($_id)
    {
        $this->_id = $_id;
        return $this;
    }

	/**
     * @return the $_firstname
     */
    public function getFirstname ()
    {
        return $this->_firstname;
    }

	/**
     * @param string $_firstname
     */
    public function setFirstname ($_firstname)
    {
        $this->_firstname = $_firstname;
        return $this;
    }

	/**
     * @return the $_lastname
     */
    public function getLastname ()
    {
        return $this->_lastname;
    }

	/**
     * @param string $_lastname
     */
    public function setLastname ($_lastname)
    {
        $this->_lastname = $_lastname;
        return $this;
    }

	/**
     * @return the $_email
     */
    public function getEmail ()
    {
        return $this->_email;
    }

	/**
     * @param unknown_type $_email
     */
    public function setEmail ($_email)
    {
        $this->_email = $_email;
        return $this;
    }

	/**
     * @return the $_login
     */
    public function getLogin ()
    {
        return $this->_login;
    }

	/**
     * @param string $_login
     */
    public function setLogin ($_login)
    {
        $this->_login = $_login;
        return $this;
    }

	/**
     * @return the $_password
     */
    public function getPassword ()
    {
        return $this->_password;
    }

	/**
     * @param string $_password
     */
    public function setPassword ($_password)
    {
        $this->_password = $_password;
        return $this;
    }

	/**
     * @return the $_team
     */
    public function getTeam ()
    {
        return $this->_team;
    }

	/**
     * @param User_Model_Team $_team
     */
    public function setTeam (User_Model_Team $_team)
    {
        $this->_team = $_team;
        return $this;
    }

    
    
}