<template>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4 p-4 m-4">
            <div class="col" v-for="aktualnosc in Aktualnosci.data">
                <router-link :to="{ path: '/aktualnosci/'+ aktualnosc.id}"  class='text-decoration-none'>
                    <div class="card h-100 oferta border-1">
                        <img class="card-img-top" :src="getImg(aktualnosc.img)" />
                        <div class="card-body">
                            <h5 class="card-title">{{aktualnosc.tytul}}</h5>
                            <p class="card-text">{{aktualnosc.opis}}</p>
                        </div>
                    </div>
                    </router-link>
            </div>
        </div>
        <Bootstrap5Pagination :data="Aktualnosci" @pagination-change-page="getAktualnosci" />
    </div>
</template>
<script>
    import { Bootstrap5Pagination } from 'laravel-vue-pagination';
    import img1 from '/resources/images/laptop.jpg';

    export default {
        components: {
            Bootstrap5Pagination
        },
        data() {
            return {
                laptop: 'laptop',
                Aktualnosci: {
                    type: Object,
                    default: () => { }
                }
            }
        },
        mounted() {
            this.getAktualnosci()
        },
        methods: {
            async getAktualnosci(page = 1) {
                await axios.get(`/api/aktualnosci?page=${page}`).then(({ data }) => {
                    this.Aktualnosci = data
                }).catch(({ response }) => {
                    console.error(response)
                })
            },
            getImg(name)
            {
                return new URL(`/resources/images/${name}.jpg`, import.meta.url).href
            }
        }
    }
</script>
