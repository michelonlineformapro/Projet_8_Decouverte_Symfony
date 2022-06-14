<?php

namespace App\Entity;

use App\Repository\ProduitsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Integer;
use phpDocumentor\Reflection\Types\Null_;

/**
 * @ORM\Entity(repositoryClass=ProduitsRepository::class)
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
     */
    private $nom_produit;

    /**
     * @ORM\Column(type="text")
     */
    private $description_produit;

    /**
     * @ORM\Column(type="string", length=255)
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


}
