<template>
    <div>
        <main class="py-4">
            <router-link :to="{ name: 'login' }">Login</router-link>
            <router-link :to="{ name: 'register' }">Register</router-link>
            <router-view> </router-view>
        </main>
    </div>
</template>
