<script setup>
import MarketingLayout from '@/Layouts/MarketingLayout.vue';
import { Link } from '@inertiajs/vue3';

// Import Lucide Vue icons
import {
  ShoppingBag,
  Package,
  Truck,
  Smartphone,
  FlaskRound,
  Store,
  Layers,
  CheckCircle,
  TrendingUp,
  Users,
  Globe,
  Zap,
  Shield,
  ArrowRight,
  Building2,
  Wheat,
  Shirt,
  Boxes,
  Cpu,
  Droplet
} from 'lucide-vue-next';

const sectors = [
    { 
        name: 'Grocery Stores & Supermarkets', 
        metrics: 'Automatic weigh scale parsing, fresh-produce inventory tracking, batch expiry date safety indicators.',
        icon: Wheat,
        color: 'from-emerald-500 to-teal-500',
        features: ['Weight scale parsing', 'Fresh produce tracking', 'Expiry date indicators']
    },
    { 
        name: 'Apparel & Costume Franchises', 
        metrics: 'Granular Matrix variant logs tracking product items by individual colors, chest sizes, and fabric materials.',
        icon: Shirt,
        color: 'from-purple-500 to-pink-500',
        features: ['Matrix variant logs', 'Color & size tracking', 'Fabric material logs']
    },
    { 
        name: 'Wholesale & Distributors', 
        metrics: 'Pallet configurations, custom multi-tier client wholesale price charts, supplier procurement lead trackers.',
        icon: Boxes,
        color: 'from-orange-500 to-amber-500',
        features: ['Pallet configurations', 'Multi-tier pricing', 'Supplier lead tracking']
    },
    { 
        name: 'Electronics & Mobile Shops', 
        metrics: 'Track warranty details, unique device IMEI identification markers, and individual serial codes.',
        icon: Cpu,
        color: 'from-blue-500 to-cyan-500',
        features: ['Warranty tracking', 'IMEI identification', 'Serial code management']
    },
    { 
        name: 'Cosmetic & Chemical Stores', 
        metrics: 'Prescription/batch ingredient monitoring, safety labels, batch tracking, and fluid unit conversions.',
        icon: Droplet,
        color: 'from-rose-500 to-red-500',
        features: ['Batch ingredient monitoring', 'Safety labels', 'Fluid unit conversions']
    }
];

const industryStats = [
    { label: 'Supported Sectors', value: '12+', icon: Building2 },
    { label: 'Active Retailers', value: '2,800+', icon: Store },
    { label: 'Global Coverage', value: '48+', icon: Globe }
];
</script>

