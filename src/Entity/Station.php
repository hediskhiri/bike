<?php

namespace App\Entity;

use App\Repository\StationRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Panier;

#[ORM\Entity(repositoryClass: StationRepository::class)]
#[ORM\Table(name: "Station")]
class Station 
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private $id_s;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"name is required")]
    private $nom_s;

   
    #[ORM\Column]
    #[Assert\NotBlank(message:"emplacement is required")]
    private $emplacement_s;
    

    public function getId_s(): ?int
    {
        return $this->id_s;
    }

    public function setId_s(int $id_s): static
    {
        $this->id_s = $id_s;

        return $this;
    }
   

    public function getNom_s(): ?string
    {
        return $this->nom_s;
    }

    public function setNom_s(string $nom_s): static
    {
        $this->nom_s = $nom_s;

        return $this;
    }

    public function getemplacement_s(): ?string
    {
        return $this->emplacement_s;
    }

    public function setemplacement_s(string $emplacement_s): static
    {
        $this->emplacement_s = $emplacement_s;

        return $this;
    }



    
}