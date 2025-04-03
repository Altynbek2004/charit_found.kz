<template>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Product List</h1>
        <ul class="space-y-4">
            <li v-for="product in products" :key="product.id" class="flex justify-between items-center p-4 bg-white shadow-md rounded-lg">
                <div>
                    <strong class="text-lg text-gray-700">{{ product.name }}</strong>
                    <span class="text-gray-500"> - {{ product.price }}₽</span>
                </div>
                <div class="flex space-x-4">
                    <router-link :to="`/products/${product.id}/edit`" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">Edit</router-link>
                    <button @click="deleteProduct(product.id)" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">Delete</button>
                </div>
            </li>
        </ul>
        <router-link to="/products/create" class="mt-6 block text-center px-6 py-3 bg-green-500 text-white rounded-lg hover:bg-green-600 transition">Create New Product</router-link>
    </div>
</template>

<script>
export default {
    data() {
        return {
            products: [],
        };
    },
    async created() {
        try {
            const response = await fetch('/api/products');
            this.products = await response.json();
        } catch (error) {
            console.error('Error fetching products:', error);
        }
    },
    methods: {
        async deleteProduct(id) {
            if (confirm('Are you sure you want to delete this product?')) {
                try {
                    await fetch(`/api/products/${id}`, { method: 'DELETE' });
                    this.products = this.products.filter(product => product.id !== id);
                } catch (error) {
                    console.error('Error deleting product:', error);
                }
            }
        },
    },
};
</script>

<style scoped>
.container {
    max-width: 600px;
    margin: auto;
    background-color: #f9fafb;
    padding: 20px;
    border-radius: 10px;
}
</style>
