<script setup>
import { ref, computed } from 'vue';
import MarketingLayout from '@/Layouts/MarketingLayout.vue';
import { Link } from '@inertiajs/vue3';

// Import Lucide Vue icons
import {
  Search,
  ChevronDown,
  ChevronRight,
  HelpCircle,
  MessageCircle,
  Zap,
  Shield,
  Database,
  WifiOff,
  Printer,
  Building2,
  CheckCircle,
  ArrowRight,
  BookOpen,
  Users,
  Clock,
  Award,
  Globe,
  LayoutDashboard,
  Package,
  FileText,
  Headphones,
  Lightbulb
} from 'lucide-vue-next';

const searchQuery = ref('');
const expandedId = ref('faq-1');

const FAQ_ITEMS = [
    { 
        id: 'faq-1', 
        question: 'How does the platform prevent concurrency issues during multi-branch sales?', 
        answer: 'Our platform implements isolated Pessimistic Locking streams and highly synchronized database pipelines. When a cashier at branch A clicks pay, the stock is reserved instantly in our distributed real-time ledger, preventing double-selling.', 
        category: 'Architecture',
        icon: Database
    },
    { 
        id: 'faq-2', 
        question: 'Can we integrate existing hardware, such as thermal printers and POS hardware?', 
        answer: 'Yes. Our platform supports low-latency WebSerial and WebUSB protocols. It binds directly with industry-standard ESC/POS thermal printers, multi-frequency barcode scanners, and scales without needing complex local drivers.', 
        category: 'Hardware & Integrations',
        icon: Printer
    },
    { 
        id: 'faq-3', 
        question: 'What is the onboarding process for 50+ hypermarkets and distribution centers?', 
        answer: 'We provide specialized enterprise transition engineers. Your legacy data is mapped using automated ETL pipelines, verified in a staging environment, and pushed live. Typically, a 50-branch hypermarket network transitions fully in under 21 business days.', 
        category: 'Enterprise Onboarding',
        icon: Building2
    },
    { 
        id: 'faq-4', 
        question: 'Is there support for offline mode in retail branches with unstable internet?', 
        answer: 'Yes. The POS terminal includes an embedded, high-reliability IndexedDB offline state. It retains fully certified security states, inventory cache, and customer records. The moment connection is re-established, the audit log triggers a self-resolving background synchronization step.', 
        category: 'Offline Architecture',
        icon: WifiOff
    }
];

const filteredFaq = computed(() => 
    FAQ_ITEMS.filter(item => 
        item.question.toLowerCase().includes(searchQuery.value.toLowerCase()) || 
        item.answer.toLowerCase().includes(searchQuery.value.toLowerCase())
    )
);

const quickLinks = [
    { label: 'Documentation', icon: BookOpen, route: 'docs' },
    { label: 'Support Desk', icon: Headphones, route: 'support' },
    { label: 'System Status', icon: Clock, route: 'status' },
    { label: 'Community', icon: Users, route: 'community' }
];

const popularTopics = [
    'Offline Mode',
    'Hardware Integration',
    'Security',
    'Migration',
    'Performance',
    'APIs'
];
</script>

