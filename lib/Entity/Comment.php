<?php
namespace Entity;

use \Components\Entity;

class Comment extends Entity
{
	private $user;
	private $content;
	private $addAt;
	private $newsId;
	private $userId;
	private $valid;

	public function isValid()
	{
		return !empty($this->user) || empty($this->content); 
	}

	public function setUser($user)
	{
		if (is_string($user) && !empty($user))
		{
			$this->user = htmlspecialchars($user);
		}
	}

	public function setContent($content)
	{
		if (is_string($content) && !empty($content))
		{
			$this->content = htmlspecialchars($content);
		}
	}

	public function setaddAt(\DateTime $addAt)
	{
		$this->addAt = $addAt;
	}

	public function setNewsId($newsId)
	{
		$this->newsId = (int) $newsId;
	}

	public function setUserId($userId)
	{
		$this->userId = (int) $userId;
	}

	public function setValid($valid)
	{
		$this->valid = (bool) $valid;
	}

	public function getUser()
	{
		return $this->user;
	}

	public function getContent()
	{
		return $this->content;
	}

	public function getDateAdd()
	{
		return $this->dateAdd;
	}

	public function getNewsId()
	{
		return $this->newsId;
	}

	public function getUserId()
	{
		return $this->userId;
	}

	public function getValid()
	{
		return $this->valid;
	}
}