<?php

namespace App\Entity;

use App\Repository\MentorsesssionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MentorsesssionRepository::class)]
class Mentorsesssion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $training_name = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $trainingDate = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updateAt = null;

    #[ORM\Column]
    private ?int $nbParticipant = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTrainingName(): ?string
    {
        return $this->training_name;
    }

    public function setTrainingName(string $training_name): static
    {
        $this->training_name = $training_name;

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

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdateAt(): ?\DateTimeImmutable
    {
        return $this->updateAt;
    }

    public function setUpdateAt(\DateTimeImmutable $updateAt): static
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    public function getNbParticipant(): ?int
    {
        return $this->nbParticipant;
    }

    public function setNbParticipant(int $nbParticipant): static
    {
        $this->nbParticipant = $nbParticipant;

        return $this;
    }
}
