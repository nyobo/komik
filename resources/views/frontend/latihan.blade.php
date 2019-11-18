<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="{{ asset('frontend/css/app.css') }}" rel="stylesheet">
<style>


</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<body>
<div class="container pt-2">
<div class="row">
  <div class="col-sm-6 col-lg-3 col-md-4 p-1">
    <div class="card">
      <img src="..." class="card__image" alt="...">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-3 col-md-4 p-1">
    <div class="card">
      <img src="..." class="card__image" alt="...">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-3 col-md-4 p-1">
    <div class="card">
      <img src="..." class="card__image" alt="...">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-3 col-md-4 p-1">
    <div class="card">
      <img src="..." class="card__image" alt="...">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-lg-3 col-md-4 p-1">
    <div class="card">
      <img src="..." class="card__image" alt="...">
      <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
</div>
</div>
        {{-- <div class="card"><div class="card__image">
        <img class="js-image" alt="" src="http://unsplash.it/400/400?image=564"></div><div class="card__content"><h1 class="card__heading js-heading">Some heading</h1><p class="card__paragraph js-paragraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa rerum porro aut laboriosam animi.</p></div></div><div class="button-group"><button class="button js-toggle">Toggle content</button></div> --}}
        {{-- <div class="card"><div class="card__image"><img class="js-image" alt="" src="http://unsplash.it/400/400?image=564"></div><div class="card__content"><h1 class="card__heading js-heading">Some heading</h1><p class="card__paragraph js-paragraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa rerum porro aut laboriosam animi.</p></div></div><div class="button-group"><button class="button js-toggle">Toggle content</button></div> --}}

</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script>
          (function () {
            'use strict';

var toggle = document.querySelector('.js-toggle'),
    image = document.querySelector('.js-image'),
    heading = document.querySelector('.js-heading'),
    paragraph = document.querySelector('.js-paragraph');

var content = false;

toggle.addEventListener('click', function () {
  if (content === false) {
    content = true;
    image.src = 'http://unsplash.it/400/400?image=564';
    heading.innerHTML = 'Some heading';
    paragraph.innerHTML = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa rerum porro aut laboriosam animi.';
  } else {
    content = false;
    image.src = '';
    heading.innerHTML = '';
    paragraph.innerHTML = '';
  }
});
          })()
        </script>
      
    