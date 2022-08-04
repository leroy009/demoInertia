<script setup>

import { ref, watch } from 'vue';
import Pagination from '../../shared/Pagination.vue'
import { Inertia } from '@inertiajs/inertia';

let props = defineProps({
    // users: Array,
    users: Object,
    filters: Object
});

let search = ref(props.filters.search);

watch(search, value => {
    Inertia.get('/users', {search: value}, {
        preserveState: true,
        replace: true
    })
});
</script>

<template>
    <Head title="Users" />
    
    <div class="flex justify-between">
        <h1 class="text-3xl font-bold">Users</h1>
        <input v-model="search" type="text" placeholder="Search..." class="border px-2 rounded-lg"/>
    </div>

    
<div class="container mx-auto px-4 sm:px-8 max-w-3xl">
    <div class="py-8">
        <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
            <!-- <h2 class="text-2xl leading-tight">
                Users
            </h2> -->

                
            </div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">                       
                        <tbody>
                            <tr v-for="user in users.data" :key="user.id">              
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ user.name }}
                                    </p>
                                </td>                                
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                        <span aria-hidden="true" class="absolute inset-0 bg-green-200 opacity-50 rounded-full">
                                        </span>
                                        <span class="relative">
                                            active
                                        </span>
                                    </span>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <a :href="`/users/${user.id}/edit`" class="text-indigo-600 hover:text-indigo-900">
                                        Edit
                                    </a>
                                </td>
                            </tr>                            
                        </tbody>
                    </table>                   
                </div>
            </div>
        </div>
    </div>

     <!-- Paginator -->
    <div>
        <!-- <template v-for="link in users.links" >
            <Link v-if="link.url" :href="link.url" v-html="link.label" />

            <span v-else v-html="link.label"></span>
        </template> -->
        <!-- <Component 
            :is="link.url ? 'Link' : 'span' " 
            v-for="link in users.links" 
            :href="link.url" 
            v-html="link.label" 
            class="px-1"
            :class="{ 'text-gray-500': ! link.url, 'font-bold' : link.active }"
        /> -->

        <Pagination :links="users.links" class="mt-6" />
    </div>

    
</template>