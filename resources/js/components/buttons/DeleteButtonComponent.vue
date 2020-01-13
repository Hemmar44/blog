<template>
        <button @click.prevent="deletePost()" class="btn btn-danger">
            Delete
        </button>
</template>

<script>
    import axios from 'axios'
    export default {
        name: "DeleteButtonComponent",
        props: ['post'],
        methods: {
            deletePost() {
                const success = (response) => {
                   window.location.href = '/posts'
                };

                const failure = (response) => {
                    console.log('failure', response)
                };

                if (confirm('Are you sure?')) {
                    axios.delete('/posts/' + this.post.post_id).then(success, failure)
                }
            }
        }
    }
</script>

<style scoped>

</style>