<?php

namespace ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="ShopBundle\Repository\ProductRepository")
 */
class Product
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     * @Assert\Length(
     *      min = 2,
     *      max = 255,
     *      minMessage = "Title must be above {{ limit }} chars",
     *      maxMessage = "Title has too be longer than {{ limit }} characters"
     * )
     */
    private $title;

    /**
     * @var int
     *
     * @ORM\Column(name="quantity", type="integer", precision=0)
     * @Assert\GreaterThan(0)
     */
    private $quantity;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float", precision=2)
     * @Assert\GreaterThan(0.00, message="price must be greater than 0.00")
     */
    private $price;

    /**
     * @var float
     *
     * @ORM\Column(name="oldPrice", type="float", precision=2)
     * @Assert\GreaterThan(0.00, message="oldPrice must be grater than 0.00")
     */
    private $oldPrice;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     * @Assert\Length(
     *     min = 100,
     *     minMessage = "Product description must be above {{ limit }} characters"
     * )
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdDate", type="datetime", nullable=true)
     */
    private $createdDate;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Product
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return Product
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set price
     *
     * @param float $price
     *
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set oldPrice
     *
     * @param float $oldPrice
     *
     * @return Product
     */
    public function setOldPrice($oldPrice)
    {
        $this->oldPrice = $oldPrice;

        return $this;
    }

    /**
     * Get oldPrice
     *
     * @return float
     */
    public function getOldPrice()
    {
        return $this->oldPrice;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param \DateTime $createdDate
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }
}

