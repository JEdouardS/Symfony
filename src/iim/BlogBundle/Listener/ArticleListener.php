<?php
/**
 * Created by PhpStorm.
 * User: phil
 * Date: 17/12/2013
 * Time: 12:31
 */

namespace iim\BlogBundle\Listener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use iim\BlogBundle\Entity\Article;

class ArticleListener {


    protected $container;


    public function __construct($container)
    {
        $this->container = $container;
    }


    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();

        //agir sur un article
        if ($entity instanceof Article) {
            $entity->setAuthor($this->container->get('security.context')->getToken()->getUser());
        }

    }



}
