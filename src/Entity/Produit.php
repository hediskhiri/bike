<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Produit
 *
 * @ORM\Table(name="produit")
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
     * @Assert\NotBlank(message="Le nom du produit ne peut pas être vide.")
     * @Assert\Length(
     *      max = 20,
     *      maxMessage = "Le nom du produit ne peut pas dépasser {{ limit }} caractères."
     * )
     */
    private $nomprod;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptionProd", type="text", length=65535, nullable=false)
     * @Assert\Length(
     *      max = 100,
     *      maxMessage = "La description du produit ne doit pas dépasser {{ limit }} caractères."
     * )
     */
    private $descriptionprod;

    /**
     * @var int
     *
    * @ORM\Column(name="prixProd", type="integer", nullable=false)
     * @Assert\Regex(
     *     pattern="/^\d+$/",
     *     message="Le prix doit contenir uniquement des chiffres."
     * )
     * @Assert\GreaterThan(
     *     value=0,
     *     message="Le prix doit être supérieur à zéro."
     * )
     */
    private $prixprod;

    /**
     * @var float
     *
     * @ORM\Column(name="remise", type="float", precision=10, scale=0, nullable=false)
     * @Assert\NotBlank(message="La remise ne peut pas être vide.")
     * @Assert\Range(
     *      min = 0,
     *      max = 100,
     *      notInRangeMessage = "La remise doit être entre {{ min }} et {{ max }}.",
     * )
     */
    private $remise;

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

    public function setNomprod(?string $nomprod): self
    {
        $this->nomprod = $nomprod;

        return $this;
    }

    public function getDescriptionprod(): ?string
    {
        return $this->descriptionprod;
    }

    public function setDescriptionprod(string $descriptionprod): self
    {
        $this->descriptionprod = $descriptionprod;

        return $this;
    }

    public function getPrixprod(): ?int
    {
        return $this->prixprod;
    }

    public function setPrixprod(int $prixprod): self
    {
        $this->prixprod = $prixprod;

        return $this;
    }

    public function getRemise(): ?float
    {
        return $this->remise;
    }

    public function setRemise(?float $remise): self
    {
        $this->remise = $remise;

        return $this;
    }

    public function getImageprod(): ?string
    {
        return $this->imageprod;
    }

    public function setImageprod(string $imageprod): self
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

    public function addPanier(Panier $panier): self
    {
        if (!$this->panier->contains($panier)) {
            $this->panier->add($panier);
            $panier->addProduit($this);
        }

        return $this;
    }

    public function removePanier(Panier $panier): self
    {
        if ($this->panier->removeElement($panier)) {
            $panier->removeProduit($this);
        }

        return $this;
    }

}
