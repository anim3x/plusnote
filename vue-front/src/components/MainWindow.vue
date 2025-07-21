<script setup>
import NavBar from './NavBar.vue';
import TaskBoard from './board/TaskBoard.vue';

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
        min-height: 82vh;
        background-color: #fff;
        /* background-color: tomato; */
    }
</style>