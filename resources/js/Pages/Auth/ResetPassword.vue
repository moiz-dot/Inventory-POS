<script setup>
import { Head, useForm } from '@inertiajs/vue3';

const props = defineProps({
    email: String,
    token: String,
});

const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('password.update'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Reset Password" />

    <div class="min-h-screen bg-slate-950 flex items-center justify-center py-12 px-4 sm:px-6 relative overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_80%_80%_at_50%_-20%,rgba(59,130,246,0.15),rgba(255,255,255,0))] pointer-events-none z-0" />

        <div class="max-w-md w-full space-y-6 bg-slate-900/30 border border-slate-900 p-8 rounded-2xl relative z-10 backdrop-blur-md">
            <div class="text-center space-y-2">
                <h2 class="text-2xl font-bold text-white tracking-tight">Configure New Passkey</h2>
                <p class="text-[10px] font-mono text-slate-500 uppercase tracking-widest">SECURE RE-RECONCILIATION</p>
            </div>

            <form @submit.prevent="submit" class="space-y-4">
                <div class="space-y-1.5">
                    <label for="email" class="text-[10px] font-mono text-slate-500 uppercase block">Email Address</label>
                    <input id="email" type="email" v-model="form.email" required autofocus autocomplete="username" class="w-full bg-slate-950 border border-slate-900 focus:border-blue-500/40 rounded-lg p-3 text-xs text-slate-200 outline-none" />
                    <div v-if="form.errors.email" class="text-[10px] text-red-400 font-mono">{{ form.errors.email }}</div>
                </div>

                <div class="space-y-1.5">
                    <label for="password" class="text-[10px] font-mono text-slate-500 uppercase block">New Password</label>
                    <input id="password" type="password" v-model="form.password" required autocomplete="new-password" placeholder="Minimum 12 characters" class="w-full bg-slate-950 border border-slate-900 focus:border-blue-500/40 rounded-lg p-3 text-xs text-slate-200 outline-none" />
                    <div v-if="form.errors.password" class="text-[10px] text-red-400 font-mono">{{ form.errors.password }}</div>
                </div>

                <div class="space-y-1.5">
                    <label for="password_confirmation" class="text-[10px] font-mono text-slate-500 uppercase block">Confirm Password</label>
                    <input id="password_confirmation" type="password" v-model="form.password_confirmation" required autocomplete="new-password" class="w-full bg-slate-950 border border-slate-900 focus:border-blue-500/40 rounded-lg p-3 text-xs text-slate-200 outline-none" />
                    <div v-if="form.errors.password_confirmation" class="text-[10px] text-red-400 font-mono">{{ form.errors.password_confirmation }}</div>
                </div>

                <button type="submit" :disabled="form.processing" class="w-full py-3 rounded bg-blue-600 hover:bg-blue-500 disabled:opacity-50 text-white font-semibold text-xs flex items-center justify-center gap-2">
                    <span v-if="form.processing" class="animate-spin h-4 w-4 border-2 border-white border-t-transparent rounded-full"></span>
                    <span v-else>Commit Passkey to Ledger</span>
                </button>
            </form>
        </div>
    </div>
</template>