<template>
  <div :class="`layout-${layoutVariant}`">
    <!-- Hier können später Header / Footer eingefügt werden -->
    <slot />
  </div>
</template>

<script setup lang="ts">
import { useLayoutVariant } from '@/layouts/composables';

const { layoutVariant } = useLayoutVariant();   // reactive Variante (z. B. "admin")
</script>

<style scoped>
.layout-default { /* default styling */ }
</style>
