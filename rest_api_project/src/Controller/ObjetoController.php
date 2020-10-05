<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use App\Entity\Objeto;
use App\Form\ObjetoType;

/**
     * ObjetoController 
     * @Route("/api", name="api_")
     */
    

class ObjetoController extends FOSRestController
{
    
  /**
   * Lists all Objects.
   * @Rest\Get(path="/objetos")
   *
   * @return Response
   */
  public function getObjetoAction()
  {
    $repository = $this->getDoctrine()->getRepository(Objeto::class);
    $objetos = $repository->findall();
    return $this->handleView($this->view($objetos));
  }
  /**
   * Create Object.
   * @Rest\Post(path="/objeto")
   *
   * @return Response
   */
  public function postMovieAction(Request $request)
  {
    $objeto = new objeto();
    $form = $this->createForm(ObjetoType::class, $objeto);
    $data = json_decode($request->getContent(), true);
    $form->submit($data);
    if ($form->isSubmitted() && $form->isValid()) {
      $em = $this->getDoctrine()->getManager();
      $em->persist($objeto);
      $em->flush();
      return $this->handleView($this->view(['status' => 'ok'], Response::HTTP_CREATED));
    }
    return $this->handleView($this->view($form->getErrors()));
  }
}

