<html>
  <head>
    <title>PHP Test</title>
  </head>
  <body>
    <?php 
      class User
        {
          private $name;
          private $email;

          public function __construct($name, $email)
            {
              $this->name = $name;
              $this->email = $email;
            }
          
          public function setName($nameNew) 
          {
            $this->name = $nameNew;
          }

          public function getName()
          {
            echo $this->name;
          }

          public function setEmail($emailNew)
          {
            $this->email = $emailNew;
          }

          public function getEmail()
          {
            echo $this->email;
          }
        }

      class Product
        {
          private $id;
          private $name;
          private $price;
          private $description;
          private $count;

          public function __construct($id, $name, $price, $description, $count)
          {
            $this->id = $id;
            $this->name = $name;
            $this->price = $price;
            $this->description = $description;
            $this->count = $count;
          }

          public function setId($idNew)
          {
            $this->id = $idNew;
          }

          public function getId()
          {
            echo $this->id;
          }

          public function setName($nameNew)
          {
            $this->name = $nameNew;
          }

          public function getName()
          {
            echo $this->name;
          }

          public function setPrice($priceNew)
          {
            $this->price = $priceNew;
          }

          public function getPrice()
          {
            echo $this->price;
          }

          public function setDescription($descriptionNew)
          {
            $this->description = $descriptionNew;
          }

          public function getDescription()
          {
            echo $this->description;
          }

          public function setCount($countNew)
          {
            $this->count = $countNew;
          }

          public function getCount()
          {
            echo $this->count;
          }

        }

      class Cart
        {
          private $products = [];

          public function addProduct(Product $product)
          {
            $this->products[] = $product;
          }

          public function removeProducts(Product $product)
          {
            $key = array_search($product, $this->products);
            if ($key !== false) {
              unset($this->products[$key]);
            }
          }

          public function calculateProducts() {
            $sum = 0;
            foreach ($this->products as $product) {
              $sum += $product->getPrice();
            }
            return $sum;
          }
        }

      $user = new User('Ivan', 'oqibz@example.com');
      echo $user->getName();
      $p1 = new Product(1, 'Product 1', 100, 'Description 1', 10);
      $p1->getPrice();
      //echo $p1->getName();
      $cart = new Cart();
      //$cart->addProduct($p1);
      //echo $cart->calculateProducts();
    ?> 

</html>