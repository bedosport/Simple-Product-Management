<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>PM</title>
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">PM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?=url('design/index')?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=url('design/pages/categories/index')?>">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=url('design/pages/products/index')?>">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=url('design/pages/users/index')?>">Users</a>
                    </li>
                </ul>
                <ul class="navbar-nav my-2 my-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="<?=url('design/pages/users/profile')?>">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=url('design/Logout')?>">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>