<script setup>
    import { ref, onMounted } from 'vue'
    import api from '@/services/api'
    import arrPrev from '@/assets/board/arr-left.png'
    import arrPrevDis from '@/assets/board/arr-left-dis.png'
    import arrNext from '@/assets/board/arr-right.png'
    import arrNextDis from '@/assets/board/arr-right-dis.png'

    const posts = ref([])
    const pageNum = ref(1)
    const maxNum = ref()
    const isFirst = ref(true)
    const isLast = ref(false)

    onMounted(()=> {
        const mainDiv = document.querySelector('main')
        mainDiv.style.height = '82vh'

        api.get('/gettitle')
            .then((resp)=> {
            posts.value = resp.data.data
            maxNum.value = resp.data.last_page
        })
    })

    function getPostNum() {
        api.get(`/gettitle?page=${pageNum.value}`)
            .then((resp)=> {
            posts.value = resp.data.data
        }) 
    }

    function incrPage() {
        pageNum.value++
        if (pageNum.value > 1)
            isFirst.value = false

        if (pageNum.value == maxNum.value)
            isLast.value = true
    }

    function decrPage() {
        pageNum.value--
        if (pageNum.value == 1)
            isFirst.value = true

        if (pageNum.value < maxNum.value)
            isLast.value = false
    }

</script>

<template>
    <div class="view-post">
       <table class="post-table">
            <thead>
                <tr>
                    <th>Заголовок</th>
                    <th>Дата</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="post in posts" :key="post.title">
                    <td>
                        <router-link :to="`/post/${post.id}`" class="link-title">
                            {{ post.title }}
                        </router-link>
                    </td>
                    <td>{{ post.curdate }}</td>
                </tr>
            </tbody>
        </table>
        <div class="scroll-block">
            <button @click="isFirst ? null : decrPage(); getPostNum()" class="scroll-but">
                <img class="scroll-ico" :src="isFirst ? arrPrevDis : arrPrev" />
             </button>
             <button @click="isLast ? null : incrPage(); getPostNum()" class="scroll-but">
                <img class="scroll-ico" :src="isLast ? arrNextDis : arrNext" />
            </button>
        </div>
     </div>
</template>

<style>
    .view-post {
        height: 50vh;
        margin-top: 10vh;
    }

    .scroll-block {
        display: flex;
        justify-content: center;
        align-items: center;
        /* background-color: tomato; */
    }

    .link-title {
        text-decoration: none;
        color: #406ad1;
    }

    .link-title:hover {
        color: #0604FF;
    }

    .scroll-ico {
        height: 2.25rem;
    }

    .scroll-but {
        border: none;
        margin: 0.75rem;
        background: transparent;
        cursor: pointer;
    }

    .post-table {
        border: 1px solid grey;
        width: 30rem;
        border-collapse: collapse;
    }

    .post-table th {
        background-color: #6dbbe9;
        color: #fff;
        border: 1px solid grey;
        font-size: 16pt;
    }

    .post-table td {
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