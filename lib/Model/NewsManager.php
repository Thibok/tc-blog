<?php

/*
 * This file is part of the Tc-blog project.
 *
 * (c) Thibault Cavailles <tcblog@tc-dev.ovh>
 *
 * First blog in PHP
 */

namespace Model;

use \Components\Manager;
use \Entity\News;

class NewsManager extends Manager
{
	/**
	 * @access public
	 * @param int $start
	 * @param int $number
	 * @return array
	 */
	public function getList($start = -1, $number = -1)
  	{
	    $sql = 'SELECT news.id, title, chapo, content, add_at, update_at, pseudo FROM 
			news JOIN user ON user.id = news.user_id ORDER BY update_at DESC';
	 
	    if ($start != -1 || $number != -1) {

	      $sql .= ' LIMIT '.(int) $start.', '.(int) $number;
	    }

	    $request = $this->db->query($sql);
        
        $listNews = [];

	    while ($data = $request->fetch(\PDO::FETCH_ASSOC)) {

  			$listNews[] = new News([
				  'id' => $data['id'],
				  'title' => $data['title'],
				  'chapo' => $data['chapo'],
				  'content' => $data['content'],
				  'addAt' => new \DateTime($data['add_at']),
				  'updateAt' => new \DateTime($data['update_at']),
				  'user' => $data['pseudo']
			]);
		}

		$request->closeCursor();

		return $listNews;
	}

	/**
	 * @access public
	 * @param News $news
	 * @return void
	 */
	public function update(News $news)
	{
		$request = $this->db->prepare(
			'UPDATE news SET title = :title, chapo = :chapo, content = :content, user_id = :userId, update_at = NOW() WHERE id = :id'
		);
		$request->bindValue(':title', $news->getTitle(), \PDO::PARAM_STR);
        $request->bindValue(':chapo', $news->getChapo(), \PDO::PARAM_STR);
        $request->bindValue(':content', $news->getContent(), \PDO::PARAM_STR);
		$request->bindValue(':userId', (int) $news->getUserId(), \PDO::PARAM_INT);
		$request->bindValue(':id', (int) $news->getId(), \PDO::PARAM_INT);
		$request->execute();

		$request->closeCursor();
	}

	/**
	 * @access public
	 * @param int $newsId
	 * @return void
	 */
	public function delete($newsId)
	{
		$this->db->exec('DELETE FROM news WHERE id = '.(int) $newsId);
	}

	/**
	 * @access public
	 * @param News $news
	 * @return int
	 */
	public function add(News $news)
	{
		$request = $this->db->prepare(
			'INSERT INTO news SET title = :title,
			chapo = :chapo,
			content = :content,
			user_id = :userId,
			add_at = NOW(),
			update_at = NOW()'
		);
        $request->bindValue(':title', $news->getTitle(), \PDO::PARAM_STR);
        $request->bindValue(':chapo', $news->getChapo(), \PDO::PARAM_STR);
        $request->bindValue(':content', $news->getContent(), \PDO::PARAM_STR);
        $request->bindValue(':userId', (int) $news->getUserId(), \PDO::PARAM_INT);

        $request->execute();

        $newsId = $this->db->lastInsertId();

        $request->closeCursor();

        return $newsId;
	}

	/**
	 * @access public
	 * @param int $newsId
	 * @return News
	 */
	public function getUnique($newsId)
	{
		$request = $this->db->prepare('SELECT news.id, title, chapo, content, add_at, update_at, 
			pseudo FROM news JOIN user ON user.id = news.user_id WHERE news.id = :newsId'
		);
		$request->bindValue(':newsId', (int) $newsId, \PDO::PARAM_INT);
		$request->execute();

		$data = $request->fetch(\PDO::FETCH_ASSOC);

		$news = new News([
			'id' => $data['id'],
			'title' => $data['title'],
			'chapo' => $data['chapo'],
			'content' => $data['content'],
			'addAt' => new \DateTime($data['add_at']),
			'updateAt' => new \DateTime($data['update_at']),
			'user' => $data['pseudo']
		]);

		$request->closeCursor();

		return $news;
	}
  
	/**
	 * @access public
	 * @return int
	 */
	public function count()
	{
		return $this->db->query('SELECT COUNT(*) FROM news')->fetchColumn();
	}

	/**
	 * @access public
	 * @param int $newsId
	 * @return bool
	 */
	public function newsExists($newsId)
	{
		$request = $this->db->prepare('SELECT COUNT(*) FROM news WHERE id = :newsId');
        $request->bindValue(':newsId', (int) $newsId, \PDO::PARAM_INT);
        $request->execute();

        $exists = $request->fetchColumn();

        $request->closeCursor();

		return $exists;
	}
}