<template>
    <div class="make-post">
        <div class="post-wrap">
            <input v-model="form_title" class="post-text" type="text" size="30">
             <button @click="sendTitle" class="but-post-accept" type="submit">
                    <img class="img-post-accept" src="@/assets/accpet-post.png" />
             </button>
        </div>
    </div>
</template>

<script>
import api from '@/services/api'

    export default {
        data() {
            return{
                form_title: ''
            }
        },

        methods: {
            sendTitle() {
                api.post('/post', {
                    title: this.form_title
                })
                .then(()=> {
                    this.form_title = '';
                })
            },
        }
    }
</script>

<style>
    .make-post {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 60vw;
        min-height: 82vh;
        /* background-color: tomato; */
    }

   .post-wrap {
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