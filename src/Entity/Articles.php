<?php

namespace App\Entity;

use App\Repository\ArticlesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticlesRepository::class)
 */
class Articles
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
    private $nom_article;

    /**
     * @ORM\Column(type="text")
     */
    private $contenu_article;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image_article;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $auteur_article;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_depot_article;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomArticle(): ?string
    {
        return $this->nom_article;
    }

    public function setNomArticle(string $nom_article): self
    {
        $this->nom_article = $nom_article;

        return $this;
    }

    public function getContenuArticle(): ?string
    {
        return $this->contenu_article;
    }

    public function setContenuArticle(string $contenu_article): self
    {
        $this->contenu_article = $contenu_article;

        return $this;
    }

    public function getImageArticle(): ?string
    {
        return $this->image_article;
    }

    public function setImageArticle(string $image_article): self
    {
        $this->image_article = $image_article;

        return $this;
    }

    public function getAuteurArticle(): ?string
    {
        return $this->auteur_article;
    }

    public function setAuteurArticle(string $auteur_article): self
    {
        $this->auteur_article = $auteur_article;

        return $this;
    }

    public function getDateDepotArticle(): ?\DateTimeInterface
    {
        return $this->date_depot_article;
    }

    public function setDateDepotArticle(\DateTimeInterface $date_depot_article): self
    {
        $this->date_depot_article = $date_depot_article;

        return $this;
    }
}
