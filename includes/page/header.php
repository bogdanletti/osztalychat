<?php

require_once("includes/database/DatabaseConnection.php");
$connection = DatabaseConnection::getDatabaseconnection();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

    <header>
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand">Bánki Chat</a>
                <form class="d-flex" role="search">
                    <button class="btn btn-outline-success" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Regisztráció</button>
                </form>
            </div>
        </nav>

    </header>