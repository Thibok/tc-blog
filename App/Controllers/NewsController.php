<?php

namespace Controllers;

use \Components\Controller;
use \Components\Request;
use \Model\NewsManager;
use \Entity\News;

class NewsController extends Controller
{
	public function executeIndex(Request $request)
	{
        $manager = new NewsManager;
        
        $totalNews = $this->config->get('total_news_main_page');

		$listNews = $manager->getList(0, $totalNews);

		$this->response->render('index.twig', ['title' => 'Tc-blog', 'listNews' => $listNews]);
    }
}