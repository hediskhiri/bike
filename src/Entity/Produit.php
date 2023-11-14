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

}
