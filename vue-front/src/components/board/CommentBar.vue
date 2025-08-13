<script setup>
    import { ref, onMounted, onUpdated } from 'vue'
    import api from '@/services/api'
    import { useRoute, onBeforeRouteUpdate } from 'vue-router'
   
    const route = useRoute()
    const form_comment = defineModel('comment')
    const comments = ref([])
    const mainHeight = 82

    onBeforeRouteUpdate((to) => {
        loadComment(to.params.id)    
    });


    onMounted(()=> {        
        loadComment(route.params.id)
    })

    onUpdated(()=>{
        stretchMain()
    })

    function loadComment(post_id) {
        api.get(`/getcomment/${post_id}`)
            .then((resp)=> {
                comments.value = resp.data
            })
    }

    function sendComment() {
        api.post('/savecomment', {
            post_id: route.params.id,
            comment: form_comment.value
            })
            .then(()=> {
                form_comment.value = ''
                loadComment(route.params.id)
            })
    }
    
    function stretchMain() {
        const mainDiv = document.querySelector('main')
        const commHeight = calcComment()
        mainDiv.style.height = `${mainHeight+commHeight}` + 'vh'
    }

    function calcComment() {
        const commDiv = document.querySelector('.comment-all')
        const commHeight = Math.ceil(100 * commDiv.clientHeight / window.innerHeight)
        return commHeight
    }

</script>

<template>

    <div class="comment-area">
        <textarea v-model="form_comment" class="comment-input" placeholder="Добавить комментарий"/>
        <button @click="sendComment" class="comment-but" type="submit">Отправить</button>
    </div>

    <div class="comment-all">
        <div v-for="comm in comments" :key="comm.id" class="comment-item">
            <div class="comment-meta">
                    {{ comm.add_timestamp }}
                </div>
            <div class="comment-text">
                {{ comm.comment }}
                </div>
        </div>
    </div>
    
</template>

<style>

    .comment-area {
        margin-top: 2vh;
        height: 15vh;
        width: 100%;
        /* background-color: tomato; */
    }

    .comment-input {
        height: 60%;
        width: 100%;
        box-sizing: border-box;
        border: 1px solid #0090d7;
        font-family: excali;
        font-size: 14pt;
        color: #406ad1;
    }

    .comment-input:focus {
        outline: none;
    }

    .comment-input::placeholder {
        color: #a0b6ed;;
    }

    .comment-but {
        height: 30%;
        float:right;
        box-sizing: border-box;
        outline: none;
        border: none;  
        border-radius: 6px;
        font-size: 13pt;
        font-weight: 600;
        text-decoration: none;
        color: #406ad1;
        background-color: #e3f0ff;
        cursor: pointer;
        user-select: none;
        appearance: none;
        touch-action: manipulation;
    }

    .comment-but:hover {
	    background-color: #DBE7F2;
    }

    .comment-item {
        min-height: 7vh;
        margin-top: 3vh;
        /* background-color: pink; */
        border-top: 0.1rem solid #6dbbe9;
        color: #406ad1;
    }

    /* .comment-all {
        background-color: pink;
        padding-bottom: 2rem;
    } */

    .comment-meta {
        font-size: 12pt;
        /* background-color: aqua; */
        margin-top: 0.5rem;
        padding-top: 0.25rem;
        padding-bottom: 0.25rem;
        border-bottom: 0.15rem dotted #6dbbe9;
    }

    .comment-text {
        font-size: 14pt;
        margin-top: 0.75rem;
    }
</style>