<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\FestivalDestacado;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

/**
 * Description of FDestacadoController
 *
 * @author David
 */
class FDestacadoController extends AbstractController {
    
    /**
     * @Route("/destacados/España", name="destacadosE")
     */
    public function españa(): Response {
        $repositorio = $this->getDoctrine()->getRepository(FestivalDestacado::class);
        $destacado = $repositorio->findAll();
        return $this->render('destacados/destacadosE.html.twig',
                        ['destacado' => $destacado]);
    }
    
    /**
     * @Route("/destacados/Mundo", name="destacadosM")
     */
    public function mundo(): Response {
        $repositorio = $this->getDoctrine()->getRepository(FestivalDestacado::class);
        $destacado = $repositorio->findAll();
        return $this->render('destacados/destacadosM.html.twig',
                        ['destacado' => $destacado]);
    }
    
      /**
     * @Route("/destacados", name="destacados")
     */
    public function destacados(): Response {
        $repositorio = $this->getDoctrine()->getRepository(FestivalDestacado::class);
        $destacado = $repositorio->findAll();
        return $this->render('destacados/destacados.html.twig',
                        ['destacado' => $destacado]);
    }
    
    
    /**
     * @Route("/destacados/insertar", name="insertar_destacado")
     */
    
    
    public function insertar(Request $request): Response
    {
        $destacado = new FestivalDestacado();
        $form = $this->createFormBuilder($destacado)
                ->add('nombre', TextType::class)
                ->add('descripcion', TextareaType::class)
                ->add('frase', TextareaType::class)
                 ->add('lugar', ChoiceType::class,[
                    'choices' => [
                        'Mundo'=>'Mundo',
                        'España'=>'España',
                      
                    ],
                ])
                
                ->add('foto', FileType::class, [
                    'label' => 'Selecciona imagen',
                    'constraints' => [
                        new File([
                            'maxSize' => '1024k',
                            'mimeTypes' => [
                                'image/jpeg',
                                'image/png',
                                'image/gif'
                            ],
                            'mimeTypesMessage' => 'Formato de archivo no válido',
                                ])
                    ]
                ])
               
                
       
                
                ->add('insertar', SubmitType::class, ['label' => 'insertar destacado'])
                ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $destacado = $form->getData();
            $foto = $form->get('foto')->getData();
            
            if ($foto) {
                
                $nuevo_nombre = uniqid() . '.' . $foto->guessExtension();

                try {
                    $foto->move('imagenes/',$nuevo_nombre);
                    $destacado->setFoto($nuevo_nombre);
                } catch (FileException $e) {
                    
                }
            }

          
            
            //Guardamos el nuevo usuario en la base de datos
            $em = $this->getDoctrine()->getManager();
            $em->persist($destacado);
            $em->flush();             
            $this->addFlash(
                    'notice',
                    'Se ha credo correctamente'
                    );

            return $this->redirectToRoute('insertar_destacado');
        }
        
        return $this->render('destacados/insertar_destacado.html.twig',
                        ['form' => $form->createView()]);
    }
    
    
    
       
   /**
     * @Route("/destacados/España/{id}", name="ver_destacadoE", requirements={"id"="\d+"})
     * @param int $id
     */
    public function verEspaña(FestivalDestacado $destacado): Response {
        return $this->render('destacados/ver_destacadosE.html.twig',
                        ['destacado' => $destacado]);
    }
    
    
     /**
     * @Route("/destacados/Mundo/{id}", name="ver_destacadoM", requirements={"id"="\d+"})
     * @param int $id
     */
    public function verMundo(FestivalDestacado $destacado): Response {
        return $this->render('destacados/ver_destacadoM.html.twig',
                        ['destacado' => $destacado]);
    }
    //put your code here
}
