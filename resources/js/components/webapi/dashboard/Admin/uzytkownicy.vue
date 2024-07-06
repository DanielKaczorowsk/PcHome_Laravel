<template>

    <div class="p-4 m-4">
        <form class="d-flex text-center">
            <input class="form-control me-2" type="search" placeholder="" aria-label="Search">
        </form>
        <div>
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Roles</th>
                        <th scope="col">Permission</th>
                        <th scope="col">Option</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="User in Users.data">
                        <td><a v-for="user in User.user">{{user.name}}</a></td>
                        <td><a v-for="user in User.user">{{user.email}}</a></td>
                        <td><a>{{User.name}}</a></td>
                        <td><a v-for="permission in User.permission">{{permission.name}}</a></td>
                            <td><form>
                                <input type="submit" style="color: #fde456" name="edit" value="Edit">
                            </form>
                            <form>
                                <input type="submit" style="color: #fde456" name="edit" value="Delete">
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
            <Bootstrap5Pagination :data="Users" @pagination-change-page="getUsers" />
        </div>
    </div>

</template>
<script>import { Bootstrap5Pagination } from 'laravel-vue-pagination';

    export default {
        components: {
            Bootstrap5Pagination
        },
        data() {
            return {
                Users: {
                    type: Object,
                    default: () => { }
                }
            }
        },
        mounted() {
            this.getUsers()
        },
        methods: {
            async getUsers(page = 1) {
                await axios.get(`/api/role?page=${page}`).then(({ data }) => {
                    this.Users = data
                    console.log(data)
                }).catch(({ response }) => {
                    console.error(response)
                })
            },
        }
    }</script>
