<?php

namespace App\Strategies;
use Illuminate\Support\Collection;

class RecentFilter implements FilterStrategy {
    public function filter($videos) {
        // Use o método sortByDesc() da coleção para classificar os vídeos por data de criação em ordem decrescente.
        $filteredVideos = $videos->sortByDesc('data');

        return $filteredVideos;
    }
}