<?php
  class Pages extends Controller {


    /*
 public function createUserSession($user){
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->username;
        $_SESSION['user_phone'] = $user->phone_number;
        header('Location: ' . URLROOT . '/pages/shop');

    }
    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('users/login');
    }
    */

    public function __construct(){
        $this->shopModel = $this->model('Shop');
    }
    
    public function index(){
       //session_start ();   //not nessecary from other 
        print_r ($_SESSION['user_id']);

      $data = [];

      $this->view('pages/index', $data);
    }

    public function about(){
      $data = [];

      $this->view('pages/about', $data);
    }
      public function contact(){
          $data = [];

          $this->view('pages/contact', $data);
      }
      public function blog(){
          $data = [];

          $this->view('pages/blog', $data);
      }public function shop() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . URLROOT . '/users/login');
            exit();
        }
    
        $shop = $this->model('Shop');
    
        
        $data = [
            'shops' => $shop->getProduct(['user_id' => $_SESSION['user_id']]) // تأكد من تطابق اسم الأسلوب مع ما هو في النموذج
        ];
            var_dump($data);
        $this->view('pages/shop', $data);
    }
    

      public function cart(){
        //Go to the () controller 
          header('Location: ' . URLROOT . '/carts/cart_view');
        }
      public function checkout(){
          $data = [];

          $this->view('pages/checkout', $data);
      }



      public function add()
      {

          if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {

              $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

              $data = [
                  'name' => trim($_POST['name']),
                  'price' => trim($_POST['price']),
                  'description' => trim($_POST['description']),
                  'quantity' => trim($_POST['quantity']),
                  //'image_url' => trim($_POST['image_url']),
                  'category_id'=> trim($_POST['category']),
                  'name_err' => '',
                  'price_err' => '',
                  'description-err' => '',
                  'quantity_err' => '',
              ];

//              if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] === UPLOAD_ERR_OK) {
//                  $data['image_url'] = $this->uploadFile($_FILES['image_url']);
//              }
              if (empty($data['name'])) {
                  $data['name_err'] = 'Please enter name';
              }
              if (empty($data['price'])) {
                  $data['price_err'] = 'Please enter price';
              }
              if (empty($data['description'])) {
                  $data['description_err'] = 'Please enter description text';
              }
              if (empty($data['quantity'])) {
                  $data['quantity_err'] = 'Please enter quantity';
              }
              // make sure not error
              if (empty($data['name_err']) && empty($data['price_err']) && empty($data['quantity_err'])&& empty($data['description_err'])) {
                  if ($this->shopModel->addproduct($data)) {
                      //flash('Product_message', 'product Added');
                     // redirect('shop');
                  } else {
                      die("something went wrong");

                  }
              } else {
                  // load views with error
                  $this->view('product/add', $data);
              }
          } else {
              $data = [
                  'name' => '',
                  'price' => '',
                  'description' => '',
                  'quantity' => '',
                  //'image_url'=>'',
                  'category' => ''
              ];
              $this->view('product/add', $data);
          }
      }


//      public function uploadFile($file) {
//          $uploadDir = 'uploads/';
//          $uploadFile = $uploadDir . basename($file['name']);
//
//          if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
//              return $uploadFile;
//          } else {
//              return null;
//          }
//      }
  }