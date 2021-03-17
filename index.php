
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

  protected $stock;

  protected $available = false;



  public function __construct(string $branch){

    $this-> branch = $branch;
  }




  public function setProductName($specificName){
     
    $this-> name = $specificName;

  }



  public function getStock(){

    return $this-> stock;
  }



  public function setStock(int $howMany){

    $this-> stock = $howMany;
    
  }


  
  public function setProductPrice(int $specificPrice){
     
    $this-> price = $specificPrice;
  }


  
  public function setProductId(int $specificId){
     
    $this-> id = $specificId;
  }



  public function setAvailabilityProduct($pieces){
    if($pieces > 0){

      $this-> available = true;
    }
  }



  public function getAvailability(){

    return $this-> available;
  }



  public function getProductPrice(){
    
    if($this-> price > 0){

      return $this-> price;
    }

    else {
      echo 'Non è ancora stato inserito il prezzo
       del prodotto ci scusiamo per il disagio';
    }
  

  }



  public function getProductName(){

    return $this-> name;
  }


  
  public function getProductId(){

    return $this-> id;
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

  private $creditCard = [];

  protected $productBought = [];



  public function __construct( string $name, string $surname, $email){

    $this-> name = $name;

    $this-> surname = $surname;

    $this-> email = $email;

  }


    public function setLogin($password, $email){
    
      $this-> password = $password;

      $this-> email = $email;
    }



    public function addProductBought(string $product){

      $this-> productBought[] = $product;
    }


   
    public function getProductBought(){

      return $this-> productBought;
    }




    public function getName(){
      return $this-> name;
    }
    
    
};



class CreditCard 

{
    

  private $number;

  protected $ownerName;

  protected $ownerSurname;

  private $expirationDate;

  private $securityCode;




  public function __construct($ownerName,$ownerSurname){

    $this-> ownerName = $ownerName;

    $this-> ownerSurname = $ownerSurname;

  }




    public function setCard($number){

       if($number < 16){

        echo '<br>' . '<br>' . 'Inserisci un numero di carta valido';

        throw new Exception('card number is not valid');
        
       }    
    
       else {

        $this-> number = $number;
      }

  }



   public function getCard(){
       
    return $this-> number;

   }



  public function setExpirationCard(string $date){

    $this-> cardEnd = $date;

  }

};



//---------------------------------------------------------------------------------------------------------------



//CREAZIONE NEW USER
$newUser = new user('Mirco','Verderosa','verderosamirco@gmail.com');


$newshop = new shop('WhatYouWant', 'www.WhatYouWant.com');
echo  'Ciao ' . $newUser-> getName() . ' benvenuto in ' . $newshop -> getNameShop() . ' Shop!' . '<br>' . '<br>';

 echo 'Nel nostro sito ' . '<b>' . $newshop -> getWebSiteShop() . '</b>' . ' troverai le migliori offerte del momento!' . '<br>' . '<br>' 
 . '<br>' . '<br>';



//creazione di un nuovo prodotto guanti da boxe
$sportProduct = new Sport('Sport');

$sportProduct-> setProductName('Guantoni da boxe 12');

$sportProduct -> setProductPrice(44);

$sportProduct -> setProductId(1443);

$sportProduct -> setStock(5);   //posso settare la quantità disponibile per il prodotto da qui

$sportProduct -> setAvailabilityProduct($sportProduct-> getStock()); //in caso la disponibilità fosse 0, la proprietà available sarà = false

$gloves = $sportProduct-> getProductName(); //la uso successivamente come articolo scelto dal cliente


echo 'Hai selezionato ' . '<b>' . $sportProduct -> getProductName()

 . '</b>' . ' il prezzo dell tuo articolo è '. '<b>' . $sportProduct -> getProductPrice(). '</b>' . ' euro' 

. '<br>' . '<br>';



//CONTROLLO TRAMITE UN METODO CHE IL PRODOTTO SIA DISPONIBILE

if($sportProduct-> getAvailability()){

  echo '<b>' . 'Ci sono solamente ' . $sportProduct -> getStock() . ' prodotti disponibili affrettati' . '</b>' .'<br>' .'<br>';

}

else{

  echo  '<b>' . ' In questo momento il  prodotto richiesto non è disponibile ci scusiamo per il disagio'  .'</b>' ;
};



//PAGAMENTO ARTICOLO

$newCreditCard = new CreditCard('Mirco','Verderosa');


$newCreditCard-> setCard(1093648345923466);


$newCreditCard-> setExpirationCard('10-12-2024');


if(count($newCreditCard-> getCard()) > 0){

  echo 'I dati della tua carta sono stati inseriti coorettamente' .'<br>' .'<br>';

}
else {
  echo 'Inserisci i dati della tua carta correttamente' .'<br>' .'<br>';
};



$newUser-> addProductBought($gloves);


$boughtProduct = $newUser -> getProductBought();


foreach ($boughtProduct as $key => $value) {     //ciclo l'array dove 'pusho' l'articolo tramite il metodo 'addProductBought'

  echo 'Nel tuo carrello è presente : '. '<b>' . $value . '</b>' . 
  ' proseguire con l\'acquisto?';

}

//DA CONTINUARE GESTENDO LA SCADENZA DELLA CARTA DI CREDITO, CHE SIA SUPERIORE ALLA DATA ATTUALE
//IN CASO CONTRARIO SARA SCADUTA
