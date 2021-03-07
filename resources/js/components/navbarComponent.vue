<template>
    
    <ul class="nav nav-tabs" id="navId">
        <li class="nav-item">
            <router-link to="/">Go to Foo</router-link>
                
               <i class="fas fa-divide    "> <router-link to="/home">Go to Bar</router-link></i>
               <i class="fas fa-divide    "> <router-link to="/Store">Go to Bar</router-link></i>
        </li>
    </ul>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
