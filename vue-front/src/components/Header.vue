<!-- eslint-disable vue/multi-word-component-names -->
<template>
  <header>
    <router-link :to="{ name: 'home' }">
      <img src='@/assets/main/logo-plusnote.png' class="logo" />
      </router-link>
  </header>
</template>

<style>
    .logo {
        width: 10vw;
        height: 10vh;
        margin: 0.5rem 0 0 0.5rem;
    }

    header {
        border-bottom-color: #6dbbe9;
        border-bottom-style: dotted;
        border-bottom-width: 0.2rem;
        height: 11.6vh;
        background-color: #fff;
    }
</style>