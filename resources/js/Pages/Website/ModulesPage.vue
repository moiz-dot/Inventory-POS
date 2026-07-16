<script setup>
import MarketingLayout from '@/Layouts/MarketingLayout.vue';
import { Link } from '@inertiajs/vue3';

// Import Lucide Vue icons
import {
  Users,
  Truck,
  TrendingUp,
  DollarSign,
  Barcode,
  Warehouse,
  Layers,
  CheckCircle,
  Calendar,
  ShoppingCart,
  UserPlus,
  FileText,
  Printer,
  Shield,
  Zap,
  ArrowRight,
  BarChart3,
  Clock,
  Award
} from 'lucide-vue-next';

const mods = [
    { 
        title: 'HR & Staff Schedules', 
        desc: 'Manage shift scheduling, track employee checkout velocity, and log commissions on high-value sales.',
        icon: Users,
        color: 'from-blue-500 to-cyan-500',
        features: ['Shift scheduling', 'Checkout velocity', 'Commission logging']
    },
    { 
        title: 'Supplier Procurement Portal', 
        desc: 'Submit purchase requisitions, track outstanding supplier debts, and schedule bulk delivery slots.',
        icon: Truck,
        color: 'from-orange-500 to-amber-500',
        features: ['Purchase requisitions', 'Supplier debt tracking', 'Delivery scheduling']
    },
    { 
        title: 'CRM & Custom Tier Promos', 
        desc: 'Group customers by purchase history. Send targeted SMS promotions and record VIP points.',
        icon: UserPlus,
        color: 'from-purple-500 to-pink-500',
        features: ['Customer grouping', 'SMS promotions', 'VIP points system']
    },
    { 
        title: 'Double-Entry Ledger', 
        desc: 'Financial records mapped automatically. Tax streams, branch costs, and POS totals reconcile instantly.',
        icon: DollarSign,
        color: 'from-emerald-500 to-teal-500',
        features: ['Auto-mapped records', 'Tax stream tracking', 'Instant reconciliation']
    },
    { 
        title: 'Barcode Management Engine', 
        desc: 'Generate unique barcode patterns, print sticky inventory labels, and configure code-128 scanners.',
        icon: Barcode,
        color: 'from-indigo-500 to-purple-500',
        features: ['Barcode generation', 'Inventory labels', 'Scanner configuration']
    },
    { 
        title: 'Multi-Branch Inventory', 
        desc: 'Transfer stock between locations, optimize safety buffer margins, and receive automatic alerts.',
        icon: Warehouse,
        color: 'from-rose-500 to-red-500',
        features: ['Stock transfers', 'Buffer optimization', 'Automated alerts']
    }
];

const moduleStats = [
    { label: 'Integrated Modules', value: '12+', icon: Layers },
    { label: 'Active Deployments', value: '1,800+', icon: BarChart3 },
    { label: 'Uptime Guarantee', value: '99.99%', icon: Shield }
];

// Helper to get gradient color for stats
const getStatGradient = (index) => {
  const gradients = [
    'from-blue-500 to-cyan-500',
    'from-emerald-500 to-teal-500',
    'from-purple-500 to-pink-500'
  ];
  return gradients[index % gradients.length];
};
</script>

