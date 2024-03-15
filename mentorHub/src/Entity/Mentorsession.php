<?php

namespace App\Entity;

use App\Repository\MentorsessionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MentorsessionRepository::class)]
class Mentorsession
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $trainingName = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $trainingDate = null;

    #[ORM\Column]
    private ?int $nbPartipant = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column(length: 255)]
    private ?string $relation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTrainingName(): ?string
    {
        return $this->trainingName;
    }

    public function setTrainingName(string $trainingName): static
    {
        $this->trainingName = $trainingName;

        return $this;
    }

    public function getTrainingDate(): ?\DateTimeInterface
    {
        return $this->trainingDate;
    }

    public function setTrainingDate(\DateTimeInterface $trainingDate): static
    {
        $this->trainingDate = $trainingDate;

        return $this;
    }

    public function getNbPartipant(): ?int
    {
        return $this->nbPartipant;
    }

    public function setNbPartipant(int $nbPartipant): static
    {
        $this->nbPartipant = $nbPartipant;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getRelation(): ?string
    {
        return $this->relation;
    }

    public function setRelation(string $relation): static
    {
        $this->relation = $relation;

        return $this;
    }
}
