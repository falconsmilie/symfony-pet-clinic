<?php

namespace App\Entity\Vet;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\Vet\Vet;
use App\Repository\Vet\SpecialtyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=SpecialtyRepository::class)
 */
class Specialty
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity=Vet::class, mappedBy="specialties")
     */
    private $vets;

    public function __construct()
    {
        $this->vets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|vet[]
     */
    public function getVets(): Collection
    {
        return $this->vets;
    }

    public function addVet(vet $vet): self
    {
        if (!$this->vets->contains($vet)) {
            $this->vets[] = $vet;
            $vet->addSpecialty($this);
        }

        return $this;
    }

    public function removeVet(vet $vet): self
    {
        if ($this->vets->removeElement($vet)) {
            $vet->removeSpecialty($this);
        }

        return $this;
    }
}
