<script setup>
    import { ref, onMounted } from 'vue'
    import api from '@/services/api'

    const posts = ref([])

    onMounted(()=> {
        api.get('/getpost')
            .then((resp)=> {
            posts.value = resp.data
        })
    })

</script>
<template>

    <table class="view-post">
        <thead>
            <tr>
                <th>Заголовок</th>
                <th>Дата</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="post in posts" :key="post.title">
                <td>{{ post.title }}</td>
                <td>{{ post.curdate }}</td>
            </tr>
        </tbody>
     </table>
</template>

<style>
    .view-post {
        border: 1px solid grey;
        /* background-color: tomato; */
            margin-left: auto;
            margin-right: auto;
            height: 10vh;
            margin-top: -55vh;
            width: 30rem;
            border-collapse: collapse;
    }

    .view-post th {
        background-color: #6dbbe9;
        color: #fff;
        border: 1px solid grey;
        font-size: 16pt;
    }

    .view-post td {
        color: #406ad1;
        border: 1px solid grey;
    }

    td:nth-child(1) {
        width: 65%;
        font-size: 14pt;
    }
    td:nth-child(2) {
        width: 35%;
        text-align: center;
    }
</style>