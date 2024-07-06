<template>
    <nav style="background-color: #fde456" class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul v-if="role==='admin'" class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <router-link class='text-decoration-none' :to="{name:'me'}">
                            <a class="nav-link active text-white" aria-current="page" href="#">Moje Dane</a>
                        </router-link>
                     </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Zlecenia</a>
                    </li>
                    <li class="nav-item">
                        <router-link class='text-decoration-none' :to="{name:'users'}">
                            <a class="nav-link text-white" href="#">Użytkownicy</a>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class='text-decoration-none' :to="{name:'posts'}">
                            <a class="nav-link text-white" href="#">Zarządzaj Postami</a>
                        </router-link>
                    </li>
                </ul>
                <ul v-if="role==='personel'" class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="#">Moje Dane</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Zlecenia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Grafik</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Moje Posty</a>
                    </li>
                </ul>
                <ul v-if="role==='user'" class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="#">Moje Dane</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Moje Naprawy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Dodaj Opinie</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input v-if="role === 'admin'" class="form-control me-2" type="search" placeholder="Wyszukaj zlecenia" aria-label="Search">
                    <input v-else-if="role === 'personel'" class="form-control me-2" type="search" placeholder="Wyszukaj zlecenia" aria-label="Search">
                    <input v-else-if="role === 'user'" class="form-control me-2" type="search" placeholder="Wyszukaj twojej naprawy" aria-label="Search">
                </form>
            </div>
        </div>
    </nav>
    <router-view></router-view>
</template>
<script>
    export default {
        data() {
            return {
                role: 'admin',
            }
        },
    }
</script>
