<script setup>
import MarketingLayout from '@/Layouts/MarketingLayout.vue';
import { Link } from '@inertiajs/vue3';

// Import Lucide Vue icons
import {
  BookOpen,
  Calendar,
  Clock,
  User,
  Briefcase,
  ArrowRight,
  Tag,
  TrendingUp,
  Users,
  Zap,
  Award,
  FileText,
  PenTool,
  Globe,
  Shield,
  MessageCircle,
  Eye,
  Heart,
  Share2
} from 'lucide-vue-next';

const BLOG_POSTS = [
    { 
        id: 'blog-1', 
        title: 'The Blueprint of Next-Gen Supply Chains', 
        excerpt: 'As retail businesses grow, cross-branch synchronicity becomes the primary driver of margin gains.', 
        category: 'Supply Chain Strategy', 
        date: 'Jul 12, 2026', 
        readTime: '8 min read', 
        author: 'Elena Rostova', 
        authorRole: 'VP of Global Logistics', 
        imageUrl: 'https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=800&q=80',
        icon: TrendingUp
    },
    { 
        id: 'blog-2', 
        title: 'Real-time Financial Ledger Consolidation', 
        excerpt: 'Manual reconciliation is a multi-million dollar leak. We detail architectural strategies for absolute real-time auditing.', 
        category: 'Finance Technology', 
        date: 'Jun 28, 2026', 
        readTime: '12 min read', 
        author: 'Arthur Pendelton', 
        authorRole: 'Head of FinTech', 
        imageUrl: 'https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?auto=format&fit=crop&w=800&q=80',
        icon: Shield
    },
    { 
        id: 'blog-3', 
        title: 'How RFID and Barcode Automation Minimize Sourcing Latency', 
        excerpt: 'Evaluating human-in-the-loop inventory scanning systems versus true computer-vision barcode triggers.', 
        category: 'Automation & Hardware', 
        date: 'May 14, 2026', 
        readTime: '6 min read', 
        author: 'Linus Chen', 
        authorRole: 'IoT Hardware Architect', 
        imageUrl: 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=800&q=80',
        icon: Zap
    }
];

const featuredPosts = [
    { label: 'Most Popular', count: '2.4k+ reads' },
    { label: 'Latest Release', count: 'v4.2 announcement' },
    { label: 'Community', count: '1.8k+ active' }
];
</script>

