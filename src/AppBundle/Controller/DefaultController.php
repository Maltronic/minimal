<?php

namespace AppBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    /**
     * @Route("/")
     *
     * @return Response
     */
    public function indexAction()
    {
        $html = $this->container->get('twig')->render(
            'default/index.html.twig',
            array('info' => 'Minimal framework running!')
        );

        return new Response($html);
    }
}