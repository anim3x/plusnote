<template>
    <div class="nav-bar">
        <ul class="nav-list">
            <li class="nav-items">
                <router-link :to="{ name: 'home' }">
                    Главная
                </router-link>
            </li>
            <li class="nav-items">
                <router-link :to="{ name: 'add' }">
                    Добавить
                </router-link> 
            </li>
        </ul>
    </div>    
</template>

<style>
    .nav-bar {
        width: 10vw;
        min-height: 82vh;
        border-right: 0.1rem solid #6dbbe9;
        overflow: hidden;
        /* background-color: aqua; */
    }

    .nav-list{
        font-size: 16pt;
        list-style-type: square;
    }

    .nav-list a {
        text-decoration: none;
        color: #406ad1;
    }

    .nav-list a:hover {
        color: #0604FF;
    }
    
    .nav-items::marker {
        color: #000;
    }
</style>