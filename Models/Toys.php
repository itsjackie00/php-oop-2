<?php
include_once __DIR__ . '/Product.php';


    class Toys extends Product {

        public string $dimensioni;
        public string $colore;
    
        public function __construct($id,
        $nome_prodotto,
        $categoria,
        $prezzo,
        $stock,
        $icona_immagine,
        $dimensioni,
        $colore)
        {
            parent::__construct($id, $nome_prodotto, $categoria, $prezzo, $stock, $icona_immagine);
            $this->dimensioni = $dimensioni;
            $this->colore = $colore;
        }
    public static function fetchToys($category = null){
        $data =  file_get_contents(__DIR__ . '/toys_db.json');
        $dataToArray = json_decode($data, true);
        $dataFiltered = array_filter($dataToArray, function ($value) use ($category){
            $newArray = [];
            if ($category === null || $category == $value['categoria']['nome']) {
            $newArray[] = $value;
            }   
            return $newArray;
        });
        
        $toys = [];
        foreach ($dataFiltered as $key => $value) {
            
            
                $toys[] = new Toys(
                    $value['id'],
                    $value['nome_prodotto'],
                    $value['categoria'],
                    (float)$value['prezzo'],
                    $value['stock'],
                    $value['icona_immagine'],
                    $value['dimensioni'],
                    $value['colore']);
        }
        //var_dump($toys);
        return $toys;
    
    }
}


