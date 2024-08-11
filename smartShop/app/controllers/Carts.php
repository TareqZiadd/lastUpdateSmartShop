<?php

class Carts extends Controller
{





    public function __construct()
    {

    }


    // public function __call($name, $arguments)
    // {
    //     error_log("Trying to call method '$name' with arguments: " . implode(', ', $arguments));
    //     $this->view('pages/404');
    // }
    

    public function index()
    {
        header('Location: ' . URLROOT . '/carts/cart_view');

    }
    
    public function cart_view(){
        if (isset($_SESSION['user_id'])) {
            $obj = $this->model('Cart');
            $total = $obj->totalPrice($_SESSION['user_id']);
            $id= $_SESSION['user_id'];
            $result = $obj->getAllBYSessionId($id);
            $data = [
                'carts' => $result,
                'product_id' => $_POST['product_id'],
                'user_id' => $_SESSION['user_id'],
                'total'=>$total->total_amount
            ];    
            var_dump($result);
            //$data = ['carts' => $result];
    
            $this->view('pages/cart', $data);
        } else {
   
            $this->view('users/login',$data=[]);
        }
    }
 
    
function quantityNum() {
    // Check if POST data and session data exist
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {    
        $data = [
            'product_id' => $_POST['product_id'],
            'user_id' => $_SESSION['user_id']
        ];
        var_dump($data);
        echo "/////////";
        // Create a single instance of Cart
        $obj = $this->model('Cart');
        $quantity_count = $obj->countQuantity($data);
        var_dump($quantity_count);
        if($quantity_count == 0) {

            // Add product to cart if not already present
            $data['quantity'] = 1; // Update quantity
            $obj->insertData($data);
        } else {

            $obj = $this->model('Cart');
            $obj->updateQuantity($data);
        }
    }
}

    




public function checkOut() {
    $obj = $this->model('Cart');
    $total = $obj->totalPrice($_SESSION['user_id']);
    
  $data=['total'=>$total->total_amount];

    
$this->view('pages/checkout',$data);
       
}

public function delById($product_id)
{
    $obj = $this->model('Cart');
    $user_id = $_SESSION['user_id'];

    // Delete the product by ID
    $obj->deleteById($user_id, $product_id);

    // Redirect to the cart view
    header('Location: ' . URLROOT . '/carts/cart_view');
    exit();
}




        public function addCart() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {    
                $data=[
                'product_id'=> $_POST['product_id'],
                'user_id'=>$_SESSION['user_id'],
                
                ];

                //$data = 

                echo '<pre>';
                print_r ($_POST);
                echo '</pre>';

            } 
        }
    
        
       function updateProductQuantities ($product_id){
       } 

       function insertAdress() {
        print_r($_POST);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            
            $obj = $this->model('Cart'); // إنشاء كائن من النموذج
            $shipping_address = $_POST['shipping_address'];
            $user_id = $_SESSION['user_id'];
            $total_amount=$_POST['total_amount'];
            $obj->insertAddress($shipping_address, $total_amount, $user_id); // استخدام الكائن لاستدعاء الفنكشن
            echo "Address inserted successfully."; // تأكد من أنك تطبع رسالة نصية فقط
        }
    }
    


 
}