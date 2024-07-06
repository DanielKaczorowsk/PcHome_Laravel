<template>
    <div class="p-3" style="background-color: #fde456;">
        <div class="container">
            <div class="row">
                <div class="col">
                    <carousel :items-to-show="2.3">
                        <slide v-for="opinion in Opinion" :key="opinion.id">

                            <div class="card border-0 m-2">
                                <div class="card-body">

                                    <h5 class="card-title">{{opinion.tytul}}</h5>
                                    <p class="card-text">{{opinion.opis}}</p>
                                    <star-rating :star-size="35" v-model:rating="opinion.stars" :increment="0.5" active-color="#fde456"></star-rating>
                                    <a class="card-link text-decoration-none" style="color:#bcbcbc" v-for="user in opinion.user" :key="user.id">{{user.name}}</a>
                                </div>
                            </div>
                        </slide>
                        <template #addons>
                            <navigation />
                        </template>
                    </carousel>
                </div>
            </div>
        </div>
    </div>
    <div class=" container text-center p-3">
        <h2 class="m-3 p-3">Nasza oferta</h2>
        <div class="row m-3">
            <div class="col-md-4" v-for="image in images1" :key="image">
                <div class="card oferta shadow p-3 mb-5 bg-white rounded">
                    <img class="card-img-top" :src="image.image" />
                    <div class="card-footer text-center" style="background-color: #fde456;">
                        <small>{{image.name}}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wycena" style="background-color: #fde456;">
        <div class="container text-center p-3">
            <h2 class="m-3">Tutaj wyceniamy naprawy</h2>
            <div class="row m-3">
                <div class="col-sm-6">
                    <div class="card m-3 wycenka">
                        <div class="card-body">
                            <h5 class="card-title">Algorytm ceny</h5>
                            <p class="card-text p-3">
                                Na stronie posiadamy program który działa na algorytmie sprawdzaniu ceny poprzez poprzednie
                                serwisowanie im więcej nowego sprzętu tym większy wachlarz informacji ceny.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card m-3 wycenka">
                        <div class="card-body">
                            <h5 class="card-title">Oferta kontaktowa</h5>
                            <p class="card-text p-3">
                                Cene także podamy w serwisie cena może się różnić
                                poprzez diagnoze w serwisie, można się z nami skontaktować poprzez telefon, facebooka, emaila.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container p-3 text-center">
        <div class="row m-3">
            <h2>Aktualności</h2>
            <div class="col">
                <carousel :items-to-show="3.4">
                    <Slide v-for="aktualnosc in Aktualnosci" :key="aktualnosc.id">
                        <router-link :to="{ path: '/aktualnosci/'+ aktualnosc.id}" class='text-decoration-none'>
                            <div class="card oferta border-0">
                                <img class="card-img-top" :src="getImg(aktualnosc.img)" />
                                <div class="card-body">
                                    <h5 class="card-title">{{aktualnosc.tytul}}</h5>
                                    <p class="card-text">{{aktualnosc.opis}}</p>
                                </div>
                            </div>
                        </router-link>
                    </Slide>


                    <template #addons>
                        <navigation />
                        <pagination />
                    </template>
                </carousel>
            </div>
        </div>
    </div>
</template>
<script>
    import StarRating from 'vue-star-rating'
    import 'vue3-carousel/dist/carousel.css';
    import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel';
    import img1 from '/resources/images/laptop.jpg';
    import img2 from '/resources/images/iphone.jpg';
    import img3 from '/resources/images/konsola.jpg';
    import img4 from '/resources/images/tlo.png';
    export default {
        components: {
            Carousel,
            Slide,
            Pagination,
            Navigation,
            StarRating,
        },
        data() {
            return {
                currentOffset: 0,
                rating: 4,
                windowssize: 4,
                paginationFactory: 130,
                images1: [
                    {
                        name: 'Laptopy',
                        image: img1,
                    },
                    {
                        name: 'Iphone',
                        image: img2
                    },
                    {
                        name: 'Konsole',
                        image: img3
                    }
                ],
                zdjecie: img4,
                Aktualnosci: {
                    type: Object,
                    default: () => { }
                },
                Opinion: {
                    type: Object,
                    default: () => { }
                }

            }
        },
        mounted() {
            this.getAktualnosci(),
            this.getOpinion()
        },
        methods: {
            setRating(rating) {
                this.rating = rating;
            },
            async getAktualnosci(page = 1) {
                await axios.get(`api/index/aktualnosci`).then(({ data }) => {
                    this.Aktualnosci = data
                    console.log(this.Aktualnosci)
                }).catch(({ response }) => {
                    console.error(response)
                })
            },
            async getOpinion(page = 1) {
                await axios.get(`/api/opinion`).then(({ data }) => {
                    this.Opinion = data
                }).catch(({ response }) => {
                    console.error(response)
                })
            },
            getImg(name) {
                return new URL(`/resources/images/${name}.jpg`, import.meta.url).href
            }
        }
    }
</script>
