<?php

namespace App\Entity;

use App\Repository\ProductsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductsRepository::class)]
class Products
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $slug;

    #[ORM\Column(type: 'string', length: 255)]
    private $image;

    #[ORM\Column(type: 'string', length: 255)]
    private $substitle;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\Column(type: 'float')]
    private $price;

    #[ORM\ManyToOne(targetEntity: Category::class, inversedBy: 'products')]
    #[ORM\JoinColumn(nullable: true)]
    private $Category;


    #[ORM\Column(type: 'boolean')]
    private $isBest;

    #[ORM\ManyToOne(targetEntity: Agents::class, inversedBy: 'products')]
    #[ORM\JoinColumn(nullable: true)]
    private $agents;

    #[ORM\Column(type: 'integer')]
    private $room;

    #[ORM\Column(type: 'integer')]
    private $floor;

    #[ORM\Column(type: 'float', nullable: true)]
    private $surface;

    #[ORM\Column(type: 'string', length: 255)]
    private $typebien;

    #[ORM\Column(type: 'string', length: 255)]
    private $typetransaction;

    #[ORM\Column(type: 'date')]
    private $dateconstruct;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $etage;

    #[ORM\Column(type: 'text', nullable: true)]
    private $adresse;

    #[ORM\Column(type: 'array', nullable: true)]
    private $options = [];

    #[ORM\OneToMany(mappedBy: 'product', targetEntity: Kontact::class)]
    private $kontacts;

    #[ORM\OneToMany(mappedBy: 'products', targetEntity: Images::class, orphanRemoval: true)]
    private $images;

    
    public function __construct()
    {
        $this->kontacts = new ArrayCollection();
        $this->images = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getSubstitle(): ?string
    {
        return $this->substitle;
    }

    public function setSubstitle(string $substitle): self
    {
        $this->substitle = $substitle;

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

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->Category;
    }

    public function setCategory(?Category $Category): self
    {
        $this->Category = $Category;

        return $this;
    }

    public function getIsBest(): ?bool
    {
        return $this->isBest;
    }

    public function setIsBest(bool $isBest): self
    {
        $this->isBest = $isBest;

        return $this;
    }

    public function getAgents(): ?Agents
    {
        return $this->agents;
    }

    public function setAgents(?Agents $agents): self
    {
        $this->agents = $agents;

        return $this;
    }

    public function getRoom(): ?int
    {
        return $this->room;
    }

    public function setRoom(int $room): self
    {
        $this->room = $room;

        return $this;
    }

    public function getFloor(): ?int
    {
        return $this->floor;
    }

    public function setFloor(int $floor): self
    {
        $this->floor = $floor;

        return $this;
    }

    public function getSurface(): ?float
    {
        return $this->surface;
    }

    public function setSurface(?float $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getTypebien(): ?string
    {
        return $this->typebien;
    }

    public function setTypebien(string $typebien): self
    {
        $this->typebien = $typebien;

        return $this;
    }

    public function getTypetransaction(): ?string
    {
        return $this->typetransaction;
    }

    public function setTypetransaction(string $typetransaction): self
    {
        $this->typetransaction = $typetransaction;

        return $this;
    }

    public function getDateconstruct(): ?\DateTimeInterface
    {
        return $this->dateconstruct;
    }

    public function setDateconstruct(\DateTimeInterface $dateconstruct): self
    {
        $this->dateconstruct = $dateconstruct;

        return $this;
    }

    public function getEtage(): ?int
    {
        return $this->etage;
    }

    public function setEtage(?int $etage): self
    {
        $this->etage = $etage;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getOptions(): ?array
    {
        return $this->options;
    }

    public function setOptions(?array $options): self
    {
        $this->options = $options;

        return $this;
    }

    /**
     * @return Collection<int, Kontact>
     */
    public function getKontacts(): Collection
    {
        return $this->kontacts;
    }

    public function addKontact(Kontact $kontact): self
    {
        if (!$this->kontacts->contains($kontact)) {
            $this->kontacts[] = $kontact;
            $kontact->setProduct($this);
        }

        return $this;
    }

    public function removeKontact(Kontact $kontact): self
    {
        if ($this->kontacts->removeElement($kontact)) {
            // set the owning side to null (unless already changed)
            if ($kontact->getProduct() === $this) {
                $kontact->setProduct(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        $text = $this->name." avec id ".$this->id;
        return $text;
    }

    /**
     * @return Collection<int, Images>
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Images $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setProducts($this);
        }

        return $this;
    }

    public function removeImage(Images $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getProducts() === $this) {
                $image->setProducts(null);
            }
        }

        return $this;
    }

}
