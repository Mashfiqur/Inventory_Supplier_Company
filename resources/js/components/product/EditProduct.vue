<template>
    <div>
        <h3 class="text-center">Edit Product</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateProduct">
                    <div class="form-group">
                        <label>SKU</label>
                        <input type="text" class="form-control" v-model="product.sku">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Update Product</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                product: {}
            }
        },
        created() {
            this.axios
                .get(`http://localhost:8000/api/product/edit/${this.$route.params.id}`)
                .then((response) => {
                    this.product = response.data;
                    // console.log(response.data);
                });
        },
        methods: {
            updateProduct() {
                this.axios
                    .post(`http://localhost:8000/api/product/update/${this.$route.params.id}`, this.product)
                    .then((response) => {
                        this.$router.push({name: 'home'});
                    });
            }
        }
    }
</script>