<template>
    <div class="card-body">
        <form>
            <div class="form-group row">
                <label for="title" class="col-md-4 col-form-label text-md-right">Name *</label>
                <div class="col-md-6">
                    <div v-if="message" class="alert alert-success">
                        <span>
                            {{message}}
                        </span>
                    </div>
                    <input
                            v-model="name"
                            id="title"
                            type="text"
                            class="form-control"
                            :class="{'is-invalid': validationErrors.name, 'is-valid': message}"
                            name="title"
                            required
                            autocomplete="title"
                            autofocus
                    >
                    <span v-if="validationErrors.name" class="invalid-feedback" role="alert">
                        <strong>{{validationErrors.name}}</strong>
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
              errors: {},
              message: ''
          }
        },
        computed: {
            validationErrors(){
                let errors = {};
                Object.entries(this.errors).forEach(errorSet => {
                    console.log(errorSet);
                    let name, error;
                    [name, error] = errorSet;
                    errors[name] = error[0];
                });
                return errors;
            }
        },
        methods: {
            addTag() {
                axios.post('/tags', {name: this.name}).then(
                    () => {
                        this.errors = {};
                        this.message = 'Tag successfully added';
                    }).catch(error => {
                        this.message = '';
                        this.errors = error.response.data.errors;
                });
            }
        }
    }
</script>

<style scoped>

</style>