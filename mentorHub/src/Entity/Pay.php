<?php

namespace App\Entity;

use App\Repository\PayRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PayRepository::class)]
class Pay
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $nbSession = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateSession = null;

    #[ORM\Column(length: 255)]
    private ?string $mentorName = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 2, scale: '0')]
    private ?string $amount = null;

    #[ORM\ManyToOne(inversedBy: 'payments')]
    private ?Course $course = null;

    #[ORM\OneToMany(mappedBy: 'relation', targetEntity: User::class)]
    private Collection $users;

    #[ORM\ManyToOne(inversedBy: 'Pay')]
    private ?User $user = null;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbSession(): ?int
    {
        return $this->nbSession;
    }

    public function setNbSession(int $nbSession): static
    {
        $this->nbSession = $nbSession;

        return $this;
    }

    public function getDateSession(): ?\DateTimeInterface
    {
        return $this->dateSession;
    }

    public function setDateSession(\DateTimeInterface $dateSession): static
    {
        $this->dateSession = $dateSession;

        return $this;
    }

    public function getMentorName(): ?string
    {
        return $this->mentorName;
    }

    public function setMentorName(string $mentorName): static
    {
        $this->mentorName = $mentorName;

        return $this;
    }

    public function getAmount(): ?string
    {
        return $this->amount;
    }

    public function setAmount(string $amount): static
    {
        $this->amount = $amount;

        return $this;
    }

    public function getCourse(): ?Course
    {
        return $this->course;
    }

    public function setCourse(?Course $course): static
    {
        $this->course = $course;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): static
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->setRelation($this);
        }

        return $this;
    }

    public function removeUser(User $user): static
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getRelation() === $this) {
                $user->setRelation(null);
            }
        }

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
}
