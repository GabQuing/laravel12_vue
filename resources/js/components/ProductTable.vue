<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { ref, watch } from 'vue';
import { router } from '@inertiajs/vue3';

const props = defineProps({
    products: Array,
    pagination: Object,
    search: String,
    categories: Array,
    selectedCategory: String
});

const deleteProduct = (id) => {
    if (confirm('Are you sure you want to delete this product?')) {
        router.delete(route('product.destroy', id), {
            preserveState: true,
            replace: true
        });
    }
};

const searchQuery = ref(props.search || '');
const selectedCategory = ref(props.selectedCategory || '');


watch([searchQuery, selectedCategory], ([newSearch, newCategory]) => {
    router.get(route('product'), { search: newSearch, category: newCategory }, { preserveState: true, replace: true });
});
</script>

<template>
    <div class="px-4 py-8 mx-auto space-y-8 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border sm:container sm:rounded-lg sm:px-6 lg:px-8">
        <div class="flex flex-wrap items-center justify-between">
            <Button @click="router.visit('/product/create')">Create</Button>
            <div class="relative p-1 overflow-hidden pointer-events-auto w-52 md:max-w-96">
                <input 
                    v-model="searchQuery"
                    class="text-sm text-black w-full px-4 border border-slate-300 rounded-lg focus:border-none focus:outline-none focus:ring-2 focus:ring-[#1F4B55]" 
                    type="search" 
                    placeholder="Search..."
                >
                <select v-model="selectedCategory" class="text-sm text-black w-full px-4 border border-slate-300 rounded-lg focus:border-none focus:outline-none focus:ring-2 focus:ring-[#1F4B55]" name="" id="">
                    <option value="">All Categories</option>
                    <option v-for="category in categories" :key="category" :value="category">
                        {{ category }}
                    </option>
                </select>
            </div>
        </div>
        <div class="overflow-x-auto custom-scrollbar">
            <table class="min-w-full">
                <thead class="border border-sidebar-border/70 dark:border-sidebar-border">
                    <tr>
                        <th class="px-6 py-3 text-sm tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">Name</th>
                        <th class="px-6 py-3 text-sm tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">Category</th>
                        <th class="px-6 py-3 text-sm tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">Description</th>
                        <th class="px-6 py-3 text-sm tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">DateTime</th>
                        <th class="px-6 py-3 text-sm tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">Created By</th>
                        <th class="px-6 py-3 text-sm tracking-wider text-left text-gray-500 uppercase whitespace-nowrap">Actions</th>
                    </tr>
                </thead>
                <tbody class="border border-sidebar-border/70 dark:border-sidebar-border divide-y divide-gray-200">
                    <tr v-for="product in products" :key="product.id">
                        <td class="px-6 py-3 text-sm text-gray-500 whitespace-nowrap">{{ product.name }}</td>
                        <td class="px-6 py-3 text-sm text-gray-500 whitespace-nowrap">{{ product.category }}</td>
                        <td class="px-6 py-3 text-sm text-gray-500 whitespace-nowrap">{{ product.description }}</td>
                        <td class="px-6 py-3 text-sm text-gray-500 whitespace-nowrap">{{ product.created_at }}</td>
                        <td class="px-6 py-3 text-sm text-gray-500 whitespace-nowrap">{{ product.creator ? product.creator.name : 'N/A' }}</td>
                        <td class="px-6 py-3 text-sm text-gray-500 whitespace-nowrap">
                            <div class="flex items-center gap-2">
                                <Button>Edit</Button>
                                <Button variant="destructive" @click="deleteProduct(product.id)">Delete</Button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex items-center justify-between mt-4">
            <Button :disabled="!pagination.prev_page_url" @click="router.get(pagination.prev_page_url, { search: searchQuery }, { preserveState: true })">
                Previous
            </Button>
            <span class="text-gray-500">Page {{ pagination.current_page }} of {{ pagination.last_page }}</span>
            <Button :disabled="!pagination.next_page_url" @click="router.get(pagination.next_page_url, { search: searchQuery }, { preserveState: true })">
                Next
            </Button>
        </div>
    </div>
</template>
