<?php

namespace App\Entity\Pet;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\NamedEntityBase;
use App\Repository\Pet\PetTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=PetTypeRepository::class)
 */
class PetType extends NamedEntityBase
{
    /**
     * @ORM\OneToMany(targetEntity=Pet::class, mappedBy="type", orphanRemoval=true)
     */
    private $pets;

    public function __construct()
    {
        $this->pets = new ArrayCollection();
    }

    /**
     * @return Collection|Pet[]
     */
    public function getPets(): Collection
    {
        return $this->pets;
    }

//    public function addPet(Pet $pet): self
//    {
//        if (!$this->pets->contains($pet)) {
//            $this->pets[] = $pet;
//            $pet->setType($this);
//        }
//
//        return $this;
//    }
//
//    public function removePet(Pet $pet): self
//    {
//        if ($this->pets->removeElement($pet)) {
//            // set the owning side to null (unless already changed)
//            if ($pet->getType() === $this) {
//                $pet->setType(null);
//            }
//        }
//
//        return $this;
//    }
}
