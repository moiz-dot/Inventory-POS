<script setup>
import MarketingLayout from '@/Layouts/MarketingLayout.vue';

// Import Lucide Vue icons
import {
  Warehouse,
  Hash,
  Printer,
  ShoppingCart,
  FileCheck,
  WifiOff,
  Shield,
  Zap,
  Package,
  BarChart3,
  Layers,
  Activity,
  CheckCircle
} from 'lucide-vue-next';

// Map features to icons for visual enhancement
const deepFeatures = [
    { 
        title: 'Dynamic Multi-Warehouse Sourcing', 
        desc: 'Auto-calculates the geographic center of gravity of branch demand and prompts inventory transfers to mitigate localized stocking costs.',
        icon: Warehouse
    },
    { 
        title: 'Embedded Serial Code Tracking', 
        desc: 'Perfect for electronics and high-value designer apparel. Log warranty dates and batch serial records accurately.',
        icon: Hash
    },
    { 
        title: 'WebSerial ESC/POS Engine', 
        desc: 'Direct browser binding to POS hardware. Speed up sales transactions by communicating natively with USB thermal receipt printers.',
        icon: Printer
    },
    { 
        title: 'Automated Purchase Requisitions', 
        desc: 'Maintains perfect stock levels. Auto-orders replacement shipments the moment localized warehouse quantities cross safety parameters.',
        icon: ShoppingCart
    },
    { 
        title: 'Double-Entry Reconciliation Ledger', 
        desc: 'Every cash count, credit swipe, and stock adjustment is logged onto automatic, audit-ready balance spreadsheets.',
        icon: FileCheck
    },
    { 
        title: 'High-Integrity Offline Transactions', 
        desc: 'Our offline system records state and queues operations in safe storage, auto-syncing ledger blocks when hardware re-establishes connectivity.',
        icon: WifiOff
    }
];

// Helper to get gradient color based on index
const getGradientColor = (index) => {
  const gradients = [
    'from-blue-500 to-indigo-500',
    'from-emerald-500 to-teal-500',
    'from-purple-500 to-pink-500',
    'from-amber-500 to-orange-500',
    'from-cyan-500 to-blue-500',
    'from-rose-500 to-red-500'
  ];
  return gradients[index % gradients.length];
};
</script>

<template>
    <MarketingLayout>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 space-y-20">
            <div class="text-center max-w-3xl mx-auto space-y-4">
                <div class="inline-flex items-center gap-2 bg-slate-900/50 border border-slate-800/80 px-4 py-2 rounded-full">
                    <component :is="Layers" class="w-4 h-4 text-blue-400" />
                    <span class="text-xs font-mono font-bold text-blue-400 tracking-widest uppercase">PLATFORM BLUEPRINTS</span>
                </div>
                <h1 class="text-4xl sm:text-6xl font-bold font-display text-white tracking-tight">Key Platform Features</h1>
                <div class="flex items-center justify-center gap-2">
                    <component :is="Activity" class="w-5 h-5 text-emerald-400" />
                    <p class="text-slate-400 text-sm">Aether provides granular, technical back-office features designed specifically to streamline multi-branch operations and eliminate ledger reconciliation delays.</p>
                </div>
            </div>
            <div class="grid md:grid-cols-3 gap-6 pt-8">
                <div v-for="(f, i) in deepFeatures" :key="i" class="bg-slate-900/40 border border-slate-900/80 p-6 rounded-2xl space-y-3 hover:border-slate-800 hover:bg-slate-900/60 transition-all group relative overflow-hidden">
                    <!-- Background glow effect -->
                    <div class="absolute -inset-1 bg-gradient-to-r opacity-0 group-hover:opacity-10 blur-2xl transition-opacity" :class="getGradientColor(i)"></div>
                    
                    <div class="relative flex items-center justify-between">
                        <div class="w-10 h-10 rounded-lg bg-gradient-to-br flex items-center justify-center text-white font-bold text-sm shadow-lg" :class="getGradientColor(i)">
                            <component :is="f.icon" class="w-5 h-5" />
                        </div>
                        <span class="text-[10px] font-mono text-slate-600 group-hover:text-slate-500 transition-colors">0{{ i + 1 }}</span>
                    </div>
                    
                    <div class="relative space-y-2">
                        <h4 class="text-sm font-semibold text-white font-sans flex items-start gap-2">
                            <component :is="CheckCircle" class="w-3.5 h-3.5 text-emerald-400 flex-shrink-0 mt-0.5" />
                            {{ f.title }}
                        </h4>
                        <p class="text-xs text-slate-400 leading-relaxed pl-5">{{ f.desc }}</p>
                    </div>
                    
                    <div class="relative flex items-center gap-2 pt-2 border-t border-slate-800/60 mt-2">
                        <component :is="Shield" class="w-3 h-3 text-slate-600" />
                        <span class="text-[9px] font-mono text-slate-600">Enterprise-grade</span>
                    </div>
                </div>
            </div>
            
            <!-- Bottom CTA -->
            <div class="text-center bg-slate-900/20 border border-slate-800/60 rounded-2xl p-10 max-w-4xl mx-auto">
                <div class="flex items-center justify-center gap-3 mb-4">
                    <component :is="Zap" class="w-6 h-6 text-blue-400" />
                    <h3 class="text-lg font-semibold text-white">Ready to transform your operations?</h3>
                </div>
                <p class="text-xs text-slate-400 max-w-2xl mx-auto">Explore how Aether's feature set can be tailored to your specific retail or logistics infrastructure needs.</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center mt-6">
                    <Link :href="route('contact')" class="inline-flex items-center justify-center gap-2 px-6 py-2.5 bg-blue-600 text-white text-xs font-semibold rounded-lg hover:bg-blue-500 transition-colors">
                        <component :is="Package" class="w-4 h-4" />
                        Request Feature Demo
                    </Link>
                    <Link :href="route('login')" class="inline-flex items-center justify-center gap-2 px-6 py-2.5 bg-slate-950 border border-slate-800 text-slate-300 text-xs font-semibold rounded-lg hover:bg-slate-900 transition-colors">
                        <component :is="BarChart3" class="w-4 h-4" />
                        View Live Metrics
                    </Link>
                </div>
            </div>
        </div>
    </MarketingLayout>
</template>