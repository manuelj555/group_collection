
Group Collection

================

Permite agrupar arreglos e iteradores de manera simple, ejemplo:

```php
<?php

use K2\GroupCollection\GroupCollection;

$array = array(
  array('register_year' => 2011, 'user' => "Pedro"),
  array('register_year' => 2010, 'user' => "Carlos"),
  array('register_year' => 2010, 'user' => "Maria"),
  array('register_year' => 2011, 'user' => "Luis"),
  array('register_year' => 2010, 'user' => "Miguel"),
);

$grouped = new GroupCollection($array, function($item){ return $item['register_year']; });

foreach($grouped as $itemsYear){

  echo '<h2>' . $itemsYear . '</h2>';
  
  foreach($itemsYear as $item){
  
    echo $item['user'] . '<br/>';
    
  }
}

```

Agrupando por Año/Mes:

```php
<?php

use K2\GroupCollection\GroupCollection;

$array = array(
  array('register_date' => new Datetime("20-02-2010"), 'user' => "Pedro"),
  array('register_date' => new Datetime("04-02-2010"), 'user' => "Carlos"),
  array('register_date' => new Datetime("01-05-2011"), 'user' => "Maria"),
  array('register_date' => new Datetime("20-02-2011"), 'user' => "Luis"),
  array('register_date' => new Datetime("25-06-2011"), 'user' => "Miguel"),
);

$grouped = new GroupCollection($array, function($item){
  return $item['register_date']->format('Y-m'); 
});

foreach($grouped as $itemsYearMonth){

  echo '<h2>' . $itemsYearMonth . '</h2>';
  
  foreach($itemsYearMonth as $item){
  
    echo $item['user'] . '<br/>';
    
  }
}

```

El callback puede devolver un objeto:


```php
<?php

use K2\GroupCollection\GroupCollection;

$companyGoogle = new Company("Google");
$companyTwitter = new Company("Twitter");

$userGoogle1 = new User("Pedro");
$userGoogle2 = new User("Carlos");
$userGoogle3 = new User("Maria");

$userGoogle1->setCompany($companyGoogle);
$userGoogle2->setCompany($companyGoogle);
$userGoogle3->setCompany($companyGoogle);

$userTwitter1 = new User("Miguel");
$userTwitter2 = new User("Luis");
$userTwitter3 = new User("Carolina");

$userTwitter1->setCompany($companyTwitter);
$userTwitter2->setCompany($companyTwitter);
$userTwitter3->setCompany($companyTwitter);

$users = array($userGoogle1, $userGoogle3, $userGoogle3, $userTwitter1, $userTwitter3, $userTwitter3);

$grouped = new GroupCollection($users, function($user){
  return $user->getCompany(); //el callback puede retornar un objeto ó array
});

foreach($grouped as $companyUsers){

  echo '<h2>' . $companyUsers->getTitle()->getName() . '</h2>';
  
  foreach($companyUsers as $user){
  
    echo $user->getName() . '<br/>';
    
  }
}

```
