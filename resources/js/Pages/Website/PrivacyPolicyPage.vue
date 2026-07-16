<script setup>
import MarketingLayout from '@/Layouts/MarketingLayout.vue';
import { Link } from '@inertiajs/vue3';

// Import Lucide Vue icons
import {
  Shield,
  Lock,
  CheckCircle,
  Globe,
  FileText,
  AlertCircle,
  Award,
  Server,
  Database,
  Fingerprint,
  Key,
  HardDrive,
  Users,
  Eye,
  Mail,
  Clock,
  ArrowRight,
  ExternalLink,
  BookOpen,
  Zap,
  Building2,
  Briefcase
} from 'lucide-vue-next';

const policyHighlights = [
  {
    title: 'Data Encryption',
    description: 'All corporate transactions are encrypted at rest using AES-256 blocks, with client keys isolated in high-grade hardware security modules (HSMs).',
    icon: Lock,
    color: 'from-blue-500 to-cyan-500'
  },
  {
    title: 'Regulatory Compliance',
    description: 'We adhere strictly to GDPR, California Consumer Privacy Act (CCPA), and national financial safety frameworks.',
    icon: Shield,
    color: 'from-emerald-500 to-teal-500'
  },
  {
    title: 'Data Isolation',
    description: 'Client data is logically isolated with strict access controls, ensuring that your corporate ledgers remain private and secure.',
    icon: Database,
    color: 'from-purple-500 to-pink-500'
  }
];

const privacyPrinciples = [
  { label: 'Data Minimization', icon: Eye },
  { label: 'Purpose Limitation', icon: Target },
  { label: 'Storage Limitation', icon: Clock },
  { label: 'Integrity & Confidentiality', icon: Lock },
  { label: 'Accountability', icon: Users },
  { label: 'Transparency', icon: Globe }
];

const dataRights = [
  'Right to Access',
  'Right to Rectification',
  'Right to Erasure',
  'Right to Restrict Processing',
  'Right to Data Portability',
  'Right to Object'
];
</script>

