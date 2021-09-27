<?php

namespace App\Entity\Visit;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\Pet\Pet;
use App\Repository\Visit\VisitRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=VisitRepository::class)
 */
class Visit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetimetz_immutable")
     */
    private $visitDate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Pet::class, inversedBy="visits")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pet;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVisitDate(): ?\DateTimeImmutable
    {
        return $this->visitDate;
    }

    public function setVisitDate(\DateTimeImmutable $visitDate): self
    {
        $this->visitDate = $visitDate;

        return $this;
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

    public function getPet(): ?Pet
    {
        return $this->pet;
    }

    public function setPet(?Pet $pet): self
    {
        $this->pet = $pet;

        return $this;
    }
}