<template>
    <MarketingLayout>
        <div class="max-w-4xl mx-auto px-4 sm:px-6 py-20 space-y-12">
            <!-- Header -->
            <div class="text-center space-y-4">
                <div class="inline-flex items-center gap-2 bg-slate-900/50 border border-slate-800/80 px-4 py-2 rounded-full">
                    <component :is="HelpCircle" class="w-4 h-4 text-emerald-400" />
                    <span class="text-xs font-mono font-bold text-emerald-400 tracking-widest uppercase">FAQ REFERENCE</span>
                </div>
                <h1 class="text-4xl font-bold font-display text-white tracking-tight">Operational Support Answers</h1>
                <div class="flex items-center justify-center gap-2">
                    <component :is="Lightbulb" class="w-5 h-5 text-emerald-400" />
                    <p class="text-slate-400 text-sm">Granular details regarding database synchronicity, local offline operations, and printer integrations.</p>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                <Link v-for="(link, idx) in quickLinks" :key="idx" :href="route(link.route)" class="group bg-slate-900/20 border border-slate-800/80 p-3 rounded-xl text-center hover:border-slate-700/80 hover:bg-slate-900/30 transition-all">
                    <component :is="link.icon" class="w-4 h-4 text-blue-400 mx-auto mb-1" />
                    <span class="text-[9px] font-mono text-slate-400 group-hover:text-white transition-colors">{{ link.label }}</span>
                </Link>
            </div>

            <!-- Search -->
            <div class="relative max-w-xl mx-auto">
                <component :is="Search" class="w-4 h-4 text-slate-500 absolute left-4 top-1/2 -translate-y-1/2" />
                <input 
                    type="text" 
                    v-model="searchQuery" 
                    placeholder="Filter technical FAQs (e.g. offline, locks, printers...)" 
                    class="w-full bg-slate-900/60 border border-slate-800/80 focus:border-emerald-500/40 focus:ring-1 focus:ring-emerald-500/20 rounded-xl py-3 pl-12 pr-4 text-xs text-slate-200 outline-none transition-all placeholder:text-slate-500" 
                />
            </div>

            <!-- Popular Topics -->
            <div class="flex flex-wrap justify-center gap-2">
                <span class="text-[9px] font-mono text-slate-500 uppercase tracking-wider flex items-center gap-1.5">
                    <component :is="Zap" class="w-3 h-3 text-emerald-400" />
                    Popular Topics:
                </span>
                <span v-for="(topic, idx) in popularTopics" :key="idx" class="text-[9px] font-mono bg-slate-900/60 border border-slate-800/60 px-2.5 py-0.5 rounded-full text-slate-400 hover:text-white hover:border-slate-700 transition-all cursor-pointer">
                    {{ topic }}
                </span>
            </div>

            <!-- FAQ Items -->
            <div class="space-y-3 pt-6">
                <div v-if="filteredFaq.length > 0">
                    <div v-for="item in filteredFaq" :key="item.id" class="group bg-slate-900/20 border border-slate-800/80 rounded-xl overflow-hidden transition-all hover:border-slate-700/80">
                        <button 
                            @click="expandedId = expandedId === item.id ? null : item.id" 
                            class="w-full flex justify-between items-center p-5 text-left focus:outline-none hover:bg-slate-900/30 transition-colors"
                        >
                            <div class="flex items-center gap-3 flex-1">
                                <div class="w-7 h-7 rounded-lg bg-gradient-to-br from-emerald-500 to-teal-500 flex items-center justify-center flex-shrink-0">
                                    <component :is="item.icon" class="w-3.5 h-3.5 text-white" />
                                </div>
                                <span class="text-xs font-semibold text-slate-200 group-hover:text-white transition-colors">{{ item.question }}</span>
                            </div>
                            <div class="flex items-center gap-2 flex-shrink-0">
                                <span class="text-[9px] font-mono text-slate-500 bg-slate-900/60 px-2 py-0.5 rounded-full uppercase">
                                    {{ item.category }}
                                </span>
                                <component 
                                    :is="expandedId === item.id ? ChevronDown : ChevronRight" 
                                    class="w-4 h-4 text-slate-500 transition-transform duration-200" 
                                    :class="expandedId === item.id ? 'text-emerald-400' : ''"
                                />
                            </div>
                        </button>
                        
                        <div v-if="expandedId === item.id" class="px-5 pb-5 pt-3 border-t border-slate-800/60 text-xs text-slate-400 leading-relaxed flex items-start gap-3">
                            <component :is="CheckCircle" class="w-3.5 h-3.5 text-emerald-400 flex-shrink-0 mt-0.5" />
                            <span>{{ item.answer }}</span>
                        </div>
                    </div>
                </div>
                
                <div v-else class="text-center py-12 space-y-4">
                    <component :is="Search" class="w-12 h-12 text-slate-600 mx-auto" />
                    <p class="text-xs text-slate-500">No technical matching questions found for "{{ searchQuery }}".</p>
                    <button @click="searchQuery = ''" class="text-[10px] font-mono text-emerald-400 hover:underline flex items-center gap-1 mx-auto">
                        <component :is="ArrowRight" class="w-3 h-3" />
                        Clear search
                    </button>
                </div>
            </div>

            <!-- Still Have Questions? -->
            <div class="bg-gradient-to-r from-slate-950 via-slate-900 to-slate-950 border border-slate-800/80 rounded-2xl p-8 text-center relative overflow-hidden">
                <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,rgba(16,185,129,0.05),transparent_70%)] pointer-events-none"></div>
                <div class="relative space-y-4">
                    <div class="flex items-center justify-center gap-2">
                        <component :is="MessageCircle" class="w-5 h-5 text-emerald-400" />
                        <h3 class="text-lg font-bold text-white font-display">Still have questions?</h3>
                    </div>
                    <p class="text-xs text-slate-400 max-w-md mx-auto">Our technical support team is ready to assist with any specific deployment questions.</p>
                    <div class="flex flex-col sm:flex-row gap-3 justify-center pt-2">
                        <Link :href="route('contact')" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-emerald-600 text-white text-xs font-semibold rounded-lg hover:bg-emerald-500 transition-colors">
                            <component :is="Headphones" class="w-4 h-4" />
                            Contact Support
                        </Link>
                        <Link :href="route('docs')" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-slate-950 border border-slate-800 text-slate-300 text-xs font-semibold rounded-lg hover:bg-slate-900 transition-colors">
                            <component :is="FileText" class="w-4 h-4" />
                            Browse Documentation
                        </Link>
                    </div>
                    <div class="flex flex-wrap justify-center gap-3 text-[9px] font-mono text-slate-500 pt-2">
                        <span class="flex items-center gap-1">
                            <component :is="CheckCircle" class="w-3 h-3 text-emerald-400" />
                            SLA response: 24hrs
                        </span>
                        <span class="flex items-center gap-1">
                            <component :is="CheckCircle" class="w-3 h-3 text-emerald-400" />
                            Priority support available
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </MarketingLayout>
</template>