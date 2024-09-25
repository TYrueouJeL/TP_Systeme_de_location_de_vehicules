<?php

namespace App\Entity;

use App\Repository\VehicleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehicleRepository::class)]
class Vehicle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $capacity = null;

    #[ORM\Column]
    private ?int $price = null;

    #[ORM\Column]
    private ?int $numberKilometers = null;

    #[ORM\Column(length: 50)]
    private ?string $numberPlate = null;

    #[ORM\Column]
    private ?int $yearOfVehicle = null;

    #[ORM\Column(length: 50)]
    private ?string $picturePath = null;

    /**
     * @var Collection<int, Reservation>
     */
    #[ORM\OneToMany(targetEntity: Reservation::class, mappedBy: 'vehicle', orphanRemoval: true)]
    private Collection $reservations;

    #[ORM\ManyToOne(inversedBy: 'vehicles')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Type $type = null;

    #[ORM\ManyToOne(inversedBy: 'vehicles')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Model $model = null;

    /**
     * @var Collection<int, Option>
     */
    #[ORM\ManyToMany(targetEntity: Option::class, inversedBy: 'vehicles')]
    private Collection $vehicleOption;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
        $this->vehicleOption = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCapacity(): ?int
    {
        return $this->capacity;
    }

    public function setCapacity(int $capacity): static
    {
        $this->capacity = $capacity;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getNumberKilometers(): ?int
    {
        return $this->numberKilometers;
    }

    public function setNumberKilometers(int $numberKilometers): static
    {
        $this->numberKilometers = $numberKilometers;

        return $this;
    }

    public function getNumberPlate(): ?string
    {
        return $this->numberPlate;
    }

    public function setNumberPlate(string $numberPlate): static
    {
        $this->numberPlate = $numberPlate;

        return $this;
    }

    public function getYearOfVehicle(): ?int
    {
        return $this->yearOfVehicle;
    }

    public function setYearOfVehicle(int $yearOfVehicle): static
    {
        $this->yearOfVehicle = $yearOfVehicle;

        return $this;
    }

    public function getPicturePath(): ?string
    {
        return $this->picturePath;
    }

    public function setPicturePath(string $picturePath): static
    {
        $this->picturePath = $picturePath;

        return $this;
    }

    /**
     * @return Collection<int, Reservation>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): static
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations->add($reservation);
            $reservation->setVehicle($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): static
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getVehicle() === $this) {
                $reservation->setVehicle(null);
            }
        }

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getModel(): ?Model
    {
        return $this->model;
    }

    public function setModel(?Model $model): static
    {
        $this->model = $model;

        return $this;
    }

    /**
     * @return Collection<int, Option>
     */
    public function getVehicleOption(): Collection
    {
        return $this->vehicleOption;
    }

    public function addVehicleOption(Option $vehicleOption): static
    {
        if (!$this->vehicleOption->contains($vehicleOption)) {
            $this->vehicleOption->add($vehicleOption);
        }

        return $this;
    }

    public function removeVehicleOption(Option $vehicleOption): static
    {
        $this->vehicleOption->removeElement($vehicleOption);

        return $this;
    }
}
