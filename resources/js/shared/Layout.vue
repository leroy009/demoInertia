<script setup>
import { usePage } from "@inertiajs/inertia-vue3";
import { computed } from "@vue/runtime-core";

import Nav from "./Nav.vue";

const username = computed(() => usePage().props.value.auth.loggedUser.username);
</script>

<template>
  <section class="p-6 bg-gray-200">
    <header class="flex justify-between">
      <div class="flex items-center">
        <h1 class="font-bold text-lg">My App</h1>

        <p class="text-sm ml-4">Welcome Back, {{ username }}!</p>
      </div>

      <Nav />
    </header>
  </section>

  <section class="p-6">
    <div class="max-w-3xl mx-auto">
        <iframe
            class="mb-6"
            width="100%"
            frameborder="no"
            scrolling="no"
            seamless
            src="https://player.simplecast.com/e988d91c-ce55-49bd-b0e0-f74dd973baa2?dark=false"
        ></iframe>

      <slot />
    </div>
  </section>
</template>