<template>
    <div class='nawigacja p-3'>
        <div class='container'>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <router-link class='text-decoration-none' to="/">
                        <img :src="naglowek">
                    </router-link>
                    <div class="collapse navbar-collapse float-right" id="navbarNav">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li v-if="!user" class="nav-item">
                                <router-link class='text-decoration-none' to="/login">
                                    <a class="nav-link naglowek" aria-current="page">Logowanie</a>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link class='text-decoration-none' to="/uslugi">
                                    <a class="nav-link naglowek" aria-current="page">Usługi</a>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link class='text-decoration-none' to="/cennik">
                                    <a class="nav-link naglowek" aria-current="page">Cennik</a>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <router-link class='text-decoration-none' to="/aktualnosci">
                                    <a class="nav-link naglowek" aria-current="page">Aktualnosci</a>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link naglowek" data-bs-toggle="modal" data-bs-target="#exampleModal">Kontakt</a>
                            </li>
                            <li v-if="user" class="nav-item dropdown">
                                <router-link class='text-decoration-none' to="/dashboard">
                                    <a class="nav-link dropdown-toggle naglowek" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-current="page">{{user}}</a>
                                </router-link>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item naglowek" href="#">Action</a>
                                    <a class="dropdown-item naglowek" href="#">Another action</a>
                                    <a v-on:click="wylogowanie" role="button" class="dropdown-item naglowek">Wyloguj</a>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kontakt</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-8">
                                <form>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Tytul</label>
                                        <input type="email" class="form-control" id="exampleFormControlInput1">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Tresc</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                    <button type="submit" class="btn" style="background-color: #fde456;color: white;">Wyslij</button>
                                </form>
                            </div>
                            <div class="col">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item" >Telefon: 123321123</li>
                                    <li class="list-group-item">Email: asd@onet.pl</li>
                                    <li class="list-group-item">Adres: Nowy Sącz 33-330 Wojska Polskiego</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                   
                </div>
                
            </div>
        </div>
    </div>
</template>
<script>
    import img1 from '/resources/images/logo.png';
        export default {
            data() {
                return {
                    naglowek: [img1],
                    user: localStorage.getItem('user'),
                }
        },
        methods: {
            wylogowanie() {
                localStorage.removeItem('user')
                localStorage.removeItem('token')
                console.log('done')
                location.reload()
            }
        }
        }
</script>
