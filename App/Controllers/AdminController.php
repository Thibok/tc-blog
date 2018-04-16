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
use \Model\UserManager;
use \FormBuilder\ManageUsersFormBuilder;

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

            else
            {
                $this->response->render('404.twig', ['title' => '404 Not Found', 'user' => $user]);
            }
        }

        else
        {
            $this->response->redirect('/connexion.html');
        }
    }

    public function executeListNoValidComments(Request $request)
    {
        if ($request->sessionExists('user'))
        {
            $user = $request->sessionData('user');

            if ($user->isAuthenticated() && $user->isAdmin())
            {
                $totalCommentsPerPage = $this->config->get('total_comments_no_valid_admin');
                $commentManager = new CommentManager;
                $totalComments = $commentManager->count(false);

                $pagination = new Pagination($totalComments, $totalCommentsPerPage);

                if ($request->getExists('page'))
                {
                    $pagination->setActualPage($request->getData('page'));

                    if ($pagination->getActualPage() == 0)
                    {
                        $this->response->render('404.twig', ['title' => '404 Not Found', 'user' => $user]);
                    }

                    $startReq = $pagination->makePagination();
                    $listComments = $commentManager->getList($startReq, $totalCommentsPerPage, false);

                    if (empty($listComments))
                    {
                        $this->response->render('404.twig', ['title' => '404 Not Found', 'user' => $user]);
                    }
                }

                else
                {
                    $startReq = $pagination->makePagination();
                    $listComments = $commentManager->getList($startReq, $totalCommentsPerPage, false);
                }

                $this->response->render('list_no_valid_comments.twig', ['title' => 'Commentaires à valider', 'listComments' => $listComments, 'user' => $user, 'pagination' => $pagination]);
            }

            else
            {
                $this->response->render('404.twig', ['title' => '404 Not Found', 'user' => $user]);
            }
        }

        else
        {
            $this->response->redirect('/connexion.html');
        }
    }

    public function executeShowNoValidComment(Request $request)
    {
        if ($request->sessionExists('user'))
        {
            $user = $request->sessionData('user');

            if ($user->isAuthenticated() && $user->isAdmin())
            {
                $commentManager = new CommentManager;
                $comment = $commentManager->getUnique($request->getData('id'), false);
                
                if (empty($comment->getId()))
                {
                    $this->response->render('404.twig', ['title' => '404 Not Found']);
                }

                $newsManager = new NewsManager;
                $news = $newsManager->getUnique($comment->getNewsId());
                
                $this->response->render('show_no_valid_comment.twig', ['title' => $news->getTitle(), 'news' => $news, 'comment' => $comment, 'user' => $user]);
            }

            else
            {
                $this->response->render('404.twig', ['title' => '404 Not Found', 'user' => $user]);
            }
        }

        else
        {
            $this->response->redirect('/connexion.html');
        }
    }
    
    public function executeValidComment(Request $request)
    {
        if ($request->sessionExists('user'))
        {
            $user = $request->sessionData('user');

            if ($user->isAuthenticated() && $user->isAdmin())
            {
                $commentManager = new CommentManager;
                $exists = $commentManager->commentExists($request->getData('id'));

                if ($exists)
                {
                    $commentManager->validComment($request->getData('id'));
                    $user->setFlash('Commentaire validé !');
                    $this->response->redirect('/admin/commentaires_a_valider');
                }

                else
                {
                    $this->response->render('404.twig', ['title' => '404 Not Found']);
                }
            }

            else
            {
                $this->response->render('404.twig', ['title' => '404 Not Found', 'user' => $user]);
            }
        }

        else
        {
            $this->response->redirect('/connexion.html');
        }
    }

    public function executeListUsers(Request $request)
    {
        if ($request->sessionExists('user'))
        {
            $user = $request->sessionData('user');

            if ($user->isAuthenticated() && $user->isAdmin())
            {
                $totalUsersPerPage = $this->config->get('total_users_admin_page');
                $userManager = new UserManager;
                $totalUsers = $userManager->count();

                $pagination = new Pagination($totalUsers, $totalUsersPerPage);

                if ($request->getExists('page'))
                {
                    $pagination->setActualPage($request->getData('page'));

                    if ($pagination->getActualPage() == 0)
                    {
                        $this->response->render('404.twig', ['title' => '404 Not Found', 'user' => $user]);
                    }

                    $startReq = $pagination->makePagination();
                    $listUsers = $userManager->getList($startReq, $totalUsersPerPage);

                    if (empty($listUsers))
                    {
                        $this->response->render('404.twig', ['title' => '404 Not Found', 'user' => $user]);
                    }
                }

                else
                {
                    $startReq = $pagination->makePagination();
                    $listUsers = $userManager->getList($startReq, $totalUsersPerPage);
                }

                if ($request->method() == 'POST')
                {
                    $userForForm = new User(['role' => $request->postData('role')]);
                }

                else
                {
                    $userForForm = new User;
                }

                $managerUserFormBuilder = new ManageUsersFormBuilder($userForForm);
                $managerUserFormBuilder->build();

                $form = $managerUserFormBuilder->getForm();

                if ($request->method() == 'POST' && $form->isValid())
                {
                    $exists = $request->postData('id');

                    if ($exists)
                    {
                        $userManager->updateRole($request->postData('id'), $userForForm->getRole());
                        $user->setFlash('Modifications validé !');
                    }

                    else
                    {
                        $this->response->render('404.twig', ['title' => '404 Not Found', 'user' => $user]);
                    }
                }

                $this->response->render('list_manage_users_admin.twig', ['title' => 'Gestion des utilisateurs', 'listUsers' => $listUsers, 'user' => $user, 'pagination' => $pagination, 'form' => $form->generate()]);
            }

            else
            {
                $this->response->render('404.twig', ['title' => '404 Not Found', 'user' => $user]);
            }
        }

        else
        {
            $this->response->redirect('/connexion.html');
        }
    }
}