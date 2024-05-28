<?php
class Cart {
    public $items = array();
    public $total_price = 0;

    public function __construct() {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        $this->items = $_SESSION['cart'];
    }

    public function addProduct($product_id, $quantity) {
        if (isset($this->items[$product_id])) {
            $this->items[$product_id] += $quantity;
        } else {
            $this->items[$product_id] = $quantity;
        }
        $_SESSION['cart'] = $this->items;
    }

    public function removeProduct($product_id) {
        if (isset($this->items[$product_id])) {
            unset($this->items[$product_id]);
        }
        $_SESSION['cart'] = $this->items;
    }

    public function getTotalPrice($conn) {
        $this->total_price = 0;
        foreach ($this->items as $product_id => $quantity) {
            $sql = "SELECT price FROM products WHERE id = $product_id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $this->total_price += $row['price'] * $quantity;
                }
            }
        }
        return $this->total_price;
    }

    public function getCartProducts($conn) {
        $cart_products = array();
        foreach ($this->items as $product_id => $quantity) {
            $sql = "SELECT * FROM products WHERE id = $product_id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $row['quantity'] = $quantity;
                    $cart_products[] = $row;
                }
            }
        }
        return $cart_products;
    }
}
?>
