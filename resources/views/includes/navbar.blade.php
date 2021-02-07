
    <div class="site-navbar py-2">

     @include('includes.search')
    

      <div class="container">
        <div class="d-flex align-items-center justify-content-between">
          <div class="logo">
            <div class="site-logo">
              <a href="{{route('Shop.index')}}" class="js-logo-clone">Pharma</a>
            </div>
          </div>
          <div class="main-nav d-none d-lg-block">
            <nav class="site-navigation text-right text-md-center" role="navigation">
              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li class="active"><a href="{{route('Shop.index')}}">Home</a></li>
                <li><a href="{{route('Shop.store')}}">Store</a></li>
                <li class="has-children">
                  <a href="#">Dropdown</a>
                  <ul class="dropdown">
                    @foreach (App\Model\Category::all() as $category)
                    <a class="p-2 text-muted" href="{{ route('Shop.store', ['categorie' => $category->slug]) }}">{{ $category->name }}</a>
                    @endforeach
                    </li>
                  </ul>
                </li>
                <li><a href="{{route('Shop.index')}}">About</a></li>
                <li><a href="contact.html">Contact</a></li>
              </ul>
            </nav>
          </div>
          <div class="icons">
            <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
            <a href="{{route('Cart.index')}}" class="icons-btn d-inline-block bag">
              <span class="icon-shopping-bag"></span>
              <span class="number">{{Cart::content()->count()?? '0'}}</span>
            </a>
            <a  class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span
                class="icon-menu"></span></a>
          </div>
          @include('includes.login')
        </div>
      </div>
    </div>