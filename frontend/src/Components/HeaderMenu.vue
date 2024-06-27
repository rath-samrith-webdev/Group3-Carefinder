<!-- src/components/HeaderMenu.vue -->
<template>
  <header class="text-white px-50 py-3 bg-white flex justify-between items-center">
    <div class="flex items-center text-black font-bold">
      <Icon icon="skill-icons:devto-dark" style="font-size: 45px" />
      <div class="ml-5 flex font-semibold">
        <div
          v-for="(item, index) in menu"
          :key="index"
          class="p-3 rounded hover:text-blue cursor-pointer"
          v-permission="item.meta.permission"
        >
          {{ item.title }}
        </div>
      </div>
    </div>
    <nav :class="['flex', 'items-center', { hidden: !isMenuOpen, 'flex-col': isMenuOpen }]">
      <ul class="flex space-x-4 text-black">
        <Icon icon="pepicons-pencil:person-circle" style="font-size: 32px" />
      </ul>
    </nav>
  </header>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import { Icon } from '@iconify/vue'

const isMenuOpen = ref(false)
const menu = [
  {
    title: 'User',
    meta: {
      permission: 'view_users'
    },
    link: '/users'
  },
  {
    title: 'Role',
    meta: {
      permission: 'view_roles'
    },
    link: '/roles'
  },
  {
    title: 'Permission',
    meta: {
      permission: 'view_permissions'
    },
    link: '/permissions'
  }
]

const toggleMenu = () => {
  isMenuOpen.value = !isMenuOpen.value
}
</script>
