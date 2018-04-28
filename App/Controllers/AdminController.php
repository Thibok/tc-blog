<?php

/*
 * This file is part of the Tc-blog project.
 *
 * (c) Thibault Cavailles <tcblog@tc-dev.ovh>
 *
 * First blog in PHP
 */

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
use \FormBuilder\NewsFormBuilder;
use \Components\Gallery;
use \FormBuilder\CommentFormBuilder;

class AdminController extends Controller
{
    /**
	 * @access public
	 * @param Request $request
	 * @return void
	 */
    public function executeAdmin(Request $request)
    {
        if ($request->sessionExists('user')) {

            $user = $request->sessionData('user');

            // Verify ticket of user
            if ($user->getTicket()->isValid()) {
                
                // If valid ticket generate new
                $user->getTicket()->generate();

			} else {
                
                $this->response->redirect('/deconnexion');
			}

            if ($user->isAuthenticated() && $user->isAdmin()) {

                $totalNewsPerPage = $this->config->get('total_news_admin_page');
                $newsManager = new NewsManager;
                $totalNews = $newsManager->count();

                $pagination = new Pagination($totalNews, $totalNewsPerPage);

                if ($request->getExists('page')) {
                    
                    $pagination->setActualPage($request->getData('page'));

                    if ($pagination->getActualPage() == 0) {
                        
                        $this->response->render(
                            '404.twig',
                            ['title' => '404 Not Found', 'user' => $user]
                        );
                    }

                    $startReq = $pagination->makePagination();
                    $listNews = $newsManager->getList($startReq, $totalNewsPerPage);

                    if (empty($listNews)) {
                        
                        $this->response->render(
                            '404.twig',
                            ['title' => '404 Not Found', 'user' => $user]
                        );
                    }

                } else {
                    
                    $startReq = $pagination->makePagination();
                    $listNews = $newsManager->getList($startReq, $totalNewsPerPage);
                }

                $this->response->render(
                    'admin.twig',
                    [
                        'title' => 'Tableau de bord',
                        'listNews' => $listNews,
                        'user' => $user,
                        'pagination' => $pagination
                    ]
                );

            } else {
                
                $this->response->render(
                    '404.twig',
                    ['title' => '404 Not Found', 'user' => $user]
                );
            }

        } else {
            
            $this->response->redirect('/connexion.html');
        }
    }

    /**
	 * @access public
	 * @param Request $request
	 * @return void
	 */
    public function executeListNoValidComments(Request $request)
    {
        if ($request->sessionExists('user')) {

            $user = $request->sessionData('user');

            if ($user->isAuthenticated() && $user->isAdmin()) {

                // Verify ticket of user
                if ($user->getTicket()->isValid()) {

                    // If valid ticket generate new
                    $user->getTicket()->generate();

                } else {
                    
                    $this->response->redirect('/deconnexion');
                }

                $totalCommentsPerPage = $this->config->get('total_comments_no_valid_admin');
                $commentManager = new CommentManager;
                $totalComments = $commentManager->count(false);

                $pagination = new Pagination($totalComments, $totalCommentsPerPage);

                if ($request->getExists('page')) {

                    $pagination->setActualPage($request->getData('page'));

                    if ($pagination->getActualPage() == 0)
                    {
                        $this->response->render(
                            '404.twig',
                            ['title' => '404 Not Found', 'user' => $user]
                        );
                    }

                    $startReq = $pagination->makePagination();

                    $listComments = $commentManager->getList(
                        $startReq,
                        $totalCommentsPerPage,
                        false
                    );

                    if (empty($listComments)) {

                        $this->response->render(
                            '404.twig',
                            ['title' => '404 Not Found', 'user' => $user]
                        );
                    }

                } else {

                    $startReq = $pagination->makePagination();
                    $listComments = $commentManager->getList(
                        $startReq,
                        $totalCommentsPerPage,
                        false
                    );
                }

                $this->response->render(
                    'list_no_valid_comments.twig',
                    [
                        'title' => 'Commentaires à valider',
                        'listComments' => $listComments,
                        'user' => $user,
                        'pagination' => $pagination
                    ]
                );

            } else {

                $this->response->render(
                    '404.twig',
                    ['title' => '404 Not Found', 'user' => $user]
                );

            }

        } else {

            $this->response->redirect('/connexion.html');
        }
    }

