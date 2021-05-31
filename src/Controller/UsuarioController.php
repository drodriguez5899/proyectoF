<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Usuario;
use App\Entity\FestivalOtro;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UsuarioController extends AbstractController
{
     /**
     * @Route("/home", name="inicio")
     */
     public function index(): Response {
        $repositorio = $this->getDoctrine()->getRepository(Usuario::class);
        $usuarios = $repositorio->findAll();
        return $this->render('usuario/index.html.twig',
                        ['usuarios' => $usuarios]);
    }
         /**
     * @Route("/home", name="inicio")
     */
     public function otroUbicacion(): Response {
        $repositorio = $this->getDoctrine()->getRepository(FestivalOtro::class);
        $otro = $repositorio->findAll();
        return $this->render('usuario/index.html.twig',
                        ['otro' => $otro]);
    }
    
    /**
     * @Route("/sobre_mi", name="sobreMi")
     */
     public function sobreMi(): Response {
        $repositorio = $this->getDoctrine()->getRepository(Usuario::class);
        $usuarios = $repositorio->findAll();
        return $this->render('usuario/sobremi.html.twig',
                        ['usuarios' => $usuarios]);
    }
    
    /**
     * @Route("/registrar", name="registrar")
     */
    public function registrar(Request $request, UserPasswordEncoderInterface $encoder,UserPasswordEncoderInterface $encoder2): Response
    {
        $usuario = new Usuario();
        $form = $this->createFormBuilder($usuario)
                ->add('email', EmailType::class)
                ->add('password',PasswordType::class,['attr' => ['minlength' => 4]])
                ->add('password2',PasswordType::class,['attr' => ['minlength' => 4]])
                ->add('nombre', TextType::class)
                ->add('apellidos', TextType::class)
                ->add('telefono',IntegerType::class)
                ->add('pais', countryType ::class)
                 ->add('sexo', ChoiceType::class,[
                    'choices' => [
                        'Masculino'=>'Masculino',
                        'Femenino'=>'Femenino',
                        'Otro'=>'otro'
                      
                    ],
                ])
                
                ->add('imagen', FileType::class, [
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
               
                
       
                
                ->add('registrar', SubmitType::class,
                array(
                    'attr' => array('class' => 'btn btn-danger btn-block', 'label' => 'Registrar')
                ))
                ->getForm();
        
        
        $form->handleRequest($request);
        if($usuario->getPassword() != $usuario->getPassword2()){
            $this->addFlash(
                    'notice',
                    'Las contraseñas no coinciden'
                    );
        }
        if ($form->isSubmitted() && $form->isValid() && $usuario->getPassword() == $usuario->getPassword2()) {
            
            $usuario = $form->getData();
            $foto = $form->get('imagen')->getData();
            
            if ($foto) {
                
                $nuevo_nombre = uniqid() . '.' . $foto->guessExtension();

                try {
                    $foto->move('imagenes/',$nuevo_nombre);
                    $usuario->setImagen($nuevo_nombre);
                } catch (FileException $e) {
                    
                }
            }

            //Codificamos el password
            $usuario->setPassword($encoder->encodePassword($usuario, $usuario->getPassword()));
            $usuario->setPassword2($encoder2->encodePassword($usuario, $usuario->getPassword2()));
            
            //Guardamos el nuevo usuario en la base de datos
            $em = $this->getDoctrine()->getManager();
            $em->persist($usuario);
            $em->flush();             
            $this->addFlash(
                    'notice',
                    'Se ha credo correctamente'
                    );
            
            return $this->redirectToRoute('app_login');
        }
        
        return $this->render('usuario/registrar.html.twig',
                        ['form' => $form->createView()]);
    }
    
     /**
     * @Route("/usuarios/{id}", name="perfil", requirements={"id"="\d+"})
     * @param int $id
     */
    public function ver(Usuario $usuario) {
  
        return $this->render('usuario/perfil.html.twig',
                        ['usuario' => $usuario]);
    }
    
      /**
     * @Route("/usuarios/editar/{id}", name="editar_usuario")
     * Method({"GET", "POST"})
     */
    public function editar(Request $request, int $id) {
        $usuario = new Usuario();      
        $usuario = $this->getDoctrine()->getRepository(Usuario::class)->find($id);
      $form = $this->createFormBuilder($usuario)
                ->add('email', TextType::class)
                ->add('nombre', TextType::class)
                ->add('apellidos', TextType::class)
                ->add('telefono',IntegerType::class)
                 ->add('pais', countryType ::class)
                 ->add('sexo', ChoiceType::class,[
                    'choices' => [
                        'Masculino'=>'Masculino',
                        'Femenino'=>'Femenino',
                        'Otro'=>'otro'
                      
                    ],
                ])
                
                /*->add('imagen', FileType::class, [
                    'label' => 'Selecciona imagen',
                     'required'=>false,
                     "data_class" => null,
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
                ])*/
               
                
       
                
                ->add('editar', SubmitType::class, ['label' => 'Editar usuario'])
                ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $usuario = $form->getData();
            /*$foto = $form->get('imagen')->getData();           
            
            if ($foto) {
                
                $nuevo_nombre = uniqid() . '.' . $foto->guessExtension();

                try {
                    $foto->move('imagenes/',$nuevo_nombre);
                    $usuario->setImagen($nuevo_nombre);
                } catch (FileException $e) {
                    
                }
            }*/

            
            //Guardamos el nuevo usuario en la base de datos
            $em = $this->getDoctrine()->getManager();
            $em->persist($usuario);
            $em->flush();             
            $this->addFlash(
                    'notice',
                    'Se ha editado correctamente'
                    );

            return $this->redirectToRoute('perfil', ['id' => $usuario-> getId()]);
        }
        
        return $this->render('usuario/editar_usuario.html.twig',
                        ['form' => $form->createView()]);
    }
       /**
     * @Route("/usuarios/editar_foto/{id}", name="editar_foto")
     * Method({"GET", "POST"})
     */
    public function editarFoto(Request $request, int $id) {
        $usuario = new Usuario();      
        $usuario = $this->getDoctrine()->getRepository(Usuario::class)->find($id);
      $form = $this->createFormBuilder($usuario)
               /* ->add('email', TextType::class)
                ->add('nombre', TextType::class)
                ->add('apellidos', TextType::class)
                ->add('telefono',IntegerType::class)
                 ->add('pais', countryType ::class)
                 ->add('sexo', ChoiceType::class,[
                    'choices' => [
                        'Masculino'=>'Masculino',
                        'Femenino'=>'Femenino',
                        'Otro'=>'otro'
                      
                    ],
                ])*/
                
                ->add('imagen', FileType::class, [
                    'label' => 'Selecciona imagen',
                     'required'=>true,
                     "data_class" => null,
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
               
                
       
                
                ->add('editar', SubmitType::class, ['label' => 'Editar foto'])
                ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $usuario = $form->getData();
            $foto = $form->get('imagen')->getData();           
            
            if ($foto) {
                
                $nuevo_nombre = uniqid() . '.' . $foto->guessExtension();

                try {
                    $foto->move('imagenes/',$nuevo_nombre);
                    $usuario->setImagen($nuevo_nombre);
                } catch (FileException $e) {
                    
                }
            }

            
            //Guardamos el nuevo usuario en la base de datos
            $em = $this->getDoctrine()->getManager();
            $em->persist($usuario);
            $em->flush();             
            $this->addFlash(
                    'notice',
                    'Se ha editado correctamente'
                    );

            return $this->redirectToRoute('perfil', ['id' => $usuario-> getId()]);
        }
        
        return $this->render('usuario/editar_usuario.html.twig',
                        ['form' => $form->createView()]);
    }
    
   
}