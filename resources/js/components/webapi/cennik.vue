<template>

    <div class="p-4 m-4">
        <form class="d-flex text-center">
            <input class="form-control me-2" type="search" placeholder="" aria-label="Search">
        </form>
        <div>
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">Nazwa Usługi</th>
                        <th scope="col">Nazwa Urządzenia</th>
                        <th scope="col">Cena</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="cena in cennik.data">
                        <td>{{cena.usluga}}</td>
                        <td>{{cena.urzadzenie}}</td>
                        <td>{{cena.cena}} zł</td>
                    </tr>
                </tbody>
            </table>
            <Bootstrap5Pagination :data="cennik" @pagination-change-page="getCennik" />
        </div>
    </div>

</template>
<script>
    import { Bootstrap5Pagination } from 'laravel-vue-pagination';

    export default {
        components: {
            Bootstrap5Pagination
        },
        data() {
            return {
                cennik: {
                    type: Object,
                    default: () => { }
                }
            }
        },
        mounted() {
            this.getCennik()
        },
        methods: {
            async getCennik(page = 1) {
                await axios.get(`/api/cennik?page=${page}`).then(({ data }) => {
                    this.cennik = data
                }).catch(({ response }) => {
                    console.error(response)
                })
            }
        }
    }
</script>
