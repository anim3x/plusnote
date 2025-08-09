<script setup>
import api from '@/services/api'
import { onMounted } from 'vue'

    const form_title = defineModel('title')
    const form_description = defineModel('description')
    const form_version = defineModel('version')
    
    onMounted(()=> {
        const mainDiv = document.querySelector('main')
        mainDiv.style.height = '82vh'
    })

    function sendPost() {
        api.post('/savepost', {
            title: form_title.value,
            description: form_description.value,
            version: form_version.value
            })
            .then(()=> {
                form_title.value = ''
                form_description.value = ''
                form_version.value = ''
            })
    }
</script>

<template>
        <div class="make-post">
            <label>
                <span class="post-text-label">Заголовок:</span>
                    <input v-model="form_title" class="post-title" type="text" size="20">
            </label>
            <label>
                <span class="post-text-label">Версия:</span>
                    <input v-model="form_version" class="post-title" type="text" size="20">
            </label>
            <label>
                <span class="post-text-label">Описание:</span>
                    <textarea v-model="form_description" class="post-text" placeholder="Описание задачи"/>
            </label>       
            <button @click="sendPost" class="but-post-accept" type="submit">
                    <img class="img-post-accept" src="@/assets/board/accpet-post.png" />
             </button>
        </div>
</template>

<style>
   .make-post {
        height: 55vh;
        margin-top: 10vh;
        /* background-color: pink; */
    }

    .post-text {
        width: 30rem;
        height: 10rem;
        border: 1px solid #0090d7;
        font-family: excali;
        font-size: 12pt;
        color: #406ad1;
    }

    .post-text:focus {
        outline: none;
    }

    .post-text::placeholder {
        color: #a0b6ed;;
    }

    .post-title {    
        border: none;
        border-bottom: 1px solid #0090d7;
        font-family: excali;
        font-size: 14pt;
        color: #406ad1;
    }

    .post-text-label {
        font-size: 13pt;
        color: #406ad1;
        display: block;
        padding-bottom: 1rem;
        padding-top: 2rem;
    }

    .post-title:focus {
       outline: none;
    }

    .but-post-accept {
        display: block;
        margin-left: auto;
        margin-right: auto;
        margin-top: 1rem;
        border: none;
        background: transparent;
        cursor: pointer;
    }

    .img-post-accept {
        width: 3.5rem;
        height: 2.5rem;
    }
</style>