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


}
