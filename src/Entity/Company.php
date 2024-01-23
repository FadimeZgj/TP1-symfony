<?php

namespace App\Entity;

use App\Repository\CompanyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompanyRepository::class)]
class Company
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\Column(length: 100)]
    private ?string $address_street = null;

    #[ORM\Column(length: 50)]
    private ?string $address_city = null;

    #[ORM\Column(length: 50)]
    private ?string $address_zip = null;

    #[ORM\ManyToMany(targetEntity: Client::class, inversedBy: 'companies')]
    private Collection $clients;

    public function __construct()
    {
        $this->clients = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getAddressStreet(): ?string
    {
        return $this->address_street;
    }

    public function setAddressStreet(string $address_street): static
    {
        $this->address_street = $address_street;

        return $this;
    }

    public function getAddressCity(): ?string
    {
        return $this->address_city;
    }

    public function setAddressCity(string $address_city): static
    {
        $this->address_city = $address_city;

        return $this;
    }

    public function getAddressZip(): ?string
    {
        return $this->address_zip;
    }

    public function setAddressZip(string $address_zip): static
    {
        $this->address_zip = $address_zip;

        return $this;
    }

    /**
     * @return Collection<int, Client>
     */
    public function getClients(): Collection
    {
        return $this->clients;
    }

    public function addClient(Client $client): static
    {
        if (!$this->clients->contains($client)) {
            $this->clients->add($client);
        }

        return $this;
    }

    public function removeClient(Client $client): static
    {
        $this->clients->removeElement($client);

        return $this;
    }
}