<template>
    <MarketingLayout>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 space-y-16">
            <!-- Header -->
            <div class="text-center max-w-3xl mx-auto space-y-4">
                <div class="inline-flex items-center gap-2 bg-slate-900/50 border border-slate-800/80 px-4 py-2 rounded-full">
                    <component :is="Layers" class="w-4 h-4 text-emerald-400" />
                    <span class="text-xs font-mono font-bold text-emerald-400 tracking-widest uppercase">VERTICAL INTEGRATIONS</span>
                </div>
                <h1 class="text-4xl sm:text-5xl font-bold font-display text-white tracking-tight">Supported Retail Industries</h1>
                <div class="flex items-center justify-center gap-2">
                    <component :is="Store" class="w-5 h-5 text-emerald-400" />
                    <p class="text-slate-400 text-sm">Aether is fine-tuned to accommodate specialized workflows of diverse retail setups.</p>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div v-for="(stat, idx) in industryStats" :key="idx" class="bg-slate-900/20 border border-slate-800/80 p-5 rounded-2xl text-center group hover:border-slate-700/80 transition-all">
                    <div class="flex items-center justify-center gap-2 mb-2">
                        <component :is="stat.icon" class="w-5 h-5 text-emerald-400" />
                        <span class="text-2xl font-bold font-display text-white">{{ stat.value }}</span>
                    </div>
                    <p class="text-[10px] font-mono text-slate-500 uppercase tracking-wide">{{ stat.label }}</p>
                </div>
            </div>

            <!-- Industry Sectors Grid -->
            <div class="grid md:grid-cols-2 gap-6 pt-6">
                <div v-for="(sec, i) in sectors" :key="i" class="group bg-slate-900/30 border border-slate-800/80 p-6 rounded-2xl space-y-3 hover:border-slate-700/80 hover:bg-slate-900/50 transition-all relative overflow-hidden">
                    <!-- Background glow -->
                    <div class="absolute -inset-1 bg-gradient-to-r opacity-0 group-hover:opacity-10 blur-2xl transition-opacity" :class="sec.color"></div>
                    
                    <div class="relative flex justify-between items-start">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-gradient-to-br flex items-center justify-center shadow-lg" :class="sec.color">
                                <component :is="sec.icon" class="w-5 h-5 text-white" />
                            </div>
                            <div>
                                <h3 class="text-sm font-semibold text-slate-200 group-hover:text-white transition-colors">{{ sec.name }}</h3>
                                <div class="flex items-center gap-1 mt-0.5">
                                    <component :is="CheckCircle" class="w-2.5 h-2.5 text-emerald-400" />
                                    <span class="text-[9px] font-mono text-emerald-400 font-semibold">OPTIMIZED</span>
                                </div>
                            </div>
                        </div>
                        <component :is="ArrowRight" class="w-4 h-4 text-slate-600 group-hover:text-emerald-400 transition-colors" />
                    </div>
                    
                    <div class="relative space-y-3">
                        <p class="text-xs text-slate-400 leading-relaxed group-hover:text-slate-300 transition-colors">{{ sec.metrics }}</p>
                        
                        <!-- Feature tags -->
                        <div class="flex flex-wrap gap-1.5">
                            <span v-for="(feature, fIdx) in sec.features" :key="fIdx" class="inline-flex items-center gap-1 bg-slate-800/50 px-2 py-0.5 rounded-full text-[8px] font-mono text-slate-400">
                                <component :is="CheckCircle" class="w-2 h-2 text-emerald-400" />
                                {{ feature }}
                            </span>
                        </div>
                    </div>
                    
                    <!-- Bottom indicator -->
                    <div class="relative h-0.5 w-10 bg-gradient-to-r rounded-full opacity-60 group-hover:w-full transition-all duration-300" :class="sec.color"></div>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="bg-gradient-to-r from-slate-950 via-slate-900 to-slate-950 border border-slate-800/80 rounded-2xl p-8 text-center max-w-4xl mx-auto relative overflow-hidden">
                <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,rgba(16,185,129,0.05),transparent_70%)] pointer-events-none"></div>
                <div class="relative space-y-4">
                    <div class="flex items-center justify-center gap-3">
                        <component :is="Users" class="w-5 h-5 text-emerald-400" />
                        <h3 class="text-lg font-bold text-white">Not seeing your industry?</h3>
                    </div>
                    <p class="text-xs text-slate-400 max-w-xl mx-auto">Aether is highly customizable. Our engineering team can adapt the platform to any retail vertical with specialized inventory or point-of-sale requirements.</p>
                    <div class="flex flex-col sm:flex-row gap-3 justify-center pt-2">
                        <Link :href="route('contact')" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-emerald-600 text-white text-xs font-semibold rounded-lg hover:bg-emerald-500 transition-colors">
                            <component :is="Zap" class="w-4 h-4" />
                            Schedule Consultation
                        </Link>
                        <Link :href="route('features')" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-slate-900/80 border border-slate-800 text-slate-300 text-xs font-semibold rounded-lg hover:bg-slate-800 transition-colors">
                            <component :is="Shield" class="w-4 h-4" />
                            Explore Capabilities
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </MarketingLayout>
</template>