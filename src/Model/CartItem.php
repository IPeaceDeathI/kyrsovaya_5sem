<?php
namespace App\View\Model;
class CartItem{
    /**
    * @var string
    */
    private $name = '';
    /**
    * @var int
    */
    private $quantity = 0;
    /**
    * @var float
    */
    private $sum = 0.0;

    public function __construct(string $name, int $quantity, float $sum)
    {
        $this->name = $name;
        $this->quantity = $quantity;
        $this->sum = $sum;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): CartItem
    {
        $this->name = $name;
        return $this;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): CartItem
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function getSum(): float
    {
        return $this->sum;
    }

    public function setSum(float $sum): CartItem
    {
        $this->sum = $sum;
        return $this;
    }
}