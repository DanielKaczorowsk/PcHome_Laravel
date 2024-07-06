<template>
    <div class="p-4 m-4">
        <figure class="text-center" v-for="artykul in artykuly">
            <h1>{{artykul.tytul}}</h1>
            <img class="rounded mx-auto d-block" :src="getImg(artykul.img)" />
            <blockquote class="blockquote" v-for="aktualnosc in artykul.aktualnosci">
                <p class="m-4">{{aktualnosc.tresc}}.</p>
            </blockquote>
            <figcaption class="blockquote-footer" style="color: #fde456;">
                Autor Postu <cite title="Source Title">...</cite>
            </figcaption>
        </figure>
        </div>
</template>
<script>
    import img1 from '/resources/images/laptop.jpg';

    export default {
        data() {
            return {
                laptop: 'laptop',
                artykuly: {
                    type: Object,
                    default: () => { }
                }
            }
        },
        mounted() {
            this.getArtykul()
        },
        methods: {
            async getArtykul() {
                await axios.get(`/api/aktualnosci/${this.$route.params.id}`).then(({ data }) => {
                    this.artykuly = data
                    console.log(this.artykuly)
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
