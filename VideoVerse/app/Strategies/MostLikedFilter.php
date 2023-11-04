<?php

namespace App\Strategies;

use Illuminate\Support\Collection;

class MostLikedFilter implements FilterStrategy {
    public function filter($videos) {
        $videosArray = $videos->toArray(); 

        usort($videosArray, function ($videoA, $videoB) {
            return $videoB['likes'] - $videoA['likes']; 
        });

        return new Collection($videosArray); 
    }
}
