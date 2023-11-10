<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Velos
 *
 * @ORM\Table(name="velos", indexes={@ORM\Index(name="fkidsffkjb", columns={"id_s"})})
 * @ORM\Entity
 */
class Velos
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_v", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idV;

    /**
     * @var string
     *
     * @ORM\Column(name="model", type="string", length=255, nullable=false)
     */
    private $model;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255, nullable=false)
     */
    private $status;

    /**
     * @var \Station
     *
     * @ORM\ManyToOne(targetEntity="Station")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_s", referencedColumnName="id_s")
     * })
     */
    private $idS;

    public function getIdV(): ?int
    {
        return $this->idV;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): static
    {
        $this->model = $model;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getIdS(): ?Station
    {
        return $this->idS;
    }

    public function setIdS(?Station $idS): static
    {
        $this->idS = $idS;

        return $this;
    }


}
