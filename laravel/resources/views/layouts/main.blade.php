<!-- resources/js/components/ProductList.vue -->
<template>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div
      v-for="product in products"
      :key="product.id"
      class="border rounded-lg p-4 flex flex-col"
    >
      <img
        :src="product.image"
        :alt="product.name"
        class="w-full h-48 object-cover mb-3 rounded"
      />
      <h2 class="font-semibold text-lg mb-1">{{ product.name }}</h2>
      <p class="text-gray-600 mb-2">{{ formatCurrency(product.price) }}</p>

      <!-- Nutzung der globalen Utility .btn-primary -->
      <button @click="addToCart(product)" class="mt-auto btn-primary">
        {{ __('Add to cart') }}
      </button>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import { __ } from '@/translator';
import { useCart } from '@/composables/useCart';

defineProps({
  initialProducts: { type: Array, required: true },
});

const products = ref(initialProducts);
const { addToCart } = useCart();

function formatCurrency(value: number): string {
  return new Intl.NumberFormat('de-DE', {
    style: 'currency',
    currency: 'EUR',
  }).format(value);
}
</script>

<!-- PostCSS aktivieren, damit @apply funktioniert -->
<style scoped lang="postcss">
/* Beispiel‑Erweiterung, falls du hier @apply nutzt */
.product-card {
  @apply bg-white shadow-md hover:shadow-lg transition-shadow;
}
</style>
