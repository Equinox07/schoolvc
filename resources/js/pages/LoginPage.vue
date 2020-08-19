<template>
  <div>
      <div class="col-lg-4 mx-auto">
      <app-login></app-login>
      </div>
  </div>
</template>

<script>
import LoginVue from '../components/Login.vue'
export default {
    components: {
        'appLogin' : LoginVue
    }

}
</script>

<style>

</style>