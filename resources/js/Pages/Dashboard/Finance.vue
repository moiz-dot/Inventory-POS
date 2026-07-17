<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';

// Import Lucide Vue icons
import {
  DollarSign,
  TrendingUp,
  TrendingDown,
  CheckCircle,
  AlertCircle,
  FileText,
  CreditCard,
  Wallet,
  PiggyBank,
  Landmark,
  Receipt,
  BarChart3,
  PieChart,
  Shield,
  Lock,
  Clock,
  Calendar,
  ArrowRight,
  Download,
  Printer,
  RefreshCw,
  AlertTriangle,
  Award,
  Briefcase,
  Building2,
  ChartColumn,
  LineChart,
  Activity,
  Zap
} from 'lucide-vue-next';

const ledgers = [
    { code: '01-100', name: 'Cash Terminal Deposits', amount: 492100, type: 'asset' },
    { code: '02-200', name: 'Sourcing Accounts Payable', amount: -145000, type: 'liability' },
    { code: '03-300', name: 'Local Land Tax Stream', amount: -12400, type: 'expense' },
    { code: '04-400', name: 'Sourcing Inventory Assets Value', amount: 249120, type: 'asset' }
];

// Helper for amount color and icon
const getAmountColor = (amount) => {
    if (amount > 0) return 'text-emerald-400';
    if (amount < 0) return 'text-red-400';
    return 'text-muted';
};

const getAmountIcon = (amount) => {
    if (amount > 0) return TrendingUp;
    if (amount < 0) return TrendingDown;
    return Activity;
};

// Calculate totals
const totalAssets = ledgers.filter(l => l.type === 'asset').reduce((sum, l) => sum + l.amount, 0);
const totalLiabilities = ledgers.filter(l => l.type === 'liability').reduce((sum, l) => sum + l.amount, 0);
const totalExpenses = ledgers.filter(l => l.type === 'expense').reduce((sum, l) => sum + l.amount, 0);
const netBalance = ledgers.reduce((sum, l) => sum + l.amount, 0);
</script>

