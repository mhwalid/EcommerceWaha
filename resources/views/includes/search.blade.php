<div class="search-wrap">
    <div class="container">
      <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
      <form action="{{route('Shop.search')}}">
        <input type="text" name="search" value="{{ request()->search ?? ''}}" class="form-control" placeholder="Search keyword and hit enter...">
      </form>
    </div>
  </div>