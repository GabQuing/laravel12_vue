<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import CreateNewProduct from '@/components/CreateNewProduct.vue';

defineProps<{
    categories: string[];
}>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Create Product',
        href: '/product/create',
    },
];
</script>

<template>
    <Head title="Create Product" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl py-4 ">
            <div class="relative min-h-[100vh] flex-1 rounded-xl border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
                <CreateNewProduct :categories="categories"/>
            </div>
        </div>
    </AppLayout>
</template>
