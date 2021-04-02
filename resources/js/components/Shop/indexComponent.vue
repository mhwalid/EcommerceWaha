<template>
  <div>
    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="title-section text-center col-12">
            <h2 class="text-uppercase">PRODUITS POPULAIRES</h2>
          </div>
        </div>

        <div class="row">
          <div
            class="col-sm-6 col-lg-4 text-center item mb-4"
            v-for="product in productsindex"
            :key="product.id"
          >
            <!-- <span class="tag">Sale</span>
            <img :src="'storage/' + product.photo_principale " alt />
            src= -->
            <router-link :to="`/Show/${product.id}`" >  <div> <img style="width: 400px ; height: 400px;" src="'storage/.$product->photo_principale" alt="Image"> 
            </div></router-link>
            <h3 class="text-dark">
              <<a href="shop-single.html">{{$product.name}}</a> ,,,,
              <router-link class="link" :to="`/Show/${product.id}`"> {{ product.name }} </router-link>-->
            </h3>
            <p class="price">
              <del>{{ product.price + 11 }}</del>
              &mdash; {{ product.price }}
            </p>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-12 text-center">
              <a href="{{route('Shop.store')}}" class="btn btn-primary px-4 py-3">Voir tous les produits</a> 
          </div>
        </div>
      </div>
    </div>
    <img
      style=" margin-left:50px"
      v-if="loading"
      src="https://cdn.dribbble.com/users/2077073/screenshots/6005120/loadin_gif.gif"
      alt="loading"
      class="rounded mx-auto d-block"
    />

    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="title-section text-center col-12">
            <h2 class="text-uppercase">NOUVEAUX PRODUITS</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 block-3 products-wrap">
            <div class="nonloop-block-3 owl-carousel">
              <div class="text-center item mb-4" v-for="product in newproduct" :key="product.id">
                <!--<a href="{{route('Shop.show' , product->id)}}"> <img src="{{URL::asset('storage/'.$product->photo_principale)}}" alt="Image"></a> -->
                <h3 class="text-dark">
                  <a href="shop-single.html">{{product.name}}</a>
                </h3>
                <p class="price">{{product.price}}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
export default {

  data() {
    return {
      productsindex: [],
      newproduct: [],
      product: "",
      loading: true,
      image_src: '/storage/',
    };
  },
  created() {
    axios
      .get('api/index')
      .then(response => {
        (this.productsindex = response.data.productsindex),
          (this.newproduct = response.data.newproduct);
        this.loading = false;
      })
      .catch(error => console.log(error));
  },

  mouted() {
    console.log(response.data);
  }
};
</script>
