<template>
    <form-group label="Category : ">
        <select name="category_id">
            <option v-for="category in categories" :selected="value == category.id? true : false" :key="category.id" :value="category.id">{{category.name}}</option>
        </select>
    </form-group>
</template>

<script>
    export default {
        props : ['value'],
        data() {
            return {
                categories: []
            };
        },

        created() {
            const token = this.token;
            const url = `/api/web/v1/category`
            axios.get(url).then(response => {
                this.categories = response.data;
            });
            // axios.get("/api/v1/category").then( response => {
            //     this.categories = response.data;
            // });
        }
    };
</script>

<style scoped>

</style>
