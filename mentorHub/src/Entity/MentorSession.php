<?php

namespace App\Entity;

use App\Repository\MentorSessionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MentorSessionRepository::class)]
class MentorSession
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
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column]
    private ?int $nbParticipant = null;

    #[ORM\ManyToOne(inversedBy: 'learns')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\OneToOne(mappedBy: 'learns', cascade: ['persist', 'remove'])]
    private ?Mentor $mentor = null;

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

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getMentor(): ?Mentor
    {
        return $this->mentor;
    }

    public function setMentor(?Mentor $mentor): static
    {
        // unset the owning side of the relation if necessary
        if ($mentor === null && $this->mentor !== null) {
            $this->mentor->setLearns(null);
        }

        // set the owning side of the relation if necessary
        if ($mentor !== null && $mentor->getLearns() !== $this) {
            $mentor->setLearns($this);
        }

        $this->mentor = $mentor;

        return $this;
    }
}
