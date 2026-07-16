<script setup>
import { ref } from 'vue';
import MarketingLayout from '@/Layouts/MarketingLayout.vue';
import { Link } from '@inertiajs/vue3';

// Import Lucide Vue icons
import {
  Briefcase,
  MapPin,
  DollarSign,
  Users,
  CheckCircle,
  X,
  Send,
  FileText,
  Globe,
  Clock,
  Award,
  Building2,
  Mail,
  Calendar,
  Target,
  Rocket,
  Heart,
  Star,
  UserPlus,
  Zap,
  Shield,
  ArrowRight,
  ExternalLink,
  Layers,
  Code,
  Palette,
  Cpu,
  Database
} from 'lucide-vue-next';

const selectedJob = ref(null);
const candidateName = ref('');
const candidateEmail = ref('');
const applied = ref(false);

const CAREER_OPENINGS = [
    { 
        id: 'car-1', 
        title: 'Principal Systems Architect (Distributed Ledger / ERP)', 
        department: 'Core Platform Engineering', 
        location: 'New York, NY / Hybrid', 
        type: 'Full-time', 
        salary: '$240,000 - $310,000 + Equity', 
        description: 'Lead the next generation of our low-latency global inventory synchronizer. Build highly concurrent database locking mechanisms and state-synchronous real-time pipelines.',
        icon: Database,
        color: 'from-blue-500 to-cyan-500'
    },
    { 
        id: 'car-2', 
        title: 'Senior Solutions Engineer (Hardware & Embedded POS)', 
        department: 'IoT & Integrations Team', 
        location: 'London, UK / Remote friendly', 
        type: 'Full-time', 
        salary: '£120,000 - £160,000', 
        description: 'Bridge software with physical hardware. Develop core libraries for WebUSB, WebSerial, and modern IoT-enabled retail sensor environments used by national hypermarkets.',
        icon: Cpu,
        color: 'from-purple-500 to-pink-500'
    },
    { 
        id: 'car-3', 
        title: 'Lead Visual & Interactive Designer', 
        department: 'Product Experience Group', 
        location: 'Tokyo, Japan / Onsite', 
        type: 'Full-time', 
        salary: '¥14M - ¥18M', 
        description: 'Shape the layout, typography, and interactive charts of the world\'s most elegant back-office enterprise portal. Work directly with leadership on custom design guidelines.',
        icon: Palette,
        color: 'from-emerald-500 to-teal-500'
    }
];

const perks = [
    { label: 'Competitive Salary', icon: DollarSign },
    { label: 'Equity Package', icon: Award },
    { label: 'Remote Friendly', icon: Globe },
    { label: 'Health Benefits', icon: Heart },
    { label: 'Learning Budget', icon: BookOpen },
    { label: 'Flexible Hours', icon: Clock }
];

const handleApply = (e) => { 
    e.preventDefault(); 
    if (!candidateName.value || !candidateEmail.value) return; 
    applied.value = true; 
    candidateName.value = ''; 
    candidateEmail.value = '';
};
</script>

