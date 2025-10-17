<script setup>
import { useUserStore } from '@/stores/user';
import { ref, onMounted } from 'vue';

const userStore = useUserStore()
const name = ref('')
const email = ref('')
const password = ref('')
const password_confirmation = ref('')
const loading = ref(false)
const user = ref('')

onMounted(async () => {
    await userStore.users
    console.log("les users crées", users)
})

user.value = {
    name: '',
    email: '',
    password: '',
    password_confirmation: ''
}
async function create() {
    loading.value = true
    user.value = {
        name: name.value,
        email: email.value,
        password: password.value,
        password_confirmation: password_confirmation.value
    }
    await userStore.userRegister(user.value)
    console.log(user.value)
}

</script>


<template>

    <div class="flex flex-col gap-3">
        <form class="flex flex-col gap-3 items-center justify-center" action="" @submit.prevent="create">
            <div class="flex flex-col gap-2">
                <label for="name">Name</label>
                <input type="text" placeholder="Entrer votre nom" v-model="name">
            </div>
            <div class="flex flex-col gap-2">
                <label for="email">Email</label>
                <input type="email" placeholder="Entrer votre address mail" v-model="email">
            </div>
            <div class="flex flex-col gap-2">
                <label for="password">Passsword</label>
                <input type="password" placeholder="Entrer votre mot de passe" v-model="password">
            </div>
            <div class="flex flex-col gap-2">
                <label for="name">Password confirmation</label>
                <input type="password" placeholder="Confirmer le mot de passe entré" v-model="password_confirmation">
            </div>
            <div>
                <input class="border rounded-xl w-[100px] p-3" type="submit" name="Submit"></input>
            </div>
        </form>
    </div>

</template>
