<template>
  <div>
      <div class="container">
      <div class="col-lg-12" >
       <div class="jumbotron">
        <h1 class="display-4">Welcome</h1>
        <p class="lead">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque culpa, veritatis quia ullam consectetur quidem minima temporibus porro reiciendis cumque rerum dolores dolore exercitationem voluptatem aut mollitia ut nihil fuga.
        </p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="#" role="button">I have a voucher</a>
        </p>
        </div>
      </div>
      </div>
  </div>
</template>

<script>
import NavBarVue from '../components/NavBar.vue'
export default {
    components: {
        'navBar': NavBarVue
    }

}
</script>

<style>

</style>