<template>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" :checked="checked" :name="name" :id="id" :value="value" />
        <label class="form-check-label" :for="id">{{label}}</label>
    </div>
</template>

<script>
    export default {
        props: {
            name: String,
            id: String,
            value: String,
            label : String,
            checked: {
                default: false
            }
        }
    };
</script>

<style scoped>

</style>
