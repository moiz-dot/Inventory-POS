<script setup>
import MarketingLayout from '@/Layouts/MarketingLayout.vue';
import { Link } from '@inertiajs/vue3';

// Import Lucide Vue icons
import {
  Globe,
  Shield,
  Cloud,
  Network,
  Database,
  Lock,
  CheckCircle,
  TrendingUp,
  Users,
  Server,
  Layers,
  Activity,
  Zap,
  ArrowRight
} from 'lucide-vue-next';

const solutions = [
  {
    title: 'Multi-Branch Orchestration',
    desc: 'Consolidate sales across geographic regions. System replicates stock data to edge servers, allowing cashiers at different retail locations to checkout orders simultaneously with zero concurrency exceptions.',
    icon: Globe,
    color: 'from-blue-500 to-cyan-500',
    features: ['Real-time inventory sync', 'Cross-region load balancing', '99.99% uptime SLA']
  },
  {
    title: 'SOC2 Security Compliance',
    desc: 'Every transaction is digitally signed, timestamped, and stored in an immutable audit ledger. Enforce granular Role-Based Access Control (RBAC) to ensure inventory details are visible only to verified employees.',
    icon: Shield,
    color: 'from-emerald-500 to-teal-500',
    features: ['Immutable audit ledger', 'RBAC enforcement', 'ISO 27001 certified']
  },
  {
    title: 'Edge Computing Network',
    desc: 'Deploy lightweight containers near your retail locations for sub-10ms transaction latency. Process payments, update inventory, and sync with headquarters instantaneously.',
    icon: Network,
    color: 'from-purple-500 to-indigo-500',
    features: ['<10ms transaction latency', 'Container-based deployment', 'Automatic failover']
  },
  {
    title: 'Global Data Replication',
    desc: 'Real-time database replication across multiple availability zones. Your inventory and financial data remains consistent, durable, and available regardless of regional outages.',
    icon: Database,
    color: 'from-orange-500 to-red-500',
    features: ['Multi-zone replication', 'Disaster recovery ready', 'Data consistency guaranteed']
  }
];

const stats = [
  { label: 'Active Nodes', value: '2,400+', icon: Server },
  { label: 'Replication Speed', value: '< 200ms', icon: Zap },
  { label: 'Uptime Record', value: '99.999%', icon: Activity }
];
</script>

<template>
    <MarketingLayout>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 space-y-20">
            <!-- Header -->
            <div class="text-center max-w-3xl mx-auto space-y-4">
                <div class="inline-flex items-center gap-2 bg-slate-900/50 border border-slate-800/80 px-4 py-2 rounded-full">
                    <component :is="Cloud" class="w-4 h-4 text-indigo-400" />
                    <span class="text-xs font-mono font-bold text-indigo-400 tracking-widest uppercase">CLOUD ARCHITECTURE</span>
                </div>
                <h1 class="text-4xl sm:text-6xl font-bold font-display text-white tracking-tight">Enterprise Solutions</h1>
                <div class="flex items-center justify-center gap-2">
                    <component :is="Layers" class="w-5 h-5 text-indigo-400" />
                    <p class="text-slate-400 text-sm">Highly resilient cloud distribution designed to scale without single points of failure.</p>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div v-for="(stat, idx) in stats" :key="idx" class="bg-slate-900/30 border border-slate-800/80 p-6 rounded-2xl text-center">
                    <component :is="stat.icon" class="w-6 h-6 text-blue-400 mx-auto mb-2" />
                    <span class="text-2xl font-bold font-display text-white">{{ stat.value }}</span>
                    <p class="text-[10px] font-mono text-slate-500 mt-1 uppercase">{{ stat.label }}</p>
                </div>
            </div>

            <!-- Solutions Grid -->
            <div class="grid md:grid-cols-2 gap-8 pt-8">
                <div v-for="(solution, idx) in solutions" :key="idx" class="group bg-slate-900/20 border border-slate-800/80 p-8 rounded-2xl space-y-5 hover:bg-slate-900/40 hover:border-slate-700/80 transition-all relative overflow-hidden">
                    <!-- Background gradient glow -->
                    <div class="absolute -inset-1 bg-gradient-to-r opacity-0 group-hover:opacity-10 blur-2xl transition-opacity" :class="solution.color"></div>
                    
                    <div class="relative flex items-start justify-between">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br flex items-center justify-center shadow-lg" :class="solution.color">
                            <component :is="solution.icon" class="w-6 h-6 text-white" />
                        </div>
                        <div class="flex items-center gap-1 text-[10px] font-mono text-slate-600">
                            <component :is="CheckCircle" class="w-3 h-3 text-emerald-400" />
                            <span>Active</span>
                        </div>
                    </div>

                    <div class="relative space-y-3">
                        <h3 class="text-lg font-bold text-white font-display flex items-center gap-2">
                            <component :is="ArrowRight" class="w-4 h-4 text-indigo-400" />
                            {{ solution.title }}
                        </h3>
                        <p class="text-xs text-slate-400 leading-relaxed">{{ solution.desc }}</p>
                        
                        <!-- Feature tags -->
                        <div class="flex flex-wrap gap-2 pt-2">
                            <span v-for="(feature, fIdx) in solution.features" :key="fIdx" class="inline-flex items-center gap-1 bg-slate-800/60 px-2.5 py-1 rounded-full text-[9px] font-mono text-slate-300">
                                <component :is="CheckCircle" class="w-2.5 h-2.5 text-emerald-400" />
                                {{ feature }}
                            </span>
                        </div>
                    </div>

                    <!-- Bottom border accent -->
                    <div class="relative h-0.5 w-full bg-gradient-to-r rounded-full opacity-50" :class="solution.color"></div>
                </div>
            </div>

            <!-- Infrastructure CTA -->
            <div class="bg-gradient-to-r from-slate-950 via-slate-900 to-slate-950 border border-slate-800/80 rounded-2xl p-10 text-center max-w-4xl mx-auto relative overflow-hidden">
                <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,rgba(59,130,246,0.1),transparent_70%)] pointer-events-none"></div>
                <div class="relative space-y-4">
                    <div class="flex items-center justify-center gap-3">
                        <component :is="Server" class="w-6 h-6 text-blue-400" />
                        <h3 class="text-xl font-bold text-white">Enterprise-Grade Infrastructure</h3>
                    </div>
                    <p class="text-xs text-slate-400 max-w-2xl mx-auto">Designed for mission-critical retail operations with automatic failover, load balancing, and real-time monitoring across your entire network.</p>
                    <div class="flex flex-wrap justify-center gap-6 text-xs font-mono text-slate-500 pt-2">
                        <span class="flex items-center gap-1.5">
                            <component :is="CheckCircle" class="w-3 h-3 text-emerald-400" />
                            Auto-scaling
                        </span>
                        <span class="flex items-center gap-1.5">
                            <component :is="CheckCircle" class="w-3 h-3 text-emerald-400" />
                            Disaster recovery
                        </span>
                        <span class="flex items-center gap-1.5">
                            <component :is="CheckCircle" class="w-3 h-3 text-emerald-400" />
                            24/7 monitoring
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </MarketingLayout>
</template>