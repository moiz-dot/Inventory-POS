<script setup>
import MarketingLayout from '@/Layouts/MarketingLayout.vue';
import { Link } from '@inertiajs/vue3';

// Import Lucide Vue icons
import {
  FileText,
  Shield,
  CheckCircle,
  AlertCircle,
  Award,
  Clock,
  Users,
  Building2,
  Lock,
  Zap,
  Scale,
  Briefcase,
  DollarSign,
  Server,
  Database,
  Globe,
  BookOpen,
  Mail,
  ArrowRight,
  ExternalLink,
  Calendar,
  Gavel,
  Info,
  AlertTriangle,
  BadgeCheck,
  FileCheck
} from 'lucide-vue-next';

const termsSections = [
  {
    id: 'overview',
    title: 'Overview',
    icon: Info,
    content: 'Welcome to the Aether Enterprise platform. By executing purchase orders, launching terminal cashiers, or querying the global ledger, your corporate organization agrees to our consolidated uptime guarantees, strict data separation rules, and licensing parameters.'
  },
  {
    id: 'licensing',
    title: 'Licensing Terms',
    icon: Briefcase,
    content: 'Violation of licensing rules (e.g. running multiple cash registers on a single starter license block) triggers automatic warning metrics. High-priority SLAs are active for Enterprise agreements. Each branch requires a valid license key activated through the Aether Licensing Server.'
  },
  {
    id: 'uptime',
    title: 'Uptime Guarantee',
    icon: Shield,
    content: 'We guarantee 99.9% uptime for all core services. In the event of service disruption exceeding our SLA threshold, customers are eligible for service credits as defined in their Enterprise Agreement.'
  },
  {
    id: 'data',
    title: 'Data Protection',
    icon: Database,
    content: 'Your data is encrypted at rest and in transit. We maintain strict isolation between customer environments. Data backups are performed daily with point-in-time recovery capabilities.'
  }
];

const keyTerms = [
  { label: 'License Validity', desc: 'Annual renewal required', icon: Calendar },
  { label: 'Support Response', desc: 'Priority based on tier', icon: Clock },
  { label: 'Data Retention', desc: '7 years minimum', icon: Database },
  { label: 'Compliance', desc: 'GDPR & CCPA ready', icon: Shield }
];

const agreementHighlights = [
  'Unlimited warehouse support with Enterprise license',
  '24/7 technical support for all licensed branches',
  'Monthly security audits and vulnerability scans',
  'Automatic updates and patch management',
  'Disaster recovery and backup services',
  'Custom API integrations available'
];
</script>

