import ExecTable from "@/components/board/ExecTable.vue"
import MakePost from "@/components/board/MakePost.vue"

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
    }
]

export default routes;