<template>
    <div class="relative flex flex-col items-center justify-center">
        <div class="w-full p-6 shadow bg-gray-50">
            <h1 class="text-center">Logowanie </h1>
            <form action="javascript:void(0)" @submit="login" class="space-y-4" method="post">
                <div>
                    <input v-model="Dane.email"
                           name="email"
                           type="email"
                           placeholder="Email"
                           class="block w-full px-4 py-2 mt-2 text-purple-700 bg-white border rounded-md focus:border-purple-400 focus:ring-purple-300 focus:outline-none focus:ring focus:ring-opacity-40" />
                </div>
                <div>
                    <input v-model="Dane.password"
                           name="password"
                           placeholder="Hasło"
                           type="password"
                           class="block w-full px-4 py-2 mt-2 text-purple-700 bg-white border rounded-md focus:border-purple-400 focus:ring-purple-300 focus:outline-none focus:ring focus:ring-opacity-40" />
                </div>
                <div class="text-center p-3">
                    <button type="submit" :disabled="processing" class="btn" style="background-color:#fde456;color:white;">{{ processing ? "Prosze Poczekac" : "Zaloguj się" }}</button>
                </div>
            </form>
            <p class="mt-8 text-xs font-light text-center text-gray-700">
                Nie Posiadasz Konta?

                <RouterLink to="/register"
                            style="color:#fde456;text-decoration:none;">Zarejestruj się</RouterLink>
            </p>
        </div>
    </div>
</template>
<script>
    import { useRouter } from 'vue-router';
    export default {
        data() {
            return {
                Dane: {
                    email: '',
                    password: ''
                },
                processing: false,
                router: useRouter(),
                validationErrors: {},
            }   
        },
        methods: {
            async login() {
                this.processing = true
                await axios.get('/sanctum/csrf-cookie')
                await axios.post('/api/login', this.Dane).then(({ data }) => {
                    localStorage.setItem('token', data.token)
                    localStorage.setItem('user', data.user.name)
                    this.router.push({ name: 'Index' }).then(() => { this.$router.go() })
                })
                    .catch(({ response }) => {
                        if (response.status === 422 || response.status === 403 || response.status === 401) {
                            this.validationErrors = response.errors
                        } else {
                            this.validationErrors = {}
                            alert(response.data.message)
                        }
                    })
            },
        },

    }
</script>
