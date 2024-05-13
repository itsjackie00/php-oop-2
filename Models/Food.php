<?php
include_once __DIR__ . '/Product.php';

class Food extends Product {

    public float $peso;
    public string $tipo;

    public function __construct($id,
    $nome_prodotto,
    $categoria,
    $prezzo,
    $stock,
    $icona_immagine,
    float $peso,
    string $tipo)
    {
        parent::__construct($id, $nome_prodotto, $categoria, $prezzo, $stock, $icona_immagine);
        $this->peso = $peso;
        $this->tipo = $tipo;
    }

    //metodo che prende i dati dal database e li inserisce in un array php
    public static function fetchFood($category = null){
        
        $data =  file_get_contents(__DIR__ . '/food_db.json');
        $dataToArray = json_decode($data, true);

        $foods = [];
        foreach ($dataToArray as $key => $value) {

            if($category === null || $value['categoria']['nome'] === $category){
            $foods[] = new Food(
                $value['id'],
                $value['nome_prodotto'],
                $value['categoria'],
                (float)$value['prezzo'],
                $value['stock'],
                $value['icona_immagine'],
                (float)$value['peso'],
                $value['tipo']);
            }
        }
        return $foods;
        
    }
    
}
