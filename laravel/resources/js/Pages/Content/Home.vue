<!-- resources/js/Pages/Home.vue -->
<template>
  <AppLayout>
    <template #header>
      <h1 class="text-4xl font-bold mb-6">Willkommen bei {{ shopName }}</h1>
    </template>

    <section class="mb-12">
      <product-list :initial-products="products" />
    </section>

    <section>
      <p>Promo Aktionen</p>
    </section>
  </AppLayout>
</template>

<script setup lang="ts">
import { defineProps } from 'vue';
import ProductList from '@/components/ProductList.vue';
import AppLayout from '@/layouts/AppLayout.vue';

// Props, die vom Controller (Inertia) kommen
const props = defineProps<{
  title?: string;
  description?: string;
  shopName: string;
  products: Array<{ id: number; name: string; price: number; image: string }>;
  promo: { title: string; text: string; image: string };
}>();

// Metadaten für SEO (werden im Layout verwendet)
if (props.title) {
  // Inertia überträgt `title` automatisch in $page.props.title
}
</script>

<style scoped>
/* Beispiel Tailwind‑Overrides */
</style>
