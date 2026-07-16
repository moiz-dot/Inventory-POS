<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import MarketingLayout from '@/Layouts/MarketingLayout.vue';

// Import Lucide Vue icons
import {
  ArrowRight,
  CheckCircle,
  ChevronRight,
  Package,
  Layers,
  Zap,
  Shield,
  TrendingUp,
  Database,
  ShoppingBag,
  Truck,
  BarChart3,
  Users,
  Globe,
  Lock,
  Award,
  MessageCircle,
  DollarSign,
  Box,
  ClipboardCheck,
  Warehouse,
  Store,
  FileCheck,
  Activity
} from 'lucide-vue-next';

const activeModuleIndex = ref(0);
const erpModules = [
    { 
        title: 'Global Inventory Sync', 
        subtitle: 'Real-time multi-warehouse Ledger', 
        desc: 'Synchronize item stock across hundreds of retail branches and custom depots instantly. Prevents inventory drift, phantom orders, and logistical latency.', 
        features: ['Automatic stock level re-balancing', 'RFID & Bluetooth sensor support', 'Pessimistic locking prevention'], 
        tag: 'LOGISTICS',
        icon: Globe
    },
    { 
        title: 'Ultra-low Latency POS', 
        subtitle: 'Dual Offline-First Architecture', 
        desc: 'An elegant web-based POS capable of continuous transactions during complete network failure. Auto-reconciles ledgers upon connection restoration.', 
        features: ['Embedded IndexedDB caching', 'Direct ESC/POS thermal printing', 'Multi-frequency barcode parsing'], 
        tag: 'SALES ENGINE',
        icon: ShoppingBag
    },
    { 
        title: 'Double-Entry Financial Ledger', 
        subtitle: 'Compliant auditing on autopilot', 
        desc: 'Every inventory shift, purchase order, and cashier checkout registers automatically on custom balanced sub-ledgers. Audit-ready with zero human mapping.', 
        features: ['Automated tax stream mapping', 'Live expense audit trail', 'Dynamic multi-currency support'], 
        tag: 'COMPLIANCE',
        icon: DollarSign
    }
];
const workflowSteps = [
    { step: '01', title: 'Intelligent Procurement', desc: 'Auto-generates purchase requisitions to suppliers based on velocity analytics and low-stock indicators.', icon: ClipboardCheck },
    { step: '02', title: 'Warehouse Ingestion', desc: 'Scan incoming batches with barcode readers. System reconciles bills of lading with purchase orders.', icon: Warehouse },
    { step: '03', title: 'Dynamic Allocation', desc: 'Calculates optimal stock quantities for specific retail branches using automated weather, local demand, and historic velocity models.', icon: BarChart3 },
    { step: '04', title: 'Secured Sale & Audit', desc: 'POS checkout updates global registers instantly, records sales metrics, logs taxes, and updates the double-entry accounting ledger.', icon: Store }
];
const testimonials = [
    { quote: "Before Aether, consolidated reconciliation across our 140 hypermarkets took 12 business days. Now, our CFO views true balance sheets in real-time. It completely saved our margins.", author: "Marcus Vane", role: "Chief Logistics Officer, Apex Retail Group", metrics: "Reconciliation time cut by 98%" },
    { quote: "The offline capability is bulletproof. During our central server migration, London Mayfair completed 4,000 POS transactions without internet. The background sync was flawless.", author: "Clarissa Finch", role: "VP of Retail IT, Mayfair Outfitters", metrics: "0 seconds of POS downtime" }
];

const statsData = [
    { label: 'Consolidated Sales Daily', value: '$84.2M+', icon: TrendingUp },
    { label: 'Active Warehouses Synced', value: '1,420+', icon: Warehouse },
    { label: 'POS Latency State', value: '< 12ms', icon: Zap },
    { label: 'Financial Audits Automated', value: '100%', icon: FileCheck }
];
</script>

