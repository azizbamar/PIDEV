<?php

namespace App\Entity;

use App\Repository\PrescriptionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrescriptionRepository::class)]
class Prescription
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $datePrescription = null;

    #[ORM\Column(length: 10)]
    private ?string $doctorCIN = null;

    #[ORM\Column(length: 10)]
    private ?string $clientCIN = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $medications = null;

    #[ORM\Column(length: 20)]
    private ?string $statusPrescription = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $additionalNotes = null;

    #[ORM\Column(nullable: true)]
    private ?int $validityDuration = null;

    public function getdatePrescription(): ?\DateTimeInterface
    {
        return $this->datePrescription;
    }

    public function setdatePrescription(\DateTimeInterface $datePrescription): static
    {
        $this->datePrescription = $datePrescription;

        return $this;
    }

    public function getDoctorCIN(): ?string
    {
        return $this->doctorCIN;
    }

    public function setDoctorCIN(string $doctorCIN): static
    {
        $this->doctorCIN = $doctorCIN;

        return $this;
    }

    public function getClientCIN(): ?string
    {
        return $this->clientCIN;
    }

    public function setClientCIN(string $clientCIN): static
    {
        $this->clientCIN = $clientCIN;

        return $this;
    }

    public function getMedications(): ?string
    {
        return $this->medications;
    }

    public function setMedications(string $medications): static
    {
        $this->medications = $medications;

        return $this;
    }

    public function getStatusPrescription(): ?string
    {
        return $this->statusPrescription;
    }

    public function setStatusPrescription(string $statusPrescription): static
    {
        $this->statusPrescription = $statusPrescription;

        return $this;
    }

    public function getAdditionalNotes(): ?string
    {
        return $this->additionalNotes;
    }

    public function setAdditionalNotes(?string $additionalNotes): static
    {
        $this->additionalNotes = $additionalNotes;

        return $this;
    }

    public function getValidityDuration(): ?int
    {
        return $this->validityDuration;
    }

    public function setValidityDuration(?int $validityDuration): static
    {
        $this->validityDuration = $validityDuration;

        return $this;
    }


}
