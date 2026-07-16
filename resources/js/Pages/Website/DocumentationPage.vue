<script setup>
import { ref } from 'vue';
import MarketingLayout from '@/Layouts/MarketingLayout.vue';
import { Link } from '@inertiajs/vue3';

// Import Lucide Vue icons
import {
  BookOpen,
  FileText,
  Code,
  Printer,
  Database,
  Terminal,
  Shield,
  CheckCircle,
  ArrowRight,
  Zap,
  Layers,
  GitBranch,
  Server,
  WifiOff,
  Cpu,
  Lock,
  Key,
  ExternalLink,
  Copy,
  Download,
  HelpCircle,
  MessageCircle,
  Star,
  Clock,
  Users
} from 'lucide-vue-next';

const activeChapter = ref('getting-started');

const chapters = [
    { id: 'getting-started', title: 'System Onboarding', icon: BookOpen },
    { id: 'api-schemas', title: 'REST API v2 Schema', icon: Code },
    { id: 'printer-setup', title: 'ESC/POS Printer Directives', icon: Printer },
    { id: 'indexeddb-offline', title: 'Offline Ledger Locking', icon: Database }
];

const quickLinks = [
    { label: 'API Reference', icon: FileText, route: '#' },
    { label: 'SDK Downloads', icon: Download, route: '#' },
    { label: 'Release Notes', icon: Clock, route: '#' },
    { label: 'Community', icon: Users, route: '#' }
];
</script>

