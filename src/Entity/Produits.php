<?php

namespace App\Entity;

use App\Repository\ProduitsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=ProduitsRepository::class)
 * * @ORM\Table(name="produits", indexes={@ORM\Index(columns={"nom_produit", "description_produit", "prix_produit"},flags={"fulltext"})})
 */
class Produits
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *     min=6,
     *     max=50,
     *     minMessage="Le nom de l'annonce doit contenir au moin {{ limit }} caractères",
     *     maxMessage="Le nom de l'annonce ne doit pas depasser {{ limit }} caractères"
     * )
     */
    private $nom_produit;

    /**
     * @ORM\Column(type="text")
     * @Assert\Length(
     *     min=10,
     *     max=1000,
     *     minMessage="La description de l'annonce doit contenir au moin {{ limit }} caractères",
     *     maxMessage="La description de l'annonce ne doit pas depasser {{ limit }} caractères"
     * )
     */
    private $description_produit;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\File(maxSize="6000000", maxSizeMessage="Le fichier est trop lourd ({{ size }} {{ suffix }}).
     * La taille maximale autorisée est : {{ limit }} {{ suffix }}"),
     */
    private $image_produit;

    /**
     * @ORM\Column(type="boolean")
     */
    private $stock_produit;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_depot_produit;

    /**
     * @ORM\Column(type="float")
     * @Assert\Positive
     */
    private $prix_produit;



    /**
     * @ORM\ManyToMany(targetEntity=Distributeurs::class, inversedBy="produits")
     */
    private $distributeurs;

    /**
     * @ORM\OneToOne(targetEntity=References::class, cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     * @return int|null
     */
    private $numero;

    /**
     * @ORM\ManyToOne(targetEntity=Categories::class, inversedBy="produits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categories;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="produits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $utilisateurs;



    public function __construct()
    {
        $this->distributeurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomProduit(): ?string
    {
        return $this->nom_produit;
    }

    public function setNomProduit(string $nom_produit): self
    {
        $this->nom_produit = $nom_produit;

        return $this;
    }

    public function getDescriptionProduit(): ?string
    {
        return $this->description_produit;
    }

    public function setDescriptionProduit(string $description_produit): self
    {
        $this->description_produit = $description_produit;

        return $this;
    }

    public function getImageProduit(): ?string
    {
        return $this->image_produit;
    }

    public function setImageProduit(string $image_produit): self
    {
        $this->image_produit = $image_produit;

        return $this;
    }

    public function isStockProduit(): ?bool
    {
        return $this->stock_produit;
    }

    public function setStockProduit(bool $stock_produit): self
    {
        $this->stock_produit = $stock_produit;

        return $this;
    }

    public function getDateDepotProduit(): ?\DateTimeInterface
    {
        return $this->date_depot_produit;
    }

    public function setDateDepotProduit(\DateTimeInterface $date_depot_produit): self
    {
        $this->date_depot_produit = $date_depot_produit;

        return $this;
    }

    public function getPrixProduit(): ?float
    {
        return $this->prix_produit;
    }

    public function setPrixProduit(float $prix_produit): self
    {
        $this->prix_produit = $prix_produit;

        return $this;
    }



    /**
     * @return Collection<int, Distributeurs>
     */
    public function getDistributeurs(): Collection
    {
        return $this->distributeurs;
    }

    public function addDistributeur(Distributeurs $distributeur): self
    {
        if (!$this->distributeurs->contains($distributeur)) {
            $this->distributeurs[] = $distributeur;
        }

        return $this;
    }

    public function removeDistributeur(Distributeurs $distributeur): self
    {
        $this->distributeurs->removeElement($distributeur);

        return $this;
    }

    public function getNumero(): ?References
    {
        return $this->numero;
    }

    public function setNumero(?References $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getCategories(): ?Categories
    {
        return $this->categories;
    }

    public function setCategories(?Categories $categories): self
    {
        $this->categories = $categories;

        return $this;
    }

    public function getUtilisateurs(): ?User
    {
        return $this->utilisateurs;
    }

    public function setUtilisateurs(?User $utilisateurs): self
    {
        $this->utilisateurs = $utilisateurs;

        return $this;
    }

}
