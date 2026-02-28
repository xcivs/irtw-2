<?php

require_once 'Product.php';
require_once 'OrderProduct.php';
require_once 'Order.php';
require_once 'User.php';
require_once 'Review.php';
require_once 'Employee.php';
require_once 'Feedback.php';

// Пример использоватния формы обратной связи:
$feedback = new Feedback("Иван Кулигин", "Ivan@mail.com", "Не доставился товар", "Что делать, если товар не пришёл");

echo $feedback->getFullInfo();

// Статус меняет Админ,к примеру, после отправки инструкции
$feedback->setStatus(FeedbackStatus::Resolved);


// Пример создания продукта и добавления его в корзину:

$monitor = new Product(1, "Офисный монитор Acer", 25250.00);

$cart = new Cart();
$cart->addProduct($monitor);

$user = new User("Иван", "Кулигин", "2125234", "ivank", "123");

$monitor->addReview($user,  "Хороший монитор, но слишком дорогой");

print_r($cart->getProducts());

// Логика создания заказа:
$order = new Order(1, $cart->getProducts(),$user,"Ленина 16");

$employee = new Employee("Dry", "minon", "7 982 404 77 55", "Dom", "1", "1234");

$employee->closeOrder($order);

echo $order->getOrderReport();