
<!-- SIMULAZIONE OGGETTI DI UNO SHOP ONLINE CHE ABBIA COME PRODOTTI UNA SEZIONE
TECH UNA CLOTHING E UNA SPORT;UNA PARTE DI QUESTO SHOP GESTISCE INVECE I CLIENTI -->


<?php

class Shop

{
  protected $vatNumber;

  protected $name;

  protected $webSite;

  public function __construct($name,$webSite){

    $this-> name = $name;

    $this-> webSite = $webSite;

  }


  public function getNameShop(){
    return $this-> name;
  }

  public function getWebSiteShop(){

    return $this-> webSite;
  }

};




class Product
{

  protected $id;

  protected $branch;

  protected $price;

  protected $name;



  public function __construct(string $branch){

    $this-> branch = $branch;
  }



  public function setProductName($specificName){
     
    $this-> name = $specificName;
  }


  
  public function setProductPrice($specificPrice){
     
    $this-> price = $specificPrice;
  }

  
  public function setProductId($specificId){
     
    $this-> id = $specificId;
  }

};





class Tech extends Product

{


};





class Clothing extends Product
{


};





class Sport extends Product
{


};



// INIZIO CLASSI DEDICATE ALLO USER;


class User

{
 
  protected $name;

  protected $surname;

  protected $email;

  private $password;

  private $creditCard;

  protected $productBought = [];



  public function __construct( string $name, string $surname, $email){

    $this-> name = $name;

    $this-> surname = $surname;

    $this-> email = $email;

  }


    public function setLogin($passCode, $email){
    
      $this-> password = $passCode;

      $this-> email = $email;
    }



    public function setProductBought(string $product){

      $this-> productBought[] = $product;
    }


   
    public function getProductBought(){

      return $this-> productBought;
    }



    public function setCard(int $number){

      $this-> creditCard = $number;
    }
    
    
};



class CreditCard extends User

{

  

};



//---------------------------------------------------------------------------------------------------------------



$newshop = new shop('WhatYouWant', 'www.WhatYouWant.com');
echo  'Benvenuto in ' . $newshop -> getNameShop() . ' Shop!' . '<br>' . '<br>';

 echo 'Nel nostro sito ' . '<b>' . $newshop -> getWebSiteShop() . '</b>' . ' troverai le migliori offerte del momento!' . '<br>' . '<br>';




