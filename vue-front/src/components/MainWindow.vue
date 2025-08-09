<script setup>
import NavBar from './NavBar.vue';
import TaskBoard from './TaskBoard.vue';

</script>

<template>
    <main>
        <NavBar />
        <TaskBoard />
    </main>
</template>

<style>
    main {
        display: flex;
        background-color: #fff;
        min-height: 82vh;
    }
</style>