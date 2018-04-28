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

class Comment extends Entity
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
	private $content;

	/**
	 * 
	 * @var DateTime
	 * @access private
	 */
	private $addAt;

	/**
	 * 
	 * @var int
	 * @access private
	 */
	private $newsId;

	/**
	 * 
	 * @var int
	 * @access private
	 */
	private $userId;

	/**
	 * 
	 * @var bool
	 * @access private
	 */
	private $valid;


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
	public function setaddAt(\DateTime $addAt)
	{
		$this->addAt = $addAt;
	}

	/**
	 * @access public
	 * @param int $newsId
	 * @return void
	 */
	public function setNewsId($newsId)
	{
		$this->newsId = (int) $newsId;
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
	 * @param bool $valid
	 * @return void
	 */
	public function setValid($valid)
	{
		$this->valid = (bool) $valid;
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
	 * @return int
	 */
	public function getNewsId()
	{
		return $this->newsId;
	}

	/**
	 * @access public
	 * @return int
	 */
	public function getUserId()
	{
		return $this->userId;
	}

	/**
	 * @access public
	 * @return bool
	 */
	public function getValid()
	{
		return $this->valid;
	}
}