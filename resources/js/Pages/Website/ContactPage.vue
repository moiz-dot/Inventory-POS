<script setup>
import { ref, reactive } from 'vue';
import MarketingLayout from '@/Layouts/MarketingLayout.vue';
import { Link } from '@inertiajs/vue3';

// Import Lucide Vue icons
import {
  Mail,
  Phone,
  Building2,
  CheckCircle,
  Send,
  Users,
  MapPin,
  Globe,
  Clock,
  Shield,
  MessageCircle,
  ArrowRight,
  Zap,
  Briefcase,
  Headphones,
  Calendar,
  Award
} from 'lucide-vue-next';

const formState = reactive({ name: '', email: '', company: '', message: '' });
const submitted = ref(false);

const handleSubmit = (e) => {
    e.preventDefault();
    if (!formState.name || !formState.email) return;
    submitted.value = true;
    formState.name = ''; 
    formState.email = ''; 
    formState.company = ''; 
    formState.message = '';
};

const contactInfo = [
    { icon: Mail, label: 'Email', value: 'solutions@aether-erp.com', link: 'mailto:solutions@aether-erp.com' },
    { icon: Phone, label: 'Phone', value: '+1 (800) 555-AETHER (2384)', link: 'tel:+18005552384' },
    { icon: Building2, label: 'Headquarters', value: 'One World Trade, NY', link: null }
];

const officeHours = [
    { day: 'Monday - Friday', hours: '9:00 AM - 8:00 PM EST' },
    { day: 'Saturday', hours: '10:00 AM - 4:00 PM EST' },
    { day: 'Sunday', hours: 'Emergency support only' }
];
</script>

