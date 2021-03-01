<div class="site-section bg-secondary bg-image pt-4" style="background-image:url('{{asset('assets/images/bg_2.jpg')}}');">
  <div class="container">
    <div class="row align-items-stretch">
      <div class="col-lg-6 mb-5 mb-lg-0">
        <a href="#" class="banner-1 h-100 d-flex" style="background-image:url('{{asset('assets/images/bg_1.jpg')}}');">
          <div class="banner-1-inner align-self-center">
            <h2>Pharma Products</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestiae ex ad minus rem odio voluptatem.
            </p>
          </div>
        </a>
      </div>
      <div class="col-lg-6 mb-5 mb-lg-0">
        <a href="#" class="banner-1 h-100 d-flex" style="background-image:url('{{asset('assets/images/bg_2.jpg')}}');">
          <div class="banner-1-inner ml-auto  align-self-center">
            <h2>Rated by Experts</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestiae ex ad minus rem odio voluptatem.
            </p>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>

<footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">

          <div class="block-7">
            <h3 class="footer-heading mb-4">About Us</h3>
            <p>
              Le laboratoire WaHaGSB (Galaxy Swiss Bourdin) est une industrie pharmaceutique spécialisée dans les médicaments & les molécules ayant entrainées des complications médicales.</p>
          </div>

        </div>
        <div class="col-lg-3 mx-auto mb-5 mb-lg-0">
          <h3 class="footer-heading mb-4">Quick Links</h3>
          <ul class="list-unstyled">
            <li><a href= "{{url()->current()}}?categorie=Vitamines">Vitamins</a></li>
            <li><a href="{{url()->current()}}?categorie=Antiviraux">Antiviraux</a></li>
            <li><a href="{{url()->current()}}?categorie=Antimycosiques">Antimycosiques</a></li>
            <li><a href="{{url()->current()}}?categorie=Anti-inflammatoires">Anti-inflammatoires</a></li>
          </ul>
        </div>

        <div class="col-md-6 col-lg-3">
          <div class="block-5 mb-5">
            <h3 class="footer-heading mb-4">Contact Info</h3>
            <ul class="list-unstyled">
              <li class="address">GSB Management & Controlling Sàrl, Chemin du Châtelard 13, 1860 Aigle, Suisse</li>
              <li class="phone"><a href="tel://23923929210">+33 392 3929 210</a></li>
              <li class="email">contactgsb@wahagsb.com</li>
            </ul>
          </div>


        </div>
      </div>
      {{-- <div class="row pt-5 mt-5 text-center">
        <div class="col-md-12">
          <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;
            <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made
            with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank"
              class="text-primary">Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
        </div> --}}

      </div>
    </div>
  </footer>
