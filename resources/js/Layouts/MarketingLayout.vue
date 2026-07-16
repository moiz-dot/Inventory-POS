<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';

// Import Lucide Vue icons
import {
  ArrowRight,
  Menu,
  X,
  ChevronDown,
  Zap,
  Home,
  LayoutDashboard,
  ShoppingBag,
  DollarSign,
  Users,
  BookOpen,
  Headphones,
  MessageCircle,
  CheckCircle,
  Shield,
  Award,
  Globe,
  TrendingUp,
  Package,
  Truck,
  BarChart3,
  FileText,
  HelpCircle,
  Building2,
  Briefcase,
  Lock,
  FileCheck
} from 'lucide-vue-next';

const mobileMenuOpen = ref(false);
const activeDropdown = ref(null);

const navItems = [
    { label: 'Home', route: 'home', icon: Home },
    {
        label: 'Platform',
        icon: LayoutDashboard,
        dropdown: [
            { label: 'Key Features', route: 'features', desc: 'Enterprise-grade supply & POS tools' },
            { label: 'Core Modules', route: 'modules', desc: 'HR, CRM, accounting & procurement' },
            { label: 'Cloud Architecture', route: 'solutions', desc: 'Highly-available global databases' }
        ]
    },
    { label: 'Industries', route: 'industries', icon: Building2 },
    { label: 'Pricing', route: 'pricing', icon: DollarSign },
    {
        label: 'Company',
        icon: Users,
        dropdown: [
            { label: 'About Aether', route: 'about', desc: 'Our mission & executive team' },
            { label: 'Careers', route: 'careers', desc: 'Join core systems engineering' },
            { label: 'Insight Blog', route: 'blog', desc: 'Supply chain & fin-tech research' }
        ]
    },
    {
        label: 'Resources',
        icon: BookOpen,
        dropdown: [
            { label: 'Documentation', route: 'docs', desc: 'API schemas & hardware bindings' },
            { label: 'Support Desk', route: 'support', desc: 'Incident triage & SLA logs' },
            { label: 'FAQ', route: 'faq', desc: 'Common technical queries' }
        ]
    },
    { label: 'Contact', route: 'contact', icon: MessageCircle }
];

// Icon mapping for dropdown items
const dropdownIconMap = {
  'Key Features': Zap,
  'Core Modules': Package,
  'Cloud Architecture': Globe,
  'About Aether': Building2,
  'Careers': Briefcase,
  'Insight Blog': TrendingUp,
  'Documentation': FileText,
  'Support Desk': Headphones,
  'FAQ': HelpCircle
};
</script>

