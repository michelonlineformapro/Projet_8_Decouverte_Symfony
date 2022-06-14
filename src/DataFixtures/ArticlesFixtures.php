<?php

namespace App\DataFixtures;

use App\Entity\Articles;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
//Appel de la classe faker
use Faker;
use PhpParser\Node\Expr\Array_;

class ArticlesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //Instance de la classe faker
        $faker = Faker\Factory::create('fr_FR');
        //Un variable stock un tableau de valeur
        $articles = Array();
        //Boucle pour 20 faux articles
        for($i = 0; $i < 20; $i++){
            //Instance de la classe Articles
            $articles[$i] = new Articles();
            //Jeu de fausse données champs par champs
            //Le tableau-> le mutateur (setter de Article entity) + (paramètres faker)
            $articles[$i]->setNomArticle($faker->word);
            $articles[$i]->setContenuArticle($faker->sentence($nbWords = 6, $variableNbWords = true));
            $articles[$i]->setImageArticle($faker->imageUrl($width = 640, $height = 480));
            $articles[$i]->setAuteurArticle($faker->lastName);
            $articles[$i]->setDateDepotArticle($faker->dateTime($max = 'now', $timezone = null));
            //Entity manager de Doctrine va faire persister les fausse donnée
            $manager->persist($articles[$i]);
        }

        //la methode flush enregiste les fausses données dans la table Article phpMyAdmin
        $manager->flush();
    }
}
