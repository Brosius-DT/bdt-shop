declare module 'lang.js' {
  interface Replacements {
    [key: string]: string | number;
  }

  class Lang {
    constructor(options: { messages: Record<string, string>; fallback: string });
    get(key: string, replace?: Replacements): string;
    choice(key: string, count: number, replace?: Replacements): string;
    setLocale(locale: string): void;
  }

  export default Lang;
  export type { Replacements };
}
