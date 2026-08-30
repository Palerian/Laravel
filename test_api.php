<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

echo "--- TEST 1: POST /api/guru/store without Accept Header (Missing fields) ---\n";
$req1 = Illuminate\Http\Request::create('/api/guru/store', 'POST', []);
$res1 = $kernel->handle($req1);
echo "Status: " . $res1->getStatusCode() . "\n";
echo "Content: " . substr($res1->getContent(), 0, 300) . "\n\n";

echo "--- TEST 2: POST /api/guru/store with Accept application/json ---\n";
$req2 = Illuminate\Http\Request::create('/api/guru/store', 'POST', [
    'nama' => 'Budi Santoso',
    'nip' => '999888777',
    'mata_pelajaran' => 'Bahasa Indonesia',
    'no_telepon' => '081299998888',
], [], [], ['HTTP_ACCEPT' => 'application/json']);
$res2 = $kernel->handle($req2);
echo "Status: " . $res2->getStatusCode() . "\n";
echo "Content: " . substr($res2->getContent(), 0, 300) . "\n\n";