<template>
    <MarketingLayout>
        <div class="max-w-4xl mx-auto px-4 sm:px-6 py-20 space-y-16">
            <!-- Header -->
            <div class="space-y-4">
                <div class="inline-flex items-center gap-2 bg-slate-900/50 border border-slate-800/80 px-4 py-2 rounded-full">
                    <component :is="Shield" class="w-4 h-4 text-emerald-400" />
                    <span class="text-xs font-mono font-bold text-emerald-400 tracking-widest uppercase">DATA GOVERNANCE</span>
                </div>
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-r from-emerald-500 to-teal-500 flex items-center justify-center flex-shrink-0 mt-1">
                        <component :is="FileText" class="w-6 h-6 text-white" />
                    </div>
                    <div>
                        <h1 class="text-3xl sm:text-4xl font-bold font-display text-white">Privacy Charter & Data Governance</h1>
                        <p class="text-[10px] font-mono text-slate-500 mt-1">Last updated: July 16, 2026</p>
                    </div>
                </div>
            </div>

            <!-- Overview -->
            <div class="bg-slate-900/20 border border-slate-800/80 rounded-2xl p-6 space-y-4">
                <div class="flex items-center gap-2">
                    <component :is="AlertCircle" class="w-4 h-4 text-blue-400" />
                    <h2 class="text-sm font-semibold text-white">Overview</h2>
                </div>
                <p class="text-xs text-slate-400 leading-relaxed">
                    Aether Technologies Inc. maintains rigorous policies regarding the isolation, encryption, and secure archiving of corporate sales ledgers, customer biometric scans, and personal franchise details. We adhere strictly to GDPR, California Consumer Privacy Act (CCPA), and national financial safety frameworks.
                </p>
                <div class="flex flex-wrap gap-2 pt-2">
                    <span class="inline-flex items-center gap-1.5 text-[9px] font-mono bg-emerald-500/10 text-emerald-400 px-2.5 py-1 rounded-full border border-emerald-500/20">
                        <component :is="CheckCircle" class="w-3 h-3" />
                        GDPR Compliant
                    </span>
                    <span class="inline-flex items-center gap-1.5 text-[9px] font-mono bg-blue-500/10 text-blue-400 px-2.5 py-1 rounded-full border border-blue-500/20">
                        <component :is="CheckCircle" class="w-3 h-3" />
                        CCPA Compliant
                    </span>
                    <span class="inline-flex items-center gap-1.5 text-[9px] font-mono bg-amber-500/10 text-amber-400 px-2.5 py-1 rounded-full border border-amber-500/20">
                        <component :is="CheckCircle" class="w-3 h-3" />
                        SOC2 Certified
                    </span>
                </div>
            </div>

            <!-- Key Highlights -->
            <div class="grid md:grid-cols-3 gap-6">
                <div v-for="(item, idx) in policyHighlights" :key="idx" class="group bg-slate-900/30 border border-slate-800/80 p-6 rounded-2xl hover:border-slate-700/80 hover:bg-slate-900/50 transition-all relative overflow-hidden">
                    <div class="absolute -inset-1 bg-gradient-to-r opacity-0 group-hover:opacity-10 blur-2xl transition-opacity" :class="item.color"></div>
                    
                    <div class="relative flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 rounded-lg bg-gradient-to-br flex items-center justify-center shadow-lg" :class="item.color">
                            <component :is="item.icon" class="w-5 h-5 text-white" />
                        </div>
                        <h3 class="text-sm font-semibold text-white">{{ item.title }}</h3>
                    </div>
                    
                    <p class="relative text-xs text-slate-400 leading-relaxed group-hover:text-slate-300 transition-colors">{{ item.description }}</p>
                    
                    <div class="relative h-0.5 w-12 bg-gradient-to-r rounded-full opacity-60 group-hover:w-full transition-all duration-300 mt-3" :class="item.color"></div>
                </div>
            </div>

            <!-- Security Measures -->
            <div class="bg-slate-900/20 border border-slate-800/80 rounded-2xl p-6 space-y-4">
                <div class="flex items-center gap-2">
                    <component :is="Server" class="w-4 h-4 text-blue-400" />
                    <h2 class="text-sm font-semibold text-white">Security Measures</h2>
                </div>
                
                <div class="grid sm:grid-cols-2 gap-4">
                    <div class="flex items-start gap-3 p-3 bg-slate-950/50 rounded-xl border border-slate-800/60">
                        <component :is="HardDrive" class="w-4 h-4 text-emerald-400 flex-shrink-0 mt-0.5" />
                        <div>
                            <p class="text-[10px] font-semibold text-slate-300">Encryption at Rest</p>
                            <p class="text-[9px] text-slate-500">AES-256 block encryption for all stored data</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 p-3 bg-slate-950/50 rounded-xl border border-slate-800/60">
                        <component :is="Fingerprint" class="w-4 h-4 text-blue-400 flex-shrink-0 mt-0.5" />
                        <div>
                            <p class="text-[10px] font-semibold text-slate-300">Hardware Security Modules</p>
                            <p class="text-[9px] text-slate-500">Client keys isolated in dedicated HSMs</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 p-3 bg-slate-950/50 rounded-xl border border-slate-800/60">
                        <component :is="Key" class="w-4 h-4 text-amber-400 flex-shrink-0 mt-0.5" />
                        <div>
                            <p class="text-[10px] font-semibold text-slate-300">Access Controls</p>
                            <p class="text-[9px] text-slate-500">Role-based access with multi-factor authentication</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 p-3 bg-slate-950/50 rounded-xl border border-slate-800/60">
                        <component :is="Eye" class="w-4 h-4 text-purple-400 flex-shrink-0 mt-0.5" />
                        <div>
                            <p class="text-[10px] font-semibold text-slate-300">Audit Logging</p>
                            <p class="text-[9px] text-slate-500">Comprehensive immutable audit trail</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Privacy Principles -->
            <div class="bg-slate-900/20 border border-slate-800/80 rounded-2xl p-6 space-y-4">
                <div class="flex items-center gap-2">
                    <component :is="Award" class="w-4 h-4 text-emerald-400" />
                    <h2 class="text-sm font-semibold text-white">Privacy Principles</h2>
                </div>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                    <div v-for="(principle, idx) in privacyPrinciples" :key="idx" class="flex items-center gap-2 p-2.5 bg-slate-950/50 rounded-lg border border-slate-800/60">
                        <component :is="principle.icon" class="w-3.5 h-3.5 text-blue-400 flex-shrink-0" />
                        <span class="text-[9px] font-mono text-slate-300">{{ principle.label }}</span>
                    </div>
                </div>
            </div>

            <!-- Data Rights -->
            <div class="bg-slate-900/20 border border-slate-800/80 rounded-2xl p-6 space-y-4">
                <div class="flex items-center gap-2">
                    <component :is="Users" class="w-4 h-4 text-blue-400" />
                    <h2 class="text-sm font-semibold text-white">Your Data Rights</h2>
                </div>
                <div class="grid sm:grid-cols-2 gap-2">
                    <div v-for="(right, idx) in dataRights" :key="idx" class="flex items-center gap-2 p-2 bg-slate-950/50 rounded-lg border border-slate-800/60">
                        <component :is="CheckCircle" class="w-3 h-3 text-emerald-400 flex-shrink-0" />
                        <span class="text-[9px] font-mono text-slate-300">{{ right }}</span>
                    </div>
                </div>
            </div>

            <!-- Contact for Privacy -->
            <div class="bg-gradient-to-r from-slate-950 via-slate-900 to-slate-950 border border-slate-800/80 rounded-2xl p-6 text-center relative overflow-hidden">
                <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,rgba(16,185,129,0.05),transparent_70%)] pointer-events-none"></div>
                <div class="relative space-y-3">
                    <div class="flex items-center justify-center gap-2">
                        <component :is="Mail" class="w-5 h-5 text-emerald-400" />
                        <h3 class="text-sm font-bold text-white">Privacy Questions?</h3>
                    </div>
                    <p class="text-xs text-slate-400 max-w-md mx-auto">Contact our Data Protection Officer for any privacy-related inquiries.</p>
                    <div class="flex flex-col sm:flex-row gap-3 justify-center pt-2">
                        <Link :href="route('contact')" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-emerald-600 text-white text-xs font-semibold rounded-lg hover:bg-emerald-500 transition-colors">
                            <component :is="Mail" class="w-4 h-4" />
                            Contact DPO
                        </Link>
                        <Link :href="route('support')" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-slate-950 border border-slate-800 text-slate-300 text-xs font-semibold rounded-lg hover:bg-slate-900 transition-colors">
                            <component :is="BookOpen" class="w-4 h-4" />
                            View Support
                        </Link>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="border-t border-slate-800/60 pt-6 flex flex-col sm:flex-row justify-between items-center text-[9px] font-mono text-slate-500 gap-3">
                <span class="flex items-center gap-1.5">
                    <component :is="Clock" class="w-3 h-3" />
                    Version 2.3 | Effective: July 16, 2026
                </span>
                <span class="flex items-center gap-1.5">
                    <component :is="Building2" class="w-3 h-3" />
                    Aether Technologies Inc.
                </span>
            </div>
        </div>
    </MarketingLayout>
</template>