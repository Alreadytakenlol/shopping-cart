<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{route('product.index')}}">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
    <ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <a class="nav-link" href="{{route('product.shoppingCart')}}">
          <i class="fa fa-shopping-cart"></i> Shopping Cart
          <span class="badge">{{Session::has('cart')?Session::get('cart')->totalQty:''}}</span>
        </a>
     </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-user"></i> User Managerment</a>
       
        
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#"></a>
            @if(Auth::check())
              <a class="dropdown-item" href="{{route('user.profile')}}">User Profile</a>
              <a class="dropdown-item" href="{{route('user.logout')}}">Logout</a>
            @else
              <a class="dropdown-item" href="{{route('user.signup')}}">Sign Up</a>
              <a class="dropdown-item" href="{{route('user.signin')}}">Sign In</a>
              
            @endif
         
          
        </div>
      </li>
      
    </ul>
    
  </div>
</nav>