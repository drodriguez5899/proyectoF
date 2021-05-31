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
use App\Entity\FestivalOtro;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


/**
 * Description of FOtroController
 *
 * @author David
 */
class FOtroController extends AbstractController {
    //put your code here
    
     /**
     * @Route("/otros/Todos", name="otrosTodos")
     */
    public function todos(): Response {
        $repositorio = $this->getDoctrine()->getRepository(FestivalOtro::class);
        $otro = $repositorio->findAll();
        return $this->render('otros/otrosTodos.html.twig',
                        ['otro' => $otro]);
    }
    
     /**
     * @Route("/otros", name="otros")
     */
    public function otros(): Response {
        $repositorio = $this->getDoctrine()->getRepository(FestivalOtro::class);
        $otro = $repositorio->findAll();
        return $this->render('otros/otros.html.twig',
                        ['otro' => $otro]);
    }
    
    /**
     * @Route("/otros/Electronica", name="otrosElectronica")
     */
    public function electronica(): Response {
        $repositorio = $this->getDoctrine()->getRepository(FestivalOtro::class);
        $otro = $repositorio->findAll();
        return $this->render('otros/otrosElectronica.html.twig',
                        ['otro' => $otro]);
    }
    
     /**
     * @Route("/otros/Reggaeton", name="otrosReggaeton")
     */
    public function reggaeton(): Response {
        $repositorio = $this->getDoctrine()->getRepository(FestivalOtro::class);
        $otro = $repositorio->findAll();
        return $this->render('otros/otrosReggaeton.html.twig',
                        ['otro' => $otro]);
    }
    
    
     /**
     * @Route("/otros/Pop", name="otrosPop")
     */
    public function pop(): Response {
        $repositorio = $this->getDoctrine()->getRepository(FestivalOtro::class);
        $otro = $repositorio->findAll();
        return $this->render('otros/otrosPop.html.twig',
                        ['otro' => $otro]);
    }
    
     /**
     * @Route("/otros/Rock", name="otrosRock")
     */
    public function rock(): Response {
        $repositorio = $this->getDoctrine()->getRepository(FestivalOtro::class);
        $otro = $repositorio->findAll();
        return $this->render('otros/otrosRock.html.twig',
                        ['otro' => $otro]);
    }
    
    
     /**
     * @Route("/otros/Multigenero", name="otrosMultigenero")
     */
    public function multigenero(): Response {
        $repositorio = $this->getDoctrine()->getRepository(FestivalOtro::class);
        $otro = $repositorio->findAll();
        return $this->render('otros/otrosMultigenero.html.twig',
                        ['otro' => $otro]);
    }
    
    
    
    
    
     
    /**
     * @Route("/otros/insertar", name="insertar_otro")
     */
    
    
    public function insertar(Request $request): Response
    {
        $otro = new FestivalOtro();
        $form = $this->createFormBuilder($otro)
                ->add('nombre', TextType::class)
                ->add('video', TextType::class)
                 ->add('fecha', TextType::class)
                ->add('descripcion', TextareaType::class)
                ->add('frase', TextareaType::class)
                 ->add('genero', ChoiceType::class,[
                    'choices' => [
                        'Todos los estilos'=>'Todos los estilos',
                        'Electronica'=>'Electronica',
                        'Reggaeaton/Hip Hop'=>'Reggaeaton/Hip Hop',
                        'Pop/Indie'=>'Pop/indie',
                        'Rock/Metal/Punk'=>'Rock/Metal/Punk',
                        'Multigenero/World Music'=>'Multigenero/World Music',
                      
                    ],
                ])
                
                ->add('foto1', FileType::class, [
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
                 ->add('foto2', FileType::class, [
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
               
                
       
                
                ->add('insertar', SubmitType::class, ['label' => 'insertar otro'])
                ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $otro = $form->getData();
            $foto1 = $form->get('foto1')->getData();
            
            if ($foto1) {
                
                $nuevo_nombre1 = uniqid() . '.' . $foto1->guessExtension();

                try {
                    $foto1->move('imagenes/',$nuevo_nombre1);
                    $otro->setFoto1($nuevo_nombre1);
                } catch (FileException $e) {
                    
                }
            }
            $foto2 = $form->get('foto2')->getData();
            
            if ($foto2) {
                
                $nuevo_nombre2 = uniqid() . '.' . $foto2->guessExtension();

                try {
                    $foto2->move('imagenes/',$nuevo_nombre2);
                    $otro->setFoto2($nuevo_nombre2);
                } catch (FileException $e) {
                    
                }
            }


          
            
            //Guardamos el nuevo usuario en la base de datos
            $em = $this->getDoctrine()->getManager();
            $em->persist($otro);
            $em->flush();             
            $this->addFlash(
                    'notice',
                    'Se ha credo correctamente'
                    );

            return $this->redirectToRoute('insertar_otro');
        }
        
        return $this->render('otros/insertar_otro.html.twig',
                        ['form' => $form->createView()]);
    }
    
    /**
     * @Route("/otros/Todo/{id}", name="ver_otro", requirements={"id"="\d+"})
     * @param int $id
     */
    public function verOtro(FestivalOtro $otro): Response {
        return $this->render('otros/ver_otro.html.twig',
                        ['otro' => $otro]);
    }
    
    /**
     * @Route("/otros/Electronica/{id}", name="ver_electronica", requirements={"id"="\d+"})
     * @param int $id
     */
    public function verElectronica(FestivalOtro $otro): Response {
        return $this->render('otros/ver_electronica.html.twig',
                        ['otro' => $otro]);
    }
    
    /**
     * @Route("/otros/pop/{id}", name="ver_pop", requirements={"id"="\d+"})
     * @param int $id
     */
    public function verPop(FestivalOtro $otro): Response {
        return $this->render('otros/ver_pop.html.twig',
                        ['otro' => $otro]);
    }
    
    /**
     * @Route("/otros/reggaeton/{id}", name="ver_reggaeton", requirements={"id"="\d+"})
     * @param int $id
     */
    public function verReggaeton(FestivalOtro $otro): Response {
        return $this->render('otros/ver_reggaeton.html.twig',
                        ['otro' => $otro]);
    }
    
    /**
     * @Route("/otros/rock/{id}", name="ver_rock", requirements={"id"="\d+"})
     * @param int $id
     */
    public function verRock(FestivalOtro $otro): Response {
        return $this->render('otros/ver_rock.html.twig',
                        ['otro' => $otro]);
    }
    
    
    /**
     * @Route("/otros/multigenero/{id}", name="ver_multigenero", requirements={"id"="\d+"})
     * @param int $id
     */
    public function verMultigenero(FestivalOtro $otro): Response {
        return $this->render('otros/ver_multigenero.html.twig',
                        ['otro' => $otro]);
    }
}
