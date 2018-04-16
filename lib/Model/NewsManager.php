<?php
namespace Model;

use \Components\Manager;
use \Entity\News;

class NewsManager extends Manager
{
	public function getList($start = -1, $number = -1)
  	{
	    $sql = 'SELECT news.id, title, chapo, content, add_at, update_at, pseudo FROM news JOIN user ON user.id = news.user_id ORDER BY id DESC';
	 
	    if ($start != -1 || $number != -1)
	    {
	      $sql .= ' LIMIT '.(int) $start.', '.(int) $number;
	    }

	    $request = $this->db->query($sql);
        
        $listNews = [];

	    while ($data = $request->fetch(\PDO::FETCH_ASSOC))
		{
  			$listNews[] = new News(['id' => $data['id'], 'title' => $data['title'], 'chapo' => $data['chapo'], 'content' => $data['content'], 'addAt' => new \DateTime($data['add_at']), 'updateAt' => new \DateTime($data['update_at']), 'user' => $data['pseudo']]);
		}

		$request->closeCursor();

		return $listNews;
	}

	public function getUnique($newsId)
	{
		$request = $this->db->prepare('SELECT news.id, title, chapo, content, add_at, update_at, pseudo FROM news JOIN user ON user.id = news.user_id WHERE news.id = :newsId');
		$request->bindValue(':newsId', (int) $newsId, \PDO::PARAM_INT);
		$request->execute();

		$data = $request->fetch(\PDO::FETCH_ASSOC);

		$news = new News(['id' => $data['id'], 'title' => $data['title'], 'chapo' => $data['chapo'], 'content' => $data['content'], 'addAt' => new \DateTime($data['add_at']), 'updateAt' => new \DateTime($data['update_at']), 'user' => $data['pseudo']]);

		$request->closeCursor();

		return $news;
	}
}