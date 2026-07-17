<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';

// Import Lucide Vue icons
import {
  Users,
  User,
  Award,
  DollarSign,
  Mail,
  Send,
  CheckCircle,
  AlertCircle,
  Plus,
  Search,
  Filter,
  Edit,
  Trash2,
  Eye,
  Clock,
  Shield,
  Building2,
  Briefcase,
  Star,
  TrendingUp,
  MessageCircle,
  Phone,
  Calendar,
  ArrowRight,
  Save,
  X,
  Printer,
  Download,
  Upload,
  RefreshCw,
  Zap,
  Crown,
  UserPlus,
  Tag,
  PieChart
} from 'lucide-vue-next';

const customers = ref([
    { id: 'cust-1', name: 'Apex Retail Group', tier: 'Wholesale', totalSpent: 428000 },
    { id: 'cust-2', name: 'Eleanor Vance', tier: 'VIP', totalSpent: 48900 },
    { id: 'cust-3', name: 'Global Outfitters Inc.', tier: 'Wholesale', totalSpent: 124500 }
]);

const smsTier = ref('VIP');
const smsMsg = ref('Exclusive Summer Collection arrivals are now active. Standard VIP discounts apply.');
const smsSent = ref(false);

const sendSms = (e) => { 
    e.preventDefault(); 
    smsSent.value = true; 
    setTimeout(() => smsSent.value = false, 4000); 
};

// Helper for tier badge color
const getTierColor = (tier) => {
    if (tier === 'VIP') return 'from-purple-500 to-pink-500';
    if (tier === 'Wholesale') return 'from-blue-500 to-cyan-500';
    return 'from-slate-500 to-slate-400';
};

const getTierIcon = (tier) => {
    if (tier === 'VIP') return Crown;
    if (tier === 'Wholesale') return Building2;
    return User;
};

// Calculate stats
const totalCustomers = customers.value.length;
const totalSpent = customers.value.reduce((sum, c) => sum + c.totalSpent, 0);
const vipCount = customers.value.filter(c => c.tier === 'VIP').length;
</script>