<template>
    <MarketingLayout>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 space-y-16">
            <!-- Header -->
            <div class="text-center max-w-2xl mx-auto space-y-4">
                <div class="inline-flex items-center gap-2 bg-slate-900/50 border border-slate-800/80 px-4 py-2 rounded-full">
                    <component :is="MessageCircle" class="w-4 h-4 text-indigo-400" />
                    <span class="text-xs font-mono font-bold text-indigo-400 tracking-widest uppercase">SALES & DEPLOYMENT DESK</span>
                </div>
                <h1 class="text-4xl font-bold font-display text-white tracking-tight">Initiate Operational Migration</h1>
                <div class="flex items-center justify-center gap-2">
                    <component :is="Zap" class="w-5 h-5 text-indigo-400" />
                    <p class="text-slate-400 text-sm">Discuss migration blueprints, custom warehouse API integrations, or requesting an enterprise SLA pilot license.</p>
                </div>
            </div>

            <!-- Contact Grid -->
            <div class="grid lg:grid-cols-12 gap-12 pt-6 items-start">
                <!-- Left Column - Contact Info -->
                <div class="lg:col-span-5 space-y-8">
                    <!-- Contact Cards -->
                    <div class="bg-slate-900/30 border border-slate-800/80 p-6 rounded-2xl space-y-6">
                        <div class="flex items-center gap-2">
                            <component :is="Headphones" class="w-4 h-4 text-indigo-400" />
                            <h3 class="text-sm font-semibold text-white font-sans">Corporate Contacts</h3>
                        </div>
                        
                        <div class="space-y-4 text-xs font-mono text-slate-400">
                            <div v-for="(info, idx) in contactInfo" :key="idx" class="flex items-center gap-3 group hover:text-slate-300 transition-colors">
                                <component :is="info.icon" class="w-4 h-4 text-indigo-400 flex-shrink-0" />
                                <span v-if="info.link" class="hover:text-blue-400 transition-colors">
                                    <a :href="info.link" class="hover:underline">{{ info.value }}</a>
                                </span>
                                <span v-else>{{ info.value }}</span>
                            </div>
                        </div>

                        <!-- Office Hours -->
                        <div class="border-t border-slate-800/60 pt-4 mt-2">
                            <div class="flex items-center gap-2 mb-3">
                                <component :is="Clock" class="w-3.5 h-3.5 text-blue-400" />
                                <span class="text-[10px] font-mono text-slate-500 uppercase tracking-wide">Office Hours</span>
                            </div>
                            <div class="space-y-1.5">
                                <div v-for="(hours, idx) in officeHours" :key="idx" class="flex justify-between text-[10px]">
                                    <span class="text-slate-500">{{ hours.day }}</span>
                                    <span class="text-slate-400">{{ hours.hours }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Contact Options -->
                    <div class="bg-slate-900/20 border border-slate-800/80 p-5 rounded-2xl">
                        <div class="flex items-center gap-2 mb-3">
                            <component :is="Shield" class="w-4 h-4 text-emerald-400" />
                            <span class="text-[10px] font-mono text-slate-500 uppercase tracking-wide">Priority Support</span>
                        </div>
                        <div class="flex flex-col gap-2">
                            <Link :href="route('login')" class="flex items-center justify-between text-xs text-slate-400 hover:text-white transition-colors p-2 rounded-lg hover:bg-slate-900/30 group">
                                <span class="flex items-center gap-2">
                                    <component :is="Users" class="w-3.5 h-3.5 text-blue-400" />
                                    Enterprise Support Portal
                                </span>
                                <component :is="ArrowRight" class="w-3 h-3 text-slate-600 group-hover:text-blue-400 transition-colors" />
                            </Link>
                            <Link :href="route('features')" class="flex items-center justify-between text-xs text-slate-400 hover:text-white transition-colors p-2 rounded-lg hover:bg-slate-900/30 group">
                                <span class="flex items-center gap-2">
                                    <component :is="Briefcase" class="w-3.5 h-3.5 text-indigo-400" />
                                    Request Sales Demo
                                </span>
                                <component :is="Calendar" class="w-3 h-3 text-slate-600 group-hover:text-indigo-400 transition-colors" />
                            </Link>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Form -->
                <div class="lg:col-span-7 bg-slate-900/20 border border-slate-800/80 p-8 rounded-3xl relative backdrop-blur-md">
                    <!-- Success State -->
                    <div v-if="submitted" class="text-center py-12 space-y-4">
                        <div class="w-14 h-14 rounded-full bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center text-emerald-400 mx-auto">
                            <component :is="CheckCircle" class="w-7 h-7" />
                        </div>
                        <h3 class="text-lg font-bold text-white font-display">Technical Request Filed</h3>
                        <p class="text-xs text-slate-400 max-w-sm mx-auto leading-relaxed">Thank you. Your corporate inquiry has been indexed. An integration engineer will contact you shortly.</p>
                        <div class="flex items-center justify-center gap-2 text-[10px] text-slate-500 font-mono">
                            <component :is="Award" class="w-3.5 h-3.5 text-emerald-400" />
                            <span>Response time: < 24 hours</span>
                        </div>
                        <button @click="submitted = false" class="text-xs font-mono text-blue-400 hover:underline flex items-center gap-1 mx-auto">
                            <component :is="ArrowRight" class="w-3 h-3" />
                            Submit another inquiry
                        </button>
                    </div>

                    <!-- Form -->
                    <form v-else @submit="handleSubmit" class="space-y-6">
                        <div class="grid sm:grid-cols-2 gap-6">
                            <div class="space-y-1.5">
                                <label class="text-[10px] font-mono text-slate-500 uppercase flex items-center gap-1">
                                    Your Name <span class="text-red-400">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    required 
                                    v-model="formState.name" 
                                    class="w-full bg-slate-950 border border-slate-800/80 focus:border-blue-500/40 focus:ring-1 focus:ring-blue-500/20 rounded-lg p-3 text-xs text-slate-200 outline-none transition-all" 
                                    placeholder="Marcus Vane" 
                                />
                            </div>
                            <div class="space-y-1.5">
                                <label class="text-[10px] font-mono text-slate-500 uppercase flex items-center gap-1">
                                    Business Email <span class="text-red-400">*</span>
                                </label>
                                <input 
                                    type="email" 
                                    required 
                                    v-model="formState.email" 
                                    class="w-full bg-slate-950 border border-slate-800/80 focus:border-blue-500/40 focus:ring-1 focus:ring-blue-500/20 rounded-lg p-3 text-xs text-slate-200 outline-none transition-all" 
                                    placeholder="marcus@company.com" 
                                />
                            </div>
                        </div>
                        
                        <div class="space-y-1.5">
                            <label class="text-[10px] font-mono text-slate-500 uppercase flex items-center gap-1">
                                <component :is="Building2" class="w-3 h-3" />
                                Enterprise / Company
                            </label>
                            <input 
                                type="text" 
                                v-model="formState.company" 
                                class="w-full bg-slate-950 border border-slate-800/80 focus:border-blue-500/40 focus:ring-1 focus:ring-blue-500/20 rounded-lg p-3 text-xs text-slate-200 outline-none transition-all" 
                                placeholder="Apex Retail Group Inc." 
                            />
                        </div>
                        
                        <div class="space-y-1.5">
                            <label class="text-[10px] font-mono text-slate-500 uppercase flex items-center gap-1">
                                <component :is="Globe" class="w-3 h-3" />
                                Describe Your Branches & Scale
                            </label>
                            <textarea 
                                rows="4" 
                                v-model="formState.message" 
                                class="w-full bg-slate-950 border border-slate-800/80 focus:border-blue-500/40 focus:ring-1 focus:ring-blue-500/20 rounded-lg p-3 text-xs text-slate-200 outline-none resize-none transition-all" 
                                placeholder="We coordinate 45 large apparel outlets..."
                            ></textarea>
                        </div>
                        
                        <button type="submit" class="w-full py-3.5 rounded-lg bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white font-medium text-xs shadow-md transition-all flex items-center justify-center gap-2 group">
                            <component :is="Send" class="w-4 h-4 group-hover:translate-x-1 transition-transform" />
                            Transmit Technical Inquiry
                        </button>
                    </form>
                </div>
            </div>

            <!-- Bottom CTA -->
            <div class="text-center max-w-2xl mx-auto border-t border-slate-800/60 pt-10">
                <div class="flex items-center justify-center gap-2">
                    <component :is="Mail" class="w-4 h-4 text-slate-500" />
                    <p class="text-xs text-slate-500">Prefer a direct call? Our technical sales team is available during business hours.</p>
                </div>
                <div class="flex flex-wrap justify-center gap-4 mt-4 text-xs font-mono text-slate-500">
                    <span class="flex items-center gap-1.5">
                        <component :is="CheckCircle" class="w-3 h-3 text-emerald-400" />
                        Enterprise SLA available
                    </span>
                    <span class="flex items-center gap-1.5">
                        <component :is="CheckCircle" class="w-3 h-3 text-emerald-400" />
                        Custom deployments
                    </span>
                    <span class="flex items-center gap-1.5">
                        <component :is="CheckCircle" class="w-3 h-3 text-emerald-400" />
                        Migration support
                    </span>
                </div>
            </div>
        </div>
    </MarketingLayout>
</template>