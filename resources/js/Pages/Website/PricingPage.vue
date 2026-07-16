<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import MarketingLayout from '@/Layouts/MarketingLayout.vue';

// Import Lucide Vue icons
import {
  CheckCircle,
  Layers,
  DollarSign,
  Shield,
  Zap,
  Warehouse,
  Printer,
  FileText,
  TrendingUp,
  Users,
  Calendar,
  Clock,
  Server,
  Lock,
  Database,
  ArrowRight,
  Gift,
  Award,
  Briefcase,
  Building2,
  Crown
} from 'lucide-vue-next';

const isAnnual = ref(true);
const licenseCount = ref(5);
const plans = [
    { 
        name: 'Starter License', 
        price: isAnnual.value ? 120 : 150, 
        desc: 'Ideal for single-branch stores requiring absolute inventory sync.', 
        features: ['Up to 2 Warehouses', 'Low-latency POS channel', 'Offline Local DB caching', 'Standard Barcode parsing'],
        icon: Briefcase,
        color: 'from-blue-500 to-cyan-500',
        badge: null
    },
    { 
        name: 'Enterprise Growth', 
        price: isAnnual.value ? 280 : 350, 
        desc: 'Perfect for fast-growing multi-branch networks and distribution centers.', 
        features: ['Unlimited Warehouses', 'WebUSB Printer binding', 'Double-Entry Balance Sheets', 'Automated purchase cycle requests', 'Prioritized 24/7 Support Desk'],
        icon: Crown,
        color: 'from-purple-500 to-pink-500',
        badge: 'RECOMMENDED'
    },
    { 
        name: 'Sovereign Cloud', 
        price: 'Custom SLA', 
        desc: 'Tailored for national grocery networks and global logistics franchises.', 
        features: ['Custom on-premise deployments', 'Dedicated Solutions engineer', 'Immutable security audit logging', 'Custom ETL migration pipelines', '99.99% Guaranteed Service SLA'],
        icon: Server,
        color: 'from-emerald-500 to-teal-500',
        badge: 'ENTERPRISE'
    }
];

const addons = [
    { name: 'Premium Support', desc: '24/7 dedicated account manager', price: '+$50/mo' },
    { name: 'Advanced Analytics', desc: 'AI-powered forecasting tools', price: '+$75/mo' },
    { name: 'Custom Integrations', desc: 'API access & custom connectors', price: 'Contact sales' }
];
</script>

