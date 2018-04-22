<?php
namespace Controllers;

use \Components\Controller;
use \Components\Request;
use \Model\NewsManager;
use \Model\CommentManager;
use \Entity\News;
use \Entity\Comment;
use \Components\Pagination;
use \Entity\User;
use \FormBuilder\CommentFormBuilder;
use \Components\Gallery;

class NewsController extends Controller
{
	public function executeIndex(Request $request)
	{
		if ($request->sessionExists('user'))
		{
			$user = $_SESSION['user'];
			
			if ($user->getTicket()->isValid())
			{
				$user->getTicket()->generate();
			}

			else
			{
				$this->response->redirect('/deconnexion');
			}
		}

		else
		{
			$user = new User;
		}
		
		$manager = new NewsManager;
        
        $totalNews = $this->config->get('total_news_main_page');

		$listNews = $manager->getList(0, $totalNews);

		$allowedExtensions = explode(',',$this->config->get('allowed_img_extensions'));

		$gallery = new Gallery('pictures/upload', $allowedExtensions);

		foreach ($listNews as $news) 
		{
			$news->setPicture($gallery->getPicture('news-'.$news->getId()));
		}

		$this->response->render('index.twig', ['title' => 'Tc-blog', 'listNews' => $listNews, 'user' => $user]);
	}
	
	public function executeList(Request $request)
	{
		if ($request->sessionExists('user'))
		{
			$user = $_SESSION['user'];

			if ($user->getTicket()->isValid())
			{
				$user->getTicket()->generate();
			}

			else
			{
				$this->response->redirect('/deconnexion');
			}
		}

		else
		{
			$user = new User;
		}
		
		$totalNewsPerPage = $this->config->get('total_news_list_page');
		$manager = new NewsManager;
		$totalNews = $manager->count();
		$pagination = new Pagination($totalNews, $totalNewsPerPage);

		if ($request->getExists('page'))
		{
			$pagination->setActualPage($request->getData('page'));

			if ($pagination->getActualPage() == 0)
			{
				$this->response->render('404.twig', ['title' => '404 Not Found', 'user' => $user]);
			}
			$startReq = $pagination->makePagination();
			$listNews = $manager->getList($startReq, $totalNewsPerPage);

			if (empty($listNews))
			{
				$this->response->render('404.twig', ['title' => '404 Not Found', 'user' => $user]);
			}
		}

		else
		{
			$startReq = $pagination->makePagination();
			$listNews = $manager->getList($startReq, $totalNewsPerPage);
		}

		$allowedExtensions = explode(',', $this->config->get('allowed_img_extensions'));
		
		$gallery = new Gallery('pictures/upload', $allowedExtensions);

		foreach ($listNews as $news) 
		{
			$news->setPicture($gallery->getPicture('news-'.$news->getId()));
		}
		
		$this->response->render('list.twig', ['title' => 'Toutes les news', 'listNews' => $listNews, 'pagination' => $pagination, 'user' => $user]);
	}

	public function executeShow(Request $request)
	{
		if ($request->sessionExists('user'))
		{
			$user = $_SESSION['user'];

			if ($user->getTicket()->isValid())
			{
				$user->getTicket()->generate();
			}

			else
			{
				$this->response->redirect('/deconnexion');
			}
		}

		else
		{
			$user = new User;
		}

		$commentManager = new CommentManager;
		$newsManager = new NewsManager;

		$news = $newsManager->getUnique($request->getData('id'));

		if (empty($news->getId()))
		{
			$this->response->render('404.twig', ['title' => '404 Not Found', 'user' => $user]);
		}
		
		$totalCommentPerPage = $this->config->get('total_comments_show_page');
		$totalComment = $commentManager->count($news->getId(), true);
		$pagination = new Pagination($totalComment, $totalCommentPerPage);

		if ($request->method() == 'POST' && $request->postExists('content'))
		{
			if (!$user->isAuthenticated())
			{
				$this->response->redirect('/connexion.html');
			}

			$comment = new Comment(['content' => $request->postData('content'), 'userId' => $user->getId(), 'newsId' => $news->getId(), 'valid' => false]);
		}

		else
		{
			$comment = new Comment;
		}

		$commentFormBuilder = new CommentFormBuilder($comment);

		$commentFormBuilder->build();

		$commentForm = $commentFormBuilder->getForm();

		if ($request->method() == 'POST' && $commentForm->isValid())
		{
			if ($user->getToken()->isValid($request->postData('token')))
			{
				$commentManager->save($comment);
				$user->setFlash('Le commentaire à bien était ajouté ! Il doit maintenant être valider !');
			}
		}

		if ($request->getExists('page'))
		{
			$pagination->setActualPage($request->getData('page'));

			if ($pagination->getActualPage() == 0)
			{
				$this->response->render('404.twig', ['title' => '404 Not Found', 'user' => $user]);
			}

			$startReq = $pagination->makePagination();
			$listComments = $commentManager->getList($startReq, $totalCommentPerPage, true, $news->getId());

			if (empty($listComments))
			{
				$this->response->render('404.twig', ['title' => '404 Not Found', 'user' => $user]);
			}
		}

		else
		{
			$startReq = $pagination->makePagination();
			$listComments = $commentManager->getList($startReq, $totalCommentPerPage, true, $news->getId());
		}

		$allowedExtensions = explode(',', $this->config->get('allowed_img_extensions'));

		$gallery = new Gallery('pictures/upload', $allowedExtensions);
		$news->setPicture($gallery->getPicture('news-'.$news->getId()));

		$this->response->render('show.twig', ['title' => $news->getTitle(), 'news' => $news, 'listComments' => $listComments, 'pagination' => $pagination, 'user' => $user, 'commentForm' => $commentForm->generate()]);
	}
}