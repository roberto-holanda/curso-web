<?php
header('Content-Type: application/json; charset=utf-8');
date_default_timezone_set('America/Sao_Paulo');
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');
header('Referrer-Policy: strict-origin-when-cross-origin');

$date = new DateTime();
$diasSemana = ['Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado'];
$meses = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];

// 'w' retorna 0-6 (Domingo=0), 'n' retorna 1-12 (Janeiro=1), por isso subtrai 1 para o array
$diaFormatado = $diasSemana[(int)$date->format('w')] . ', ' . $date->format('d') . ' de ' . $meses[(int)$date->format('n') - 1] . ' de ' . $date->format('Y');

// Se estiver em localhost, busca o IP público real do usuário
$ip = null;
if (in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1'])) {
    $context = stream_context_create([
        'http' => [
            'timeout' => 5,
            'method' => 'GET'
        ]
    ]);
    $ipResponse = @file_get_contents('https://api.ipify.org', false, $context);
    $ip = $ipResponse ? trim($ipResponse) : null;
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

$pais = 'Desconhecido';
$cidade = 'Desconhecida';

// Valida o IP antes de fazer requisição à API de geolocalização
if ($ip && filter_var($ip, FILTER_VALIDATE_IP)) {
    $context = stream_context_create([
        'http' => [
            'timeout' => 5,
            'method' => 'GET'
        ]
    ]);
    $geoResponse = @file_get_contents("https://ip-api.com/json/{$ip}?fields=status,country,city&lang=pt-BR", false, $context);
    
    if ($geoResponse) {
        $geo = json_decode($geoResponse, true);
        // Verifica se a API retornou sucesso antes de usar os dados
        if (is_array($geo) && ($geo['status'] ?? '') === 'success') {
            $pais = $geo['country'] ?? 'Desconhecido';
            $cidade = $geo['city'] ?? 'Desconhecida';
        }
    }
}

echo json_encode([
    'pais' => $pais,
    'cidade' => $cidade,
    'dia' => $diaFormatado,
    'hora' => $date->format('H:i:s')
], JSON_UNESCAPED_UNICODE);