<template>
    <MarketingLayout>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 space-y-16">
            <!-- Header -->
            <div class="text-center max-w-2xl mx-auto space-y-4">
                <div class="inline-flex items-center gap-2 bg-slate-900/50 border border-slate-800/80 px-4 py-2 rounded-full">
                    <component :is="BookOpen" class="w-4 h-4 text-blue-400" />
                    <span class="text-xs font-mono font-bold text-blue-400 tracking-widest uppercase">THE COOPERATIVE DIGEST</span>
                </div>
                <h1 class="text-4xl font-bold font-display text-white tracking-tight">Insight & Engineering Blog</h1>
                <div class="flex items-center justify-center gap-2">
                    <component :is="PenTool" class="w-5 h-5 text-blue-400" />
                    <p class="text-slate-400 text-sm">Technical papers, supply chain models, and systems engineering updates from our core architects.</p>
                </div>
            </div>

            <!-- Blog Stats -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div v-for="(stat, idx) in featuredPosts" :key="idx" class="bg-slate-900/20 border border-slate-800/80 p-4 rounded-xl text-center group hover:border-slate-700/80 transition-all">
                    <div class="flex items-center justify-center gap-2">
                        <component :is="idx === 0 ? Eye : idx === 1 ? Calendar : Users" class="w-4 h-4 text-blue-400" />
                        <span class="text-xs font-semibold text-white">{{ stat.label }}</span>
                    </div>
                    <p class="text-[10px] font-mono text-slate-400 mt-1">{{ stat.count }}</p>
                </div>
            </div>

            <!-- Blog Posts Grid -->
            <div class="grid md:grid-cols-3 gap-8 pt-6">
                <article v-for="post in BLOG_POSTS" :key="post.id" class="group bg-slate-900/20 border border-slate-800/80 rounded-2xl overflow-hidden hover:border-slate-700/80 hover:bg-slate-900/30 transition-all flex flex-col justify-between relative">
                    <!-- Image Container -->
                    <div class="relative aspect-[16/10] w-full bg-slate-800 overflow-hidden">
                        <img :src="post.imageUrl" :alt="post.title" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                        
                        <!-- Category Badge -->
                        <span class="absolute top-4 left-4 bg-slate-950/80 backdrop-blur-md text-[9px] font-mono text-slate-300 px-2.5 py-1 rounded-full uppercase tracking-wider flex items-center gap-1.5">
                            <component :is="Tag" class="w-2.5 h-2.5 text-blue-400" />
                            {{ post.category }}
                        </span>
                        
                        <!-- Icon Overlay -->
                        <div class="absolute bottom-4 right-4 bg-slate-950/80 backdrop-blur-md p-2 rounded-full">
                            <component :is="post.icon" class="w-4 h-4 text-blue-400" />
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-6 space-y-3 flex-1">
                        <div class="flex items-center gap-3 text-[10px] font-mono text-slate-500">
                            <span class="flex items-center gap-1">
                                <component :is="Calendar" class="w-3 h-3" />
                                {{ post.date }}
                            </span>
                            <span>•</span>
                            <span class="flex items-center gap-1">
                                <component :is="Clock" class="w-3 h-3" />
                                {{ post.readTime }}
                            </span>
                        </div>
                        
                        <h3 class="text-sm font-semibold text-white leading-snug group-hover:text-blue-200 transition-colors">{{ post.title }}</h3>
                        
                        <p class="text-xs text-slate-400 leading-relaxed line-clamp-3">{{ post.excerpt }}</p>
                    </div>

                    <!-- Footer -->
                    <div class="p-6 border-t border-slate-800/60 flex justify-between items-center text-[10px] font-mono text-slate-500">
                        <div class="flex items-center gap-2">
                            <div class="w-6 h-6 rounded-full bg-gradient-to-r from-blue-600 to-indigo-600 flex items-center justify-center text-white text-[8px] font-bold">
                                {{ post.author.charAt(0) }}
                            </div>
                            <div>
                                <span class="block text-slate-300">{{ post.author }}</span>
                                <span class="text-[8px] text-slate-500">{{ post.authorRole }}</span>
                            </div>
                        </div>
                        <Link :href="route('blog.show', { id: post.id })" class="text-blue-400 hover:text-blue-300 transition-colors flex items-center gap-1 group/link">
                            <span>Read Document</span>
                            <component :is="ArrowRight" class="w-3 h-3 group-hover/link:translate-x-1 transition-transform" />
                        </Link>
                    </div>
                </article>
            </div>

            <!-- Newsletter CTA -->
            <div class="bg-gradient-to-r from-slate-950 via-slate-900 to-slate-950 border border-slate-800/80 rounded-2xl p-8 max-w-3xl mx-auto text-center relative overflow-hidden">
                <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,rgba(59,130,246,0.05),transparent_70%)] pointer-events-none"></div>
                <div class="relative space-y-4">
                    <div class="flex items-center justify-center gap-2">
                        <component :is="FileText" class="w-5 h-5 text-blue-400" />
                        <h3 class="text-lg font-bold text-white font-display">Subscribe to Our Newsletter</h3>
                    </div>
                    <p class="text-xs text-slate-400 max-w-md mx-auto">Get the latest engineering insights, supply chain strategies, and product updates delivered to your inbox.</p>
                    <div class="flex flex-col sm:flex-row gap-3 justify-center pt-2">
                        <input type="email" placeholder="Enter your email" class="px-4 py-2.5 bg-slate-950 border border-slate-800 rounded-lg text-xs text-slate-200 placeholder:text-slate-500 focus:border-blue-500/40 outline-none flex-1 max-w-xs" />
                        <Link :href="route('contact')" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-blue-600 text-white text-xs font-semibold rounded-lg hover:bg-blue-500 transition-colors">
                            <component :is="MessageCircle" class="w-4 h-4" />
                            Subscribe
                        </Link>
                    </div>
                    <div class="flex flex-wrap justify-center gap-3 text-[9px] font-mono text-slate-500 pt-2">
                        <span class="flex items-center gap-1">
                            <component :is="Shield" class="w-3 h-3 text-emerald-400" />
                            No spam
                        </span>
                        <span class="flex items-center gap-1">
                            <component :is="Heart" class="w-3 h-3 text-rose-400" />
                            Unsubscribe anytime
                        </span>
                        <span class="flex items-center gap-1">
                            <component :is="Share2" class="w-3 h-3 text-blue-400" />
                            Share with team
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </MarketingLayout>
</template>