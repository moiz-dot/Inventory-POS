<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Log in" />

    <div class="min-h-screen bg-slate-950 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
        <!-- Background flares -->
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_80%_80%_at_50%_-20%,rgba(59,130,246,0.15),rgba(255,255,255,0))] pointer-events-none z-0" />

        <div class="max-w-md w-full space-y-8 bg-slate-900/30 border border-slate-900 p-8 rounded-2xl relative z-10 backdrop-blur-md">
            <!-- Branding -->
            <div class="text-center space-y-3">
                <div class="w-12 h-12 rounded-xl bg-blue-600 flex items-center justify-center text-white mx-auto font-bold text-xl shadow-[0_0_20px_rgba(59,130,246,0.3)]">Æ</div>
                <h2 class="text-2xl font-bold text-white tracking-tight">Staff Authentication</h2>
                <p class="text-xs text-slate-500 font-mono uppercase tracking-widest">AETHER CORE PORTAL GATEWAY</p>
            </div>

            <div v-if="status" class="mb-4 font-medium text-sm text-emerald-400 bg-emerald-500/10 border border-emerald-500/20 p-3 rounded-lg text-center">
                {{ status }}
            </div>

            <form @submit.prevent="submit" class="space-y-4">
                <div class="space-y-1.5">
                    <label for="email" class="text-[10px] font-mono text-slate-500 uppercase tracking-wide block">Secure Staff Email</label>
                    <div class="relative">
                        <svg class="w-4 h-4 text-slate-600 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        <input id="email" type="email" v-model="form.email" required autofocus autocomplete="username" placeholder="sarah.jenkins@aether.org" class="w-full bg-slate-950 border border-slate-900 focus:border-blue-500/40 rounded-lg py-2.5 pl-10 pr-3 text-xs text-slate-200 outline-none transition-colors" />
                    </div>
                    <div v-if="form.errors.email" class="text-[10px] text-red-400 font-mono">{{ form.errors.email }}</div>
                </div>

                <div class="space-y-1.5">
                    <div class="flex justify-between items-center">
                        <label for="password" class="text-[10px] font-mono text-slate-500 uppercase tracking-wide block">Vault Password</label>
                        <Link v-if="canResetPassword" :href="route('password.request')" class="text-[10px] text-blue-400 hover:underline font-mono">Reset Credentials</Link>
                    </div>
                    <div class="relative">
                        <svg class="w-4 h-4 text-slate-600 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        <input id="password" type="password" v-model="form.password" required autocomplete="current-password" class="w-full bg-slate-950 border border-slate-900 focus:border-blue-500/40 rounded-lg py-2.5 pl-10 pr-3 text-xs text-slate-200 outline-none transition-colors" />
                    </div>
                    <div v-if="form.errors.password" class="text-[10px] text-red-400 font-mono">{{ form.errors.password }}</div>
                </div>

                <div class="block mt-4">
                    <label class="flex items-center">
                        <input type="checkbox" v-model="form.remember" class="rounded border-slate-700 bg-slate-900 text-blue-600 focus:ring-blue-500/40" />
                        <span class="ms-2 text-xs text-slate-400">Remember this device</span>
                    </label>
                </div>

                <button type="submit" :disabled="form.processing" class="w-full py-3 rounded-lg bg-blue-600 hover:bg-blue-500 disabled:opacity-50 text-white font-semibold text-xs transition-all flex items-center justify-center gap-2 shadow-lg shadow-blue-500/10 mt-4">
                    <span v-if="form.processing" class="animate-spin h-4 w-4 border-2 border-white border-t-transparent rounded-full"></span>
                    <span v-else>Sign In & Unlock Ledger</span>
                    <svg v-if="!form.processing" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </button>
            </form>

            <div class="border-t border-slate-900 pt-6 space-y-4 text-center">
                <div class="relative flex justify-center text-xs">
                    <span class="bg-slate-950 px-2 text-slate-600 font-mono text-[9px] uppercase tracking-wider">New Staff Member?</span>
                </div>
                <Link :href="route('register')" class="w-full block py-3 rounded-lg bg-emerald-600/10 border border-emerald-500/20 text-emerald-400 font-mono text-xs hover:bg-emerald-600/20 transition-all flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    Request Staff Access
                </Link>
            </div>
        </div>
    </div>
</template>