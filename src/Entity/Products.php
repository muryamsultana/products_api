<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\DateFilter;
use Doctrine\Common\Collections\ArrayCollection;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Bridge\Elasticsearch\DataProvider\Filter\OrderFilter;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\ProductsRepository")
 * @ApiFilter(SearchFilter::class, properties={"name": "exact","price":"partial"})
 * @ApiFilter(OrderFilter::class, properties={"name","price","created_at"}, arguments={"orderParameterName"="order"})
 */
class Products
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    public $name;

    /**
     * @ORM\Column(type="integer")
     */
    public $price;

    /**
     * @ORM\Column(type="datetime")
     */
    public $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    public $upodated_at;
	
	/**
     * @ORM\OneToMany(targetEntity="App\Entity\Rating",mappedBy="product_id")
     */
    
    public $rating;

    public function __construct()
    {
       $this->rating = new ArrayCollection();
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

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpodatedAt(): ?\DateTimeInterface
    {
        return $this->upodated_at;
    }

    public function setUpodatedAt(\DateTimeInterface $upodated_at): self
    {
        $this->upodated_at = $upodated_at;

        return $this;
    }

   

}
