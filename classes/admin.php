<?php

/**
 * This class represents a Cascadian admin
 *
 * @author Duck Nguyen
 * @version 1.0
 */

 class Admin
 {
	protected $id;
	protected $firstName;
	protected $email;
	protected $password;
	
	/**
	 * Constructor for admin class containing some basic info
	 *
	 * @param admin's first name
	 * @param admin's email
	 * @param admin's password
	 */
	function __construct($firstName, $email, $password)
	{
		$this->firstName = $firstName;
		$this->email = $email;
		$this->password = $password;
	}
	
	
	/**
	 * Getter for admin's first name
	 *
	 * @return their first name
	 */
	public function getADFirstName()
	{
		return $this->firstName;
	}
	
	/**
	 * Setter for admin's first name
	 *
	 * @param their first name
	 */
	public function setADFirstName($firstName)
	{
		$this->firstName = $firstName;
	}
	

	/**
	 * Getter for admin's email
	 *
	 * @return their email
	 */
	public function getADEmail()
	{
		return $this->email;
	}
	
	/**
	 * Setter for admin's email
	 *
	 * @param their email
	 */
	public function setADEmail($email)
	{
		$this->email = $email;
	}
	
	
	/**
	 * Getter for admin's password
	 *
	 * @return their password
	 */
	public function getADPassword()
	{
		return $this->password;
	}
	
	/**
	 * Setter for admin's password
	 *
	 * @param their password
	 */
	public function setADPassword($password)
	{
		$this->password = $password;
	}
 }