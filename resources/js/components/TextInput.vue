<template>
    <form-group :label="label">
        <input type="text" class="form-control" :id="name" :value="value" :name="name" :placeholder="placeholder">
    </form-group>
</template>

<script>
    export default {
        props: ['name','placeholder','value','label']
    }
</script>
