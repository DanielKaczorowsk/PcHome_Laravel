<template>
    <div class="relative flex flex-col items-center justify-center">
        <div class="w-full p-6 shadow bg-gray-50">
            <h1 class="text-center">Rejestracja</h1>
            <form action="javascript:void(0)" @submit="register" class="space-y-4" method="post">
                <div class="col-12" v-if="Object.keys(validationErrors).length > 0">
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            <li v-for="(value, key) in validationErrors" :key="key">{{ value[0] }}</li>
                        </ul>
                    </div>
                </div>
                <div>
                    <input v-model="Dane.name"
                           name="name"
                           type="text"
                           placeholder="Imie"
                           class="block w-full px-4 py-2 mt-2 text-purple-700 bg-white border rounded-md focus:border-purple-400 focus:ring-purple-300 focus:outline-none focus:ring focus:ring-opacity-40" />
                </div>
                <div>
                    <input v-model="Dane.email"
                           name="email"
                           placeholder="Email"
                           type="email"
                           class="block w-full px-4 py-2 mt-2 text-purple-700 bg-white border rounded-md focus:border-purple-400 focus:ring-purple-300 focus:outline-none focus:ring focus:ring-opacity-40" />
                </div>
                <div>
                    <input v-model="Dane.password"
                           name="password"
                           placeholder="Hasło"
                           type="password"
                           class="block w-full px-4 py-2 mt-2 text-purple-700 bg-white border rounded-md focus:border-purple-400 focus:ring-purple-300 focus:outline-none focus:ring focus:ring-opacity-40" />
                </div>
                <div>
                    <input v-model="Dane.password_confirmation"
                           name="password_confirmation"
                           placeholder="Powtórz hasło"
                           type="password"
                           class="block w-full px-4 py-2 mt-2 text-purple-700 bg-white border rounded-md focus:border-purple-400 focus:ring-purple-300 focus:outline-none focus:ring focus:ring-opacity-40" />
                </div>
                <div class="text-center p-3">
                    <button type="submit" :disabled="processing" class="btn" style="background-color:#fde456;color:white;">{{ processing ? "Prosze Poczekac" : "Zarejestruj się" }}</button>
                </div>
            </form>
            <p class="mt-8 text-xs font-light text-center text-gray-700">
                Posiadasz już konto?

                <RouterLink to="/login"
                           Style="color:#fde456;text-decoration:none;">Zaloguj się!</RouterLink>
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
                    password: '',
                    name: '',
                    password_confirmation: ''
                },
                router: useRouter(),
                validationErrors: {},
                processing: false
            }
        },
        methods: {
            async register() {
                this.processing = true
                await axios.get('/sanctum/csrf-cookie')
                await axios.post('api/register', {
                    email: this.Dane.email,
                    password: this.Dane.password,
                    name: this.Dane.name,
                    password_confirmation: this.Dane.password_confirmation,
                }).then(() => {
                    this.router.push({ name: 'Login' })
                })
            .catch(({ response }) => {
                 console.log(response)
                if (response.status === 422) {
                    this.validationErrors = response.data.errors
                } else {
                    this.validationErrors = {}
                    alert(response.data.message)
                }
            }).finally(() => {
                this.processing = false
            })
            }
            }
        }
</script>
