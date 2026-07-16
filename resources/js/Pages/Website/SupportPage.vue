<script setup>
import { ref } from 'vue';
import MarketingLayout from '@/Layouts/MarketingLayout.vue';
import { Link } from '@inertiajs/vue3';

// Import Lucide Vue icons
import {
  Activity,
  CheckCircle,
  Clock,
  AlertCircle,
  AlertTriangle,
  Server,
  Shield,
  Zap,
  Users,
  MessageCircle,
  Headphones,
  Mail,
  FileText,
  ArrowRight,
  ExternalLink,
  Award,
  BarChart3,
  Database,
  Globe,
  Wifi,
  Cpu,
  HardDrive,
  Lock,
  Bell,
  Calendar,
  TrendingUp
} from 'lucide-vue-next';

const activeTicket = ref(null);

const incidents = [
    { 
        id: 'INC-4910', 
        service: 'New York Fifth Avenue API Gateway', 
        status: 'RESOLVED', 
        time: 'Today 09:24',
        priority: 'High',
        icon: CheckCircle,
        color: 'emerald'
    },
    { 
        id: 'INC-4899', 
        service: 'London Mayfair Offline Reconciler', 
        status: 'MONITORING', 
        time: 'Yesterday 18:40',
        priority: 'Medium',
        icon: AlertTriangle,
        color: 'amber'
    },
    { 
        id: 'INC-4852', 
        service: 'Tokyo Ginza POS Printer buffer overload', 
        status: 'RESOLVED', 
        time: 'Jul 14, 2026',
        priority: 'Low',
        icon: CheckCircle,
        color: 'emerald'
    }
];

const supportChannels = [
    { label: 'Email Support', desc: 'Response within 4 hours', icon: Mail, route: 'mailto:support@aether-erp.com' },
    { label: 'Live Chat', desc: 'Available 24/7', icon: MessageCircle, route: '#' },
    { label: 'Phone Support', desc: 'Priority SLA only', icon: Headphones, route: 'tel:+18005552384' }
];

const systemStatus = [
    { label: 'API Gateways', status: 'Operational', icon: Server, color: 'emerald' },
    { label: 'Database Clusters', status: 'Operational', icon: Database, color: 'emerald' },
    { label: 'POS Services', status: 'Degraded', icon: Wifi, color: 'amber' },
    { label: 'Sync Engine', status: 'Operational', icon: TrendingUp, color: 'emerald' }
];
</script>

