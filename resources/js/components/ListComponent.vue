<template>
<div class="site-section">
    <div class="container">

      

      <div class="row">
        
        <div class="col-sm-6 col-lg-4 text-center item mb-4" v-for="product in products" :key="product.id">
         
          <h2 class="text-">{{ product.name }}</h2>
          <h6 class="text-dark"><a href="shop-single.html"> {{ product.category }}</a></h6>
          <p class="price">{{ product.price}} €</p>
        </div>
      </div>
      
    </div>
  </div>
</template>


<script>
    export default {
        data () {
            return {
            products: {}
            }
  },
  created () {
    axios.get('http://localhost:8000/Store')
      .then(response =>  this.products=response.data.data)
      .catch(error =>console.log(error))
  },

  mouted(){
      console.log(response.data.data);
  }
    }
</script>
