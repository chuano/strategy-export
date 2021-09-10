<?php

use App\Repository\CustomerRepository;
use App\Service\ExportCustomers;
use App\Service\WriterFactory;

require __DIR__ . "/../vendor/autoload.php";

$filename = "clientes.txt";
$writer = WriterFactory::getWriter($filename);
$service = new ExportCustomers(new CustomerRepository(), $writer);
$service($filename, 100);

$filename = "clientes.csv";
$writer = WriterFactory::getWriter($filename);
$service = new ExportCustomers(new CustomerRepository(), $writer);
$service($filename, 100);
