<?php

namespace App\Controller;

use App\Entity\Produits;
use App\Form\ProduitsType;
use App\Repository\ProduitsRepository;
use Knp\Component\Pager\PaginatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/produits")
 */
class ProduitsController extends AbstractController
{
    /**
     * @Route("/", name="app_produits_index", methods={"GET"})
     * @param ProduitsRepository $produitsRepository
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */
    public function index(ProduitsRepository $produitsRepository, PaginatorInterface $paginator, Request $request): Response
    {
        //Appel du service PaginatorInterface en paramètre
        //Appel de la methode paginate + paramètres

        $pagination = $paginator->paginate(
        //On recupère tous les articles

            $produitsRepository->findAll(),

            //On liste par entier (knp_paginator.yaml) on definit la cle dans url, par defaut ma page=1 + nombre d'article a afficher (ici 2)
            $request->query->getInt('page', 1), 3
        );

        return $this->render('produits/index.html.twig', [
            'controller_name' => 'ProduitsController',

            'produits' => $produitsRepository->findAll(),
            'dernierProduit' => $produitsRepository->getDernierProduit(),
            'pagination' => $pagination,


        ]);
    }

    /**
     * @Route("/new", name="app_produits_new", methods={"GET", "POST"})
     * @param Request $request
     * @param ProduitsRepository $produitsRepository
     * @return Response
     */
    public function new(Request $request, ProduitsRepository $produitsRepository): Response
    {
        //Instance de entité produits
        $produit = new Produits();
        //Creation du formulaire
        //Creer le formulaire = le methode createForm prend 2 paramètres
        //Le nom de la classe du form builder concerné (php bin/console make:form)
        //AnnonceType spécifie la creation et les paramètres du formulaire
        //En second paramètre : on accède a l'entité annonce et Getters et Setters
        $form = $this->createForm(ProduitsType::class, $produit);
        //Recuper les champs (input values) du formulaire entré par l'utilisateur
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //Recupreation de la propriété privée de l'image dans l'entité
            $file = $form["image_produit"]->getData();

            //Si la valueur du champ n'est pas de type chaine de caractère

            if(!is_string($file)){

                //On recupère le nom du ficier uploader

                $fileName = $file->getClientOriginalName();

                //deplacement de la photo = move_uploaded_file($_FILES['userfile']['tmp_name'] en php
                $file->move(
                //Destination du fichier configurer dans le dossier config/services.yaml => parameters
                //images_directory: '%kernel.project_dir%/public/img'
                    //Ajouter la ligne a parameters : images_directory: '%kernel.project_dir%/public/img/'
                //En second paramètre = le nom du fichier
                    $this->getParameter("images_directory"),
                    $fileName
                );
                //Attribution de la photo a l'entité a l'aide des setters
                $produit->setImageProduit($fileName);
                //Notification flash bag en cas de succès
                $this->addFlash('success', 'Votre annonce à bien été ajouté !');
            }else{
                //Sinon Notification flash bag en cas d'erreur
                $this->addFlash('danger', 'Une erreur est survenur durant la création de votre annonce !');
                //redirection vers la page ajouter produits
                return $this->redirect($this->generateUrl('app_produits_new'));
            }

            //La requète DQL INSERT INTO
            $produitsRepository->add($produit, true);
            //Redirection vers la page d'accueil'
            return $this->redirectToRoute('app_produits_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('produits/new.html.twig', [
            'produit' => $produit,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_produits_show", methods={"GET"})
     * @param Produits $produit
     * @return Response
     */
    public function show(Produits $produit): Response
    {
        return $this->render('produits/show.html.twig', [
            'produit' => $produit,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_produits_edit", methods={"GET", "POST"})
     * @param Request $request
     * @param Produits $produit
     * @param ProduitsRepository $produitsRepository
     * @return Response
     */
    public function edit(Request $request, Produits $produit, ProduitsRepository $produitsRepository): Response
    {
        //Recup de la photo courante
        //Recup de l'image avec le getter
        $img = $produit->getImageProduit();
        //Creation du formulaire
        //En paramètre on passe Le formulaire ProduitsType et en 2nd l'entité
        $form = $this->createForm(ProduitsType::class, $produit);
        //Recuperation des champs (input) du formulaire d'edition
        $form->handleRequest($request);
        //Si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {

            //Traitrement du fichier upload
            $file = $form['image_produit']->getData();

            if(!is_string($file)){
                $fileName = $file->getClientOriginalName();
                $file->move(
                    $this->getParameter('images_directory'),
                    $fileName
                );
                $produit->setImageProduit($fileName);
                $this->addFlash('success', 'Votre photo à bien modifiée !');
            }else{
                $produit->setImageProduit($img);
            }

            //DQL UPDATE et sauvegarde
            $produitsRepository->add($produit, true);

            return $this->redirectToRoute('app_produits_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('produits/edit.html.twig', [
            'produit' => $produit,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/supprimer-produit/{id}", name="app_produits_delete")
     * @param Request $request
     * @param Produits $produit
     * @param ProduitsRepository $produitsRepository
     * @return Response
     */
    //On utilise la classe Request + entité produit + le repository = requète DQL + classe Response
    public function delete(Request $request, Produits $produit, ProduitsRepository $produitsRepository): Response
    {
        //check le _token du fichier _delete_form.html.twig
        if ($this->isCsrfTokenValid('delete'.$produit->getId(), $request->request->get('_token'))) {
            //Si ca match on supprime le produit de l"entité
            $produitsRepository->remove($produit, true);
        }
        //On effectue une redirection vers la page produit
        return $this->redirectToRoute('app_produits_index', [], Response::HTTP_SEE_OTHER);
    }
}
