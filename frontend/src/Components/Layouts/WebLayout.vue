<script setup lang="ts">
import WebHeaderMenu from '@/Components/WebHeaderMenu.vue'
</script>
<template>
<WebHeaderMenu/>
  <div class="md:px-10 h-full">
    <div class="h-full">
      <slot />
    </div>
  </div>
</template>
