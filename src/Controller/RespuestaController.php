<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Controller;
use App\Entity\Mensajes;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use App\Entity\Respuesta;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


/**
 * Description of RespuestaController
 *
 * @author David
 */
class RespuestaController extends AbstractController {
    
    /**
     * @Route("/respuestas", name="respuestas")
     */
    public function index(): Response {
        $repositorio = $this->getDoctrine()->getRepository(Respuesta::class);
        $respuestas = $repositorio->findAll();
        return $this->render('respuesta/index.html.twig',
                        ['respuestas' => $respuestas]);
    }
    
    
    
       /**
     * @Route("/respuestas/insertar/mensaje{id}", name="insertar_respuesta" )
     * 
     */
    public function insertar(Request $request, Mensajes $mensaje): Response {
        $respuesta = new Respuesta();
        $form = $this->createFormBuilder($respuesta)
                ->add('contenido', TextareaType::class)
                ->add('imagen', FileType::class,  [
                    'label' => 'Selecciona imagen',
                    'required'=>false,
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
                              
                ->add('enviar', SubmitType::class, ['label' => 'Insertar respuesta'])
                ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $respuesta = $form->getData();
            $foto = $form->get('imagen')->getData();
            if ($foto) {
                
                $nuevo_nombre = uniqid() . '.' . $foto->guessExtension();

                try {
                    $foto->move('imagenes/',$nuevo_nombre);
                    $respuesta->setImagen($nuevo_nombre);
                } catch (FileException $e) {
                    
                }
            }

            //Guardamos el nuevo cliente en la base de datos
            $em = $this->getDoctrine()->getManager();
            $respuesta->setMensajes($mensaje);
            $respuesta ->setUsuario($this->getUser());
            $em->persist($respuesta);
            $em->flush();
            $repositorio=$this->getDoctrine()->getRepository(Respuesta::class);
            $respuestas = $repositorio->findByIdMensaje($mensaje->getId());
            $this->addFlash(
                    'notice',
                    'Se ha creado correctamente'
                    );

            return $this->render('mensaje/ver_mensaje.html.twig', ['mensaje' => $mensaje, 'respuestas'=>$respuestas]);
        }

        return $this->render('respuesta/insertar_respuesta.html.twig',
                        ['form' => $form->createView()]);





    }
    
      /**
     * @Route ("/respuesta/borrar/{id}",name="borrar_respuesta",requirements={"id"="\d+"})
     * @return Response
     */
    public function borrar(Respuesta $respuesta): Response {
        $mensaje = $respuesta->getMensajes();
        $em = $this->getDoctrine()->getManager();
        $em->remove($respuesta);
        $em->flush();
        $repositorio=$this->getDoctrine()->getRepository(Respuesta::class);
        $respuestas = $repositorio->findByIdMensaje($mensaje->getId());
        $this->addFlash(
                    'notice',
                    'Se ha borrado correctamente'
                    );
         return $this->render('mensaje/ver_mensaje.html.twig', ['mensaje' => $mensaje, 'respuestas'=>$respuestas]);
    }
    
    
      /**
     * @Route("/respuesta/editar/mensaje{id}", name="editar_respuesta")
     * Method({"GET", "POST"})
     */
    public function editar(Request $request, $id) {
      $respuesta = new Respuesta();
      $respuesta = $this->getDoctrine()->getRepository(Respuesta::class)->find($id);

      $form = $this->createFormBuilder($respuesta)
                ->add('contenido', TextareaType::class)
                ->add('imagen', FileType::class, [
                    'label' => 'Selecciona imagen',
                    "data_class" => null,
                    'required'=>true,
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
                              
                ->add('editar', SubmitType::class, ['label' => 'editar respuesta'])
                ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $respuesta = $form->getData();
            $foto = $form->get('imagen')->getData();
            if ($foto) {
                
                $nuevo_nombre = uniqid() . '.' . $foto->guessExtension();

                try {
                    $foto->move('imagenes/',$nuevo_nombre);
                    $respuesta->setImagen($nuevo_nombre);
                } catch (FileException $e) {
                    
                }
            }

            //Guardamos el nuevo cliente en la base de datos
            $em = $this->getDoctrine()->getManager();
            $respuesta ->setUsuario($this->getUser());
            $em->persist($respuesta);
            $em->flush();
            $repositorio=$this->getDoctrine()->getRepository(Respuesta::class);
            $respuestas = $repositorio->findByIdMensaje($respuesta->getMensajes()->getId());
            $this->addFlash(
                    'notice',
                    'Se ha editado correctamente'
                    );

        return $this->render('mensaje/ver_mensaje.html.twig', ['mensaje' => $respuesta->getMensajes(), 'respuestas'=>$respuestas]);
      }

      return $this->render('respuesta/editar_respuesta.html.twig', array(
        'form' => $form->createView()
      ));
    }
     
    
    
}
