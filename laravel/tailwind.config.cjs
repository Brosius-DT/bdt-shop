/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    // Blade‑Templates
    './resources/**/*.blade.php',
    // JavaScript / TypeScript
    './resources/**/*.js',
    './resources/**/*.ts',
    // Vue‑Single‑File‑Components
    './resources/**/*.vue',
  ],
  theme: {
    extend: {
      // hier kannst du eigene Farben, Spacing‑Werte etc. erweitern
    },
  },
  plugins: [],
};
