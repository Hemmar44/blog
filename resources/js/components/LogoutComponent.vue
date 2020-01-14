<template>
    <li class="nav-item">
        <a class="nav-link" @click="logout()">Logout</a>
    </li>
</template>

<script>
    import axios from 'axios';
    export default {
        name: "LogoutComponent",
        methods: {
            logout() {
                axios.post('/logout').then(() => window.location.href = '/posts');
            }
        }
    }
</script>

<style scoped>
    .nav-link {
        cursor: pointer;
    }
</style>