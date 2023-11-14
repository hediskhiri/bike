<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: EventRepository::class)]
#[ORM\Table(name: "Event")]
class Event
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private $id;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"name is required")]
    private $name;

   

     /**
     * @var int The hashed price
     */
    #[ORM\Column]
    #[Assert\NotBlank(message:"price is required")]
    private $price;

    #[ORM\Column(length: 180, unique: true)]
    #[Assert\NotBlank(message:"date is required")]
    private $date;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private $image;

    

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    #[Assert\NotBlank(message:"place is required")]
    private $place;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    #[Assert\NotBlank(message:"description is required")]
    private $description;

    

     
   
 




     /**

 */
   /**

 */
public function getSalt(): ?string
    {
        return null;
    }

/**
    
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainprice = null;
    }
    

    public function getId(): ?int
    {
        return $this->id;
    }

   

    public function getname(): ?string
    {
        return $this->name;
    }

    public function setname(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getprice(): ?string
    {
        return $this->price;
    }

    public function setprice(string $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getdate(): ?string
    {
        return $this->date;
    }

    public function setdate(string $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getplace(): ?string
    {
        return $this->place;
    }

    public function setplace(string $place): static
    {
        $this->place = $place;

        return $this;
    }


    public function getdescription(): ?string
    {
        return $this->description;
    }

    public function setdescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }
    public function getResetToken(): ?string
    {
        return $this->reset_token;
    }

    



}