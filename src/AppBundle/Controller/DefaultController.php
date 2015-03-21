<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Page;

class DefaultController extends Controller
{
    /**
     * @Route("/projekt2/dane", name="dane")
     */
    public function createAction()
    {
        $dane = new Page();
        $dane ->setImie('Jan');
        $dane ->setNazwisko ('Kowalski');
        $dane ->setWiek ('25');
        $dane ->setNumer ('123456789');
        
        $dm = $this ->GetDoctrine()->getManager();
        $dm ->persist ($dane);
        $dm ->flush();
        
        return new Response ('Dane programisty' .$dane->getId());
        }
}
