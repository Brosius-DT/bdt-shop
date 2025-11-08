import { ref } from 'vue';

const layoutVariant = ref('default');

/**
 * Setzt die aktuelle Layout‑Variante (z. B. "admin", "auth" …).
 * Die Variante kann in `AppLayout.vue` verwendet werden, um z. B.
 * unterschiedliche CSS‑Klassen zu setzen.
 */
export function setLayoutVariant(variant: string): void {
    layoutVariant.value = variant;
}

export function useLayoutVariant() {
    return { layoutVariant };
}