<template>
    <MarketingLayout>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <!-- Header -->
            <div class="text-center max-w-3xl mx-auto mb-12 space-y-4">
                <div class="inline-flex items-center gap-2 bg-slate-900/50 border border-slate-800/80 px-4 py-2 rounded-full">
                    <component :is="FileText" class="w-4 h-4 text-blue-400" />
                    <span class="text-xs font-mono font-bold text-blue-400 tracking-widest uppercase">DEVELOPER DOCUMENTATION</span>
                </div>
                <h1 class="text-3xl sm:text-4xl font-bold font-display text-white tracking-tight">Aether Core Documentation</h1>
                <div class="flex items-center justify-center gap-2">
                    <component :is="BookOpen" class="w-5 h-5 text-blue-400" />
                    <p class="text-slate-400 text-sm">Complete reference for system onboarding, API integration, hardware setup, and offline architecture.</p>
                </div>
            </div>

            <div class="grid lg:grid-cols-12 gap-12 items-start">
                <!-- Sidebar -->
                <div class="lg:col-span-3 space-y-6">
                    <div>
                        <div class="flex items-center gap-2 mb-4">
                            <component :is="Layers" class="w-4 h-4 text-blue-400" />
                            <span class="text-[9px] font-mono font-bold text-slate-500 uppercase tracking-widest">SYSTEM MANUALS</span>
                        </div>
                        <h3 class="text-sm font-bold text-white font-display">Core Docs</h3>
                    </div>
                    
                    <div class="flex flex-col gap-1">
                        <button 
                            v-for="ch in chapters" 
                            :key="ch.id" 
                            @click="activeChapter = ch.id" 
                            class="w-full text-left px-3 py-2.5 text-xs font-mono rounded-lg transition-all flex items-center gap-2.5 group"
                            :class="activeChapter === ch.id ? 'bg-slate-900 text-blue-400 border-l-2 border-blue-500 shadow-md' : 'text-slate-400 hover:text-white hover:bg-slate-900/40'"
                        >
                            <component :is="ch.icon" class="w-3.5 h-3.5 flex-shrink-0" :class="activeChapter === ch.id ? 'text-blue-400' : 'text-slate-500 group-hover:text-slate-300'" />
                            <span>{{ ch.title }}</span>
                            <component :is="activeChapter === ch.id ? CheckCircle : ArrowRight" class="w-3 h-3 ml-auto flex-shrink-0" :class="activeChapter === ch.id ? 'text-emerald-400' : 'text-slate-600 opacity-0 group-hover:opacity-100 transition-opacity'" />
                        </button>
                    </div>

                    <!-- Quick Links -->
                    <div class="border-t border-slate-800/60 pt-6 mt-4">
                        <p class="text-[9px] font-mono text-slate-500 uppercase tracking-widest mb-3">Quick Access</p>
                        <div class="space-y-1">
                            <Link v-for="(link, idx) in quickLinks" :key="idx" :href="link.route" class="flex items-center gap-2 px-3 py-1.5 text-[10px] font-mono text-slate-400 hover:text-white hover:bg-slate-900/40 rounded-lg transition-colors">
                                <component :is="link.icon" class="w-3 h-3" />
                                {{ link.label }}
                            </Link>
                        </div>
                    </div>

                    <!-- Support -->
                    <div class="bg-slate-900/30 border border-slate-800/80 rounded-xl p-4">
                        <div class="flex items-center gap-2 mb-2">
                            <component :is="HelpCircle" class="w-4 h-4 text-blue-400" />
                            <span class="text-[9px] font-mono text-slate-500 uppercase tracking-widest">Need Help?</span>
                        </div>
                        <p class="text-[10px] text-slate-400 leading-relaxed">Our technical support team is available 24/7.</p>
                        <Link :href="route('contact')" class="inline-flex items-center gap-1.5 mt-2 text-[10px] font-mono text-blue-400 hover:text-blue-300 transition-colors">
                            <component :is="MessageCircle" class="w-3 h-3" />
                            Contact Support
                        </Link>
                    </div>
                </div>

                <!-- Content -->
                <div class="lg:col-span-9 bg-slate-900/10 border border-slate-800/80 p-8 rounded-2xl space-y-6 relative overflow-hidden">
                    <div class="absolute top-4 right-4 flex items-center gap-2 text-[9px] font-mono text-slate-500">
                        <component :is="Shield" class="w-3 h-3 text-emerald-400" />
                        <span>v4.2.0</span>
                    </div>

                    <!-- Getting Started -->
                    <div v-if="activeChapter === 'getting-started'" class="space-y-4">
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-gradient-to-r from-blue-500 to-cyan-500 flex items-center justify-center flex-shrink-0 mt-0.5">
                                <component :is="BookOpen" class="w-4 h-4 text-white" />
                            </div>
                            <div>
                                <h2 class="text-xl font-bold font-display text-white">System Onboarding Blueprint</h2>
                                <p class="text-[10px] font-mono text-slate-500 mt-0.5">Complete setup guide for new deployments</p>
                            </div>
                        </div>
                        
                        <p class="text-xs text-slate-400 leading-relaxed">Welcome to the core developer reference manual for Aether. The platform allows corporate retail networks to consolidate disparate point-of-sale cash registers, stock management vaults, and financial journals into an immutable double-entry unified ledger.</p>
                        
                        <div class="bg-slate-950 p-4 rounded-lg font-mono text-[10px] border border-slate-800 space-y-1.5 relative">
                            <div class="flex items-center gap-2 text-slate-500 border-b border-slate-800 pb-2 mb-2">
                                <component :is="Terminal" class="w-3.5 h-3.5 text-emerald-400" />
                                <span>Terminal Installation</span>
                            </div>
                            <p class="text-emerald-400"># Run automated environment bootstrap script</p>
                            <p class="text-blue-400">$ curl -sSL https://core.aether-erp.com/install.sh | bash</p>
                            <p class="text-slate-400">&gt; Indexing local branch parameters...</p>
                            <p class="text-slate-400">&gt; SSL Certificate verified. Sandbox loaded successfully.</p>
                            <button class="absolute top-2 right-2 text-slate-600 hover:text-slate-400 transition-colors">
                                <component :is="Copy" class="w-3.5 h-3.5" />
                            </button>
                        </div>
                    </div>

                    <!-- API Schemas -->
                    <div v-else-if="activeChapter === 'api-schemas'" class="space-y-4">
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-gradient-to-r from-purple-500 to-pink-500 flex items-center justify-center flex-shrink-0 mt-0.5">
                                <component :is="Code" class="w-4 h-4 text-white" />
                            </div>
                            <div>
                                <h2 class="text-xl font-bold font-display text-white">REST API v2 Schema</h2>
                                <p class="text-[10px] font-mono text-slate-500 mt-0.5">Full API reference for integration</p>
                            </div>
                        </div>
                        
                        <p class="text-xs text-slate-400 leading-relaxed">Connect external ERP databases or supply-chain hubs with Aether using our REST endpoint layers. Standard bearer-token authentication is required.</p>
                        
                        <div class="bg-slate-950 p-4 rounded-lg font-mono text-[10px] border border-slate-800 space-y-1.5 relative">
                            <div class="flex items-center gap-2 text-slate-500 border-b border-slate-800 pb-2 mb-2">
                                <component :is="Key" class="w-3.5 h-3.5 text-blue-400" />
                                <span>API Request Example</span>
                            </div>
                            <p><span class="text-emerald-400">POST</span> /api/v2/ledger/reconciliation</p>
                            <p class="text-slate-500">Headers: { "Authorization": "Bearer AE_49102X9" }</p>
                            <p class="text-slate-500">Body: {</p>
                            <p class="text-slate-400">&nbsp;&nbsp;"branchId": "branch-ny-01",</p>
                            <p class="text-slate-400">&nbsp;&nbsp;"adjustAmount": 1290.00,</p>
                            <p class="text-slate-400">&nbsp;&nbsp;"reason": "Quarterly physical count adjustments"</p>
                            <p class="text-slate-500">}</p>
                            <button class="absolute top-2 right-2 text-slate-600 hover:text-slate-400 transition-colors">
                                <component :is="Copy" class="w-3.5 h-3.5" />
                            </button>
                        </div>
                    </div>

                    <!-- Printer Setup -->
                    <div v-else-if="activeChapter === 'printer-setup'" class="space-y-4">
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-gradient-to-r from-emerald-500 to-teal-500 flex items-center justify-center flex-shrink-0 mt-0.5">
                                <component :is="Printer" class="w-4 h-4 text-white" />
                            </div>
                            <div>
                                <h2 class="text-xl font-bold font-display text-white">ESC/POS Printer Directives</h2>
                                <p class="text-[10px] font-mono text-slate-500 mt-0.5">Hardware integration guide</p>
                            </div>
                        </div>
                        
                        <p class="text-xs text-slate-400 leading-relaxed">Hardware terminals communicate using binary packets over the WebUSB browser pipeline. Below is the standard character payload sequence for triggering thermal cutters.</p>
                        
                        <div class="bg-slate-950 p-4 rounded-lg font-mono text-[10px] border border-slate-800 space-y-1.5 relative">
                            <div class="flex items-center gap-2 text-slate-500 border-b border-slate-800 pb-2 mb-2">
                                <component :is="Cpu" class="w-3.5 h-3.5 text-emerald-400" />
                                <span>USB Printer Communication</span>
                            </div>
                            <p class="text-slate-500">// ESC/POS byte definitions</p>
                            <p class="text-slate-400">const ESC = 0x1B;</p>
                            <p class="text-slate-400">const GS = 0x1D;</p>
                            <p class="text-slate-400">const INITIALIZE_PRINTER = [ESC, 0x40];</p>
                            <p class="text-slate-400">const TRIGGER_CUTTER = [GS, 0x56, 0x42, 0x00];</p>
                            <p class="text-emerald-400">await device.transferOut(1, new Uint8Array([...INITIALIZE_PRINTER, ...TRIGGER_CUTTER]));</p>
                            <button class="absolute top-2 right-2 text-slate-600 hover:text-slate-400 transition-colors">
                                <component :is="Copy" class="w-3.5 h-3.5" />
                            </button>
                        </div>
                    </div>

                    <!-- Offline Ledger -->
                    <div v-else-if="activeChapter === 'indexeddb-offline'" class="space-y-4">
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-gradient-to-r from-amber-500 to-orange-500 flex items-center justify-center flex-shrink-0 mt-0.5">
                                <component :is="WifiOff" class="w-4 h-4 text-white" />
                            </div>
                            <div>
                                <h2 class="text-xl font-bold font-display text-white">Offline Ledger Locking</h2>
                                <p class="text-[10px] font-mono text-slate-500 mt-0.5">Offline-first architecture guide</p>
                            </div>
                        </div>
                        
                        <p class="text-xs text-slate-400 leading-relaxed">When network drops occur, transactions are serialized to an IndexedDB store at the branch gateway level. Safe Pessimistic Locking guarantees that items won't be sold twice on separate terminals during synchronization stages.</p>
                        
                        <div class="bg-slate-950 p-4 rounded-lg border border-slate-800 space-y-2">
                            <div class="flex items-center gap-2">
                                <component :is="Database" class="w-4 h-4 text-blue-400" />
                                <h4 class="text-xs font-semibold text-white">Key Features</h4>
                            </div>
                            <div class="space-y-1.5">
                                <div class="flex items-start gap-2 text-[10px] text-slate-400">
                                    <component :is="CheckCircle" class="w-3 h-3 text-emerald-400 flex-shrink-0 mt-0.5" />
                                    <span>Automatic background synchronization</span>
                                </div>
                                <div class="flex items-start gap-2 text-[10px] text-slate-400">
                                    <component :is="CheckCircle" class="w-3 h-3 text-emerald-400 flex-shrink-0 mt-0.5" />
                                    <span>Pessimistic locking prevents double-selling</span>
                                </div>
                                <div class="flex items-start gap-2 text-[10px] text-slate-400">
                                    <component :is="CheckCircle" class="w-3 h-3 text-emerald-400 flex-shrink-0 mt-0.5" />
                                    <span>IndexedDB local storage caching</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="border-t border-slate-800/60 pt-4 mt-4 flex justify-between items-center text-[10px] font-mono text-slate-500">
                        <span class="flex items-center gap-1.5">
                            <component :is="Shield" class="w-3 h-3 text-emerald-400" />
                            Documentation v4.2.0
                        </span>
                        <Link :href="route('docs')" class="text-blue-400 hover:text-blue-300 transition-colors flex items-center gap-1">
                            <span>View Full Documentation</span>
                            <component :is="ExternalLink" class="w-3 h-3" />
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </MarketingLayout>
</template>