import { App, defineAsyncComponent } from 'vue';

/**
 * Registriert alle globalen Vue‑Komponenten im Verzeichnis
 * `resources/js/components`. Die Komponenten werden lazy‑loaded,
 * damit das Bundle nicht unnötig groß wird.
 */
export function registerGlobalComponents(app: App): void {
    // Vite‑Glob‑Import – liefert ein Objekt {path: () => Promise<...>}
    const modules = import.meta.glob<{ default: any }>('./components/**/*.vue');

    Object.entries(modules).forEach(([path, loader]) => {
        // Komponenten‑Name anhand des Dateinamens (z. B. Button.vue → Button)
        const componentName = path
            .split('/')
            .pop()
            ?.replace(/\.\w+$/, '') ?? '';

        if (!componentName) return;

        // Async‑Komponente registrieren
        app.component(
            componentName,
            defineAsyncComponent(() => loader().then((mod) => mod.default))
        );
    });
}
