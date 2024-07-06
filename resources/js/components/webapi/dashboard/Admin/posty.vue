<template>

    <div class="p-4 m-4">
        <form class="d-flex text-center">
            <input class="form-control me-2" type="search" placeholder="" aria-label="Search">
        </form>
        <div>
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">Tytul</th>
                        <th scope="col">Opis</th>
                        <th scope="col">Zdjęcia</th>
                        <th scope="col">Option</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="aktualnosci in Aktualnosci.data">
                        <td>{{aktualnosci.tytul}}</td>
                        <td>{{aktualnosci.opis}}</td>
                        <td>{{aktualnosci.img}}</td>
                        <td>
                            <form>
                                <input type="submit" style="color: #fde456" name="edit" value="Edit">
                            </form>
                            <form>
                                <input type="submit" style="color: #fde456" name="edit" value="Delete">
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
            <form>
                <input type="submit" style="color: #fde456" name="edit" value="Dodaj post">
            </form>
            <Bootstrap5Pagination :data="Aktualnosci" @pagination-change-page="getAktualnosci" />
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
        }
    }
</script>