<template>
    <MarketingLayout>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 space-y-16">
            <!-- Header -->
            <div class="text-center max-w-2xl mx-auto space-y-4">
                <div class="inline-flex items-center gap-2 bg-slate-900/50 border border-slate-800/80 px-4 py-2 rounded-full">
                    <component :is="Layers" class="w-4 h-4 text-indigo-400" />
                    <span class="text-xs font-mono font-bold text-indigo-400 tracking-widest uppercase">MODULAR CONSOLIDATION</span>
                </div>
                <h1 class="text-4xl font-bold font-display text-white tracking-tight">Our ERP Modules</h1>
                <div class="flex items-center justify-center gap-2">
                    <component :is="Zap" class="w-5 h-5 text-indigo-400" />
                    <p class="text-slate-400 text-sm">Aether eliminates third-party application bills by delivering an integrated, native corporate back-office ecosystem.</p>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div v-for="(stat, idx) in moduleStats" :key="idx" class="group bg-slate-900/20 border border-slate-800/80 p-6 rounded-2xl text-center hover:border-slate-700/80 transition-all relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-r opacity-0 group-hover:opacity-5 transition-opacity" :class="getStatGradient(idx)"></div>
                    <div class="relative flex items-center justify-center gap-2 mb-2">
                        <component :is="stat.icon" class="w-5 h-5 text-indigo-400" />
                        <span class="text-2xl font-bold font-display text-white">{{ stat.value }}</span>
                    </div>
                    <p class="text-[10px] font-mono text-slate-500 uppercase tracking-wide">{{ stat.label }}</p>
                </div>
            </div>

            <!-- Modules Grid -->
            <div class="grid md:grid-cols-3 gap-6 pt-6">
                <div v-for="(mod, i) in mods" :key="i" class="group bg-slate-900/40 border border-slate-800/80 p-6 rounded-xl space-y-3 hover:bg-slate-900/60 hover:border-slate-700/80 transition-all relative overflow-hidden">
                    <!-- Background glow -->
                    <div class="absolute -inset-1 bg-gradient-to-r opacity-0 group-hover:opacity-10 blur-2xl transition-opacity" :class="mod.color"></div>
                    
                    <div class="relative flex items-start justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-lg bg-gradient-to-br flex items-center justify-center shadow-lg" :class="mod.color">
                                <component :is="mod.icon" class="w-4 h-4 text-white" />
                            </div>
                            <h4 class="text-sm font-semibold text-white group-hover:text-blue-200 transition-colors">{{ mod.title }}</h4>
                        </div>
                        <span class="text-[8px] font-mono bg-indigo-500/10 text-indigo-400 px-2 py-0.5 rounded-full font-semibold">v4.2</span>
                    </div>
                    
                    <div class="relative">
                        <p class="text-xs text-slate-400 leading-relaxed group-hover:text-slate-300 transition-colors">{{ mod.desc }}</p>
                    </div>
                    
                    <!-- Feature tags -->
                    <div class="relative flex flex-wrap gap-1.5 pt-1">
                        <span v-for="(feature, fIdx) in mod.features" :key="fIdx" class="inline-flex items-center gap-1 bg-slate-800/50 px-2 py-0.5 rounded-full text-[8px] font-mono text-slate-400">
                            <component :is="CheckCircle" class="w-2 h-2 text-emerald-400" />
                            {{ feature }}
                        </span>
                    </div>
                    
                    <!-- Bottom accent line -->
                    <div class="relative h-0.5 w-8 bg-gradient-to-r rounded-full opacity-60 group-hover:w-full transition-all duration-300" :class="mod.color"></div>
                </div>
            </div>

            <!-- Module Ecosystem CTA -->
            <div class="bg-gradient-to-r from-slate-950 via-slate-900 to-slate-950 border border-slate-800/80 rounded-2xl p-8 text-center max-w-4xl mx-auto relative overflow-hidden">
                <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,rgba(99,102,241,0.05),transparent_70%)] pointer-events-none"></div>
                <div class="relative space-y-4">
                    <div class="flex items-center justify-center gap-3">
                        <component :is="Award" class="w-5 h-5 text-indigo-400" />
                        <h3 class="text-lg font-bold text-white">All Modules. One Platform.</h3>
                    </div>
                    <p class="text-xs text-slate-400 max-w-xl mx-auto">Every module is fully integrated, sharing data seamlessly across departments. No more separate logins, data silos, or manual reconciliation.</p>
                    <div class="flex flex-wrap justify-center gap-4 text-xs font-mono text-slate-500 pt-2">
                        <span class="flex items-center gap-1.5">
                            <component :is="CheckCircle" class="w-3 h-3 text-emerald-400" />
                            Unified database
                        </span>
                        <span class="flex items-center gap-1.5">
                            <component :is="CheckCircle" class="w-3 h-3 text-emerald-400" />
                            Single sign-on
                        </span>
                        <span class="flex items-center gap-1.5">
                            <component :is="CheckCircle" class="w-3 h-3 text-emerald-400" />
                            Real-time sync
                        </span>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-3 justify-center pt-2">
                        <Link :href="route('features')" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-indigo-600 text-white text-xs font-semibold rounded-lg hover:bg-indigo-500 transition-colors">
                            <component :is="Layers" class="w-4 h-4" />
                            Explore All Modules
                        </Link>
                        <Link :href="route('contact')" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-slate-900/80 border border-slate-800 text-slate-300 text-xs font-semibold rounded-lg hover:bg-slate-800 transition-colors">
                            <component :is="Calendar" class="w-4 h-4" />
                            Schedule Demo
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </MarketingLayout>
</template>