    /**
	 * @access public
	 * @param Request $request
	 * @return void
	 */
    public function executeShowNoValidComment(Request $request)
    {
        if ($request->sessionExists('user')) {

            $user = $request->sessionData('user');

            if ($user->isAuthenticated() && $user->isAdmin()) {

                // Verify ticket of user
                if ($user->getTicket()->isValid()) {

                    // If valid ticket generate new
                    $user->getTicket()->generate();

                } else {

                    $this->response->redirect('/deconnexion');
                }

                $commentManager = new CommentManager;
                $comment = $commentManager->getUnique($request->getData('id'), false);
                
                if (empty($comment->getId())) {

                    $this->response->render('404.twig', ['title' => '404 Not Found']);
                }

                $newsManager = new NewsManager;
                $news = $newsManager->getUnique($comment->getNewsId());
                
                $this->response->render(
                    'show_no_valid_comment.twig',
                    [
                        'title' => $news->getTitle(),
                        'news' => $news,
                        'comment' => $comment,
                        'user' => $user
                    ]
                );

            } else {

                $this->response->render(
                    '404.twig',
                    ['title' => '404 Not Found', 'user' => $user]
                );
            }

        } else {
            
            $this->response->redirect('/connexion.html');
        }
    }
    
    /**
	 * @access public
	 * @param Request $request
	 * @return void
	 */
    public function executeValidComment(Request $request)
    {
        if ($request->sessionExists('user')) {

            $user = $request->sessionData('user');

            if ($user->isAuthenticated() && $user->isAdmin()) {

                // Verify ticket of user
                if ($user->getTicket()->isValid()) {

                    // If valid ticket generate new
                    $user->getTicket()->generate();

                } else {
                    
                    $this->response->redirect('/deconnexion');
                }

                $commentManager = new CommentManager;
                $exists = $commentManager->commentExists($request->getData('id'));

                if ($exists) {

                    if ($user->getToken()->isValid($request->getData('token'))) {

                        $commentManager->validComment($request->getData('id'));
                        $user->setFlash('Commentaire validé !');
                        $this->response->redirect('/admin/commentaires_a_valider');
                    }

                } else {

                    $this->response->render('404.twig', ['title' => '404 Not Found']);
                }

            } else {
                
                $this->response->render(
                    '404.twig', ['title' => '404 Not Found',
                    'user' => $user]
                );
            }

        } else {
            
            $this->response->redirect('/connexion.html');
        }
    }

    /**
	 * @access public
	 * @param Request $request
	 * @return void
	 */
    public function executeDeleteNoValidComment(Request $request)
    {
        if ($request->sessionExists('user')) {

            $user = $request->sessionData('user');

            if ($user->isAuthenticated() && $user->isAdmin()) {

                // Verify ticket of user
                if ($user->getTicket()->isValid()) {

                    // If valid ticket generate new
                    $user->getTicket()->generate();

                } else {

                    $this->response->redirect('/deconnexion');
                }

                $commentManager = new CommentManager;
                $exists = $commentManager->commentExists($request->getData('id'));

                if ($exists) {

                    if ($user->getToken()->isValid($request->getData('token'))) {

                        $commentManager->delete($request->getData('id'));
                        $user->setFlash('Commentaire supprimé !');
                        $this->response->redirect('/admin/commentaires_a_valider');
                    }

                } else {
                    
                    $this->response->render('404.twig', ['title' => '404 Not Found']);
                }
            } else {

                $this->response->render(
                    '404.twig',
                    ['title' => '404 Not Found', 'user' => $user]
                );
            }

        } else {
            
            $this->response->redirect('/connexion.html');
        }
    }

