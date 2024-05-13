<?php

// include_once __DIR__ . '/AnimalsCategory.php';

class Product {
    public string $id;
    public string $nome_prodotto;
    public array $categoria;
    public $prezzo;
    public int $stock;
    public string $icona_immagine;
    
    public function __construct( $id, $nome_prodotto, $categoria, $prezzo, $stock, $icona_immagine) {
        $this->id = $id;
        $this->nome_prodotto = $nome_prodotto;
        $this->categoria = $categoria;
        $this->prezzo = $prezzo;
        $this->stock = $stock;
        $this->icona_immagine = $icona_immagine;
    }
    

}