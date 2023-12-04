<?php

namespace App\Strategies;

use Illuminate\Support\Collection;

class PopularFilter implements FilterStrategy {
    public function filter($videos) {
        $videosArray = $videos->toArray(); // Converte a coleção em um array

        usort($videosArray, function ($videoA, $videoB) {
            return $videoB['visualizacao'] - $videoA['visualizacao']; // Acessa os atributos do array
        });

        return new Collection($videosArray); // Converte o array de volta em uma coleção
    }
}

