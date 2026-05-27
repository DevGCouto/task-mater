<?php
use PHPUnit\Framework\TestCase;

class ApiTest extends TestCase {
    public function testApiRetornaListaEmJson() {
        // Usa o caminho correto do servidor local
        $url = "http://localhost:8000/api.php?action=list";
        
        $content = @file_get_contents($url);
        
        // Se não conseguir conectar, pula o teste
        if ($content === false) {
            $this->markTestSkipped('Servidor não está rodando. Execute: php -S localhost:8000');
        }
        
        $data = json_decode($content, true);
        $this->assertIsArray($data);
    }
}