<template>
    <MarketingLayout>
        <div class="space-y-32 py-12 overflow-hidden">
            <!-- HERO -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-8 relative">
                <div class="absolute -top-12 left-1/2 -translate-x-1/2 w-72 h-72 bg-blue-500/10 rounded-full blur-3xl pointer-events-none"></div>
                <div class="inline-flex items-center gap-2 bg-slate-900 border border-slate-800/80 px-3.5 py-1.5 rounded-full text-[11px] font-mono text-slate-300">
                    <span class="flex h-1.5 w-1.5 rounded-full bg-blue-400"></span>
                    <span>AETHER ENTERPRISE SUITE V4.2</span>
                    <span class="text-slate-600">|</span>
                    <span class="text-blue-400 font-semibold">RECONCILIATION ENGINE LIVE</span>
                </div>
                <h1 class="text-4xl sm:text-6xl lg:text-7xl font-bold font-display tracking-tight text-white max-w-5xl mx-auto leading-none">
                    The unified operating system for <span class="bg-gradient-to-r from-blue-400 via-indigo-400 to-emerald-400 bg-clip-text text-transparent">hyper-scale retail networks</span>
                </h1>
                <p class="text-slate-400 text-sm sm:text-base lg:text-lg max-w-3xl mx-auto leading-relaxed">
                    Forget disconnected POS setups and slow ERP databases. Aether consolidates inventory, multi-warehouse logistics, procurement cycles, global auditing, and custom sales POS channels into a single, high-speed, secure digital ledger.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center pt-4">
                    <Link :href="route('login')" class="w-full sm:w-auto px-8 py-4 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-medium text-sm hover:from-blue-500 hover:to-indigo-500 shadow-[0_0_20px_rgba(59,130,246,0.3)] hover:shadow-[0_0_30px_rgba(59,130,246,0.5)] transition-all flex items-center justify-center gap-2">
                        Access Core Demo Dashboard
                        <component :is="ArrowRight" class="w-4 h-4" />
                    </Link>
                    <Link :href="route('contact')" class="w-full sm:w-auto px-8 py-4 rounded-xl bg-slate-900 border border-slate-800 text-slate-300 font-medium text-sm hover:bg-slate-800/80 hover:text-white transition-all flex items-center justify-center gap-2">
                        <component :is="MessageCircle" class="w-4 h-4" />
                        Schedule Technical Assessment
                    </Link>
                </div>
                <div class="mt-16 relative rounded-2xl border border-slate-800/80 bg-slate-950/60 p-2 sm:p-4 shadow-2xl backdrop-blur-md max-w-5xl mx-auto group">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent opacity-30 z-10 rounded-2xl pointer-events-none" />
                    <div class="flex items-center justify-between px-3 py-2 border-b border-slate-900/60 text-slate-500 font-mono text-[10px]">
                        <div class="flex items-center gap-1.5">
                            <span class="w-2.5 h-2.5 rounded-full bg-slate-800 block"></span>
                            <span class="w-2.5 h-2.5 rounded-full bg-slate-800 block"></span>
                            <span class="w-2.5 h-2.5 rounded-full bg-slate-800 block"></span>
                        </div>
                        <span>https://core.aether.org/ledger/consolidation</span>
                        <span class="flex items-center gap-1">
                            <component :is="Shield" class="w-3.5 h-3.5 text-blue-500" />
                            SECURE SSL
                        </span>
                    </div>
                    <div class="aspect-[16/9] w-full bg-slate-950 flex flex-col justify-center items-center text-center p-8 relative overflow-hidden rounded-lg">
                        <div class="absolute inset-0 bg-[radial-gradient(ellipse_60%_60%_at_50%_50%,rgba(59,130,246,0.1),transparent_100%)]"></div>
                        <div class="relative z-10 max-w-md space-y-4">
                            <component :is="Package" class="w-12 h-12 text-blue-500 mx-auto animate-bounce" />
                            <h3 class="text-white font-display font-bold text-lg">Interactive Enterprise Dashboard Inside</h3>
                            <p class="text-xs text-slate-400">Witness real-time stock levels, multi-currency branch checkout rates, automated barcode generators, and supply chain audit trails.</p>
                            <Link :href="route('login')" class="inline-flex items-center gap-1.5 text-xs text-blue-400 font-semibold font-mono border border-blue-500/30 px-3.5 py-1.5 rounded-full hover:bg-blue-500/10 transition-all cursor-pointer">
                                DEPLOY LIVE PORTAL DEMO 
                                <component :is="ChevronRight" class="w-3.5 h-3.5" />
                            </Link>
                        </div>
                    </div>
                </div>
            </section>

            <!-- STATS -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
                    <div v-for="(st, i) in statsData" :key="i" class="bg-slate-900/40 border border-slate-900 p-6 rounded-2xl hover:border-slate-800 transition-all">
                        <div class="flex items-center gap-2 mb-2">
                            <component :is="st.icon" class="w-4 h-4 text-blue-400" />
                            <span class="text-3xl sm:text-4xl font-bold font-display text-white tracking-tight">{{ st.value }}</span>
                        </div>
                        <p class="text-xs text-slate-500 font-mono uppercase tracking-wide">{{ st.label }}</p>
                    </div>
                </div>
            </section>

            <!-- MODULES -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-12 gap-12 items-center">
                    <div class="lg:col-span-5 space-y-6">
                        <span class="text-xs font-mono font-bold text-blue-400 tracking-widest uppercase">PRODUCT CAPABILITIES</span>
                        <h2 class="text-3xl sm:text-5xl font-bold font-display text-white tracking-tight">A single platform built for operational supremacy</h2>
                        <p class="text-slate-400 text-sm leading-relaxed">Why bind your business to separate SaaS bills for POS, payroll, and warehouse logs? Aether merges these functions into one performant framework.</p>
                        <div class="space-y-4 pt-4">
                            <div v-for="(m, idx) in erpModules" :key="idx" @click="activeModuleIndex = idx" class="p-4 rounded-xl border cursor-pointer transition-all" :class="activeModuleIndex === idx ? 'bg-slate-900 border-blue-500/40 shadow-md' : 'border-slate-900 bg-transparent hover:bg-slate-900/30'">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center gap-2">
                                        <component :is="m.icon" class="w-4 h-4 text-blue-400" />
                                        <span class="text-xs font-semibold text-slate-200">{{ m.title }}</span>
                                    </div>
                                    <span class="text-[9px] font-mono bg-blue-500/10 text-blue-400 px-2 py-0.5 rounded-full">{{ m.tag }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="lg:col-span-7 bg-slate-900/30 border border-slate-800 rounded-2xl p-8 min-h-[350px] flex flex-col justify-between relative backdrop-blur-md">
                        <div class="absolute top-4 right-4 w-2 h-2 rounded-full bg-blue-500 animate-ping"></div>
                        <div class="space-y-4">
                            <span class="text-[10px] font-mono text-slate-500 uppercase tracking-widest">Selected Core Module</span>
                            <div class="flex items-center gap-2">
                                <component :is="erpModules[activeModuleIndex].icon" class="w-5 h-5 text-blue-400" />
                                <h3 class="text-2xl font-bold text-white font-display">{{ erpModules[activeModuleIndex].title }}</h3>
                            </div>
                            <p class="text-xs font-mono text-blue-400 -mt-1">{{ erpModules[activeModuleIndex].subtitle }}</p>
                            <p class="text-sm text-slate-300 leading-relaxed">{{ erpModules[activeModuleIndex].desc }}</p>
                        </div>
                        <div class="border-t border-slate-800/80 pt-6 mt-6 space-y-2">
                            <p class="text-xs font-semibold text-white">Highlighted Platform Standard:</p>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                                <div v-for="(feat, fIdx) in erpModules[activeModuleIndex].features" :key="fIdx" class="flex items-center gap-2 text-xs text-slate-400">
                                    <component :is="CheckCircle" class="w-4 h-4 text-emerald-400 flex-shrink-0" />
                                    <span>{{ feat }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- WORKFLOW -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center space-y-4 mb-16">
                    <span class="text-xs font-mono font-bold text-emerald-400 tracking-widest uppercase">THE INVENTORY FLOW</span>
                    <h2 class="text-3xl sm:text-5xl font-bold font-display text-white tracking-tight">How Aether orchestrates stock lifecycle</h2>
                    <p class="text-slate-400 text-sm max-w-2xl mx-auto">From manufacturing ingestion to the physical retail scan—track everything without database discrepancies.</p>
                </div>
                <div class="grid md:grid-cols-4 gap-6">
                    <div v-for="(wf, idx) in workflowSteps" :key="idx" class="bg-slate-900/20 border border-slate-900 p-6 rounded-2xl relative group hover:border-slate-800 transition-all">
                        <div class="flex items-start justify-between">
                            <component :is="wf.icon" class="w-5 h-5 text-blue-400 mb-3" />
                            <span class="text-5xl font-display font-extrabold text-slate-800 group-hover:text-blue-500/20 transition-colors select-none">{{ wf.step }}</span>
                        </div>
                        <h4 class="text-sm font-semibold text-white">{{ wf.title }}</h4>
                        <p class="text-xs text-slate-400 mt-2.5 leading-relaxed">{{ wf.desc }}</p>
                    </div>
                </div>
            </section>

            <!-- TESTIMONIALS -->
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid md:grid-cols-2 gap-8">
                    <div v-for="(test, idx) in testimonials" :key="idx" class="bg-slate-900/20 border border-slate-900/80 p-8 rounded-2xl flex flex-col justify-between relative backdrop-blur-sm">
                        <div class="flex items-start gap-2 mb-4">
                            <component :is="Award" class="w-5 h-5 text-emerald-400 flex-shrink-0 mt-0.5" />
                            <p class="text-slate-300 italic text-sm leading-relaxed">"{{ test.quote }}"</p>
                        </div>
                        <div class="flex justify-between items-center border-t border-slate-900 pt-6 mt-6">
                            <div>
                                <h5 class="text-xs font-semibold text-white">{{ test.author }}</h5>
                                <p class="text-[10px] font-mono text-slate-500 mt-0.5">{{ test.role }}</p>
                            </div>
                            <span class="text-[10px] font-mono bg-emerald-500/10 text-emerald-400 px-2.5 py-1 rounded-full font-bold">{{ test.metrics }}</span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- CTA -->
            <section class="max-w-5xl mx-auto px-4 text-center pb-20">
                <div class="bg-gradient-to-tr from-slate-950 via-slate-900 to-slate-950 border border-slate-800/80 rounded-3xl p-12 relative overflow-hidden">
                    <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(59,130,246,0.1),transparent_100%)] pointer-events-none"></div>
                    <div class="relative z-10 space-y-6">
                        <div class="flex items-center justify-center gap-2">
                            <component :is="Activity" class="w-6 h-6 text-blue-400" />
                            <h2 class="text-3xl sm:text-5xl font-bold font-display text-white">Upgrade to absolute ledger accuracy</h2>
                        </div>
                        <p class="text-slate-400 text-xs sm:text-sm max-w-xl mx-auto leading-relaxed">Contact our solutions desk for a complete migration plan from SAP, Netsuite, or legacy custom systems. Zero data loss guaranteed.</p>
                        <div class="pt-4 flex flex-col sm:flex-row gap-4 justify-center items-center">
                            <Link :href="route('login')" class="w-full sm:w-auto px-6 py-3 rounded-lg bg-white text-slate-950 text-xs font-semibold hover:bg-slate-200 transition-colors flex items-center gap-2">
                                <component :is="ArrowRight" class="w-4 h-4" />
                                Launch Live Portal
                            </Link>
                            <Link :href="route('contact')" class="w-full sm:w-auto px-6 py-3 rounded-lg bg-slate-950 border border-slate-800 text-slate-300 text-xs font-semibold hover:bg-slate-900 transition-colors flex items-center gap-2">
                                <component :is="MessageCircle" class="w-4 h-4" />
                                Inquire Enterprise Agreement
                            </Link>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </MarketingLayout>
</template>