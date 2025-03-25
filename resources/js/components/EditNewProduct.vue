<script setup lang="ts">
import { ref } from 'vue';

// Accept product prop
const props = defineProps<{ product: any }>();

// Create reactive variables
const productName = ref(props.product.name);
const productCategory = ref(props.product.category);
const productDescription = ref(props.product.description);
</script>

<template>
    <div class="px-4 py-8 mx-auto space-y-8 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border sm:container sm:rounded-lg sm:px-6 lg:px-8">
        <a class="inline-block mb-4 font-medium text-gray-500" href="/product">
            <span class="flex items-center space-x-2 cursor-pointer hover:opacity-70">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <span>Back to Product Page</span>
            </span>
        </a>
        <div class="pb-8">
            <form action="post" enctype="multipart/form-data">
                <div class="max-w-4xl m-auto space-y-4">
                    <div class="flex flex-col gap-4 sm:flex-row">
                        <div class="flex-1 space-y-2">
                            <p class="font-medium text-gray-500">Category <span class="text-red-400">*</span></p>
                            <select v-model="productCategory" class="text-md w-full p-3 border text-black border-slate-300 rounded-lg focus:outline-none focus:ring-0 focus:border-[#1F4B55]" required>
                                <option value="" disabled>Select one</option>
                                <option value="electronics">Electronics</option>
                                <option value="fashion">Fashion</option>
                                <option value="home">Home</option>
                            </select>
                        </div>

                        <div class="flex-1 space-y-2">
                            <p class="font-medium text-gray-500">Name <span class="text-red-400">*</span></p>
                            <input v-model="productName" class="text-md w-full p-[0.63rem] border text-black border-slate-300 rounded-lg focus:outline-none focus:ring-0 focus:border-[#1F4B55]" type="text" required>
                        </div>
                    </div>

                    <div>
                        <p class="font-medium text-gray-500">Description <span class="text-red-400">*</span></p>
                        <textarea v-model="productDescription" class="text-md w-full p-4 border text-black border-slate-300 rounded-lg focus:outline-none focus:ring-0 focus:border-[#1F4B55]" rows="5"></textarea>
                    </div>

                    <div class="!mt-8 text-right">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Update Product</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
