<?php

namespace App\Repository;

use App\Entity\Produits;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use function Doctrine\ORM\QueryBuilder;

/**
 * @extends ServiceEntityRepository<Produits>
 *
 * @method Produits|null find($id, $lockMode = null, $lockVersion = null)
 * @method Produits|null findOneBy(array $criteria, array $orderBy = null)
 * @method Produits[]    findAll()
 * @method Produits[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Produits::class);
    }

    public function add(Produits $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Produits $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    //Mettre un produit en vedette custom DQL

    public function getDernierProduit()
    {
        //Ici on creer une variable qui appel la methode createQueryBuilder de Doctrine et prend un alias en paramètre
        //De cette manière pas besoin d'ecrire de SQL classique
        //A noter que PHP permet de chainer les methodes
        $dernierProduit = $this->createQueryBuilder('p')
            //On utilise l'alias p pour recup id et trier par order decroissant
            ->orderBy('p.id', 'DESC')
            //Un seul element
            ->setMaxResults(1)
            //Parcours des resultats
            ->getQuery()
            //getOneOrNullResult() = recupère un objet ou une valeur null (erreur si plusieurs objet)
            ->getOneOrNullResult();

        //retourne le resultat de ma requète
        return $dernierProduit;
    }

    //Trier les annonces par prix et mot cle
    //Cette methode est appelée dans RechercherController
    public function getMinMaxPrice($prixMin, $prixMax, $mot){
        //creation du queryBuilder + un alias de l'entité Annonces
        $query = $this->createQueryBuilder('produits');

        //les 2 champs en paramètres et dans RechecrherContoleur
        if($prixMin && $prixMax){
            //le predicat et OU le prix du produits est entre 2 clés
            $query
                ->andWhere('produits.prix_produit BETWEEN :prixmin AND :prixmax')
                //les 2 cles => valeur paramètre de la fonction a spécifié dans le controleur
                ->setParameter('prixmin', $prixMin)
                ->setParameter('prixmax', $prixMax);
        }

        //Recherche par mot cle en +
        if($mot){
            $query
                ->where(
                    $query->expr()->andX(
                        $query->expr()->orX(
                            $query->expr()->like('produits.nom_produit', ':recherche'),
                            $query->expr()->like('produits.description_produit', ':recherche'),
                            $query->expr()->like('produits.prix_produit', ':recherche'),
                            $query->expr()->like('produits.distributeurs', ':recherche'),
                            $query->expr()->like('produits.categories', ':recherche'),
                            $query->expr()->like('produits.utilisateurs', ':recherche'),
                        ),
                        $query->expr()->isNotNull('produit.date_depot_produit')
                    )
                )
                ->setParameter('recherche', '%' .$query. '%');
            return $query->getQuery()->getResult();
        }


        //Resultat des recherches
        return $query->getQuery()->getResult();
    }

//    /**
//     * @return Produits[] Returns an array of Produits objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Produits
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
