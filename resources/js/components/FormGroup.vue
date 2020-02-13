<template>
    <div class="form-group">
        <label for="content">{{label}}</label>
        <slot></slot>
    </div>
</template>

<script>
    export default {
        props : ['label']
    };
</script>