    /**
	 * @access public
	 * @param Request $request
	 * @return void
	 */
    public function executeListUsers(Request $request)
    {
        if ($request->sessionExists('user')) {

            $user = $request->sessionData('user');

            if ($user->isAuthenticated() && $user->isAdmin()) {

                // Verify ticket of user
                if ($user->getTicket()->isValid()) {

                    // If valid ticket generate new
                    $user->getTicket()->generate();

                } else {

                    $this->response->redirect('/deconnexion');
                }

                $totalUsersPerPage = $this->config->get('total_users_admin_page');
                $userManager = new UserManager;
                $totalUsers = $userManager->count();

                $pagination = new Pagination($totalUsers, $totalUsersPerPage);

                if ($request->getExists('page')) {

                    $pagination->setActualPage($request->getData('page'));

                    if ($pagination->getActualPage() == 0) {
                        
                        $this->response->render(
                            '404.twig',
                            ['title' => '404 Not Found', 'user' => $user]
                        );
                    }

                    $startReq = $pagination->makePagination();
                    $listUsers = $userManager->getList($startReq, $totalUsersPerPage);

                    if (empty($listUsers)) {

                        $this->response->render(
                            '404.twig',
                            ['title' => '404 Not Found', 'user' => $user]
                        );
                    }

                } else {
                    
                    $startReq = $pagination->makePagination();
                    $listUsers = $userManager->getList($startReq, $totalUsersPerPage);
                }

                if ($request->method() == 'POST') {

                    $userForForm = new User(['role' => $request->postData('role')]);

                } else {
                    
                    $userForForm = new User;
                }

                $managerUserFormBuilder = new ManageUsersFormBuilder($userForForm);
                $managerUserFormBuilder->build();

                $form = $managerUserFormBuilder->getForm();

                if ($request->method() == 'POST' && $form->isValid()) {

                    $exists = $userManager->countWhereId($request->postData('id'));

                    if ($exists) {

                        if ($user->getToken()->isValid($request->postData('token'))) {

                            $userManager->updateRole($request->postData('id'), $userForForm->getRole());
                            $user->setFlash('Modification validée !');
                        }

                    } else {

                        $this->response->render(
                            '404.twig',
                            ['title' => '404 Not Found', 'user' => $user]
                        );
                    }
                }

                $this->response->render(
                    'list_manage_users_admin.twig',
                    [
                        'title' => 'Gestion des utilisateurs',
                        'listUsers' => $listUsers,
                        'user' => $user,
                        'pagination' => $pagination,
                        'form' => $form->generate()
                    ]
                );

            } else {

                $this->response->render(
                    '404.twig',
                    ['title' => '404 Not Found', 'user' => $user]
                );
            }

        } else {

            $this->response->redirect('/connexion.html');
        }
    }

    /**
	 * @access public
	 * @param Request $request
	 * @return void
	 */
    public function executeAddNews(Request $request)
    {
        if ($request->sessionExists('user')) {

            $user = $request->sessionData('user');

            if ($user->isAuthenticated() && $user->isAdmin()) {

                // Verify ticket of user
                if ($user->getTicket()->isValid()) {

                    // If valid ticket generate new
                    $user->getTicket()->generate();

                } else {
                    
                    $this->response->redirect('/deconnexion');
                }

                if ($request->method() == 'POST') {

                    $news = new News([
                        'title' => $request->postData('title'),
                        'user' => $request->postData('user'),
                        'chapo' => $request->postData('chapo'),
                        'content' => $request->postData('content'),
                        'picture' => $request->filesData('picture')
                    ]);

                } else {
                    
                    $news = new News;
                }

                $newsFormBuilder = new NewsFormBuilder($news);
                $newsFormBuilder->build();
    
                $newsForm = $newsFormBuilder->getForm();

                if ($request->method() == 'POST' && $newsForm->isValid()) {

                    if ($user->getToken()->isValid($request->postData('token'))) {

                        $userManager = new UserManager;
                        $newsManager = new NewsManager;
                        $userId = $userManager->getId($news->getUser());
                        $news->setUserId($userId);
                        $newsId = $newsManager->add($news);
                        $user->setFlash('La news a bien été ajoutée !');

                        $picture = $request->filesData('picture');

                        if (!empty($picture['tmp_name']) && $picture['size'] != 0) {

                            $allowedExtensions = explode(',',$this->config->get('allowed_img_extensions'));
                            $gallery = new Gallery('pictures/upload', $allowedExtensions);
                            $gallery->savePicture('news-'.$newsId, $picture, 750, 300);
                        }
                    }
                }
    
                $this->response->render(
                    'add_news.twig',
                    [
                        'title' => 'Ajouter une news',
                        'form' => $newsForm->generate(),
                        'user' => $user
                    ]
                );

            } else {

                $this->response->render(
                    '404.twig',
                    ['title' => '404 Not Found','user' => $user]
                );
            }

        } else {

            $this->response->redirect('/connexion.html');
        }
    }

    /**
	 * @access public
	 * @param Request $request
	 * @return void
	 */
    public function executeShow(Request $request)
    {
        if ($request->sessionExists('user')) {   

            $user = $request->sessionData('user');

            if ($user->isAuthenticated() && $user->isAdmin()) {

                // Verify ticket of user
                if ($user->getTicket()->isValid()) {

                    // If valid ticket generate new
                    $user->getTicket()->generate();

                } else {

                    $this->response->redirect('/deconnexion');
                }

                $allowedExtensions = explode(',',$this->config->get('allowed_img_extensions'));
                $newsManager = new NewsManager;
                $gallery = new Gallery('pictures/upload', $allowedExtensions);
                $news = $newsManager->getUnique($request->getData('id'));

                if (empty($news->getId())) {

                    $this->response->render(
                        '404.twig',
                        ['title' => '404 Not Found', 'user' => $user]);
                }

                $allowedExtensions = explode(',',$this->config->get('allowed_img_extensions'));
                $gallery = new Gallery('pictures/upload', $allowedExtensions);
                $news->setPicture($gallery->getPicture('news-'.$news->getId()));

                $this->response->render(
                    'admin_show_news.twig',
                    ['title' => $news->getTitle(), 'user' => $user, 'news' => $news]
                );

            } else {
                
                $this->response->render(
                    '404.twig',
                    ['title' => '404 Not Found', 'user' => $user]);
            }

        } else {

            $this->response->redirect('/connexion.html');
        }
    }

