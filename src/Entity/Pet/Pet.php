<?php

namespace App\Entity\Pet;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\NamedEntityBase;
use App\Entity\Owner\Owner;
use App\Entity\Visit\Visit;
use App\Repository\Pet\PetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=PetRepository::class)
 */
class Pet extends NamedEntityBase
{
    /**
     * @ORM\ManyToOne(targetEntity=Owner::class, inversedBy="pets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $owner;

    /**
     * @ORM\ManyToOne(targetEntity=PetType::class, inversedBy="pets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity=Visit::class, mappedBy="pet", orphanRemoval=true)
     */
    private $visits;

    public function __construct()
    {
        $this->visits = new ArrayCollection();
    }

    public function getOwner(): ?Owner
    {
        return $this->owner;
    }

    public function setOwner(?Owner $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

    public function getType(): ?PetType
    {
        return $this->type;
    }

    public function setType(?PetType $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection|Visit[]
     */
    public function getVisits(): Collection
    {
        return $this->visits;
    }

    public function addVisit(Visit $visit): self
    {
        if (!$this->visits->contains($visit)) {
            $this->visits[] = $visit;
            $visit->setPet($this);
        }

        return $this;
    }

    public function removeVisit(Visit $visit): self
    {
        if ($this->visits->removeElement($visit)) {
            // set the owning side to null (unless already changed)
            if ($visit->getPet() === $this) {
                $visit->setPet(null);
            }
        }

        return $this;
    }
}
