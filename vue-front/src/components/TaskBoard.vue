<script setup>
import MakePost from './board/MakePost.vue';
import NavBar from './board/NavBar.vue';

</script>

<template>
    <main>
        <NavBar />
        <MakePost />
    </main>
</template>

<style>
    main {
        display: flex;
        min-height: 82vh;
        background-color: #fff;
        /* background-color: tomato; */
    }
</style>