<!-- eslint-disable vue/multi-word-component-names -->
<template>
  <header>
    <router-link :to="{ name: 'home' }">
      <img src='@/assets/logo-plusnote.png' class="logo" />
      </router-link>
  </header>
</template>

<style>
    .logo {
        width: 12rem;
        height: 6rem;
        margin: 0.5rem 0 0 0.5rem;
        max-width: 90%;
    }

    header {
        border-bottom-color: #6dbbe9;
        border-bottom-style: dotted;
        border-bottom-width: 0.2rem;
        min-height: 10vh;
        background-color: #fff;
        overflow: hidden;
    }
</style>