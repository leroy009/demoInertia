<script setup>
    import Layout from '../shared/Layout.vue';
    import {Link} from "@inertiajs/inertia-vue3";

    const props = defineProps({
        time: String,
    });

</script>

<template>
    <Layout>

        <h1 class="text-3xl font-bold">Users</h1>


        <div style="margin-top: 800px">
            <p>The current time is  {{ time }}.</p>

            <Link href="/users" class="text-blue-500" preserve-scroll >Refresh</Link>
        </div>
    </Layout> 
</template>

