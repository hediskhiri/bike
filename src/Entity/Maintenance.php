<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Maintenance
 *
 * @ORM\Table(name="maintenance", indexes={@ORM\Index(name="fkidxxqf", columns={"id_v"})})
 * @ORM\Entity
 */
class Maintenance
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_m", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idM;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_time", type="date", nullable=false)
     */
    private $startTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_time", type="date", nullable=false)
     */
    private $endTime;

    /**
     * @var \Velos
     *
     * @ORM\ManyToOne(targetEntity="Velos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_v", referencedColumnName="id_v")
     * })
     */
    private $idV;

    public function getIdM(): ?int
    {
        return $this->idM;
    }

    public function getStartTime(): ?\DateTimeInterface
    {
        return $this->startTime;
    }

    public function setStartTime(\DateTimeInterface $startTime): static
    {
        $this->startTime = $startTime;

        return $this;
    }

    public function getEndTime(): ?\DateTimeInterface
    {
        return $this->endTime;
    }

    public function setEndTime(\DateTimeInterface $endTime): static
    {
        $this->endTime = $endTime;

        return $this;
    }

    public function getIdV(): ?Velos
    {
        return $this->idV;
    }

    public function setIdV(?Velos $idV): static
    {
        $this->idV = $idV;

        return $this;
    }


}
