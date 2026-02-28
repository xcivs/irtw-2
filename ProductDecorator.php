<?php

// Наследники (digital, quantity, weight) класса ProductDecorator будут содержать экземпляр класса product
// Чтобы подсчитывать цену продукта

abstract class ProductDecorator extends Product {
    protected Product $product;

    public function __construct(Product $product) {
        parent::__construct($product->getName(), $product->getPrice());
        $this->product = $product;
    }
}