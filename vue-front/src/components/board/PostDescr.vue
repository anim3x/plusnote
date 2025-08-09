<script setup>
    import { ref, onMounted } from 'vue'
    import { useRoute, useRouter } from 'vue-router'
    import api from '@/services/api'
    import arrPrev from '@/assets/board/arr-left.png'
    import arrPrevDis from '@/assets/board/arr-left-dis.png'
    import arrNext from '@/assets/board/arr-right.png'
    import arrNextDis from '@/assets/board/arr-right-dis.png'
    import CommentBar from '../comment/CommentBar.vue'


    // const foUrl = 'http://dev.lan:5173'
    const route = useRoute()
    const router = useRouter()
    const title = ref()
    const version = ref()
    const curdate = ref()
    const description = ref()

    const pageNum = ref(route.params.id)
    const maxNum = ref()
    const isFirst = ref(false)
    const isLast = ref(false)

    onMounted(()=> {  
        getPost()

        api.get('/postcount')
            .then((resp)=> {
            maxNum.value = resp.data
            if (maxNum.value == route.params.id)
                isLast.value = true
            if(route.params.id == 1)
                isFirst.value = true
        })
    })

    function incrPage() {
        pageNum.value++
        // window.location = `${foUrl}/post/${pageNum.value}`
        router.push(`/post/${pageNum.value}`)
        // console.log(pageNum.value)
        if (pageNum.value > 1)
            isFirst.value = false

        if (pageNum.value == maxNum.value)
            isLast.value = true
    }

    function decrPage() {
        pageNum.value--
        // window.location = `${foUrl}/post/${pageNum.value}`
        router.push(`/post/${pageNum.value}`)
        // console.log(pageNum.value)
        if (pageNum.value == 1)
            isFirst.value = true

        if (pageNum.value < maxNum.value)
            isLast.value = false
    }

    function getPost() {
        // console.log(route.params.id)
        // api.get(`/getpost/${route.params.id}`)
        api.get(`/getpost/${pageNum.value}`)
            .then((resp)=> {
            title.value = resp.data.title
            version.value = resp.data.version
            curdate.value = resp.data.curdate
            description.value = resp.data.description
        })
    }

</script>

<template>
    <div class="wrap-post">
        <div class="post-block">
            <div class="meta-title">
                {{ title }}
            </div>
           <div class="meta-block">
                <p class="meta-post">Версия: {{ version }}</p>
                <p class="meta-post">Создан: {{ curdate }}</p>
            </div>
           <div class="post-descr">
                {{ description }}
            </div>
        </div>
        <div class="scroll-descr">
           <button @click="isFirst ? null : decrPage(); getPost()" class="scroll-but-descr">
                <img class="scroll-ico-descr" :src="isFirst ? arrPrevDis : arrPrev" />
             </button>
             <button @click="isLast ? null : incrPage(); getPost()" class="scroll-but-descr">
                <img class="scroll-ico-descr" :src="isLast ? arrNextDis : arrNext" />
            </button> 
        </div>
        <CommentBar />
    </div>

</template>

<style>
    .wrap-post {
        /* background-color: pink; */
        width: 70%;
        margin-top: 7vh;
        height: 55vh;
    }

    .post-block {
        background-color: #e3f0ff;
        height: 85%;
        color: #406ad1;
    }

    .scroll-descr {
        height: 15%;
        display: flex;
        justify-content: center;
    }

    .scroll-but-descr {
        border: none;
        margin: 0.3rem 0.75rem 0 0.75rem;
        background: transparent;
        cursor: pointer;
    }

    .scroll-ico-descr {
        height: 3rem;
    }

    .meta-title {
        font-size: 20pt;
        text-align: center;
        border-bottom: 0.15rem solid #6dbbe9;
    }

    .meta-block {
        font-size: 12pt;
        border-bottom: 0.1rem solid #6dbbe9;
    }

    .meta-post {
        padding-left: 1rem;
    }

    .post-descr {
        font-size: 14pt;
        padding-left: 1rem;
        padding-top: 1rem;
    }
</style>