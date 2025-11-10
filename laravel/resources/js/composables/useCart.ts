import { ref } from 'vue';
import axios from 'axios';
import { __ } from '@/translator';

interface CartItem {
  product_id: number;
  quantity: number;
}

const cart = ref<CartItem[]>([]);

/**
 * Fügt ein Produkt dem Warenkorb hinzu.
 */
export function useCart() {
  async function addToCart(product: { id: number }) {
    try {
      const response = await axios.post('/api/cart', {
        product_id: product.id,
        quantity: 1,
      });
      cart.value = response.data.items;
    } catch (e) {
      console.error(__('Error adding to cart'), e);
    }
  }

  async function loadCart() {
    const { data } = await axios.get('/api/cart');
    cart.value = data.items;
  }

  return {
    cart,
    addToCart,
    loadCart,
  };
}
