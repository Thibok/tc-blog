<?php
namespace Model;

use \Components\Manager;
use \Entity\Comment;

class CommentManager extends Manager
{
	public function getList($start = -1, $number = -1, $valid = true, $newsId = -1)
  	{
	  $sql = 'SELECT comment.id, content, add_at, pseudo FROM comment JOIN user ON user.id = comment.user_id';

	  if ($newsId != -1)
	  {
		  $sql .= ' WHERE news_id = :newsId AND valid = :valid';
	  }

	  else
	  {
		$sql .= ' WHERE valid = :valid';
	  }

	  $sql .= ' ORDER BY id DESC';
	 
	if ($start != -1 || $number != -1)
	{
	    $sql .= ' LIMIT '.(int) $start.', '.(int) $number;
	}

	$request = $this->db->prepare($sql);
	$request->bindValue(':valid', (bool) $valid, \PDO::PARAM_BOOL);

	if ($newsId != -1)
	{
		$request->bindValue(':newsId', (int) $newsId, \PDO::PARAM_INT);
	}
	
	$request->execute();
        
    $listComment = [];

	while ($data = $request->fetch(\PDO::FETCH_ASSOC))
	{
  		$listComment[] = new Comment(['id' => $data['id'], 'content' => $data['content'], 'addAt' => new \DateTime($data['add_at']), 'user' => $data['pseudo']]);
	}	

	$request->closeCursor();

	return $listComment;
	}
	  
	public function countValidCommentsOfNews($newsId)
	{
		$request = $this->db->prepare('SELECT COUNT(*) FROM comment WHERE valid = true AND news_id = :newsId');
		$request->bindValue(':newsId', (int) $newsId, \PDO::PARAM_INT);
		$request->execute();

		$totalValidComment = $request->fetchColumn();

		return $totalValidComment;
	}

	public function save(Comment $comment)
	{
		$request = $this->db->prepare('INSERT INTO comment SET content = :content, add_at = NOW(), valid = :valid, user_id = :user_id, news_id = :news_id');
		$request->bindValue(':content', $comment->getContent());
		$request->bindValue(':valid', $comment->getValid(), \PDO::PARAM_INT);
		$request->bindValue(':user_id', $comment->getUserId(), \PDO::PARAM_INT);
		$request->bindValue(':news_id', $comment->getNewsId(), \PDO::PARAM_INT);

		$request->execute();

		$request->closeCursor();
	}
}