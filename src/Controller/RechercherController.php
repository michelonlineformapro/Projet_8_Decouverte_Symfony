<?php

namespace App\Controller;

use App\Repository\ProduitsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Sodium\add;

class RechercherController extends AbstractController
{
    /**
     * @Route("/rechercher", name="app_rechercher")
     */
    //Appel de l'objet Request + ProduitsRepository (DQL) + retourne l'objet Response
    public function rechercher(Request $request, ProduitsRepository $produitsRepository): Response
    {
        //on definis des varaibles critères de rechecrhe
        $prixMin = "";
        $prixMax = "";

        $mot = "";

        $message = [
            "message" => "Test de debug"
        ];
        //On creer un formulaire customiser directement dans le controller a la place de la vue
        //On utilise la methode createFormbuilder
        $formulaireRecherche = $this->createFormBuilder($message)
            //Le champ prix mini
            ->add("prixMin", NumberType::class,[
                "label" => "Prix minimum du produit",
                "required" => false
                ])
            //le champs prix max
            ->add("prixMax", NumberType::class,[
                "label" => "Prix maximum du produit",
                "required" => true
            ])
                //Ce champ est de type searchType extenssion (lors de la creation d'un formulaire en ligne de commande php bin/console make:form
                //Ne pas appeler le formulaire SearchType sous peine de conflit (ici RechercherType)
            ->add("mot", SearchType::class,[
                "label" => "Entrer votre recherche",
                    "attr" => [
                        "placeholer" => "Chaise en bois"
                    ],
                    "required" => false
                ])
            //le bouton de recherche
            ->add("rechecrher", SubmitType::class,[
                "label" => "Rechercher",
                "attr" => ['class' => 'button is-danger']
            ])
            //Ici on utilise la methode getForm() pour finaliser la creation du formulaire
            ->getForm();
        //Recupération des donnée du champs (<input name=""> soit form[prixMin] form[prixMax] et form[mot] (f12 dans le navigateur))
        $formulaireRecherche->handleRequest($request);

        //Si le formulaire est soumis et est valide
        if($formulaireRecherche->isSubmitted() && $formulaireRecherche->isValid()){
            $resultat = $formulaireRecherche->getData();
            //Debug = var_dump()
            //dd($resultat);
            $prixMin = $resultat['prixMin'];
            $prixMax = $resultat['prixMax'];
            $mot = $resultat['mot'];
        }
        return $this->render('rechercher/index.html.twig', [
            'controller_name' => 'RechercherController',
            'formulaireRecherche' => $formulaireRecherche->createView(),
            //Appel de produit repository + custom queryBuilder
            //Cette methode prend 3 paralètres definis ci dessus =
            'resultatsRecherche' => $produitsRepository->getMinMaxPrice($prixMin, $prixMax, $mot)
        ]);
    }
}
