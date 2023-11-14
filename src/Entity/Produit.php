<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table(name="produit", indexes={@ORM\Index(name="idCategorie", columns={"idCategorie"})})
 * @ORM\Entity
 */
class Produit
{
    /**
     * @var int
     *
     * @ORM\Column(name="idProd", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idprod;

    /**
     * @var string
     *
     * @ORM\Column(name="nomProd", type="text", length=65535, nullable=false)
     */
    private $nomprod;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptionProd", type="text", length=65535, nullable=false)
     */
    private $descriptionprod;

    /**
     * @var int
     *
     * @ORM\Column(name="prixProd", type="integer", nullable=false)
     */
    private $prixprod;

    /**
     * @var float
     *
     * @ORM\Column(name="remise", type="float", precision=10, scale=0, nullable=false)
     */
    private $remise;

    /**
     * @var int
     *
     * @ORM\Column(name="idCategorie", type="integer", nullable=false)
     */
    private $idcategorie;

    /**
     * @var string
     *
     * @ORM\Column(name="imageProd", type="string", length=155, nullable=false)
     */
    private $imageprod;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Panier", mappedBy="produit")
     */
    private $panier = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->panier = new \Doctrine\Common\Collections\ArrayCollection();
    }

    
    public function getIdprod(): ?int
    {
        return $this->idprod;
    }

    public function getNomprod(): ?string
    {
        return $this->nomprod;
    }

    public function setNomprod(string $nomprod): static
    {
        $this->nomprod = $nomprod;

        return $this;
    }

    public function getDescriptionprod(): ?string
    {
        return $this->descriptionprod;
    }

    public function setDescriptionprod(string $descriptionprod): static
    {
        $this->descriptionprod = $descriptionprod;

        return $this;
    }

    public function getPrixprod(): ?int
    {
        return $this->prixprod;
    }

    public function setPrixprod(int $prixprod): static
    {
        $this->prixprod = $prixprod;

        return $this;
    }

    public function getRemise(): ?float
    {
        return $this->remise;
    }

    public function setRemise(float $remise): static
    {
        $this->remise = $remise;

        return $this;
    }

    public function getIdcategorie(): ?int
    {
        return $this->idcategorie;
    }

    public function setIdcategorie(int $idcategorie): static
    {
        $this->idcategorie = $idcategorie;

        return $this;
    }

    public function getImageprod(): ?string
    {
        return $this->imageprod;
    }

    public function setImageprod(string $imageprod): static
    {
        $this->imageprod = $imageprod;

        return $this;
    }

    /**
     * @return Collection<int, Panier>
     */
    public function getPanier(): Collection
    {
        return $this->panier;
    }

    public function addPanier(Panier $panier): static
    {
        if (!$this->panier->contains($panier)) {
            $this->panier->add($panier);
            $panier->addProduit($this);
        }

        return $this;
    }

    public function removePanier(Panier $panier): static
    {
        if ($this->panier->removeElement($panier)) {
            $panier->removeProduit($this);
        }

        return $this;
    }

}
