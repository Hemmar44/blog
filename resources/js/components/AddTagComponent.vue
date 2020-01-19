<template>
    <div class="card-body">
        <form>
            <div class="form-group row">
                <label for="title" class="col-md-4 col-form-label text-md-right">Name *</label>

                <div class="col-md-6">
                    <input
                            id="title"
                            type="text"
                            class="form-control"
                            name="title"
                            required
                            autocomplete="title"
                            autofocus
                    >
                    <span class="invalid-feedback" role="alert">
                        <strong></strong>
                    </span>

                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "AddTagComponent"
    }
</script>

<style scoped>

</style>