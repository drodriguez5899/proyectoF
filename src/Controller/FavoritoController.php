<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;
use App\Entity\Favorito;
use App\Entity\FestivalDestacado;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


use Symfony\Component\Form\Extension\Core\Type\SubmitType;




/**
 * Description of FavoritoController
 *
 * @author David
 */
class FavoritoController extends AbstractController {
     /**
     * @Route("/favoritos", name="favoritos")
     */
    public function index(): Response {
        $repositorio = $this->getDoctrine()->getRepository(Favorito::class);
        $favoritos = $repositorio->findAll();
        return $this->render('favorito/index.html.twig',
                        ['favoritos' => $favoritos]);
    }
    
    /**
     * @Route("/favoritos/insertar/{id}", name="insertar_favorito")
     */
    public  function insertar(Request $request, FestivalDestacado $destacado): Response
    {
        $favorito = new Favorito();
        $form = $this->createFormBuilder($favorito)
              
                              
                ->add('enviar', SubmitType::class,
                        ['label' => 'Insertar favorito'])
                ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $favorito = $form->getData();
            

            //Guardamos el nuevo cliente en la base de datos
            $em = $this->getDoctrine()->getManager();
            $favorito->setFestDestacado($destacado);
            $favorito ->setUsuario($this->getUser());
            $em->persist($favorito);
            $em->flush();             
            $this->addFlash(
                    'notice',
                    'Se ha creado correctamente'
                    );

            return $this->redirectToRoute('favoritos');
        }

        return $this->render('favorito/insertarFavorito.html.twig',
                        ['form' => $form->createView()]);





        return $this->redirectToRoute('favoritos');
        
    }
      /**
     * @Route ("/favoritos/borrar/{id}",name="borrar_favorito")
     * @return Response
     */
    public function borrar(Favorito $favorito): Response {
        $em = $this->getDoctrine()->getManager();
        $em->remove($favorito);
        $em->flush();
        $this->addFlash(
                    'notice',
                    'Se ha borrado correctamente'
                    );
        return $this->redirectToRoute('favoritos');
    }
}