    /**
	 * @access public
	 * @param Request $request
	 * @return void
	 */
    public function executeDeleteNews(Request $request)
    {
        if ($request->sessionExists('user')) {  

            $user = $request->sessionData('user');

            if ($user->isAuthenticated() && $user->isAdmin()) {

                // Verify ticket of user
                if ($user->getTicket()->isValid()) {

                    // If valid ticket generate new
                    $user->getTicket()->generate();

                } else {
                    
                    $this->response->redirect('/deconnexion');
                }

                $allowedExtensions = explode(',',$this->config->get('allowed_img_extensions'));
                $newsManager = new NewsManager;
                $gallery = new Gallery('pictures/upload', $allowedExtensions);

                if ($user->getToken()->isValid($request->getData('token'))) {

                    $newsManager->delete($request->getData('id'));
                    $gallery->deletePicture('news-'.$request->getData('id'));
                    $user->setFlash('La news a bien été supprimée !');
                    $this->response->redirect('/admin');
                }

            } else {

                $this->response->render(
                    '404.twig',
                    ['title' => '404 Not Found', 'user' => $user]
                );
            }

        } else {

            $this->response->redirect('/connexion.html');
        }
    }

    /**
	 * @access public
	 * @param Request $request
	 * @return void
	 */
    public function executeUpdateNews(Request $request)
    {
        if ($request->sessionExists('user')) {

            $user = $request->sessionData('user');

            if ($user->isAuthenticated() && $user->isAdmin()) {

                // Verify ticket of user
                if ($user->getTicket()->isValid()) {

                    // If valid ticket generate new
                    $user->getTicket()->generate();
                }

                else {

                    $this->response->redirect('/deconnexion');
                }

                $newsManager = new NewsManager;
                $userManager = new UserManager;
                $allowedExtensions = explode(',',$this->config->get('allowed_img_extensions'));
                $gallery = new Gallery('pictures/upload', $allowedExtensions);
                
                if ($request->method() == 'POST') {

                    $news = new News([
                        'user' => $request->postData('user'),
                        'title' => $request->postData('title'),
                        'chapo' => $request->postData('chapo'),
                        'content' => $request->postData('content'),
                        'picture' => $request->filesData('picture'),
                        'id' => $request->getData('id')
                    ]);  

                } else {

                    $news = $newsManager->getUnique($request->getData('id'));
                    $news->setPicture($gallery->getPicture('news-'.$request->getData('id')));
                }

                if (empty($news->getId())) {

                    $this->response->render(
                        '404.twig',
                        ['title' => '404 Not Found', 'user' => $user]
                    );
                }

                $newsFormBuilder = new NewsFormBuilder($news);
                $newsFormBuilder->build();
                $form = $newsFormBuilder->getForm();

                if ($request->method() == 'POST' && $form->isValid()) {

                    if ($user->getToken()->isValid($request->postData('token'))) {

                        $exists = $newsManager->newsExists($request->getData('id'));

                        if (!$exists) {

                            $this->response->render(
                                '404.twig',
                                ['title' => '404 Not Found', 'user' => $user]
                            );
                        }

                        $picture = $request->filesData('picture');

                        if (!empty($picture['tmp_name']) && $picture['size'] != 0) {

                            $gallery->deletePicture('news-'.$request->getData('id'));
                            $gallery->savePicture('news-'.$request->getData('id'), $picture, 750, 300);
                        }

                        $userId = $userManager->getId($news->getUser());
                        $news->setUserId($userId);
                        $newsManager->update($news);
                        $user->setFlash('La news a bien été modifiée !');
                        $this->response->redirect('/admin');
                    }
                }

                $this->response->render(
                    'update_news.twig',
                    [
                        'title' => $news->getTitle(),
                        'form' => $form->generate(),
                        'user' => $user,
                        'news' => $news
                    ]
                );

            } else {

                $this->response->render(
                    '404.twig',
                    ['title' => '404 Not Found', 'user' => $user]
                );
            }

        } else {
            
            $this->response->redirect('/connexion.html');
        }
    }
}