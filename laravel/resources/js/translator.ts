import Lang, { Replacements } from 'lang.js';
import messages from '@/lang/ll_messages';

const lang = new Lang({ messages, fallback: 'en' });

/**
 * JS‑Implementierung der Laravel‑Übersetzungsfunktion __()
 */
export const __ = (key: string, replace: Replacements = {}): string => {
    return lang.get(key, replace);
};

/**
 * Plural‑Auswahl (Laravel trans_choice)
 */
export const trans_choice = (
    key: string,
    count: number,
    replace: Replacements = {}
): string => {
    return lang.choice(key, count, replace);
};

export const langInstance = lang; // falls man das Lang‑Objekt weiterverwenden will

export let isLanguageDefined = false;

/**
 * Markiert, dass die Applikations‑Sprache bereits gesetzt wurde.
 * Muss *vor* dem Mounten der Inertia‑App aufgerufen werden.
 */
export function setLanguageIsDefined(): void {
    isLanguageDefined = true;
}
