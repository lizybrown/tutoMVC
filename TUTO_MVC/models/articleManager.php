<?php

class ArticleManager extends model
{

    // FAIT APPELLE A LA CONNEXION A LA BDD ET RETOURNE LA FONCTION GETALL AVEC LA TABLE ET L'OBJET(article) pour recup les donnes en privé 

    public function getArticles()
    {
        $this->getBdd();
        return $this->getAll('articles','Article');
    }
}