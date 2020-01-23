<template>
    <div class="card-body">
        <form>
            <div class="form-group row">
                <label for="title" class="col-md-4 col-form-label text-md-right">Name *</label>
                <div class="col-md-6">
                    <input
                            v-model="name"
                            id="title"
                            type="text"
                            class="form-control"
                            name="title"
                            required
                            autocomplete="title"
                            autofocus
                    >
                    {{validationErrors}}
                    <span class="invalid-feedback" role="alert">
                        <strong></strong>
                    </span>

                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button @click.prevent="addTag()" class="btn btn-primary">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
    import axios from 'axios'
    export default {
        name: "AddTagComponent",
        data() {
          return {
              name: '',
              errors: {}
          }
        },
        computed: {
            validationErrors(){
                let errors = Object.values(this.errors);
                errors = errors.flat();
                return errors;
            }
        },
        methods: {
            addTag() {
                axios.post('/tags', {name: this.tag}).then(
                    (response) => {
                        console.log('succes', response)
                    }).catch(error => {
                        this.errors = error.response.data.errors;
                });
            }
        }
    }
</script>

<style scoped>

</style>