<?php

$pdo_sf = new PDO("pgsql:host=195.35.37.128 port=5432 dbname=colegio_pref_cachoeirinha user=postgres password=N8GCOjHT0ArVUq8vWNVtz0sv3wMPC6mBx7ytPfL18wsoUQZqdT");
$pdo_sf->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
    $pdo_sf = new PDO("pgsql:host=195.35.37.128 port=5432 dbname=colegio_pref_cachoeirinha user=postgres password=N8GCOjHT0ArVUq8vWNVtz0sv3wMPC6mBx7ytPfL18wsoUQZqdT");
    $pdo_sf->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    // Captura qualquer exceção relacionada ao PDO
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
}
