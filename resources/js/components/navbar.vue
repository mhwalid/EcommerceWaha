<template >
  <div class="container">
    <div class="d-flex align-items-center justify-content-between">
      <div class="logo">
        <div class="site-logo">
          <router-link :to="{ name: 'home' }" class="js-logo-clone">Wahagsb</router-link>
        </div>
      </div>
      <div class="main-nav d-none d-lg-block">
        <nav class="site-navigation text-right text-md-center" role="navigation">
          <ul class="site-menu js-clone-nav d-none d-lg-block">
            <li>
              <router-link :to="{ name: 'home' }">Home</router-link>
            </li>
            <li>
              <router-link :to="{ name: 'Store' }">Store</router-link>
            </li>
            <li class="has-children">
              <a href="#">Dropdown</a>
              <ul class="dropdown">
                <!-- @foreach (App\Model\Category::all() as $category)
                    <a class="p-2 text-muted" href="{{ route('Shop.store', ['categorie' => $category->slug]) }}">{{ $category->name }}</a>
                @endforeach-->
                <!-- </li> -->
              </ul>
            </li>
            <li>
              <router-link :to="{ name: 'Store' }">About</router-link>
            </li>
            <li>
              <router-link :to="{ name: 'Store' }">Contact</router-link>
            </li>
          </ul>
        </nav>
      </div>
      <div class="icons">
        <a href="#" class="icons-btn d-inline-block js-search-open">
          <span class="icon-search"></span>
        </a>
        <router-link :to="{ name: 'home' }" class="icons-btn d-inline-block bag">
          <span class="icon-shopping-bag"></span>
          <!-- <span class="number">{{Cart::content()->count()?? '0'}}</span> -->
        </router-link>
        <a class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none">
          <span class="icon-menu"></span>
        </a>
      </div>
    </div>
  </div>
</template>
<script>
export default {

}
</script>
