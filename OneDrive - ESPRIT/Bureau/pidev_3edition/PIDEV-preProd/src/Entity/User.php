<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $cin = null;

    #[ORM\Column(length: 20)]
    private ?string $firstName = null;

    #[ORM\Column(length: 20)]
    private ?string $lastName = null;

    #[ORM\Column(length: 20)]
    private ?string $email = null;

    #[ORM\Column(length: 50)]
    private ?string $address = null;

    #[ORM\Column(length: 20)]
    private ?string $phoneNumber = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\OneToMany(targetEntity: Sinister::class, mappedBy: 'sinisterUser', orphanRemoval: true)]
    private Collection $theSinisters;

    #[ORM\OneToMany(targetEntity: MedicalSheet::class, mappedBy: 'userCIN', orphanRemoval: true)]
    private Collection $medicalsheetUser;

    #[ORM\OneToMany(targetEntity: Prescription::class, mappedBy: 'userCIN', orphanRemoval: true)]
    private Collection $prescriptionUser;



    public function __construct()
    {
        $this->theSinisters = new ArrayCollection();
        $this->medicalsheetUser = new ArrayCollection();
        $this->prescriptionUser = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function getCINtoString(): string
    {
        return (string) $this->cin;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCin(): ?string
    {
        return $this->cin;
    }

    public function setCin(string $cin): static
    {
        $this->cin = $cin;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): static
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return Collection<int, Sinister>
     */
    public function getTheSinisters(): Collection
    {
        return $this->theSinisters;
    }

    public function addTheSinister(Sinister $theSinister): static
    {
        if (!$this->theSinisters->contains($theSinister)) {
            $this->theSinisters->add($theSinister);
            $theSinister->setSinisterUser($this);
        }

        return $this;
    }

    public function removeTheSinister(Sinister $theSinister): static
    {
        if ($this->theSinisters->removeElement($theSinister)) {
            // set the owning side to null (unless already changed)
            if ($theSinister->getSinisterUser() === $this) {
                $theSinister->setSinisterUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, MedicalSheet>
     */
    public function getMedicalsheetUser(): Collection
    {
        return $this->medicalsheetUser;
    }

    public function addMedicalsheetUser(MedicalSheet $medicalsheetUser): static
    {
        if (!$this->medicalsheetUser->contains($medicalsheetUser)) {
            $this->medicalsheetUser->add($medicalsheetUser);
            $medicalsheetUser->setUserCIN($this);
        }

        return $this;
    }

    public function removeMedicalsheetUser(MedicalSheet $medicalsheetUser): static
    {
        if ($this->medicalsheetUser->removeElement($medicalsheetUser)) {
            // set the owning side to null (unless already changed)
            if ($medicalsheetUser->getUserCIN() === $this) {
                $medicalsheetUser->setUserCIN(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Prescription>
     */
    public function getPrescriptionUser(): Collection
    {
        return $this->prescriptionUser;
    }

    public function addPrescriptionUser(Prescription $prescriptionUser): static
    {
        if (!$this->prescriptionUser->contains($prescriptionUser)) {
            $this->prescriptionUser->add($prescriptionUser);
            $prescriptionUser->setUserCIN($this);
        }

        return $this;
    }

    public function removePrescriptionUser(Prescription $prescriptionUser): static
    {
        if ($this->prescriptionUser->removeElement($prescriptionUser)) {
            // set the owning side to null (unless already changed)
            if ($prescriptionUser->getUserCIN() === $this) {
                $prescriptionUser->setUserCIN(null);
            }
        }

        return $this;
    }
}
