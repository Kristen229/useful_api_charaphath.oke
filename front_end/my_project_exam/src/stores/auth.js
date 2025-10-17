import { defineStore } from "pinia";
import {  } from "@/services/api";

export const useAuthStore = defineStore('auth', ()=>{
    

    state:()=>({
        loading: false,
        success: '',
        error:'',
        token:''
    });

    
})
