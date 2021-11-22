<template>
  <div>
      <b-navbar toggleable="lg" type="dark" variant="success">
          <b-navbar-brand href="#">Green Blog</b-navbar-brand>
          <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
          <b-collapse id="nav-collapse" is-nav>
              <b-navbar-nav>
                  <li class="nav-item">
                      <router-link to="/" class="nav-link">Home</router-link>
                  </li>
                  <li class="nav-item">
                      <router-link to="/articles" class="nav-link">Articles</router-link>
                  </li>
              </b-navbar-nav>

          </b-collapse>
      </b-navbar>
  </div>
</template>

<script>
export default {
    name: 'Navbar',
};
</script>

<style>
    .router-link-exact-active {
        color: white!important;
    }
</style>
