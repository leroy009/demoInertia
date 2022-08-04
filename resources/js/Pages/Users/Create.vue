<script setup>
    // import { reactive, ref } from 'vue';
    // import { Inertia } from '@inertiajs/inertia'
    import { useForm } from '@inertiajs/inertia-vue3';

    //for validation
    // defineProps({
    //     errors: Object
    // }); we are using form.errors now. //useForm

    //Form 
    //We want to use Inertias form helper. This does work4
    // let form = reactive({ name: '', email: '', password: '', });

    let form = useForm({
        name: '',
        email: '',
        password: '',
    });

    //Form Helper
    //let processing = ref(false); // we using form.processing now //useForm

    //Sending form data
    let submit = () => {
        // Inertia.post('/users', form); //This works but now we need form helpers belo
        // processing things. 
        // Inertia.post('/users', form, {
        //     onStart: () => { processing.value = true },
        //     onFinish: () => { processing.value = false },
        // });
        // We no longer need onStart and onFinish because we using //useForm
        //Inertia form helper
        form.post('/users');
    };
</script>


<template>
    <Head title="Create User" />

    <h1 class="text-3xl">Create New User</h1>

    <form @submit.prevent="submit" class="max-w-md mx-auto mt-8 "> 
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                for="name"
            >
                Name
            </label>

            <input v-model="form.name" class="border border-gray-400 p-2 w-full"
                type="text"
                name="name"
                id="name"
                required
            >
            <!-- simalar ways of validation -->
            <div v-if="$page.props.errors.name" v-text="$page.props.errors.name" class="text-red-500 text-xs mt-1"></div>
            <!-- <div v-if="errors.name" v-text="errors.name" class="text-red-500 text-xs mt-1"></div>  we are using form.errors now. //useForm -->
            <div v-if="form.errors.name" v-text="form.errors.name" class="text-red-500 text-xs mt-1"></div>
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                for="email"
            >
                Email
            </label>

            <input v-model="form.email" class="border border-gray-400 p-2 w-full"
                type="email"
                name="email"
                id="email"
                required
            >
            <div v-if="form.errors.email" v-text="form.errors.email" class="text-red-500 text-xs mt-1"></div>
        </div>

        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                for="password"
            >
                Password
            </label>

            <input v-model="form.password" class="border border-gray-400 p-2 w-full"
                type="password"
                name="password"
                id="password"
                required
            >
            <div v-if="form.errors.password" v-text="form.errors.password" class="text-red-500 text-xs mt-1"></div>
        </div>

        <div class="mb-6">            
            <button class="bg-blue-400 rounded py-2 px-4 hover:bg-blue-500"
                type="submit"  
                :disabled="form.processing"          
            >
            Submit </button>
        </div>
    </form>
</template>

