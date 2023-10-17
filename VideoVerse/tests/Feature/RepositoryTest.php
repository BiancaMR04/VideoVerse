<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Repositories\UserRepository;
use Tests\TestCase;

class RepositoryTest extends TestCase
{
   
        public function testGetAll()
    {
        $repository = new UserRepository();
        $result = $repository->getAll();

        $this->assertNotEmpty($result);
    }
}
