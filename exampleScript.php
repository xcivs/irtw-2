<?php

require_once 'Product.php';
require_once 'ProductDecorator.php';
require_once 'BaseProduct.php';
require_once 'DigitalProduct.php';
require_once 'QuantityProduct.php';
require_once 'WeightProduct.php';

// Реализовал с помощью паттергна "Декоратор"

// Сценарий:
// BaseProduct - наследник класса Product,
// который создаёт книгу, далее через этот класс показываю версии этой книги:
// цифровая (digital) или физическая/штучная (physical/quantity)
$baseBook = new BaseProduct("Знакомьтесь Python", 1200);

// Если мы делаем книгу цифровой, цена будет 600 руб - в 2 раза меньше, чем у базового товара
$digitalBook = new DigitalProduct($baseBook);
echo 'Цена цифрового. экзмепляра книги "Знакомьтесь Python": ' . $digitalBook->calculatePrice() . " руб.\n";

// Если мы делаем её штучной или физической, то цена будет, как у базового товара
$physicalBook = new QuantityProduct($baseBook);
echo 'Цена физического экзмепляра книги "Знакомьтесь Python": ' . $physicalBook->calculatePrice() ." руб.\n";

// C помощью декоратора мы можем "переконвертировать физическую книгу в цифровую"

echo "\n";

$convertedToDigitalBook = new DigitalProduct($physicalBook);
echo 'Цена цифрового экземпляра (конвертировали из Quantity в Digital), книги "Знакомьтесь Pythonд": ';
echo $convertedToDigitalBook->calculatePrice() . "\n";



// Цена весового товара считается аналогичным образом

echo "\n";

$baseCucumbers = new BaseProduct("Огурцы", 270);
$cucumbers = new WeightProduct($baseCucumbers, 2.5);
echo "Цена 2.5 кг огурцов: " . $cucumbers->calculatePrice() . " руб.\n";