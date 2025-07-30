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
        height: 85vh;
        background-color: #fff;
        /* background-color: tomato; */
    }
</style>