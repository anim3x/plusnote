<template>
        <div class="make-post">
            <label>
                  <span class="post-text-label">Заголовок:</span>
                <input v-model="form_title" class="post-text" type="text" size="20">
            </label>          
            <button @click="sendTitle" class="but-post-accept" type="submit">
                    <img class="img-post-accept" src="@/assets/accpet-post.png" />
             </button>
        </div>
</template>

<script setup>
import api from '@/services/api';

    const form_title = defineModel()
    
    function sendTitle() {
        api.post('/savepost', {
            title: form_title.value
            })
            .then(()=> {
                form_title.value = ''
            })
    }
</script>

<style>
   .make-post {
        margin-top: -15vh;
        /* background-color: pink; */
    }

    .post-text {    
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

    .post-text:focus {
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