<template>
    <AppLayout title="CRM">
        <div class="space-y-6">
            <!-- Header -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <div class="flex items-center gap-2">
                        <component :is="Users" class="w-5 h-5 text-blue-400" />
                        <h2 class="text-xl font-bold text-primary tracking-tight">Customer Relationship Management (CRM)</h2>
                    </div>
                    <p class="text-xs text-muted-light font-mono mt-0.5">Roster directories and loyalty tier promotions</p>
                </div>
                <button class="px-4 py-2 bg-blue-600 hover:bg-blue-500 rounded-lg text-xs text-primary font-semibold flex items-center gap-1.5 transition-colors shadow-lg shadow-blue-600/20">
                    <component :is="UserPlus" class="w-4 h-4" />
                    Add Customer
                </button>
            </div>

            <!-- Quick Stats -->
            <div class="grid grid-cols-3 gap-4">
                <div class="bg-card-light border border-card p-4 rounded-xl text-center">
                    <div class="flex items-center justify-center gap-1.5">
                        <component :is="Users" class="w-4 h-4 text-blue-400" />
                        <span class="text-lg font-bold text-primary">{{ totalCustomers }}</span>
                    </div>
                    <p class="text-[9px] font-mono text-muted-light uppercase">Total Customers</p>
                </div>
                <div class="bg-card-light border border-card p-4 rounded-xl text-center">
                    <div class="flex items-center justify-center gap-1.5">
                        <component :is="Crown" class="w-4 h-4 text-purple-400" />
                        <span class="text-lg font-bold text-primary">{{ vipCount }}</span>
                    </div>
                    <p class="text-[9px] font-mono text-muted-light uppercase">VIP Members</p>
                </div>
                <div class="bg-card-light border border-card p-4 rounded-xl text-center">
                    <div class="flex items-center justify-center gap-1.5">
                        <component :is="DollarSign" class="w-4 h-4 text-emerald-400" />
                        <span class="text-lg font-bold text-primary">${{ totalSpent.toLocaleString() }}</span>
                    </div>
                    <p class="text-[9px] font-mono text-muted-light uppercase">Total Revenue</p>
                </div>
            </div>

            <div class="grid lg:grid-cols-12 gap-8 items-start">
                <!-- Left Column - SMS Blast -->
                <div class="lg:col-span-5 bg-card-hover border border-card p-6 rounded-2xl space-y-4">
                    <div class="flex items-center gap-2">
                        <component :is="MessageCircle" class="w-4 h-4 text-blue-400" />
                        <h3 class="text-xs font-semibold text-muted font-mono uppercase">Loyalty Promo Blast</h3>
                    </div>

                    <form @submit="sendSms" class="space-y-4">
                        <div class="space-y-1.5">
                            <label class="text-[10px] font-mono text-muted-light uppercase flex items-center gap-1.5">
                                <component :is="Tag" class="w-3 h-3" />
                                Target Loyalty Tier
                            </label>
                            <select 
                                v-model="smsTier" 
                                class="w-full bg-primary border border-card focus:border-blue-500/40 rounded-lg p-2.5 text-xs text-secondary outline-none transition-all"
                            >
                                <option value="VIP">VIP Tier Customers (15% promo)</option>
                                <option value="Regular">Regular Tier Customers (Standard)</option>
                                <option value="Wholesale">Wholesale Bulk accounts (10% promo)</option>
                            </select>
                        </div>

                        <div class="space-y-1.5">
                            <label class="text-[10px] font-mono text-muted-light uppercase flex items-center gap-1.5">
                                <component :is="Mail" class="w-3 h-3" />
                                Campaign Message Payload
                            </label>
                            <textarea 
                                v-model="smsMsg" 
                                rows="4" 
                                class="w-full bg-primary border border-card focus:border-blue-500/40 rounded-lg p-2.5 text-xs text-primary resize-none outline-none transition-all placeholder:text-muted-light"
                                placeholder="Enter your campaign message..."
                            ></textarea>
                            <div class="flex justify-between text-[8px] font-mono text-muted-light">
                                <span>Characters: {{ smsMsg.length }}</span>
                                <span>Max: 1600</span>
                            </div>
                        </div>

                        <button type="submit" class="w-full py-2.5 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-xs text-primary font-semibold rounded-lg flex items-center justify-center gap-2 transition-all shadow-lg shadow-blue-600/20">
                            <component :is="Send" class="w-3.5 h-3.5" />
                            Dispatch SMS Campaign
                        </button>
                    </form>

                    <!-- Success Message -->
                    <div v-if="smsSent" class="bg-emerald-500/10 border border-emerald-500/20 p-3 rounded-lg text-xs text-emerald-400 flex items-center gap-2 font-mono animate-in fade-in slide-in-from-top-2 duration-300">
                        <component :is="CheckCircle" class="w-4 h-4" />
                        Loyalty dispatch triggered successfully.
                    </div>

                    <!-- Tier Info -->
                    <div class="bg-card-50 border border-light rounded-lg p-3 text-[9px] font-mono text-muted">
                        <div class="flex items-center gap-2">
                            <component :is="Zap" class="w-3 h-3 text-amber-400" />
                            <span class="text-muted-light">Estimated recipients:</span>
                            <span class="text-primary font-bold">
                                {{ customers.filter(c => c.tier === smsTier).length }} customers
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Customers List -->
                <div class="lg:col-span-7 bg-card-light border border-card rounded-2xl p-6 space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <component :is="Users" class="w-4 h-4 text-emerald-400" />
                            <h3 class="text-xs font-semibold text-tertiary font-mono">Client Loyalty Accounts</h3>
                        </div>
                        <span class="text-[8px] font-mono text-muted-light">{{ customers.length }} active</span>
                    </div>

                    <div class="space-y-2">
                        <div v-for="c in customers" :key="c.id" class="group bg-primary border border-card p-4 rounded-xl hover:border-card hover:bg-card transition-all">
                            <div class="flex justify-between items-center">
                                <div class="flex items-start gap-3">
                                    <div class="w-8 h-8 rounded-lg bg-gradient-to-br flex items-center justify-center flex-shrink-0" :class="getTierColor(c.tier)">
                                        <component :is="getTierIcon(c.tier)" class="w-4 h-4 text-primary" />
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-primary text-xs group-hover:text-blue-200 transition-colors">{{ c.name }}</h4>
                                        <div class="flex items-center gap-2 mt-0.5">
                                            <span class="text-[10px] font-mono text-muted-light flex items-center gap-1">
                                                <component :is="Award" class="w-2.5 h-2.5" />
                                                Tier:
                                            </span>
                                            <span class="text-[10px] font-mono font-bold" :class="c.tier === 'VIP' ? 'text-purple-400' : 'text-blue-400'">
                                                {{ c.tier }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <span class="text-[10px] text-muted-light block flex items-center justify-end gap-1">
                                        <component :is="DollarSign" class="w-2.5 h-2.5" />
                                        Total Spent
                                    </span>
                                    <span class="font-mono text-secondary font-bold">${{ c.totalSpent.toLocaleString() }}</span>
                                </div>
                            </div>
                            <!-- Hover actions -->
                            <div class="mt-2 pt-2 border-t border-light flex items-center justify-end gap-3 opacity-0 group-hover:opacity-100 transition-opacity">
                                <button class="text-[8px] font-mono text-blue-400 hover:text-blue-300 transition-colors flex items-center gap-1">
                                    <component :is="Mail" class="w-2.5 h-2.5" />
                                    Email
                                </button>
                                <span class="text-placeholder">|</span>
                                <button class="text-[8px] font-mono text-muted-light hover:text-primary transition-colors flex items-center gap-1">
                                    <component :is="Eye" class="w-2.5 h-2.5" />
                                    View History
                                </button>
                                <span class="text-placeholder">|</span>
                                <button class="text-[8px] font-mono text-muted-light hover:text-primary transition-colors flex items-center gap-1">
                                    <component :is="Edit" class="w-2.5 h-2.5" />
                                    Edit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>