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

class AdminController extends Controller
{
    public function executeAdmin(Request $request)
    {
        if ($request->sessionExists('user'))
        {
            $user = $request->sessionData('user');

            if ($user->isAuthenticated() && $user->isAdmin())
            {
                $totalNewsPerPage = $this->config->get('total_news_admin_page');
                $newsManager = new NewsManager;
                $totalNews = $newsManager->count();

                $pagination = new Pagination($totalNews, $totalNewsPerPage);

                if ($request->getExists('page'))
                {
                    $pagination->setActualPage($request->getData('page'));

                    if ($pagination->getActualPage() == 0)
                    {
                        $this->response->render('404.twig', ['title' => '404 Not Found', 'user' => $user]);
                    }

                    $startReq = $pagination->makePagination();
                    $listNews = $newsManager->getList($startReq, $totalNewsPerPage);

                    if (empty($listNews))
                    {
                        $this->response->render('404.twig', ['title' => '404 Not Found', 'user' => $user]);
                    }
                }

                else
                {
                    $startReq = $pagination->makePagination();
                    $listNews = $newsManager->getList($startReq, $totalNewsPerPage);
                }

                

                $this->response->render('admin.twig', ['title' => 'Tableau de bord', 'listNews' => $listNews, 'user' => $user, 'pagination' => $pagination]);
            }
        }

        else
        {
            $this->response->redirect('/connexion.html');
        }
    }
}