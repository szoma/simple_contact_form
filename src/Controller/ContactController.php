<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ContactType;
use App\Entity\Contact;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;


class ContactController extends AbstractController
{

    #[Route('/contact', name: 'app_contact')]
    public function index(EntityManagerInterface $em, Request $request): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted()){
            $data = $form->getData();
            if($form->isValid()){
                $contact->setName($data->getName());
                $contact->setMail($data->getMail());
                $contact->setBody($data->getBody());
    
                $em->persist($contact);
                $em->flush();
                $this->addFlash('success','Thank you very much for your question. We will contact you shortly with our answer at the e-mail address provided.');
                return $this->redirect($request->getUri());
            }
            else{
                $this->addFlash('success','Error! Please fill in all fields correctly!');
               return $this->redirect($request->getUri());
            }
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }


}
