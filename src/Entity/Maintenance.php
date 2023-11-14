<?php

namespace App\Entity;

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
     * @var \Velo
     *
     * @ORM\ManyToOne(targetEntity="Velo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_v", referencedColumnName="id")
     * })
     */
    private $idV;


}
