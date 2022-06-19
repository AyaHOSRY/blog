<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Laravel Blog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="{{Request::is('/home')? 'active' : ''}}">
        <a class="nav-link" href="{{ Route('pages.home') }}">Home</a>
      </li>
      <li class="{{Request::is('/blog') ? 'active' : ''}}">
        <a class="nav-link" href="{{ Route('blog.index') }}">Blog</a>
      </li>
      <li class="{{Request::is('/about')? 'active' : ''}}">
        <a class="nav-link" href="{{ Route('pages.about') }}">About</a>
      </li>
      <li class="{{Request::is('/contact')? 'active' : ''}}">
        <a class="nav-link" href="{{ Route('pages.contact') }}">Contact Us</a>
      </li>
      
      
  
        
     
      <!--<div class="text-end">
          <a href="{{ route('login') }}" class="btn btn-success me-2">Login</a>
          <a href="#" class="btn btn-warning">Sign-up</a>
        </div>-->
       
        
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Admin Name
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ Route('posts.index') }}">posts</a>
          <a class="dropdown-item" href="{{ Route('categories.index') }}">Categories</a>
          <a class="dropdown-item" href="{{ Route('tags.index') }}">Tags</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
        </div>
      </li>
     
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav> <!--static in all pages-->