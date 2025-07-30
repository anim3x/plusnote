import ExecTable from "@/components/board/ExecTable.vue"
import MakePost from "@/components/board/MakePost.vue"
import PostDescr from "@/components/board/PostDescr.vue";

const routes = [
    {
        path: '/', 
        name: 'home',
        component: ExecTable
    },
    {
        path: '/add',
        name: 'add',
        component: MakePost
    },
    {
        path: '/post/:id',
        name: 'post',
        component: PostDescr
    }
]

export default routes;