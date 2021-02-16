<template>
    <div>
        <h3 class="text-center">All Posts</h3><br/>
 
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>SKU</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="product in products" :key="product.id">
                <td>{{ product.id }}</td>
                <td>{{ product.sku }}</td>
                <td>{{ product.created_at }}</td>
                <td>{{ product.updated_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: product.id }}" class="btn btn-primary">Edit
                        </router-link>
                        <button class="btn btn-danger" @click="deleteProduct(product.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                products: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/products/')
                .then(response => {
                    console.log( response.data);
                    this.products = response.data;
                });
        },
        methods: {
            deleteProduct(id) {
                this.axios
                    .delete(`http://localhost:8000/api/product/delete/${id}`)
                    .then(response => {
                        let i = this.products.map(item => item.id).indexOf(id); // find index of your object
                        this.products.splice(i, 1)
                    });
            }
        }
    }
</script>