<template>
    <MarketingLayout>
        <div class="max-w-4xl mx-auto px-4 sm:px-6 py-20 space-y-16">
            <!-- Header -->
            <div class="space-y-4">
                <div class="inline-flex items-center gap-2 bg-slate-900/50 border border-slate-800/80 px-4 py-2 rounded-full">
                    <component :is="Gavel" class="w-4 h-4 text-blue-400" />
                    <span class="text-xs font-mono font-bold text-blue-400 tracking-widest uppercase">LEGAL AGREEMENTS</span>
                </div>
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-r from-blue-500 to-indigo-500 flex items-center justify-center flex-shrink-0 mt-1">
                        <component :is="FileText" class="w-6 h-6 text-white" />
                    </div>
                    <div>
                        <h1 class="text-3xl sm:text-4xl font-bold font-display text-white">Service Terms & License Agreements</h1>
                        <p class="text-[10px] font-mono text-slate-500 mt-1">Last updated: July 16, 2026 | Version 2.4</p>
                    </div>
                </div>
            </div>

            <!-- Key Terms -->
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                <div v-for="(term, idx) in keyTerms" :key="idx" class="bg-slate-900/20 border border-slate-800/80 p-4 rounded-xl text-center group hover:border-slate-700/80 transition-all">
                    <component :is="term.icon" class="w-5 h-5 text-blue-400 mx-auto mb-1.5" />
                    <p class="text-[9px] font-mono text-slate-400">{{ term.label }}</p>
                    <p class="text-[7px] font-mono text-slate-500 mt-0.5">{{ term.desc }}</p>
                </div>
            </div>

            <!-- Overview -->
            <div class="bg-slate-900/20 border border-slate-800/80 rounded-2xl p-6 space-y-4">
                <div class="flex items-center gap-2">
                    <component :is="Info" class="w-4 h-4 text-blue-400" />
                    <h2 class="text-sm font-semibold text-white">Overview</h2>
                </div>
                <p class="text-xs text-slate-400 leading-relaxed">
                    Welcome to the Aether Enterprise platform. By executing purchase orders, launching terminal cashiers, or querying the global ledger, your corporate organization agrees to our consolidated uptime guarantees, strict data separation rules, and licensing parameters.
                </p>
                <div class="flex flex-wrap gap-2 pt-2">
                    <span class="inline-flex items-center gap-1.5 text-[9px] font-mono bg-emerald-500/10 text-emerald-400 px-2.5 py-1 rounded-full border border-emerald-500/20">
                        <component :is="CheckCircle" class="w-3 h-3" />
                        Active Agreement
                    </span>
                    <span class="inline-flex items-center gap-1.5 text-[9px] font-mono bg-blue-500/10 text-blue-400 px-2.5 py-1 rounded-full border border-blue-500/20">
                        <component :is="Shield" class="w-3 h-3" />
                        Enterprise Grade
                    </span>
                </div>
            </div>

            <!-- Agreement Sections -->
            <div class="space-y-4">
                <div v-for="(section, idx) in termsSections" :key="idx" class="group bg-slate-900/30 border border-slate-800/80 p-6 rounded-2xl hover:border-slate-700/80 hover:bg-slate-900/50 transition-all relative overflow-hidden">
                    <div class="absolute -inset-1 bg-gradient-to-r from-blue-500/5 to-indigo-500/5 opacity-0 group-hover:opacity-100 blur-2xl transition-opacity"></div>
                    
                    <div class="relative flex items-start gap-4">
                        <div class="w-9 h-9 rounded-lg bg-gradient-to-r from-blue-600 to-indigo-600 flex items-center justify-center flex-shrink-0">
                            <component :is="section.icon" class="w-4 h-4 text-white" />
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center gap-2">
                                <h3 class="text-sm font-semibold text-white">{{ section.title }}</h3>
                                <span class="text-[8px] font-mono bg-slate-800/50 text-slate-500 px-2 py-0.5 rounded-full">Section {{ idx + 1 }}</span>
                            </div>
                            <p class="text-xs text-slate-400 leading-relaxed mt-1.5">{{ section.content }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Agreement Highlights -->
            <div class="bg-slate-900/20 border border-slate-800/80 rounded-2xl p-6 space-y-4">
                <div class="flex items-center gap-2">
                    <component :is="Award" class="w-4 h-4 text-emerald-400" />
                    <h2 class="text-sm font-semibold text-white">Agreement Highlights</h2>
                </div>
                <div class="grid sm:grid-cols-2 gap-2">
                    <div v-for="(highlight, idx) in agreementHighlights" :key="idx" class="flex items-center gap-2 p-2.5 bg-slate-950/50 rounded-lg border border-slate-800/60">
                        <component :is="CheckCircle" class="w-3 h-3 text-emerald-400 flex-shrink-0" />
                        <span class="text-[9px] font-mono text-slate-300">{{ highlight }}</span>
                    </div>
                </div>
            </div>

            <!-- License Violations -->
            <div class="bg-amber-500/5 border border-amber-500/20 rounded-2xl p-5 flex items-start gap-3">
                <component :is="AlertTriangle" class="w-5 h-5 text-amber-400 flex-shrink-0 mt-0.5" />
                <div>
                    <h4 class="text-xs font-semibold text-amber-400">License Compliance</h4>
                    <p class="text-[10px] text-amber-300/70 leading-relaxed mt-0.5">
                        Violation of licensing rules (e.g. running multiple cash registers on a single starter license block) triggers automatic warning metrics. High-priority SLAs are active for Enterprise agreements.
                    </p>
                </div>
            </div>

            <!-- Contact -->
            <div class="bg-gradient-to-r from-slate-950 via-slate-900 to-slate-950 border border-slate-800/80 rounded-2xl p-6 text-center relative overflow-hidden">
                <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,rgba(59,130,246,0.05),transparent_70%)] pointer-events-none"></div>
                <div class="relative space-y-3">
                    <div class="flex items-center justify-center gap-2">
                        <component :is="Scale" class="w-5 h-5 text-blue-400" />
                        <h3 class="text-sm font-bold text-white">Questions About Our Terms?</h3>
                    </div>
                    <p class="text-xs text-slate-400 max-w-md mx-auto">Contact our legal team for clarification on licensing, SLA guarantees, or compliance requirements.</p>
                    <div class="flex flex-col sm:flex-row gap-3 justify-center pt-2">
                        <Link :href="route('contact')" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-blue-600 text-white text-xs font-semibold rounded-lg hover:bg-blue-500 transition-colors">
                            <component :is="Mail" class="w-4 h-4" />
                            Contact Legal
                        </Link>
                        <Link :href="route('privacy')" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-slate-950 border border-slate-800 text-slate-300 text-xs font-semibold rounded-lg hover:bg-slate-900 transition-colors">
                            <component :is="Shield" class="w-4 h-4" />
                            View Privacy Policy
                        </Link>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="border-t border-slate-800/60 pt-6 flex flex-col sm:flex-row justify-between items-center text-[9px] font-mono text-slate-500 gap-3">
                <span class="flex items-center gap-1.5">
                    <component :is="FileCheck" class="w-3 h-3" />
                    Version 2.4 | Effective: July 16, 2026
                </span>
                <span class="flex items-center gap-1.5">
                    <component :is="Building2" class="w-3 h-3" />
                    Aether Technologies Inc. | All rights reserved
                </span>
            </div>
        </div>
    </MarketingLayout>
</template>