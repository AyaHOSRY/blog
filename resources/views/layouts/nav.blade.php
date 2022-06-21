<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Laravel Blog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="{{Request::is('/home')? 'active' : ''}}">
        <a class="nav-link" href="{{ Route('home') }}">Home</a>
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
      @guest
       @if (Route::has('login'))
       <li class="nav-item">
        <a class="btn btn-primary" style="margin-left:20px" href="{{ route('login') }}">Login</a>
      </li>
      @endif
      @else
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('posts.index') }}">posts</a>
          <a class="dropdown-item" href="{{ route('categories.index') }}">Categories</a>
          <a class="dropdown-item" href="{{ route('tags.index') }}">Tags</a>
</ul>
<form action="{{ route('logout') }}" method="post">
       @csrf
       <button type="submit" class="btn btn-primary" style="margin-right:10px">Logout</button>
</form>
      @endguest
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav> <!--static in all pages-->