<template>
    <AppLayout title="Finance">
        <div class="space-y-6">
            <!-- Header -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <div class="flex items-center gap-2">
                        <component :is="Landmark" class="w-5 h-5 text-blue-400" />
                        <h2 class="text-xl font-bold text-primary tracking-tight">Consolidated Finance & Ledger Accounting</h2>
                    </div>
                    <p class="text-xs text-muted-light font-mono mt-0.5">Direct automatic balance sheets matching</p>
                </div>
                <div class="flex items-center gap-2">
                    <button class="px-3 py-2 bg-secondary border border-tertiary hover:border-tertiary rounded-lg text-[10px] text-muted hover:text-primary transition-colors flex items-center gap-1.5">
                        <component :is="RefreshCw" class="w-3.5 h-3.5" />
                        Sync
                    </button>
                    <button class="px-3 py-2 bg-secondary border border-tertiary hover:border-tertiary rounded-lg text-[10px] text-muted hover:text-primary transition-colors flex items-center gap-1.5">
                        <component :is="Printer" class="w-3.5 h-3.5" />
                        Print
                    </button>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                <div class="bg-card-light border border-card p-4 rounded-xl text-center">
                    <div class="flex items-center justify-center gap-1.5">
                        <component :is="PiggyBank" class="w-4 h-4 text-emerald-400" />
                        <span class="text-lg font-bold text-primary">${{ totalAssets.toLocaleString() }}</span>
                    </div>
                    <p class="text-[9px] font-mono text-muted-light uppercase">Total Assets</p>
                </div>
                <div class="bg-card-light border border-card p-4 rounded-xl text-center">
                    <div class="flex items-center justify-center gap-1.5">
                        <component :is="Wallet" class="w-4 h-4 text-red-400" />
                        <span class="text-lg font-bold text-primary">${{ Math.abs(totalLiabilities).toLocaleString() }}</span>
                    </div>
                    <p class="text-[9px] font-mono text-muted-light uppercase">Liabilities</p>
                </div>
                <div class="bg-card-light border border-card p-4 rounded-xl text-center">
                    <div class="flex items-center justify-center gap-1.5">
                        <component :is="Receipt" class="w-4 h-4 text-amber-400" />
                        <span class="text-lg font-bold text-primary">${{ Math.abs(totalExpenses).toLocaleString() }}</span>
                    </div>
                    <p class="text-[9px] font-mono text-muted-light uppercase">Expenses</p>
                </div>
                <div class="bg-card-light border border-card p-4 rounded-xl text-center">
                    <div class="flex items-center justify-center gap-1.5">
                        <component :is="BarChart3" class="w-4 h-4 text-blue-400" />
                        <span class="text-lg font-bold text-primary" :class="netBalance >= 0 ? 'text-emerald-400' : 'text-red-400'">
                            ${{ netBalance.toLocaleString() }}
                        </span>
                    </div>
                    <p class="text-[9px] font-mono text-muted-light uppercase">Net Balance</p>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-8 items-start">
                <!-- Left Column - Ledgers -->
                <div class="bg-card-hover border border-card p-6 rounded-2xl space-y-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <component :is="FileText" class="w-4 h-4 text-blue-400" />
                            <h3 class="text-sm font-semibold text-primary">System Ledgers</h3>
                        </div>
                        <span class="text-[8px] font-mono text-muted-light">{{ ledgers.length }} entries</span>
                    </div>

                    <div class="space-y-2.5 text-xs font-mono text-tertiary">
                        <div v-for="(ledger, idx) in ledgers" :key="idx" class="flex justify-between items-center p-3 bg-primary rounded-xl border border-light hover:border-tertiary/80 transition-all group">
                            <div class="flex items-center gap-2.5">
                                <div class="w-6 h-6 rounded bg-secondary-50 flex items-center justify-center flex-shrink-0">
                                    <component :is="ledger.type === 'asset' ? PiggyBank : ledger.type === 'liability' ? Wallet : Receipt" 
                                        class="w-3 h-3" 
                                        :class="ledger.type === 'asset' ? 'text-emerald-400' : ledger.type === 'liability' ? 'text-red-400' : 'text-amber-400'" />
                                </div>
                                <div>
                                    <span class="text-muted text-[10px] block">{{ ledger.code }}</span>
                                    <span class="text-tertiary text-[10px] group-hover:text-primary transition-colors">{{ ledger.name }}</span>
                                </div>
                            </div>
                            <span class="font-bold" :class="getAmountColor(ledger.amount)">
                                <component :is="getAmountIcon(ledger.amount)" class="w-3 h-3 inline mr-1" />
                                ${{ Math.abs(ledger.amount).toLocaleString() }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Status -->
                <div class="bg-card-light border border-card p-6 rounded-2xl text-xs space-y-6">
                    <div class="flex items-center gap-2">
                        <component :is="Shield" class="w-5 h-5 text-emerald-400" />
                        <h3 class="text-sm font-semibold text-primary">Double-Entry Reconciliation Ledger Status</h3>
                    </div>

                    <p class="text-muted leading-relaxed">
                        Every checkout sale, purchase order shift, and manual stock damaged write-off reconciles immediately onto dynamic balanced ledger streams. Double entry verification checks out to absolute zero drift.
                    </p>

                    <!-- Status Badge -->
                    <div class="p-4 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 rounded-lg flex items-center gap-3 font-mono text-[11px]">
                        <div class="w-8 h-8 rounded-full bg-emerald-500/20 flex items-center justify-center flex-shrink-0">
                            <component :is="CheckCircle" class="w-5 h-5" />
                        </div>
                        <div>
                            <span class="font-bold block">Balance Sheet Reconciled</span>
                            <span class="text-[9px] text-emerald-400/70">Zero discrepancies found</span>
                        </div>
                    </div>

                    <!-- Additional Info -->
                    <div class="grid grid-cols-2 gap-3">
                        <div class="bg-card-50 border border-light rounded-lg p-3 text-center">
                            <component :is="Clock" class="w-3.5 h-3.5 text-muted-light mx-auto mb-1" />
                            <p class="text-[8px] font-mono text-muted-light">Last Audit</p>
                            <p class="text-[9px] font-mono text-tertiary">Today 11:24</p>
                        </div>
                        <div class="bg-card-50 border border-light rounded-lg p-3 text-center">
                            <component :is="CheckCircle" class="w-3.5 h-3.5 text-emerald-400 mx-auto mb-1" />
                            <p class="text-[8px] font-mono text-muted-light">Audit Status</p>
                            <p class="text-[9px] font-mono text-emerald-400">Compliant</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Action -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 bg-card-light border border-card rounded-2xl p-4">
                <div class="flex items-center gap-2 text-[10px] font-mono text-muted-light">
                    <component :is="Lock" class="w-3.5 h-3.5 text-emerald-400" />
                    <span>Ledger locked and immutable</span>
                    <span class="text-placeholder">|</span>
                    <span>Last audit: Q3 2026</span>
                </div>
                <Link :href="route('dashboard.audit-logs')" class="flex items-center gap-1.5 text-[10px] font-mono text-blue-400 hover:text-blue-300 transition-colors">
                    <span>View Full Audit Trail</span>
                    <component :is="ArrowRight" class="w-3 h-3" />
                </Link>
            </div>
        </div>
    </AppLayout>
</template>