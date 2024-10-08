<?php


class Cart {
private $db;

public function __construct(){
    $this->db = new Database();
}
function getAllBySessionId($id) {
    $query = 'SELECT `cart`.*, `products`.*
    FROM `cart`
    JOIN `products` ON `cart`.`product_id` = `products`.`id`
    WHERE `cart`.`user_id` = :user_id';

    $this->db->query($query);   
    $this->db->bind(':user_id', $id);
    $result = $this->db->resultSet(); 
    return $result;
}

function countQuantity($data) {
    $sql = 'SELECT SUM(quantity) as quantity_count
            FROM cart
            WHERE user_id = :user_id AND product_id = :product_id';

    $this->db->query($sql);
    $this->db->bind(':user_id', $data['user_id']);
    $this->db->bind(':product_id', $data['product_id']);

    $this->db->execute();
    
    $result = $this->db->single(); 

    return $result->quantity_count; 
}


function insertData($data) {

$query = 'INSERT INTO cart (product_id,user_id,quantity) 
VALUES (:product_id,:user_id,:quantity)';
    
    $this->db->query($query);
        
    $this->db->bind(':product_id', $data['product_id']);

    $this->db->bind(':user_id', $data['user_id']);
    $this->db->bind(':quantity', $data['quantity']);

       
    return $this->db->execute();
}
function updatetData($data) {

    $query = 'INSERT INTO cart (product_id,user_id,quantity) 
    VALUES (:product_id,:user_id,:quantity)';
        
        $this->db->query($query);
            
        $this->db->bind(':product_id', $data['product_id']);
    
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':quantity', $data['quantity']);
    
           
        return $this->db->execute();
    }

 

    public function updateProductQuantity($data) {
        $query = 'UPDATE cart SET quantity = :quantity WHERE user_id = :user_id AND product_id = :product_id';
        
        $this->db->query($query);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':product_id', $data['product_id']);
        $this->db->bind(':quantity', $data['quantity']);
        
        return $this->db->execute();
    }
    
    

    function checkOut ($user_id){

            $query = 'SELECT `cart`.*, `products`.*
                      FROM `cart`
                      JOIN `products` ON `cart`.`product_id` = `products`.`id`
                      WHERE `cart`.`user_id` = :user_id';
        
            $this->db->query($query);   
            $this->db->bind(':user_id', $user_id);
            $result = $this->db->resultSet(); 
            return $result;
        }


        function totalPrice($user_id) {
            $query = '
                SELECT
                SUM(`cart`.`quantity` * `products`.`price`) AS `total_amount`
                FROM `cart`
                JOIN `products` ON `cart`.`product_id` = `products`.`id`
                WHERE `cart`.`user_id` = :user_id';
        
            $this->db->query($query);   
            $this->db->bind(':user_id', $user_id);
            $result = $this->db->single(); 
        
            return $result;
        }
              

        function deleteById($user_id, $product_id) {
            $sql = "DELETE FROM cart WHERE user_id = :user_id AND product_id = :product_id";
            $this->db->query($sql);
            $this->db->bind(':user_id', $user_id); 
            $this->db->bind(':product_id', $product_id);
            $this->db->execute();
        }

        function updateQuantity($data) {
            $query = 'UPDATE cart
                      SET quantity = quantity + 1 
                      WHERE user_id = :user_id AND product_id = :product_id';
        
            $this->db->query($query);
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':product_id', $data['product_id']);
        
            return $this->db->execute();
        }


        public function insertAddress($shipping_address, $total_amount, $user_id) {
            $query = 'INSERT INTO orders (total_amount, user_id, shipping_address) 
                      VALUES (:total_amount, :user_id, :shipping_address)';
            $this->db->query($query);
            $this->db->bind(':total_amount', $total_amount);
            $this->db->bind(':user_id', $user_id);
            $this->db->bind(':shipping_address', $shipping_address);
            $this->db->execute();
    
// Get the new order ID
            $order_id = $this->db->lastInsertId();
    

           // Move items from cart_test to orders_item
            $this->transferCartToOrderItems($order_id, $user_id);
        }
    
        public function transferCartToOrderItems($order_id, $user_id) {

// Fetch all items from user's cart_test with price            
            $query = 'SELECT cart.product_id, cart.quantity, products.price
                      FROM cart
                      JOIN products ON cart.product_id = products.id
                      WHERE cart.user_id = :user_id';
            $this->db->query($query);
            $this->db->bind(':user_id', $user_id);
            $result = $this->db->resultSet();
        
            // إدخال العناصر في orders_item مع السعر

            
            $query = 'INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (:order_id, :product_id, :quantity, :price)';
            $this->db->query($query);
            $this->db->bind(':order_id', $order_id);
        
            foreach ($result as $row) {
                $this->db->bind(':product_id', $row->product_id);
                $this->db->bind(':quantity', $row->quantity);
                $this->db->bind(':price', $row->price); // إدخال السعر
                $this->db->execute();
            }
        
            // مسح البيانات من cart_test بعد النقل
            $this->clearCart($user_id);
        }
        
    
        private function clearCart($user_id) {
            $query = 'DELETE FROM cart WHERE user_id = :user_id';
            $this->db->query($query);
            $this->db->bind(':user_id', $user_id);
            $this->db->execute();
        }


        public function updateCartQuantity($data) {
            $this->db->query('UPDATE cart SET quantity = :quantity WHERE user_id = :user_id AND product_id = :product_id');
            $this->db->bind(':quantity', $data['quantity']);
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':product_id', $data['product_id']);
            $this->db->execute();
        }
        
    
        
        



    }
        
             



