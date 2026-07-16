<script setup>
import MarketingLayout from '@/Layouts/MarketingLayout.vue';
import { Link } from '@inertiajs/vue3';

// Import Lucide Vue icons
import {
  Shield,
  WifiOff,
  UserCheck,
  Target,
  Rocket,
  Users,
  Globe,
  Award,
  CheckCircle,
  Layers,
  Zap,
  BookOpen,
  TrendingUp,
  Clock,
  Lock,
  Database,
  Building2,
  Heart,
  Lightbulb,
  Star
} from 'lucide-vue-next';

const corporateValues = [
    { 
        title: 'Ledger Integrity First', 
        desc: 'A single penny misplaced can disrupt large enterprise pipelines. We prioritize transactional absolute correctness above all else.',
        icon: Shield,
        color: 'from-blue-500 to-cyan-500'
    },
    { 
        title: 'Offline-First Resilience', 
        desc: 'Operational continuity is non-negotiable. Physical hypermarkets must execute checkout cycles regardless of cloud connectivity states.',
        icon: WifiOff,
        color: 'from-orange-500 to-amber-500'
    },
    { 
        title: 'Granular Auditing Controls', 
        desc: 'No system actions exist without logged signatures. Clear visibility maps every SKU shift to specific authorized human credentials.',
        icon: UserCheck,
        color: 'from-emerald-500 to-teal-500'
    }
];

const milestones = [
    { year: '2022', title: 'Company Founded', desc: 'Aether Technologies established to revolutionize retail ERP systems.' },
    { year: '2023', title: 'First Enterprise Client', desc: 'Onboarded first national grocery chain with 140+ locations.' },
    { year: '2024', title: 'Global Expansion', desc: 'Expanded operations to 48 countries with multi-lingual support.' },
    { year: '2025', title: 'SOC2 Certified', desc: 'Achieved SOC2 Type II compliance for enterprise security standards.' }
];

const teamStats = [
    { label: 'Global Employees', value: '280+', icon: Users },
    { label: 'Active Clients', value: '1,200+', icon: Building2 },
    { label: 'Countries Served', value: '48+', icon: Globe },
    { label: 'Avg. Response Time', value: '< 2hrs', icon: Clock }
];
</script>

