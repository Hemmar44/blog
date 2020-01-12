<template>
        <button @click.prevent="deletePost()" class="btn btn-danger">
            Delete
        </button>
</template>

<script>
    export default {
        name: "DeleteButtonComponent",
        props: ['post'],
        methods: {
            deletePost() {
                console.log(this.post);
                return;
            }
        }
    }
</script>

<style scoped>

</style>