import './bootstrap';
import './translator';
import './main.js';

import { createApp, DefineComponent, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from 'ziggy-js';
import { registerGlobalComponents } from '@/importGlobalComponents';
import AppLayout from '@/layouts/AppLayout.vue';
import { setLayoutVariant } from '@/layouts/composables';
import { __, trans_choice, setLanguageIsDefined } from '@/translator';

// -------------------------------------------------
// Sprache vor dem Mounten festlegen
// -------------------------------------------------
setLanguageIsDefined();

/**
 * Hilfstyp für die von `resolvePageComponent` geladene Vue‑Komponente.
 * Enthält optional die Eigenschaften `layout` und `layoutVariant`,
 * die wir nach dem Laden setzen.
 */
type PageComponent = DefineComponent & {
  layout?: unknown;
  layoutVariant?: string;
};

createInertiaApp({
  /**
   * Resolve‑Funktion, die eine Seite dynamisch importiert,
   * das Layout setzt und die Variante global registriert.
   * Der Rückgabetyp `Promise<any>` erfüllt die von Inertia geforderte
   * `ComponentResolver`‑Signature.
   */
  resolve: (name: string) => {
    // Alle Seiten‑Komponenten (lazy‑loaded)
    const pages = import.meta.glob<Record<string, () => Promise<{ default: DefineComponent }>>>(
      './Pages/**/*.vue'
    );

    // `resolvePageComponent` liefert ein Promise<{ default: Component }>
    const pagePromise = resolvePageComponent(name, pages) as Promise<{
      default: DefineComponent;
    }>;

    // Nach dem Laden Layout‑ und Variant‑Logik ausführen
    return pagePromise.then((module) => {
      const component = module.default as PageComponent;

      // 1️⃣ Layout (falls nicht bereits definiert)
      component.layout = component.layout ?? AppLayout;

      // 2️⃣ Layout‑Variante ermitteln und global setzen
      const variant = component.layoutVariant ?? 'default';
      setLayoutVariant(variant);

      // Rückgabe der finalen Komponente
      return component;
    });
  },

  setup({ el, App, props, plugin }) {
    const vueApp = createApp({ render: () => h(App, props) });

    // Globale Übersetzungs‑Methoden
    vueApp.config.globalProperties.__ = __;
    vueApp.config.globalProperties.trans_choice = trans_choice;

    // Plugins
    vueApp.use(plugin);
    vueApp.use(ZiggyVue);
    registerGlobalComponents(vueApp);

    vueApp.mount(el);
  },

  progress: {},
});
