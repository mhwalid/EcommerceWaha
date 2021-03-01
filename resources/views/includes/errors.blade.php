<div class="container pt-4">
    @if (session('success'))
      <div class="alert alert-success"> {{session('success')}}</div>
    @endif
    @if (session('error'))
      <div class="alert alert-danger"> {{session('error')}}</div>
    @endif
    @if (request()->input('q'))
      <div class="alert alert-default" style="background-color: #51eaea"> <strong> {{$products->total()}}  Résultat(s) pour la recherche " {{request()->q}} "  </strong></div>
    @endif
    @if (count($errors)>0)
        <div class="alert alert-danger">
          <ul class="mb-0 mt-0">
            @foreach ($errors->all() as $error)
                <li> {{$error}}</li>
            @endforeach

          </ul>
        </div>
    @endif

  </div>