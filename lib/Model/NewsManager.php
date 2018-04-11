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

	private function update(News $news)
	{

	}

	private function add(News $news)
	{
		$request = $this->db->prepare('INSERT INTO news SET title = :title, chapo = :chapo, content = :content, user_id = :userId,  add_at = NOW()');
        $request->bindValue(':title', $user->getTitle());
        $request->bindValue(':chapo', $user->getChapo());
        $request->bindValue(':content', $user->getContent());
        $request->bindValue(':userId', $user->getUserId());

        $request->execute();

        $userId = $this->db->lastInsertId();

        $request->closeCursor();

        return $userId;
	}

	public function save(News $news)
    {
        $news->isNew() ? $this->add($news) : $this->update($news);
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

	public function count()
	{
		return $this->db->query('SELECT COUNT(*) FROM news')->fetchColumn();
	}
}