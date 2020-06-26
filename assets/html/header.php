<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/2765ee52e5.js"></script>
    <link href="https://fonts.googleapis.com/css?family=DM+Serif+Text&display=swap" rel="stylesheet">
    <link href="<?php echo ROOT_URL; ?>assets/css/custom.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="<?php echo ROOT_URL; ?>assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo ROOT_URL; ?>assets/css/bootstrap.min.css" />
    <script src="<?php echo ROOT_URL; ?>assets/js/custom.js" defer></script>

</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-light bg-theme">
        <a class="navbar-brand" style="font-size: 24pt" href="#">Subject tree</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0" style="padding-top:5px">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About us</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" aria-role="menu" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</a>
                    <div class="dropdown-menu" id="actions">
                        <div class="dropdown-item" id="add-subject">Add subject</div>
                        <div class="dropdown-item" id="add-lesson">Add lesson</div>
                        <div class="dropdown-item" id="add-module">Add module</div>
                        <div class="dropdown-item" id="add-workbook">Add workbook</div>
                        <div class="dropdown-item" id="delete-subject">Delete subject</div>
                        <div class="dropdown-item" id="delete-lesson">Delete lesson</div>
                        <div class="dropdown-item" id="delete-module">Delete module</div>
                        <div class="dropdown-item" id="delete-workbook">Delete workbook</div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="nav navbar-nav navbar-right">
            <input class="form-control mr-sm-2" id="search-text" type="text" placeholder="Search">
        </div>
    </nav>