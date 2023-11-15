<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Location
 *
 * @ORM\Table(name="location", indexes={@ORM\Index(name="FK_5E9E89CB35F8C041", columns={"id_u"}), @ORM\Index(name="velo", columns={"id"})})
 * @ORM\Entity
 */
class Location
{
    /**
     * @var int
     *
     * @ORM\Column(name="location_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $locationId;

    /**
     * @var string
     *
     * @ORM\Column(name="start_date", type="string", length=255, nullable=false)
     */
    private $startDate;

    /**
     * @var string
     *
     * @ORM\Column(name="end_date", type="string", length=255, nullable=false)
     */
    private $endDate;

    /**
     * @var int
     *
     * @ORM\Column(name="prix", type="integer", nullable=false)
     */
    private $prix;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_u", referencedColumnName="idUser")
     * })
     */
    private $idU;

    /**
     * @var \Velo
     *
     * @ORM\ManyToOne(targetEntity="Velo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;

    public function getLocationId(): ?int
    {
        return $this->locationId;
    }

    public function getStartDate(): ?string
    {
        return $this->startDate;
    }

    public function setStartDate(string $startDate): static
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?string
    {
        return $this->endDate;
    }

    public function setEndDate(string $endDate): static
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getIdU(): ?Utilisateur
    {
        return $this->idU;
    }

    public function setIdU(?Utilisateur $idU): static
    {
        $this->idU = $idU;

        return $this;
    }

    public function getId(): ?Velo
    {
        return $this->id;
    }

    public function setId(?Velo $id): static
    {
        $this->id = $id;

        return $this;
    }


}
