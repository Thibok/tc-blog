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
use \Entity\Comment;

class CommentManager extends Manager
{
	/**
	 * @access public
	 * @param int $start
	 * @param int $number
	 * @param bool $valid
	 * @param int $newsId
	 * @return array
	 */
	public function getList($start = -1, $number = -1, $valid = true, $newsId = -1)
  	{
		$sql = 'SELECT comment.id, content, add_at, pseudo FROM 
			comment JOIN user ON user.id = comment.user_id';

		if ($newsId != -1) {

			$sql .= ' WHERE news_id = :newsId AND valid = :valid';

		} else {

			$sql .= ' WHERE valid = :valid';
		}

		$sql .= ' ORDER BY id DESC';
	 
		if ($start != -1 || $number != -1) {

			$sql .= ' LIMIT '.(int) $start.', '.(int) $number;
		}

		$request = $this->db->prepare($sql);
		$request->bindValue(':valid', (bool) $valid, \PDO::PARAM_BOOL);

		if ($newsId != -1) {

			$request->bindValue(':newsId', (int) $newsId, \PDO::PARAM_INT);
		}
		
		$request->execute();
			
		$listComment = [];

		while ($data = $request->fetch(\PDO::FETCH_ASSOC)) {

			$listComment[] = new Comment([
				'id' => $data['id'],
				'content' => $data['content'],
				'addAt' => new \DateTime($data['add_at']),
				'user' => $data['pseudo']]
			);
		}	

		$request->closeCursor();

		return $listComment;

	}
	  
	/**
	 * @access public
	 * @param bool $valid
	 * @param int $newsId
	 * @return int
	 */
	public function count($valid = true, $newsId = -1)
	{
		$sql = 'SELECT COUNT(*) FROM comment WHERE valid = :valid';

		if ($newsId != -1) {

			$sql .= ' AND news_id = :newsId';
		}

		$request = $this->db->prepare($sql);
		$request->bindValue(':valid', (bool) $valid, \PDO::PARAM_BOOL);
		
		if ($newsId != -1) {

			$request->bindValue(':newsId', (int) $newsId, \PDO::PARAM_INT);
		}

		$request->execute();

		$totalComments = $request->fetchColumn();

		return $totalComments;
	}

	/**
	 * @access public
	 * @param int $commentId
	 * @return void
	 */
	public function delete($commentId)
	{
		$this->db->exec('DELETE FROM comment WHERE id = '.(int) $commentId);
	}

	/**
	 * @access public
	 * @param int $commentId
	 * @param bool $valid
	 * @return Comment
	 */
	public function getUnique($commentId, $valid = false)
	{
		$request = $this->db->prepare(
			'SELECT comment.id, content, add_at, valid, user_id,
			news_id, pseudo FROM comment JOIN user ON user.id = comment.user_id WHERE
			comment.id = :commentId AND valid = :valid'
		);

		$request->bindValue(':commentId', (int) $commentId, \PDO::PARAM_INT);
		$request->bindValue(':valid', (bool) $valid, \PDO::PARAM_BOOL);
		$request->execute();
		
		$data = $request->fetch(\PDO::FETCH_ASSOC);

		$comment = new Comment([
			'id' => $data['id'],
			'content' => $data['content'],
			'addAt' => new \DateTime($data['add_at']),
			'valid' => $data['valid'],
			'userId' => $data['user_id'],
			'newsId' => $data['news_id'],
			'user' => $data['pseudo']
		]);

		$request->closeCursor();

		return $comment;
	}

	/**
	 * @access public
	 * @param Comment $comment
	 * @return void
	 */
	public function save(Comment $comment)
	{
		$request = $this->db->prepare(
			'INSERT INTO comment SET content = :content, add_at = NOW(), valid = :valid, user_id = :user_id, news_id = :news_id'
		);
										  
		$request->bindValue(':content', $comment->getContent(), \PDO::PARAM_STR);
		$request->bindValue(':valid', (bool) $comment->getValid(), \PDO::PARAM_BOOL);
		$request->bindValue(':user_id', (int) $comment->getUserId(), \PDO::PARAM_INT);
		$request->bindValue(':news_id', (int) $comment->getNewsId(), \PDO::PARAM_INT);

		$request->execute();

		$request->closeCursor();
	}

	/**
	 * @access public
	 * @param int $commentId
	 * @param bool $valid
	 * @return int
	 */
	public function commentExists($commentId, $valid = 0)
	{
		$request = $this->db->prepare(
			'SELECT COUNT(*) FROM comment WHERE id = :commentId AND valid = :valid'
		);

        $request->bindValue(':commentId', (int) $commentId, \PDO::PARAM_INT);
        $request->bindValue(':valid', (bool) $valid, \PDO::PARAM_BOOL);
        $request->execute();

        $exists = $request->fetchColumn();

        $request->closeCursor();

		return $exists;
	}

	/**
	 * @access public
	 * @param int $commentId
	 * @return void
	 */
	public function validComment($commentId)
	{
		$request = $this->db->prepare(
			'UPDATE comment SET valid = true WHERE id = :commentId'
		);

		$request->bindValue(':commentId', (int) $commentId, \PDO::PARAM_INT);
		$request->execute();

		$request->closeCursor();
	}
}