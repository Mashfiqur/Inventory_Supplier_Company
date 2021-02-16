<template>
    <div>
        <h3 class="text-center">Add Product</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addProduct">
                    <div class="form-group">
                        <label>SKU</label>
                        <input type="text" class="form-control" v-model="product.sku">
                        <input type="text" class="form-control" value="auth()->user()->name">

                    </div>
                   
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                product: {},
            }
        },
        methods: {
            addProductt() {
 
                this.axios
                    .post('http://localhost:8000/api/product/add', this.product)
                    .then(response => (
                        this.$router.push({name: 'home'})
                        // console.log(response.data)
                    ))
                    .catch(error => console.log(error))
                    .finally(() => this.loading = false)

                    $http.get('api/user').then(response => {
   console.log(response.body);
})
            }
        }
    }
</script>