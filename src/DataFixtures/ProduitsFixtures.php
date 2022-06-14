<?php

namespace App\DataFixtures;

use App\Entity\Produits;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class ProduitsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //Instance de la classe faker
        $faker = Faker\Factory::create('fr_FR');
        //Un variable stock un tableau de valeur
        $produits = array();
        //Boucle pour 20 faux articles
        for ($i = 0; $i < 20; $i++) {
            //Instance de la classe Articles
            $produits[$i] = new Produits();
            //Jeu de fausse données champs par champs
            //Le tableau-> le mutateur (setter de Article entity) + (paramètres faker)
            $produits[$i]->setNomProduit($faker->word);
            $produits[$i]->setDescriptionProduit($faker->sentence($nbWords = 6, $variableNbWords = true));
            $produits[$i]->setImageProduit("https://picsum.photos/400");
            $produits[$i]->setStockProduit("true");
            $produits[$i]->setDateDepotProduit($faker->dateTime($max = 'now', $timezone = null));
            $produits[$i]->setPrixProduit($faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL));
            //Entity manager de Doctrine va faire persister les fausse donnée
            $manager->persist($produits[$i]);

        }
        $manager->flush();
    }
}
