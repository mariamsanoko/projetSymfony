<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $fullName = null;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: MentorSession::class)]
    private Collection $mentorSessions;

    #[ORM\OneToOne(inversedBy: 'user', cascade: ['persist', 'remove'])]
    private ?Mentor $mentor = null;

    #[ORM\ManyToOne(inversedBy: 'users')]
    private ?Pay $relation = null;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Pay::class)]
    private Collection $Pay;

    public function __construct()
    {
        $this->courses = new ArrayCollection();
        $this->mentorSessions = new ArrayCollection();
        $this->Pay = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName): static
    {
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * @return Collection<int, MentorSession>
     */
    public function getMentorSessions(): Collection
    {
        return $this->mentorSessions;
    }

    public function addMentorSession(MentorSession $mentorSession): static
    {
        if (!$this->mentorSessions->contains($mentorSession)) {
            $this->mentorSessions->add($mentorSession);
            $mentorSession->setUser($this);
        }

        return $this;
    }

    public function removeMentorSession(MentorSession $mentorSession): static
    {
        if ($this->mentorSessions->removeElement($mentorSession)) {
            // set the owning side to null (unless already changed)
            if ($mentorSession->getUser() === $this) {
                $mentorSession->setUser(null);
            }
        }

        return $this;
    }

    public function getMentor(): ?Mentor
    {
        return $this->mentor;
    }

    public function setMentor(?Mentor $mentor): static
    {
        $this->mentor = $mentor;

        return $this;
    }

    public function getRelation(): ?Pay
    {
        return $this->relation;
    }

    public function setRelation(?Pay $relation): static
    {
        $this->relation = $relation;

        return $this;
    }

    /**
     * @return Collection<int, Pay>
     */
    public function getPay(): Collection
    {
        return $this->Pay;
    }

    public function addPay(Pay $pay): static
    {
        if (!$this->Pay->contains($pay)) {
            $this->Pay->add($pay);
            $pay->setUser($this);
        }

        return $this;
    }

    public function removePay(Pay $pay): static
    {
        if ($this->Pay->removeElement($pay)) {
            // set the owning side to null (unless already changed)
            if ($pay->getUser() === $this) {
                $pay->setUser(null);
            }
        }

        return $this;
    }
}
