<?php

namespace Controllers;

use \Components\Controller;
use \Components\Request;
use \Model\NewsManager;
use \Model\CommentManager;
use \Entity\News;
use \Components\Pagination;

class NewsController extends Controller
{
	public function executeIndex(Request $request)
	{
        $manager = new NewsManager;
        
        $totalNews = $this->config->get('total_news_main_page');

		$listNews = $manager->getList(0, $totalNews);

		$this->response->render('index.twig', ['title' => 'Tc-blog', 'listNews' => $listNews]);
	}
	
	public function executeList(Request $request)
	{
		$totalNewsPerPage = $this->config->get('total_news_list_page');
		$manager = new NewsManager;
		$totalNews = $manager->count();
		$pagination = new Pagination($totalNews, $totalNewsPerPage);

		if ($request->getExists('page'))
		{
			$pagination->setActualPage($request->getData('page'));
			$startReq = $pagination->makePagination();
			$listNews = $manager->getList($startReq, $totalNewsPerPage);

			if (empty($listNews))
			{
				$this->response->render('404.twig', ['title' => '404 Not Found']);
			}
		}

		else
		{
			$startReq = $pagination->makePagination();
			$listNews = $manager->getList($startReq, $totalNewsPerPage);
		}
		
		$this->response->render('list.twig', ['title' => 'Toutes les news', 'listNews' => $listNews, 'pagination' => $pagination]);
	}

	public function executeShow(Request $request)
	{
		$commentManager = new CommentManager;
		$newsManager = new NewsManager;

		$news = $newsManager->getUnique($request->getData('id'));

		if (empty($news))
		{
			$this->response->render('404.twig', ['title' => '404 Not Found']);
		}
		
		$totalCommentPerPage = $this->config->get('total_comments_show_page');
		$totalComment = $commentManager->countValidCommentsOfNews($news->getId());
		$pagination = new Pagination($totalComment, $totalCommentPerPage);

		if ($request->getExists('page'))
		{
			$pagination->setActualPage($request->getData('page'));
			$startReq = $pagination->makePagination();
			$listComments = $commentManager->getListOfNews($startReq, $totalCommentPerPage, $news->getId());

			if (empty($listComments))
			{
				$this->response->render('404.twig', ['title' => '404 Not Found']);
			}
		}

		else
		{
			$startReq = $pagination->makePagination();
			$listComments = $commentManager->getListOfNews($startReq, $totalCommentPerPage, $news->getId());
		}

		$this->response->render('show.twig', ['title' => $news->getTitle(), 'news' => $news, 'listComments' => $listComments, 'pagination' => $pagination]);
	}
}