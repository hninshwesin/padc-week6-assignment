<template>
    <form-group :label="label">
        <textarea class="form-control" :id="name" :name="name" :placeholder="placeholder" :value="value" rows="6"></textarea>
    </form-group>
</template>

<script>
    export default {
        props : ['name','placeholder','value','label']
    };
</script>

<style scoped>

</style>
