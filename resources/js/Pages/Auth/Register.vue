<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Register" />

    <div class="min-h-screen bg-slate-950 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_80%_80%_at_50%_-20%,rgba(59,130,246,0.15),rgba(255,255,255,0))] pointer-events-none z-0" />

        <div class="max-w-md w-full space-y-8 bg-slate-900/30 border border-slate-900 p-8 rounded-2xl relative z-10 backdrop-blur-md">
            <div class="text-center space-y-2">
                <h2 class="text-2xl font-bold text-white tracking-tight">Request Staff Access</h2>
                <p class="text-[10px] font-mono text-slate-500 uppercase tracking-widest">ENTERPRISE TENANT PROVISIONING</p>
            </div>

            <form @submit.prevent="submit" class="space-y-4">
                <div class="space-y-1.5">
                    <label for="name" class="text-[10px] font-mono text-slate-500 uppercase tracking-wide block">Full Name</label>
                    <div class="relative">
                        <svg class="w-4 h-4 text-slate-600 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <input id="name" type="text" v-model="form.name" required autofocus autocomplete="name" placeholder="Arthur Pendelton" class="w-full bg-slate-950 border border-slate-900 focus:border-blue-500/40 rounded-lg py-2.5 pl-10 pr-3 text-xs text-slate-200 outline-none transition-colors" />
                    </div>
                    <div v-if="form.errors.name" class="text-[10px] text-red-400 font-mono">{{ form.errors.name }}</div>
                </div>

                <div class="space-y-1.5">
                    <label for="email" class="text-[10px] font-mono text-slate-500 uppercase tracking-wide block">Staff Corporate Email</label>
                    <div class="relative">
                        <svg class="w-4 h-4 text-slate-600 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        <input id="email" type="email" v-model="form.email" required autocomplete="username" placeholder="arthur.p@aether.org" class="w-full bg-slate-950 border border-slate-900 focus:border-blue-500/40 rounded-lg py-2.5 pl-10 pr-3 text-xs text-slate-200 outline-none transition-colors" />
                    </div>
                    <div v-if="form.errors.email" class="text-[10px] text-red-400 font-mono">{{ form.errors.email }}</div>
                </div>

                <div class="space-y-1.5">
                    <label for="password" class="text-[10px] font-mono text-slate-500 uppercase tracking-wide block">Password</label>
                    <div class="relative">
                        <svg class="w-4 h-4 text-slate-600 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        <input id="password" type="password" v-model="form.password" required autocomplete="new-password" class="w-full bg-slate-950 border border-slate-900 focus:border-blue-500/40 rounded-lg py-2.5 pl-10 pr-3 text-xs text-slate-200 outline-none transition-colors" />
                    </div>
                    <div v-if="form.errors.password" class="text-[10px] text-red-400 font-mono">{{ form.errors.password }}</div>
                </div>

                <div class="space-y-1.5">
                    <label for="password_confirmation" class="text-[10px] font-mono text-slate-500 uppercase tracking-wide block">Confirm Password</label>
                    <div class="relative">
                        <svg class="w-4 h-4 text-slate-600 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        <input id="password_confirmation" type="password" v-model="form.password_confirmation" required autocomplete="new-password" class="w-full bg-slate-950 border border-slate-900 focus:border-blue-500/40 rounded-lg py-2.5 pl-10 pr-3 text-xs text-slate-200 outline-none transition-colors" />
                    </div>
                    <div v-if="form.errors.password_confirmation" class="text-[10px] text-red-400 font-mono">{{ form.errors.password_confirmation }}</div>
                </div>

                <button type="submit" :disabled="form.processing" class="w-full py-3 rounded-lg bg-blue-600 hover:bg-blue-500 disabled:opacity-50 text-white font-semibold text-xs transition-all shadow-md mt-2 flex items-center justify-center gap-2">
                    <span v-if="form.processing" class="animate-spin h-4 w-4 border-2 border-white border-t-transparent rounded-full"></span>
                    <span v-else>Request Administrative Clearance</span>
                </button>
            </form>

            <div class="border-t border-slate-900 pt-4 text-center">
                <p class="text-[10px] text-slate-500">
                    Already have a secure staff account? 
                    <Link :href="route('login')" class="text-blue-400 hover:underline focus:outline-none">Sign In</Link>
                </p>
            </div>
        </div>
    </div>
</template>