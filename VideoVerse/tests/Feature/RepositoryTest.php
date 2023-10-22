<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Repositories\UserRepository;
use Tests\TestCase;

class RepositoryTest extends TestCase {
    // Classe de teste para o repositório.

    public function testGetAll() {
        
        $repository = new UserRepository(); 
        // Cria uma instância de UserRepository.

        $result = $repository->getAll(); 
        // Chama getAll() e armazena o resultado.

        $this->assertNotEmpty($result); 
        // Verifica se o resultado não está vazio (assertion).
    }
}
