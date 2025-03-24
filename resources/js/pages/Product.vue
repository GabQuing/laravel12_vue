<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';
import ProductTable from '@/components/ProductTable.vue';


defineProps<{
    products: {
        data: Array<any>;
        links: Array<any>;
    };
    categories: Array<string>;
    search: string;
    selectedCategory: string;
}>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Product',
        href: '/product',
    },
];
</script>

<template>
    <Head title="Product" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl py-4 ">
            <div class="relative min-h-[100vh] flex-1 rounded-xl border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
                <ProductTable 
                    :products="products.data" 
                    :pagination="products" 
                    :categories="categories" 
                    :search="search" 
                    :selectedCategory="selectedCategory" 
                />
            </div>
        </div>
    </AppLayout>
</template>
