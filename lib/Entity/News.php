<?php

/*
 * This file is part of the Tc-blog project.
 *
 * (c) Thibault Cavailles <tcblog@tc-dev.ovh>
 *
 * First blog in PHP
 */

namespace Entity;

use \Components\Entity;

class News extends Entity
{
	/**
	 * 
	 * @var string
	 * @access private
	 */
	private $user;

	/**
	 * 
	 * @var string
	 * @access private
	 */
	private $title;

	/**
	 * 
	 * @var string
	 * @access private
	 */
	private $chapo;

	/**
	 * 
	 * @var string
	 * @access private
	 */
	private $content;

	/**
	 * 
	 * @var Datetime
	 * @access private
	 */
	private $addAt;

	/**
	 * 
	 * @var DateTime
	 * @access private
	 */
	private $updateAt;

	/**
	 * 
	 * @var int
	 * @access private
	 */
	private $userId;

	/**
	 * 
	 * @var mixed
	 * @access private
	 */
	private $picture;

	/**
	 * @access public 
	 * @return bool
	 */
	public function hasPicture()
	{
		return !empty($this->picture);
	}

	/**
	 * @access public
	 * @param string $user
	 * @return void
	 */
	public function setUser($user)
	{
		if (is_string($user) && !empty($user)) {

			$this->user = htmlspecialchars($user);
		}
	}

	/**
	 * @access public
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title)
	{
		if (is_string($title) && !empty($title)) {

			$this->title = htmlspecialchars($title);
		}
	}

	/**
	 * @access public
	 * @param string $chapo
	 * @return void
	 */
	public function setChapo($chapo)
	{
		if (is_string($chapo) && !empty($chapo)) {

			$this->chapo = htmlspecialchars($chapo);
		}
	}

	/**
	 * @access public
	 * @param string $content 
	 * @return void
	 */
	public function setContent($content)
	{
		if (is_string($content) && !empty($content)) {

			$this->content = htmlspecialchars($content);
		}
	}

	/**
	 * @access public
	 * @param DateTime $addAt 
	 * @return void
	 */
	public function setAddAt(\DateTime $addAt)
	{
		$this->addAt = $addAt;
	}

	/**
	 * @access public
	 * @param DateTime $updateAt
	 * @return void
	 */
	public function setUpdateAt(\DateTime $updateAt)
	{
		$this->updateAt = $updateAt;
	}

	/**
	 * @access public
	 * @param int $userId
	 * @return void
	 */
	public function setUserId($userId)
	{
		$this->userId = (int) $userId;
	}

	/**
	 * @access public 
	 * @param mixed $picture
	 * @return void
	 */
	public function setPicture($picture)
	{
		if (!empty($picture)) {
			
			$this->picture = $picture;
		}		
	}

	/**
	 * @access public
	 * @return mixed
	 */
	public function getPicture()
	{
		return $this->picture;
	}

	/**
	 * @access public
	 * @return string
	 */
	public function getUser()
	{
		return $this->user;
	}

	/**
	 * @access public
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * @access public 
	 * @return string
	 */
	public function getChapo()
	{
		return $this->chapo;
	}

	/**
	 * @access public
	 * @return string
	 */
	public function getContent()
	{
		return $this->content;
	}

	/**
	 * @access public 
	 * @return DateTime
	 */
	public function getAddAt()
	{
		return $this->addAt;
	}

	/**
	 * @access public 
	 * @return DateTime
	 */
	public function getUpdateAt()
	{
		return $this->updateAt;
	}

	/**
	 * @access public
	 * @return int
	 */
	public function getUserId()
	{
		return $this->userId;
	}

}