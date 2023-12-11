<?php
namespace App\View\Model;
class Cart
{
    /**
     * @var CartItem[]
     */
    private $items = [];
    
    /**
     * @return CartItem[]
     */
    public function getItems(): array
    {
        return $this->items;
    }
 
    public function addItem(CartItem $item): Cart
    {
        $this->items[] = $item;
        return $this;
    }
 
    public function getTotalQuantity(): int
    {
        return array_sum(array_map(function (CartItem $item) {
            return $item->getQuantity();
        }, $this->items));
    }
 
    public function getTotalSum(): float
    {
        return array_sum(array_map(function (CartItem $item) {
            return $item->getSum();
        }, $this->items));
    }
}