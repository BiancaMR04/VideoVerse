<?php

namespace App\Strategies;
use Illuminate\Support\Collection;

class RecentFilter implements FilterStrategy {
    public function filter($videos) {
        $filteredVideos = $videos->sortByDesc('data');

        return $filteredVideos;
    }
}