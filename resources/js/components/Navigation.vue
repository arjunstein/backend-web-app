<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <router-link :to="{ name: 'home' }" class="navbar-brand"
                    >Laravue</router-link
                >
                <button
                    class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div
                    class="collapse navbar-collapse"
                    id="navbarSupportedContent"
                >
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto"></ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto" v-if="!user.authenticated">
                        <li class="nav-item">
                            <router-link
                                :to="{ name: 'login' }"
                                class="nav-link"
                                >Login</router-link
                            >
                        </li>
                        <li class="nav-item">
                            <router-link
                                :to="{ name: 'register' }"
                                class="nav-link"
                                >Register</router-link
                            >
                        </li>
                    </ul>

                    <div
                        class="collapse navbar-collapse"
                        id="navbarNavDarkDropdown"
                        v-if="user.authenticated"
                    >
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a
                                    class="nav-link dropdown-toggle"
                                    href="#"
                                    id="navbarDarkDropdownMenuLink"
                                    role="button"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                >
                                    Arjun
                                </a>
                                <ul
                                    class="dropdown-menu dropdown-menu"
                                    aria-labelledby="navbarDarkDropdownMenuLink"
                                >
                                    <li>
                                        <a class="dropdown-item" href="#"
                                            >Logout</a
                                        >
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
    computed: {
        ...mapGetters({
            user: 'auth/user'
        })
    }
}
</script>
