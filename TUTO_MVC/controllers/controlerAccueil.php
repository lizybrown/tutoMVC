<?php

class ControllerAccueil{
    private $_articleManager;
    private $_view;

// LE CONSTRUCTEUR SE LANCE ET ON RECUP L'URL 

    public function __construct($url)
    {
        if(isset($url) && count($url)>1)
        throw new Exception('Page introuvable');
        else
        $this->article();
    }

    private function artcles()
    {
        $this->_articleManager = new ArticleManager;
        $article = $this->_articleManager->getArticles();

        require_once('views/viewAccueil.php');
    }
}