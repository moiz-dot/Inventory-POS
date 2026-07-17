import { ref, watch, onMounted } from 'vue';
import { router } from '@inertiajs/vue3';

const theme = ref('dark');

function normalizeTheme(value) {
    const raw = (value || 'dark').toString().trim().toLowerCase();
    return raw === 'light' ? 'light' : 'dark';
}

function applyTheme(value) {
    const normalized = normalizeTheme(value);
    console.log('[Theme] Applying theme:', normalized);
    document.documentElement.setAttribute('data-theme', normalized);
}

function toggleTheme() {
    const next = theme.value === 'dark' ? 'light' : 'dark';
    console.log('[Theme] Toggling from', theme.value, 'to', next);
    theme.value = next;
    applyTheme(next);
    persistTheme(next);
}

function persistTheme(value) {
    const normalized = normalizeTheme(value);
    console.log('[Theme] Persisting theme:', normalized);
    router.put(route('theme.update'), { theme: normalized }, {
        preserveScroll: true,
        preserveState: true,
    }).catch(err => {
        console.error('[Theme] Failed to persist theme:', err);
    });
}

function initTheme(initial) {
    const normalized = normalizeTheme(initial);
    console.log('[Theme] Initializing with:', normalized);
    theme.value = normalized;
    applyTheme(normalized);
}

export { theme, toggleTheme, initTheme, applyTheme };
