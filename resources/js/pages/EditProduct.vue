<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import EditNewProduct from '@/components/EditNewProduct.vue';

// Define props
defineProps<{ product: any }>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Edit Product',
        href: '/products/{product}/edit',
    },
];
</script>

<template>
    <Head title="Edit Product" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl py-4 ">
            <div class="relative min-h-[100vh] flex-1 rounded-xl border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
                <EditNewProduct :product="product" />
            </div>
        </div>
    </AppLayout>
</template>
