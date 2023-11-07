<?php

namespace App\Http\Controllers;

use App\Strategies\FilterStrategy;
use Illuminate\Http\Request;

class VideoFilterContext {
    private $filterStrategy;

    public function __construct(FilterStrategy $filterStrategy) {
        $this->filterStrategy = $filterStrategy;
    }

    public function setFilterStrategy(FilterStrategy $filterStrategy) {
        $this->filterStrategy = $filterStrategy;
    }

    public function filterVideos($videos) {
        return $this->filterStrategy->filter($videos);
    }
}