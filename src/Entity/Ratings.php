<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\RatingsRepository")
 */
class Ratings
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Product", mappedBy="rate")
     */
    private $product_id;

    public function __construct()
    {
        $this->product_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProductId(): Collection
    {
        return $this->product_id;
    }

    public function addProductId(Product $productId): self
    {
        if (!$this->product_id->contains($productId)) {
            $this->product_id[] = $productId;
            $productId->setRate($this);
        }

        return $this;
    }

    public function removeProductId(Product $productId): self
    {
        if ($this->product_id->contains($productId)) {
            $this->product_id->removeElement($productId);
            // set the owning side to null (unless already changed)
            if ($productId->getRate() === $this) {
                $productId->setRate(null);
            }
        }

        return $this;
    }
}
