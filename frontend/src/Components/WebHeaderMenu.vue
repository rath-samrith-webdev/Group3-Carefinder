<script setup lang="ts">
import { useAuthStore } from '@/stores/auth-store'
const store = useAuthStore()
</script>
<template>
  <header class="nav flex justify-between px-5 bg-white items-center">
    <!-- Logo -->
    <div class="flex items-center space-x-2">
      <img src="@/assets/logo/care_finder-02.png" alt="" srcset="" width="175">
    </div>

    <!-- Menu Items -->
    <nav class="flex justify-center space-x-4 ms-lg-4" v-if="store.user">
      <a
        href="/post"
        class="font-bold px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900"
      >Post</a
      >
      <a
        href="/team"
        class="font-bold px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900"
      >Team</a
      >
      <a
        href="/projects"
        class="font-bold px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900"
      >Projects</a
      >
      <a
        href="/reports"
        class="font-bold px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900"
      >Reports</a
      >
    </nav>
    <nav class="flex justify-center space-x-4" v-if="!store.user">
      <router-link to="" class="btn">Home</router-link>
      <router-link to="" class="btn">About Us</router-link>
      <router-link to="" class="btn">Service</router-link>
      <router-link to="" class="btn">Contact</router-link>
    </nav>

    <!-- Sign In -->
    <div>
      <router-link v-if="!store.user" to="/landing" class="btn py-1 rounded font-semibold sign-up">Sign up
      </router-link>
      <router-link v-if="!store.user" to="/login" class="btn py-1 rounded font-semibold text-white log-in">Log in
      </router-link>
      <button v-if="store.user" class="btn px-4 py-1 rounded font-semibold">Log out</button>
    </div>
  </header>
</template>
<style scoped>
header {
  position: sticky;
  top: 0;
  z-index: 1;
}

.log-in {
  position: relative;
  background-color: #32B4E3;
}

.sign-up {
  position: absolute;
  background-color: #FCB22D;
  color: white;
  right: 105px;
  z-index: 1;
}
</style>