<template>
    <MarketingLayout>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 space-y-16">
            <!-- Header -->
            <div class="text-center max-w-3xl mx-auto space-y-4">
                <div class="inline-flex items-center gap-2 bg-slate-900/50 border border-slate-800/80 px-4 py-2 rounded-full">
                    <component :is="DollarSign" class="w-4 h-4 text-blue-400" />
                    <span class="text-xs font-mono font-bold text-blue-400 tracking-widest uppercase">LICENSING MODEL</span>
                </div>
                <h1 class="text-4xl sm:text-6xl font-bold font-display text-white tracking-tight font-sans">Transparent Licensing</h1>
                <div class="flex items-center justify-center gap-2">
                    <component :is="Shield" class="w-5 h-5 text-blue-400" />
                    <p class="text-slate-400 text-sm">Secure, stable operational costs without hidden usage caps. No surcharge fees on high checkout volume.</p>
                </div>
                
                <!-- Toggle -->
                <div class="flex justify-center items-center gap-3 pt-6">
                    <span class="text-xs font-mono" :class="!isAnnual ? 'text-white' : 'text-slate-500'">Monthly Billing</span>
                    <button @click="isAnnual = !isAnnual" class="w-12 h-6 bg-blue-600 rounded-full relative p-1 transition-colors focus:outline-none">
                        <div class="w-4 h-4 bg-white rounded-full transition-transform" :class="isAnnual ? 'translate-x-6' : 'translate-x-0'"></div>
                    </button>
                    <span class="text-xs font-mono" :class="isAnnual ? 'text-white' : 'text-slate-500'">Annual Billing <span class="text-emerald-400 font-bold ml-1">Save 20%</span></span>
                </div>
            </div>

            <!-- Branch Estimator -->
            <div class="bg-slate-900/30 border border-slate-800/80 p-6 rounded-2xl max-w-xl mx-auto text-center space-y-4 relative overflow-hidden">
                <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,rgba(59,130,246,0.03),transparent_70%)] pointer-events-none"></div>
                <div class="relative flex items-center justify-center gap-2">
                    <component :is="Building2" class="w-4 h-4 text-blue-400" />
                    <h4 class="text-xs font-semibold text-slate-300 font-mono">ESTIMATE ACTIVE RETAIL BRANCHES</h4>
                </div>
                <div class="relative flex justify-between items-center font-mono text-xs text-slate-500">
                    <span>1 Branch</span>
                    <span class="text-blue-400 font-bold text-sm flex items-center gap-1.5">
                        <component :is="Store" class="w-3 h-3" />
                        {{ licenseCount }} branches active
                    </span>
                    <span>50+ Branches</span>
                </div>
                <input type="range" min="1" max="50" v-model="licenseCount" class="relative w-full accent-blue-500 h-1.5 bg-slate-800 rounded-lg appearance-none cursor-pointer" />
                <p class="relative text-[10px] text-slate-500 flex items-center justify-center gap-1.5">
                    <component :is="Zap" class="w-3 h-3 text-blue-400" />
                    Scaling infrastructure coordinates dynamically as you add active branches to the centralized ledger.
                </p>
            </div>

            <!-- Plans Grid -->
            <div class="grid md:grid-cols-3 gap-8 pt-8">
                <div v-for="(p, idx) in plans" :key="idx" class="relative bg-slate-900/20 border rounded-2xl p-8 flex flex-col justify-between hover:border-slate-700 transition-all group" :class="idx === 1 ? 'border-blue-500/40 shadow-xl shadow-blue-500/5' : 'border-slate-800/80'">
                    <!-- Badge -->
                    <span v-if="p.badge" class="absolute top-0 right-8 -translate-y-1/2 bg-gradient-to-r px-4 py-1 rounded-full text-white font-mono text-[9px] font-bold uppercase tracking-wider shadow-lg" :class="idx === 1 ? 'from-blue-600 to-indigo-600' : 'from-emerald-600 to-teal-600'">
                        <component :is="Award" class="w-3 h-3 inline mr-1" />
                        {{ p.badge }}
                    </span>

                    <div class="space-y-6">
                        <div>
                            <div class="flex items-center gap-2 mb-2">
                                <div class="w-8 h-8 rounded-lg bg-gradient-to-br flex items-center justify-center shadow-lg" :class="p.color">
                                    <component :is="p.icon" class="w-4 h-4 text-white" />
                                </div>
                                <h3 class="text-sm font-semibold text-white uppercase font-mono tracking-wider">{{ p.name }}</h3>
                            </div>
                            <p class="text-xs text-slate-400 leading-normal min-h-[40px]">{{ p.desc }}</p>
                        </div>
                        
                        <div class="border-t border-slate-800/80 pt-6">
                            <p v-if="typeof p.price === 'number'" class="text-3xl font-bold font-display text-white tracking-tight">
                                ${{ p.price }} 
                                <span class="text-xs font-normal text-slate-500 font-mono">/ branch / mo</span>
                            </p>
                            <p v-else class="text-2xl font-bold font-display text-white tracking-tight flex items-center gap-2">
                                <component :is="Server" class="w-5 h-5 text-emerald-400" />
                                {{ p.price }}
                            </p>
                        </div>
                        
                        <div class="border-t border-slate-800/80 pt-6 space-y-3">
                            <p class="text-[10px] font-mono text-slate-500 uppercase tracking-widest font-semibold flex items-center gap-2">
                                <component :is="CheckCircle" class="w-3 h-3 text-emerald-400" />
                                FEATURES INCLUDED:
                            </p>
                            <div v-for="(f, fIdx) in p.features" :key="fIdx" class="flex items-center gap-2 text-xs text-slate-400 group-hover:text-slate-300 transition-colors">
                                <component :is="CheckCircle" class="w-3.5 h-3.5 text-emerald-400 flex-shrink-0" />
                                <span>{{ f }}</span>
                            </div>
                        </div>
                    </div>
                    
                    <Link :href="route('login')" class="w-full text-center py-3 rounded-lg text-xs font-semibold mt-8 transition-colors flex items-center justify-center gap-2" :class="idx === 1 ? 'bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white shadow-md' : 'bg-slate-950 hover:bg-slate-900 text-slate-300'">
                        <component :is="ArrowRight" class="w-3.5 h-3.5" />
                        Request Access License
                    </Link>
                </div>
            </div>

            <!-- Add-ons Section -->
            <div class="bg-slate-900/20 border border-slate-800/80 rounded-2xl p-8 max-w-4xl mx-auto">
                <div class="flex items-center justify-center gap-2 mb-6">
                    <component :is="Gift" class="w-5 h-5 text-blue-400" />
                    <h3 class="text-lg font-bold text-white font-display">Available Add-ons</h3>
                </div>
                <div class="grid md:grid-cols-3 gap-4">
                    <div v-for="(addon, idx) in addons" :key="idx" class="bg-slate-950/50 border border-slate-800/60 p-4 rounded-xl text-center group hover:border-slate-700/80 transition-all">
                        <div class="flex items-center justify-center gap-2 mb-1">
                            <component :is="addon.name === 'Premium Support' ? Shield : addon.name === 'Advanced Analytics' ? TrendingUp : Database" class="w-4 h-4 text-blue-400" />
                            <h4 class="text-xs font-semibold text-white">{{ addon.name }}</h4>
                        </div>
                        <p class="text-[10px] text-slate-400">{{ addon.desc }}</p>
                        <span class="text-xs font-bold text-blue-400 block mt-2">{{ addon.price }}</span>
                    </div>
                </div>
            </div>

            <!-- FAQ CTA -->
            <div class="text-center max-w-2xl mx-auto space-y-4 pt-4">
                <div class="flex items-center justify-center gap-2">
                    <component :is="Clock" class="w-5 h-5 text-slate-400" />
                    <p class="text-xs text-slate-400">Need a custom quote or have questions about volume licensing?</p>
                </div>
                <Link :href="route('contact')" class="inline-flex items-center gap-2 px-6 py-2.5 bg-slate-950 border border-slate-800 text-slate-300 text-xs font-semibold rounded-lg hover:bg-slate-900 transition-colors">
                    <component :is="Users" class="w-4 h-4" />
                    Contact Enterprise Sales
                </Link>
            </div>
        </div>
    </MarketingLayout>
</template>