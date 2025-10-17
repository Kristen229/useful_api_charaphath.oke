import { defineStore } from "pinia";
import { register } from "@/services/api";

export const useUserStore = defineStore('auth', {

    persist: true,

    state: () => ({
        loading: false,
        success: '',
        error: '',
        users: []
    }),

    actions: {
        async  userRegister(userdata) {
            this.loading= true;
            const response =await register(userdata);
            console.log(response)
            return response;
        }
    }    
})
