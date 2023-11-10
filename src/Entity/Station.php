<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Station
 *
 * @ORM\Table(name="station")
 * @ORM\Entity
 */
class Station
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_s", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idS;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_s", type="string", length=255, nullable=false)
     */
    private $nomS;

    /**
     * @var string
     *
     * @ORM\Column(name="emplacement_s", type="string", length=255, nullable=false)
     */
    private $emplacementS;

    public function getIdS(): ?int
    {
        return $this->idS;
    }

    public function getNomS(): ?string
    {
        return $this->nomS;
    }

    public function setNomS(string $nomS): static
    {
        $this->nomS = $nomS;

        return $this;
    }

    public function getEmplacementS(): ?string
    {
        return $this->emplacementS;
    }

    public function setEmplacementS(string $emplacementS): static
    {
        $this->emplacementS = $emplacementS;

        return $this;
    }


}
