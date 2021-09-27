<?php

namespace App\Entity\Pet;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\NamedEntityBase;
use App\Entity\Owner\Owner;
use App\Repository\Pet\PetRepository;
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
}