<template>
    <MarketingLayout>
        <div class="max-w-5xl mx-auto px-4 sm:px-6 py-20 space-y-16">
            <!-- Header -->
            <div class="text-center space-y-4">
                <div class="inline-flex items-center gap-2 bg-slate-900/50 border border-slate-800/80 px-4 py-2 rounded-full">
                    <component :is="Users" class="w-4 h-4 text-blue-400" />
                    <span class="text-xs font-mono font-bold text-blue-400 tracking-widest uppercase">JOIN AETHER PLATFORM</span>
                </div>
                <h1 class="text-4xl font-bold font-display text-white tracking-tight">Open Engineering & Design Roles</h1>
                <div class="flex items-center justify-center gap-2">
                    <component :is="Rocket" class="w-5 h-5 text-blue-400" />
                    <p class="text-slate-400 text-sm">Join our global engineering labs building highly concurrent transactional databases, POS hardware, and web visual metrics.</p>
                </div>
            </div>

            <!-- Perks -->
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-4">
                <div v-for="(perk, idx) in perks" :key="idx" class="bg-slate-900/20 border border-slate-800/80 p-3 rounded-xl text-center group hover:border-slate-700/80 transition-all">
                    <component :is="perk.icon" class="w-4 h-4 text-blue-400 mx-auto mb-1" />
                    <span class="text-[8px] font-mono text-slate-400 group-hover:text-white transition-colors">{{ perk.label }}</span>
                </div>
            </div>

            <!-- Job Listings -->
            <div class="space-y-4 pt-6">
                <div v-for="job in CAREER_OPENINGS" :key="job.id" @click="selectedJob = job; applied = false" class="group bg-slate-900/20 border border-slate-800/80 p-6 rounded-xl flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 cursor-pointer hover:border-slate-700/80 hover:bg-slate-900/30 transition-all">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-lg bg-gradient-to-br flex items-center justify-center shadow-lg flex-shrink-0" :class="job.color">
                            <component :is="job.icon" class="w-5 h-5 text-white" />
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <h3 class="text-sm font-semibold text-slate-200 group-hover:text-white transition-colors">{{ job.title }}</h3>
                                <span class="text-[8px] font-mono bg-blue-500/10 text-blue-400 px-2 py-0.5 rounded-full uppercase">{{ job.type }}</span>
                            </div>
                            <div class="flex flex-wrap gap-3 text-[10px] font-mono text-slate-500 mt-1">
                                <span class="flex items-center gap-1">
                                    <component :is="Building2" class="w-3 h-3" />
                                    {{ job.department }}
                                </span>
                                <span>•</span>
                                <span class="flex items-center gap-1">
                                    <component :is="MapPin" class="w-3 h-3" />
                                    {{ job.location }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 w-full sm:w-auto justify-between sm:justify-start">
                        <span class="text-[10px] font-mono text-blue-400 flex items-center gap-1">
                            <component :is="DollarSign" class="w-3 h-3" />
                            {{ job.salary }}
                        </span>
                        <button class="px-4 py-1.5 rounded-md bg-slate-900 border border-slate-800 text-[10px] text-slate-300 hover:bg-slate-800 hover:text-white transition-colors flex items-center gap-1">
                            <component :is="ArrowRight" class="w-3 h-3" />
                            Inspect Role
                        </button>
                    </div>
                </div>
            </div>

            <!-- Culture Section -->
            <div class="bg-gradient-to-r from-slate-950 via-slate-900 to-slate-950 border border-slate-800/80 rounded-2xl p-8 text-center relative overflow-hidden">
                <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,rgba(59,130,246,0.03),transparent_70%)] pointer-events-none"></div>
                <div class="relative space-y-4">
                    <div class="flex items-center justify-center gap-2">
                        <component :is="Heart" class="w-5 h-5 text-rose-400" />
                        <h3 class="text-lg font-bold text-white font-display">Life at Aether</h3>
                    </div>
                    <p class="text-xs text-slate-400 max-w-md mx-auto">We're building the future of retail technology with a passionate, distributed team across 12 countries.</p>
                    <div class="flex flex-wrap justify-center gap-4 text-[10px] font-mono text-slate-500 pt-2">
                        <span class="flex items-center gap-1.5">
                            <component :is="Users" class="w-3 h-3 text-blue-400" />
                            280+ Employees
                        </span>
                        <span class="flex items-center gap-1.5">
                            <component :is="Globe" class="w-3 h-3 text-emerald-400" />
                            48 Countries
                        </span>
                        <span class="flex items-center gap-1.5">
                            <component :is="Award" class="w-3 h-3 text-amber-400" />
                            Top 50 Tech Employers
                        </span>
                    </div>
                </div>
            </div>

            <!-- Job Modal -->
            <div v-if="selectedJob" class="fixed inset-0 z-50 bg-slate-950/80 backdrop-blur-sm flex items-center justify-center p-4" @click.self="selectedJob = null">
                <div class="bg-slate-950 border border-slate-800 rounded-2xl p-6 max-w-lg w-full space-y-6 relative animate-in fade-in zoom-in-95 duration-200">
                    <!-- Close Button -->
                    <button @click="selectedJob = null" class="absolute top-4 right-4 text-slate-500 hover:text-white transition-colors">
                        <component :is="X" class="w-4 h-4" />
                    </button>

                    <!-- Job Header -->
                    <div>
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-lg bg-gradient-to-br flex items-center justify-center" :class="selectedJob.color">
                                <component :is="selectedJob.icon" class="w-4 h-4 text-white" />
                            </div>
                            <span class="text-[9px] font-mono bg-blue-500/15 text-blue-400 px-2 py-0.5 rounded-full font-bold uppercase">{{ selectedJob.department }}</span>
                        </div>
                        <h3 class="text-lg font-bold text-white font-display mt-2">{{ selectedJob.title }}</h3>
                        <div class="flex flex-wrap gap-3 text-[10px] font-mono text-slate-500 mt-1">
                            <span class="flex items-center gap-1">
                                <component :is="MapPin" class="w-3 h-3" />
                                {{ selectedJob.location }}
                            </span>
                            <span>|</span>
                            <span class="flex items-center gap-1">
                                <component :is="DollarSign" class="w-3 h-3" />
                                {{ selectedJob.salary }}
                            </span>
                        </div>
                    </div>

                    <!-- Description -->
                    <p class="text-xs text-slate-400 leading-relaxed border-y border-slate-900 py-4">{{ selectedJob.description }}</p>

                    <!-- Application Form -->
                    <div v-if="applied" class="text-center py-4 space-y-3">
                        <div class="w-12 h-12 rounded-full bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center text-emerald-400 mx-auto">
                            <component :is="CheckCircle" class="w-6 h-6" />
                        </div>
                        <h4 class="text-xs font-semibold text-white">Application Received Successfully</h4>
                        <p class="text-[10px] text-slate-500">We will trace back with feedback in under 7 business days.</p>
                        <button @click="selectedJob = null" class="mt-2 px-4 py-1.5 rounded bg-slate-900 text-xs text-slate-300 hover:text-white transition-colors flex items-center gap-1 mx-auto">
                            <component :is="X" class="w-3 h-3" />
                            Close Panel
                        </button>
                    </div>

                    <form v-else @submit="handleApply" class="space-y-4">
                        <div class="space-y-1.5">
                            <label class="text-[9px] font-mono text-slate-500 uppercase flex items-center gap-1">
                                <component :is="UserPlus" class="w-3 h-3" />
                                Your Name <span class="text-red-400">*</span>
                            </label>
                            <input 
                                type="text" 
                                required 
                                v-model="candidateName" 
                                class="w-full bg-slate-950 border border-slate-800 focus:border-blue-500/40 rounded-lg p-2.5 text-xs text-slate-200 outline-none transition-all" 
                                placeholder="Marcus Vane" 
                            />
                        </div>
                        
                        <div class="space-y-1.5">
                            <label class="text-[9px] font-mono text-slate-500 uppercase flex items-center gap-1">
                                <component :is="Mail" class="w-3 h-3" />
                                Email Address <span class="text-red-400">*</span>
                            </label>
                            <input 
                                type="email" 
                                required 
                                v-model="candidateEmail" 
                                class="w-full bg-slate-950 border border-slate-800 focus:border-blue-500/40 rounded-lg p-2.5 text-xs text-slate-200 outline-none transition-all" 
                                placeholder="marcus@example.com" 
                            />
                        </div>
                        
                        <div class="space-y-1.5">
                            <label class="text-[9px] font-mono text-slate-500 uppercase flex items-center gap-1">
                                <component :is="FileText" class="w-3 h-3" />
                                Link to CV / Portfolio
                            </label>
                            <input 
                                type="url" 
                                required 
                                class="w-full bg-slate-950 border border-slate-800 focus:border-blue-500/40 rounded-lg p-2.5 text-xs text-slate-200 outline-none transition-all" 
                                placeholder="https://github.com/vane-architects" 
                            />
                        </div>

                        <div class="flex gap-4 pt-2">
                            <button type="button" @click="selectedJob = null" class="flex-1 py-2.5 rounded bg-slate-900 border border-slate-800 text-slate-400 text-xs font-semibold hover:bg-slate-800 hover:text-white transition-colors">
                                Cancel
                            </button>
                            <button type="submit" class="flex-1 py-2.5 rounded bg-blue-600 text-white text-xs font-semibold hover:bg-blue-500 transition-colors flex items-center justify-center gap-2">
                                <component :is="Send" class="w-3.5 h-3.5" />
                                Submit Resume
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Footer CTA -->
            <div class="text-center max-w-2xl mx-auto border-t border-slate-800/60 pt-10">
                <div class="flex items-center justify-center gap-2">
                    <component :is="Star" class="w-4 h-4 text-amber-400" />
                    <p class="text-xs text-slate-500">Don't see the right role? We're always looking for exceptional talent.</p>
                </div>
                <Link :href="route('contact')" class="inline-flex items-center gap-2 mt-4 px-5 py-2.5 bg-slate-950 border border-slate-800 text-slate-300 text-xs font-semibold rounded-lg hover:bg-slate-900 transition-colors">
                    <component :is="Mail" class="w-4 h-4" />
                    Send Speculative Application
                </Link>
            </div>
        </div>
    </MarketingLayout>
</template>