<template>
    <MarketingLayout>
        <div class="max-w-5xl mx-auto px-4 sm:px-6 py-20 space-y-16">
            <!-- Header -->
            <div class="text-center space-y-4">
                <div class="inline-flex items-center gap-2 bg-slate-900/50 border border-slate-800/80 px-4 py-2 rounded-full">
                    <component :is="Activity" class="w-4 h-4 text-blue-400" />
                    <span class="text-xs font-mono font-bold text-blue-400 tracking-widest uppercase">OPERATIONS MONITOR</span>
                </div>
                <h1 class="text-4xl font-bold font-display text-white tracking-tight">System SLA Support Desk</h1>
                <div class="flex items-center justify-center gap-2">
                    <component :is="Shield" class="w-5 h-5 text-blue-400" />
                    <p class="text-slate-400 text-sm">Browse real-time status parameters, report logistical buffer issues, or trigger high-priority SLA escalations.</p>
                </div>
            </div>

            <!-- System Status Grid -->
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                <div v-for="(status, idx) in systemStatus" :key="idx" class="bg-slate-900/20 border border-slate-800/80 p-4 rounded-xl text-center group hover:border-slate-700/80 transition-all">
                    <component :is="status.icon" class="w-5 h-5 mx-auto mb-1.5" :class="status.color === 'emerald' ? 'text-emerald-400' : 'text-amber-400'" />
                    <p class="text-[9px] font-mono text-slate-400">{{ status.label }}</p>
                    <span class="text-[8px] font-mono font-semibold block mt-0.5" :class="status.color === 'emerald' ? 'text-emerald-400' : 'text-amber-400'">
                        {{ status.status }}
                    </span>
                </div>
            </div>

            <div class="grid md:grid-cols-12 gap-8 items-start">
                <!-- Left Column - Status -->
                <div class="md:col-span-5 space-y-6">
                    <!-- Operational Status -->
                    <div class="bg-slate-900/30 border border-slate-800/80 p-6 rounded-2xl text-center space-y-3 relative overflow-hidden">
                        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,rgba(16,185,129,0.05),transparent_70%)] pointer-events-none"></div>
                        <div class="relative">
                            <div class="flex items-center justify-center gap-2 mb-2">
                                <component :is="CheckCircle" class="w-4 h-4 text-emerald-400" />
                                <h4 class="text-xs font-semibold text-slate-400 font-mono uppercase">Operational Status</h4>
                            </div>
                            <div class="w-20 h-20 rounded-full bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center mx-auto relative">
                                <div class="absolute inset-0 rounded-full border-4 border-emerald-400/20 animate-ping"></div>
                                <component :is="CheckCircle" class="w-10 h-10 text-emerald-400" />
                            </div>
                            <p class="text-xs text-white font-semibold mt-3">ALL EDGE ROUTERS OPERATING STABLY</p>
                            <div class="flex items-center justify-center gap-2 text-[10px] font-mono text-slate-500">
                                <component :is="Zap" class="w-3 h-3 text-blue-400" />
                                <span>CONSOLIDATED LATENCY: 9.4ms</span>
                            </div>
                        </div>
                    </div>

                    <!-- Support Channels -->
                    <div class="bg-slate-900/20 border border-slate-800/80 rounded-2xl p-5 space-y-3">
                        <div class="flex items-center gap-2 mb-2">
                            <component :is="Headphones" class="w-4 h-4 text-blue-400" />
                            <h4 class="text-[10px] font-mono text-slate-400 uppercase tracking-wide">Support Channels</h4>
                        </div>
                        <div class="space-y-2">
                            <div v-for="(channel, idx) in supportChannels" :key="idx" class="flex items-center justify-between p-2 rounded-lg hover:bg-slate-900/40 transition-colors group">
                                <div class="flex items-center gap-2.5">
                                    <component :is="channel.icon" class="w-4 h-4 text-blue-400" />
                                    <div>
                                        <p class="text-[10px] text-slate-300 font-medium">{{ channel.label }}</p>
                                        <p class="text-[8px] font-mono text-slate-500">{{ channel.desc }}</p>
                                    </div>
                                </div>
                                <component :is="ArrowRight" class="w-3 h-3 text-slate-600 group-hover:text-blue-400 transition-colors" />
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Incidents -->
                <div class="md:col-span-7 bg-slate-900/10 border border-slate-800/80 rounded-2xl p-6 space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <component :is="Bell" class="w-4 h-4 text-amber-400" />
                            <h3 class="text-xs font-semibold text-slate-300 font-mono">Recent Operations Incident Triage</h3>
                        </div>
                        <span class="text-[8px] font-mono text-slate-500 flex items-center gap-1">
                            <component :is="Clock" class="w-3 h-3" />
                            Last 30 days
                        </span>
                    </div>
                    
                    <div class="space-y-2">
                        <div 
                            v-for="inc in incidents" 
                            :key="inc.id" 
                            @click="activeTicket = activeTicket === inc.id ? null : inc.id" 
                            class="group bg-slate-950 border border-slate-800/80 p-4 rounded-xl cursor-pointer hover:border-slate-700/80 hover:bg-slate-900/30 transition-all"
                        >
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-3 flex-1">
                                    <component :is="inc.icon" class="w-4 h-4" :class="inc.color === 'emerald' ? 'text-emerald-400' : 'text-amber-400'" />
                                    <div>
                                        <div class="flex items-center gap-2 flex-wrap">
                                            <span class="text-xs font-bold text-white font-mono">{{ inc.id }}</span>
                                            <span class="text-[8px] font-mono px-2 py-0.5 rounded-full" :class="inc.status === 'RESOLVED' ? 'bg-emerald-500/10 text-emerald-400' : 'bg-amber-500/10 text-amber-400'">
                                                {{ inc.status }}
                                            </span>
                                            <span class="text-[7px] font-mono bg-blue-500/10 text-blue-400 px-1.5 py-0.5 rounded-full">{{ inc.priority }}</span>
                                        </div>
                                        <p class="text-[11px] text-slate-400 mt-0.5">{{ inc.service }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <span class="text-[9px] font-mono text-slate-500">{{ inc.time }}</span>
                                    <component :is="activeTicket === inc.id ? 'ChevronDown' : 'ChevronRight'" class="w-3.5 h-3.5 text-slate-600 group-hover:text-slate-400 transition-colors" />
                                </div>
                            </div>
                            
                            <!-- Expanded Details -->
                            <div v-if="activeTicket === inc.id" class="mt-3 pt-3 border-t border-slate-800/60 text-[10px] text-slate-400 space-y-1.5">
                                <div class="flex items-start gap-2">
                                    <component :is="AlertCircle" class="w-3 h-3 text-blue-400 flex-shrink-0 mt-0.5" />
                                    <span>Incident {{ inc.id }} is currently {{ inc.status === 'RESOLVED' ? 'resolved' : 'under monitoring' }}.</span>
                                </div>
                                <div class="flex items-start gap-2">
                                    <component :is="Clock" class="w-3 h-3 text-slate-500 flex-shrink-0 mt-0.5" />
                                    <span>Last updated: {{ inc.time }}</span>
                                </div>
                                <Link :href="route('support')" class="inline-flex items-center gap-1 text-blue-400 hover:text-blue-300 transition-colors mt-1">
                                    <span>View full incident report</span>
                                    <component :is="ExternalLink" class="w-3 h-3" />
                                </Link>
                            </div>
                        </div>
                    </div>

                    <!-- Incident Footer -->
                    <div class="border-t border-slate-800/60 pt-3 flex justify-between items-center text-[9px] font-mono text-slate-500">
                        <span class="flex items-center gap-1.5">
                            <component :is="Award" class="w-3 h-3 text-emerald-400" />
                            SLA Compliance: 99.4%
                        </span>
                        <Link :href="route('contact')" class="text-blue-400 hover:text-blue-300 transition-colors flex items-center gap-1">
                            <span>Report Issue</span>
                            <component :is="ArrowRight" class="w-3 h-3" />
                        </Link>
                    </div>
                </div>
            </div>

            <!-- SLA Info -->
            <div class="bg-gradient-to-r from-slate-950 via-slate-900 to-slate-950 border border-slate-800/80 rounded-2xl p-6 text-center max-w-3xl mx-auto relative overflow-hidden">
                <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,rgba(59,130,246,0.03),transparent_70%)] pointer-events-none"></div>
                <div class="relative space-y-3">
                    <div class="flex items-center justify-center gap-2">
                        <component :is="Shield" class="w-5 h-5 text-blue-400" />
                        <h3 class="text-sm font-bold text-white font-display">Our SLA Commitment</h3>
                    </div>
                    <div class="grid grid-cols-3 gap-4 pt-2">
                        <div>
                            <component :is="CheckCircle" class="w-4 h-4 text-emerald-400 mx-auto mb-1" />
                            <p class="text-[9px] font-mono text-slate-400">24/7 Support</p>
                        </div>
                        <div>
                            <component :is="Zap" class="w-4 h-4 text-blue-400 mx-auto mb-1" />
                            <p class="text-[9px] font-mono text-slate-400">&lt; 4hr Response</p>
                        </div>
                        <div>
                            <component :is="Award" class="w-4 h-4 text-amber-400 mx-auto mb-1" />
                            <p class="text-[9px] font-mono text-slate-400">99.9% Uptime</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </MarketingLayout>
</template>