import AllProducts from './components/product/AllProducts.vue';
import AddProduct from './components/product/AddProduct.vue';
import EditProduct from './components/product/EditProduct.vue';

 
export const product_routes = [
    {
        name: 'home',
        path: '/',
        component: AllProducts
    },
    {
        name: 'add',
        path: '/add',
        component: AddProduct
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditProduct
    }
];