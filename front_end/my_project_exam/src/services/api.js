import axios, { AxiosHeaders } from "axios";


export async function register(dataUser) {
    const url = 'http://127.0.0.1:8000/api/register'
    return await axios.post(url, dataUser)
}

export async function login(dataUser) {
    const url = 'http://127.0.0.1:8000/api/login'
    return await axios.post(url, dataUser, {
        
    })
}