<template>
    <div class="min-h-screen bg-slate-950 text-slate-100 flex flex-col font-sans selection:bg-blue-500/30 selection:text-blue-200 relative">
        <!-- Dynamic Background Noise -->
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_80%_80%_at_50%_-20%,rgba(14,165,233,0.15),rgba(255,255,255,0))] pointer-events-none z-0" />
        <div class="absolute inset-0 bg-[linear-gradient(to_right,rgba(15,23,42,0.4)_1px,transparent_1px),linear-gradient(to_bottom,rgba(15,23,42,0.4)_1px,transparent_1px)] bg-[size:4rem_4rem] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_0%,#000_70%,transparent_100%)] pointer-events-none z-0" />

        <!-- Trust Banner -->
        <div class="bg-slate-900 border-b border-slate-800/80 text-xs py-2 text-center text-slate-400 font-mono relative z-50 flex items-center justify-center px-4 gap-2">
            <span class="flex h-1.5 w-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
            <span>Aether ERP v4.2 Deployment: Real-time Multi-Branch Ledger active.</span>
            <Link :href="route('login')" class="text-white hover:underline ml-2 flex items-center gap-1 font-sans font-medium">
                Enter Portal Demo
                <component :is="ArrowRight" class="w-3 h-3" />
            </Link>
        </div>

        <!-- Main Navigation Bar -->
        <header class="sticky top-0 z-40 bg-slate-950/80 backdrop-blur-md border-b border-slate-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
                <Link :href="route('home')" class="flex items-center gap-3 cursor-pointer group select-none">
                    <div class="w-9 h-9 rounded-lg bg-gradient-to-tr from-blue-600 via-blue-500 to-indigo-700 flex items-center justify-center shadow-[0_0_15px_rgba(59,130,246,0.5)] group-hover:scale-105 transition-all">
                        <span class="text-white font-display font-extrabold text-lg tracking-wider">Æ</span>
                    </div>
                    <div>
                        <span class="text-white font-display font-bold text-lg tracking-widest">AETHER</span>
                        <span class="text-slate-500 font-mono text-[9px] block tracking-normal -mt-1 uppercase">Enterprise ERP</span>
                    </div>
                </Link>

                <nav class="hidden lg:flex items-center gap-1">
                    <div v-for="(item, idx) in navItems" :key="idx" class="relative" @mouseenter="activeDropdown = item.label" @mouseleave="activeDropdown = null">
                        <template v-if="item.dropdown">
                            <button class="flex items-center gap-1 px-4 py-2 text-sm text-slate-300 hover:text-white rounded-lg hover:bg-slate-900/60 transition-colors">
                                {{ item.label }}
                                <component :is="ChevronDown" class="w-3.5 h-3.5 transition-transform duration-200" :class="activeDropdown === item.label ? 'rotate-180' : ''" />
                            </button>
                            <div v-if="activeDropdown === item.label" class="absolute top-full left-1/2 -translate-x-1/2 mt-1 w-80 bg-slate-950 border border-slate-800/80 rounded-xl p-4 shadow-2xl backdrop-blur-lg animate-in fade-in slide-in-from-top-1 duration-150">
                                <div class="grid gap-2">
                                    <Link v-for="(sub, sIdx) in item.dropdown" :key="sIdx" :href="route(sub.route)" class="flex gap-3 p-2.5 rounded-lg hover:bg-slate-900 transition-colors group">
                                        <div class="w-8 h-8 rounded-md bg-slate-900 border border-slate-800 flex items-center justify-center text-blue-400 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                                            <component 
                                                :is="dropdownIconMap[sub.label] || Zap" 
                                                class="w-4 h-4" 
                                            />
                                        </div>
                                        <div>
                                            <h5 class="text-xs font-semibold text-white">{{ sub.label }}</h5>
                                            <p class="text-[10px] text-slate-400 mt-0.5 leading-snug">{{ sub.desc }}</p>
                                        </div>
                                    </Link>
                                </div>
                            </div>
                        </template>
                        <template v-else>
                            <Link :href="route(item.route)" class="px-4 py-2 text-sm rounded-lg transition-colors text-slate-300 hover:text-white hover:bg-slate-900/40">
                                {{ item.label }}
                            </Link>
                        </template>
                    </div>
                </nav>

                <div class="hidden lg:flex items-center gap-4">
                    <Link :href="route('login')" class="text-sm font-medium text-slate-300 hover:text-white px-4 py-2 transition-colors">Sign In</Link>
                    <Link :href="route('register')" class="px-5 py-2 rounded-lg bg-white text-slate-950 font-medium text-sm hover:bg-slate-200 shadow-md hover:shadow-lg transition-all flex items-center gap-2 group">
                        Request Access
                        <component :is="ArrowRight" class="w-4 h-4 group-hover:translate-x-1 transition-transform" />
                    </Link>
                </div>

                <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden p-2 text-slate-400 hover:text-white transition-colors">
                    <component :is="mobileMenuOpen ? X : Menu" class="w-6 h-6" />
                </button>
            </div>

            <!-- Mobile Menu -->
            <div v-if="mobileMenuOpen" class="lg:hidden border-t border-slate-900 bg-slate-950 px-4 py-6 space-y-4">
                <div class="space-y-1">
                    <div v-for="(item, idx) in navItems" :key="idx">
                        <template v-if="item.dropdown">
                            <div class="text-xs font-semibold text-slate-500 uppercase tracking-wider px-3 mb-2">{{ item.label }}</div>
                            <Link v-for="(sub, sIdx) in item.dropdown" :key="sIdx" :href="route(sub.route)" class="w-full flex items-center gap-3 px-3 py-2 text-sm text-slate-300 hover:text-white hover:bg-slate-900 rounded-lg text-left">
                                <component 
                                    :is="dropdownIconMap[sub.label] || Zap" 
                                    class="w-4 h-4 text-blue-400" 
                                />
                                <span>{{ sub.label }}</span>
                            </Link>
                        </template>
                        <template v-else>
                            <Link :href="route(item.route)" class="w-full block px-3 py-2.5 text-sm text-slate-300 hover:text-white hover:bg-slate-900 rounded-lg text-left">{{ item.label }}</Link>
                        </template>
                    </div>
                </div>
                <div class="pt-4 border-t border-slate-900 space-y-2">
                    <Link :href="route('login')" class="w-full block text-center px-4 py-2.5 text-sm font-medium text-slate-300 hover:text-white hover:bg-slate-900 rounded-lg">Sign In</Link>
                    <Link :href="route('register')" class="w-full block text-center px-4 py-2.5 text-sm font-medium bg-blue-600 text-white rounded-lg hover:bg-blue-500">Request Access</Link>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-1 relative z-10">
            <slot />
        </main>

        <!-- Footer -->
        <footer class="bg-slate-950 border-t border-slate-900 relative z-10 pt-20 pb-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-2 md:grid-cols-6 gap-8 pb-12 border-b border-slate-900">
                    <div class="col-span-2 space-y-4">
                        <Link :href="route('home')" class="flex items-center gap-2 cursor-pointer">
                            <div class="w-7 h-7 rounded-md bg-blue-600 flex items-center justify-center"><span class="text-white font-display font-extrabold text-sm">Æ</span></div>
                            <span class="text-white font-display font-bold text-base tracking-widest">AETHER</span>
                        </Link>
                        <p class="text-xs text-slate-400 leading-relaxed max-w-sm">The world's most robust retail ERP and inventory coordinator. Architected for hyper-scale multi-branch chains, precision warehouse synchrony, and global ledger integrity.</p>
                        <div class="flex gap-4 text-slate-500 text-xs font-mono">
                            <span class="flex items-center gap-1">
                                <component :is="Shield" class="w-3.5 h-3.5" />
                                ISO 27001 SECURE
                            </span>
                            <span>•</span>
                            <span class="flex items-center gap-1">
                                <component :is="Award" class="w-3.5 h-3.5" />
                                99.99% SLA UPTIME
                            </span>
                        </div>
                    </div>
                    <div>
                        <h4 class="text-xs font-semibold text-white uppercase tracking-wider mb-4">Solutions</h4>
                        <ul class="space-y-2 text-xs text-slate-400">
                            <li><Link :href="route('industries')" class="hover:text-white transition-colors flex items-center gap-1.5"><component :is="TrendingUp" class="w-3 h-3" /> Grocery Chains</Link></li>
                            <li><Link :href="route('industries')" class="hover:text-white transition-colors flex items-center gap-1.5"><component :is="ShoppingBag" class="w-3 h-3" /> Apparel Franchises</Link></li>
                            <li><Link :href="route('industries')" class="hover:text-white transition-colors flex items-center gap-1.5"><component :is="Truck" class="w-3 h-3" /> Wholesalers</Link></li>
                            <li><Link :href="route('industries')" class="hover:text-white transition-colors flex items-center gap-1.5"><component :is="BarChart3" class="w-3 h-3" /> Electronics Stores</Link></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-xs font-semibold text-white uppercase tracking-wider mb-4">Platform</h4>
                        <ul class="space-y-2 text-xs text-slate-400">
                            <li><Link :href="route('features')" class="hover:text-white transition-colors flex items-center gap-1.5"><component :is="LayoutDashboard" class="w-3 h-3" /> POS Cash Register</Link></li>
                            <li><Link :href="route('modules')" class="hover:text-white transition-colors flex items-center gap-1.5"><component :is="Package" class="w-3 h-3" /> Branch Logistics</Link></li>
                            <li><Link :href="route('modules')" class="hover:text-white transition-colors flex items-center gap-1.5"><component :is="FileText" class="w-3 h-3" /> Barcode Engine</Link></li>
                            <li><Link :href="route('modules')" class="hover:text-white transition-colors flex items-center gap-1.5"><component :is="DollarSign" class="w-3 h-3" /> Double-Entry Finance</Link></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-xs font-semibold text-white uppercase tracking-wider mb-4">Resources</h4>
                        <ul class="space-y-2 text-xs text-slate-400">
                            <li><Link :href="route('docs')" class="hover:text-white transition-colors flex items-center gap-1.5"><component :is="BookOpen" class="w-3 h-3" /> System Docs</Link></li>
                            <li><Link :href="route('faq')" class="hover:text-white transition-colors flex items-center gap-1.5"><component :is="HelpCircle" class="w-3 h-3" /> Common FAQs</Link></li>
                            <li><Link :href="route('support')" class="hover:text-white transition-colors flex items-center gap-1.5"><component :is="Headphones" class="w-3 h-3" /> Incident Support</Link></li>
                            <li><Link :href="route('blog')" class="hover:text-white transition-colors flex items-center gap-1.5"><component :is="TrendingUp" class="w-3 h-3" /> Engineering Blog</Link></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-xs font-semibold text-white uppercase tracking-wider mb-4">Legal & Corp</h4>
                        <ul class="space-y-2 text-xs text-slate-400">
                            <li><Link :href="route('about')" class="hover:text-white transition-colors flex items-center gap-1.5"><component :is="Building2" class="w-3 h-3" /> About Us</Link></li>
                            <li><Link :href="route('careers')" class="hover:text-white transition-colors flex items-center gap-1.5"><component :is="Briefcase" class="w-3 h-3" /> Careers</Link></li>
                            <li><Link :href="route('privacy')" class="hover:text-white transition-colors flex items-center gap-1.5"><component :is="Lock" class="w-3 h-3" /> Privacy Charter</Link></li>
                            <li><Link :href="route('terms')" class="hover:text-white transition-colors flex items-center gap-1.5"><component :is="FileCheck" class="w-3 h-3" /> Service Terms</Link></li>
                        </ul>
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row justify-between items-center pt-8 text-xs text-slate-500 font-mono gap-4">
                    <p>© 2026 Aether Technologies Inc. All systems operational.</p>
                    <div class="flex gap-4">
                        <span class="flex items-center gap-1">
                            <component :is="CheckCircle" class="w-3.5 h-3.5 text-emerald-400" />
                            SOC2 Compliant
                        </span>
                        <span>•</span>
                        <span class="flex items-center gap-1">
                            <component :is="Shield" class="w-3.5 h-3.5" />
                            SEC Registered
                        </span>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>