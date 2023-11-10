<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
#[ORM\Table(name: "Produit ")]

class Produit 
{
   #[ORM\Id]
   #[ORM\Generatevalue]
 #[ORM\Column]

       private $idprod;


       #[ORM\Column(lenth: 255)]
        #[assert\NotBlank(message:"nom produit is required")]
    private $nomprod;

    
    #[ORM\Column(lenth: 255)]
    #[assert\NotBlank(message:"description  produit is required")]
    private $descriptionprod;

    
    #[ORM\Column(lenth: 255)]
    #[assert\NotBlank(message:"prix produit is required")]
    private $prixprod;

    
    #[ORM\Column]
    #[assert\NotBlank(message:"remise is required")]
    private $remise;

    
    #[ORM\Column(lenth: 255)]

    private $idcategorie;

    
    #[ORM\Column(type:"string",lenth : 255 nullable: true  )]
    
    #[assert\NotBlank(message:"image is required")]
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
