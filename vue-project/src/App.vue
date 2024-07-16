<template>
  <div>
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <router-link :to="{name: 'order'}" class="navbar-brand">Barbershop Corporation</router-link>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <router-link :to="{name: 'register'}" class="nav-link" href="">REGISTER</router-link>
        </li>
        <li class="nav-item">
          <router-link :to="{name: 'login'}" class="nav-link" href="#">LOGIN</router-link>
        </li>
      </ul>
    </div>
  </nav>
  <router-view />
  </div>
</template>


<script>

export default {
}
</script>

<style>
  body {
    background: lightgray!important;
  }
  .row{
    padding-bottom: 13px !important;
  }  

  .form-group{
    padding-bottom: 13px !important;
  }
</style>
