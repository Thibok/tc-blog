<?php
namespace Entity;

use \Components\Entity;

class News extends Entity
{
	private $user;
	private $title;
	private $chapo;
	private $content;
	private $addAt;
	private $updateAt;
	private $userId;
	private $picture;

	public function hasPicture()
	{
		return !empty($this->picture);
	}

	public function setUser($user)
	{
		if (is_string($user) && !empty($user))
		{
			$this->user = htmlspecialchars($user);
		}
	}

	public function setTitle($title)
	{
		if (is_string($title) && !empty($title))
		{
			$this->title = htmlspecialchars($title);
		}
	}

	public function setChapo($chapo)
	{
		if (is_string($chapo) && !empty($chapo))
		{
			$this->chapo = htmlspecialchars($chapo);
		}
	}

	public function setContent($content)
	{
		if (is_string($content) && !empty($content))
		{
			$this->content = htmlspecialchars($content);
		}
	}

	public function setAddAt(\DateTime $addAt)
	{
		$this->addAt = $addAt;
	}

	public function setUpdateAt(\DateTime $updateAt)
	{
		$this->updateAt = $updateAt;
	}

	public function setUserId($userId)
	{
		$this->userId = (int) $userId;
	}

	public function setPicture($picture)
	{
		if (!empty($picture))
		{
			$this->picture = $picture;
		}		
	}

	public function getPicture()
	{
		return $this->picture;
	}

	public function getUser()
	{
		return $this->user;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function getChapo()
	{
		return $this->chapo;
	}

	public function getContent()
	{
		return $this->content;
	}

	public function getAddAt()
	{
		return $this->addAt;
	}

	public function getUpdateAt()
	{
		return $this->updateAt;
	}

	public function getUserId()
	{
		return $this->userId;
	}

}