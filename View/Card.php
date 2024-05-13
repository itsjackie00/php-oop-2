<?php
function createCard($product) {
    echo "<div class='col-12 col-md-4 col-lg-3'>
            <div class='card' >
            <img src='Img/{$product->icona_immagine}' class='card-img-top' alt='Icona del prodotto'>
            <div class='card-body'>
                <h5 class='card-title'>{$product->nome_prodotto}</h5>
                <p class='card-text'>Prezzo: {$product->prezzo}€</p>";

    if ($product instanceof Food) {
        echo "<p class='card-text'>Peso: {$product->peso}g</p>
              <p class='card-text'>Tipo: {$product->tipo}</p>";
    } elseif ($product instanceof Toys) {
        echo "<p class='card-text'>Dimensioni: {$product->dimensioni}</p>
              <p class='card-text'>Colore: {$product->colore}</p>";
    } elseif ($product instanceof Accessories) {
        echo "<p class='card-text'>Mobilio: {$product->mobilio}</p>
              <p class='card-text'>Vestiario: {$product->vestiario}</p>";
    }

    echo "<a href='Cart.php?action=add&id={$product->id}' >
            <img src='Img/{$product->categoria['icona']}' class='card-img-top' alt='Icona del prodotto'>
             Aggiungi al carrello
        </a>
          </div>
          </div>
        </div>";

};