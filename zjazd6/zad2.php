<?php
class Product {
    private $name;
    private $price;
    private $quantity;

    public function __construct($name, $price, $quantity) {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    public function __toString() {
        return "Product: {$this->name}, Price: {$this->price}, Quantity: {$this->quantity}";
    }
}

class Cart {
    private $products;

    public function __construct() {
        $this->products = [];
    }

    public function addProduct(Product $product) {
        $this->products[] = $product;
    }

    public function removeProduct(Product $product) {
        foreach ($this->products as $key => $cartProduct) {
            if ($cartProduct->getName() === $product->getName()) {
                unset($this->products[$key]);
                $this->products = array_values($this->products);
                break;
            }
        }
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->getPrice() * $product->getQuantity();
        }
        return $total;
    }

    public function __toString() {
        $output = "Products in cart:\n";
        foreach ($this->products as $product) {
            $output .= $product . "\n";
        }
        $output .= "Total price: " . $this->getTotal();
        return $output;
    }
}


$laptok1 = new Product("Laptok", 2500, 1);
$p2 = new Product("Phone", 800, 2);

$cart = new Cart();

$cart->addProduct($laptok1);
$cart->addProduct($p2);

echo $cart;

$cart->removeProduct($laptok1);

echo $cart;
?>

