<script setup>
import { computed } from 'vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    status: String,
});

const form = useForm({});

const submit = () => {
    form.post(route('verification.send'));
};

const verificationLinkSent = computed(() => props.status === 'verification-link-sent');
</script>

<template>
    <Head title="Email Verification" />

    <div class="min-h-screen bg-slate-950 flex items-center justify-center py-12 px-4 sm:px-6 relative overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_80%_80%_at_50%_-20%,rgba(59,130,246,0.15),rgba(255,255,255,0))] pointer-events-none z-0" />

        <div class="max-w-md w-full space-y-6 bg-slate-900/30 border border-slate-900 p-8 rounded-2xl relative z-10 backdrop-blur-md">
            <div class="text-center space-y-2">
                <h2 class="text-2xl font-bold text-white tracking-tight">Security Code Challenge</h2>
                <p class="text-[10px] font-mono text-slate-500 uppercase tracking-widest">VERIFY CORPORATE MAILBOX</p>
            </div>

            <div class="mb-4 text-xs text-slate-400 leading-relaxed text-center">
                Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
            </div>

            <div v-if="verificationLinkSent" class="mb-4 font-medium text-xs text-emerald-400 bg-emerald-500/10 border border-emerald-500/20 p-3 rounded-lg text-center">
                A new verification link has been sent to the email address you provided.
            </div>

            <form @submit.prevent="submit" class="space-y-4">
                <button type="submit" :disabled="form.processing" class="w-full py-3 rounded bg-blue-600 hover:bg-blue-500 disabled:opacity-50 text-white font-semibold text-xs flex items-center justify-center gap-2">
                    <span v-if="form.processing" class="animate-spin h-4 w-4 border-2 border-white border-t-transparent rounded-full"></span>
                    <span v-else>Resend Verification Email</span>
                </button>
            </form>

            <div class="border-t border-slate-900 pt-4 flex flex-col sm:flex-row justify-between items-center gap-4 text-xs">
                <Link :href="route('profile.show')" class="text-slate-400 hover:text-white font-mono">Edit Profile</Link>
                <Link :href="route('logout')" method="post" as="button" class="text-red-400 hover:text-red-300 font-mono">Log Out</Link>
            </div>
        </div>
    </div>
</template>