<template>
    <MarketingLayout>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 space-y-20">
            <!-- Header -->
            <div class="text-center max-w-3xl mx-auto space-y-4">
                <div class="inline-flex items-center gap-2 bg-slate-900/50 border border-slate-800/80 px-4 py-2 rounded-full">
                    <component :is="Target" class="w-4 h-4 text-blue-400" />
                    <span class="text-xs font-mono font-bold text-blue-400 tracking-widest uppercase">OUR MISSION STATEMENT</span>
                </div>
                <h1 class="text-4xl sm:text-6xl font-bold font-display text-white tracking-tight">Eradicating Ledger Latency</h1>
                <div class="flex items-center justify-center gap-2">
                    <component :is="Rocket" class="w-5 h-5 text-blue-400" />
                    <p class="text-slate-400 text-sm leading-relaxed">Founded in 2022, Aether Technologies was built to streamline operational barriers that prevent national retail chains and logistic centers from executing synchronized stock tracking.</p>
                </div>
            </div>

            <!-- Team Stats -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 pt-4">
                <div v-for="(stat, idx) in teamStats" :key="idx" class="group bg-slate-900/20 border border-slate-800/80 p-5 rounded-2xl text-center hover:border-slate-700/80 transition-all">
                    <div class="flex items-center justify-center gap-2 mb-2">
                        <component :is="stat.icon" class="w-5 h-5 text-blue-400" />
                        <span class="text-2xl font-bold font-display text-white">{{ stat.value }}</span>
                    </div>
                    <p class="text-[10px] font-mono text-slate-500 uppercase tracking-wide">{{ stat.label }}</p>
                </div>
            </div>

            <!-- Corporate Values -->
            <div class="space-y-8">
                <div class="text-center">
                    <h2 class="text-2xl font-bold font-display text-white">Our Core Values</h2>
                    <p class="text-xs text-slate-400 mt-1">The principles that guide every decision we make</p>
                </div>
                <div class="grid md:grid-cols-3 gap-8">
                    <div v-for="(v, i) in corporateValues" :key="i" class="group bg-slate-900/30 border border-slate-800/80 p-8 rounded-2xl space-y-4 hover:border-slate-700/80 hover:bg-slate-900/50 transition-all relative overflow-hidden">
                        <!-- Background glow -->
                        <div class="absolute -inset-1 bg-gradient-to-r opacity-0 group-hover:opacity-10 blur-2xl transition-opacity" :class="v.color"></div>
                        
                        <div class="relative flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-gradient-to-br flex items-center justify-center shadow-lg" :class="v.color">
                                <component :is="v.icon" class="w-5 h-5 text-white" />
                            </div>
                            <h3 class="text-sm font-semibold text-white font-sans group-hover:text-blue-200 transition-colors">{{ v.title }}</h3>
                        </div>
                        <p class="relative text-xs text-slate-400 leading-relaxed group-hover:text-slate-300 transition-colors">{{ v.desc }}</p>
                        
                        <!-- Bottom accent -->
                        <div class="relative h-0.5 w-12 bg-gradient-to-r rounded-full opacity-60 group-hover:w-full transition-all duration-300" :class="v.color"></div>
                    </div>
                </div>
            </div>

            <!-- Milestones Timeline -->
            <div class="bg-slate-900/20 border border-slate-800/80 rounded-2xl p-8 max-w-4xl mx-auto">
                <div class="flex items-center justify-center gap-2 mb-8">
                    <component :is="Award" class="w-5 h-5 text-blue-400" />
                    <h2 class="text-lg font-bold font-display text-white">Our Journey</h2>
                </div>
                <div class="grid md:grid-cols-4 gap-4">
                    <div v-for="(milestone, idx) in milestones" :key="idx" class="relative text-center group">
                        <div class="flex flex-col items-center">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-600 to-indigo-600 flex items-center justify-center text-white font-bold text-xs shadow-lg mb-2">
                                {{ milestone.year }}
                            </div>
                            <div class="relative">
                                <div class="absolute left-1/2 top-4 w-1 h-6 bg-slate-800 group-last:opacity-0"></div>
                                <h4 class="text-xs font-semibold text-white">{{ milestone.title }}</h4>
                                <p class="text-[9px] text-slate-400 mt-0.5 leading-relaxed">{{ milestone.desc }}</p>
                            </div>
                        </div>
                        <div v-if="idx < milestones.length - 1" class="absolute top-5 left-full w-full h-0.5 bg-gradient-to-r from-slate-800 to-slate-800/20 hidden md:block"></div>
                    </div>
                </div>
            </div>

            <!-- Why Choose Aether -->
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-gradient-to-r from-slate-950 to-slate-900/50 border border-slate-800/80 p-8 rounded-2xl relative overflow-hidden">
                    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,rgba(59,130,246,0.03),transparent_70%)] pointer-events-none"></div>
                    <div class="relative space-y-4">
                        <div class="flex items-center gap-2">
                            <component :is="Lightbulb" class="w-5 h-5 text-blue-400" />
                            <h3 class="text-sm font-bold text-white">Why Choose Aether?</h3>
                        </div>
                        <ul class="space-y-2">
                            <li v-for="(item, idx) in [
                                'Built for scale from day one',
                                'Offline-first architecture',
                                'Enterprise-grade security',
                                'Real-time data synchronization',
                                'Dedicated support team'
                            ]" :key="idx" class="flex items-center gap-2 text-xs text-slate-400">
                                <component :is="CheckCircle" class="w-3.5 h-3.5 text-emerald-400 flex-shrink-0" />
                                <span>{{ item }}</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="bg-gradient-to-r from-slate-950 to-slate-900/50 border border-slate-800/80 p-8 rounded-2xl relative overflow-hidden">
                    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,rgba(16,185,129,0.03),transparent_70%)] pointer-events-none"></div>
                    <div class="relative space-y-4">
                        <div class="flex items-center gap-2">
                            <component :is="Heart" class="w-5 h-5 text-emerald-400" />
                            <h3 class="text-sm font-bold text-white">Our Commitment</h3>
                        </div>
                        <p class="text-xs text-slate-400 leading-relaxed">We're committed to building software that empowers retail businesses to operate with complete confidence. Our team works tirelessly to ensure your data is accurate, secure, and always available.</p>
                        <div class="flex items-center gap-2 pt-2">
                            <component :is="Star" class="w-4 h-4 text-yellow-400" />
                            <span class="text-xs font-mono text-slate-500">Rated 4.9/5 by enterprise clients</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA -->
            <div class="text-center max-w-2xl mx-auto space-y-4 pt-4">
                <div class="flex items-center justify-center gap-2">
                    <component :is="Users" class="w-5 h-5 text-blue-400" />
                    <h3 class="text-lg font-bold text-white">Ready to join the Aether network?</h3>
                </div>
                <p class="text-xs text-slate-400">Discover how our platform can transform your retail operations.</p>
                <div class="flex flex-col sm:flex-row gap-3 justify-center pt-2">
                    <Link :href="route('login')" class="inline-flex items-center justify-center gap-2 px-6 py-2.5 bg-blue-600 text-white text-xs font-semibold rounded-lg hover:bg-blue-500 transition-colors">
                        <component :is="Rocket" class="w-4 h-4" />
                        Launch Portal
                    </Link>
                    <Link :href="route('contact')" class="inline-flex items-center justify-center gap-2 px-6 py-2.5 bg-slate-950 border border-slate-800 text-slate-300 text-xs font-semibold rounded-lg hover:bg-slate-900 transition-colors">
                        <component :is="BookOpen" class="w-4 h-4" />
                        Learn More
                    </Link>
                </div>
            </div>
        </div>
    </MarketingLayout>
</template>