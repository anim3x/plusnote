import axios from "axios";

const api = axios.create({
    baseURL: 'http://dev.lan:8000/api'
})

export default api