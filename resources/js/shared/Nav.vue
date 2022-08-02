<script setup>
    import { Link } from "@inertiajs/inertia-vue3";

    import NavLink from "./NavLink.vue";
</script>

<template>
  <nav>
    <ul class="flex list-none space-x-4 list-inside">
      <li>
        <NavLink href="/" :active="$page.component === 'Home'" >Home</NavLink>
        <!-- <Link
          href="/"
          class="text-blue-500 hover:underline"
          :class="{ 'font-bold underline': $page.url === '/' }"
          >Home</Link
        > -->
      </li>

      <li>
        <NavLink href="/users" :active="$page.component === 'Users'" >Users</NavLink>        
      </li>

      <li>
        <NavLink href="/settings" :active="$page.component === 'Settings'" >Settings</NavLink>        
      </li>

      <li>
        <Link
          href="/posttest"
          method="post"
          as="button"
          :data="{ name: 'Leroy Serepe' }"
          class="text-blue-500 hover:underline"
        >
          Logout
        </Link>
      </li>
    </ul>
  </nav>
</template>

