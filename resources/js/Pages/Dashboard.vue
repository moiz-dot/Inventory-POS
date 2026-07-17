<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import RevenueChart from '@/Components/Charts/RevenueChart.vue';
import CategoryInventoryChart from '@/Components/Charts/CategoryInventoryChart.vue';
import DistributionCenterChart from '@/Components/Charts/DistributionCenterChart.vue';
import { Link } from '@inertiajs/vue3';

// Import Lucide Vue icons
import { 
  Clock, 
  TrendingUp, 
  Package, 
  AlertCircle, 
  Target, 
  ShoppingCart,
  Barcode,
  Truck,
  DollarSign,
  ArrowRight,
  Activity,
  CheckCircle,
  AlertTriangle,
  Building2,
  Store,
  MapPin,
  Mail // Added for consistency if needed elsewhere
} from 'lucide-vue-next';

// Mock Data for Overview
const lowStockProducts = [
    { id: 'prod-2', sku: 'SKU-AP-14ST', name: 'Aether Studio Watch Elite', stock: 18 },
    { id: 'prod-4', sku: 'SKU-LD-5002', name: 'Vanguard Chrono Titanium', stock: 9 }
];

const branches = [
    { id: 'branch-1', name: 'Manhattan Flagship (NY-01)', sales: 1452800 },
    { id: 'branch-2', name: 'London Mayfair (LDN-02)', sales: 984500 },
    { id: 'branch-3', name: 'Tokyo Ginza (TYO-03)', sales: 1876300 }
];

const auditLogs = [
    { id: 'log-1', timestamp: '2026-07-16 11:15:24', action: 'Modified product price for SKU-AP-14PX', module: 'Inventory' },
    { id: 'log-2', timestamp: '2026-07-16 10:48:12', action: 'Authorized Transfer of 500 units to Ginza', module: 'Procurement' },
    { id: 'log-3', timestamp: '2026-07-16 09:30:00', action: 'Failed backup replication sequence', module: 'System' }
];

// Helper to get icon color based on module
const getModuleIconColor = (module) => {
  const colors = {
    'Inventory': 'text-blue-400',
    'Procurement': 'text-emerald-400',
    'System': 'text-red-400'
  };
  return colors[module] || 'text-slate-400';
};
</script>

<template>
    <AppLayout title="Dashboard Overview">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
            <div>
                <h1 class="text-2xl font-bold text-primary tracking-tight">Executive Roster Overview</h1>
                <p class="text-xs text-muted-light font-mono mt-0.5">Central synchronized ledger health</p>
            </div>
            <div class="flex items-center gap-3 bg-card-active border border-primary px-4 py-2 rounded-xl text-xs font-mono text-muted">
                <component :is="Clock" class="w-4 h-4 text-blue-500" />
                <span>UTC Time: 2026-07-16 11:31:21</span>
            </div>
        </div>

        <!-- KPI Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-card border border-primary p-6 rounded-2xl relative overflow-hidden backdrop-blur-sm">
                <div class="absolute top-4 right-4 text-emerald-400 font-mono text-[10px] font-bold">+14.2%</div>
                <div class="flex items-center gap-2 mb-1">
                    <component :is="TrendingUp" class="w-4 h-4 text-emerald-400" />
                    <span class="text-[10px] font-mono text-muted-light uppercase tracking-wide">Sales Consolidated Today</span>
                </div>
                <p class="text-2xl font-bold text-primary tracking-tight mt-1.5">$924,500</p>
                <div class="flex gap-2 text-[9px] font-mono text-muted mt-2">
                    <span>Target: $800,000</span>
                    <span class="text-emerald-400">PASSED</span>
                </div>
            </div>
            <div class="bg-card border border-primary p-6 rounded-2xl relative overflow-hidden backdrop-blur-sm">
                <div class="flex items-center gap-2 mb-1">
                    <component :is="Package" class="w-4 h-4 text-blue-400" />
                    <span class="text-[10px] font-mono text-muted-light uppercase tracking-wide">Physical SKU Volume</span>
                </div>
                <p class="text-2xl font-bold text-primary tracking-tight mt-1.5">609 <span class="text-xs font-normal text-muted-light">units</span></p>
                <div class="flex gap-2 text-[9px] font-mono text-muted mt-2"><span>Categories: 5 classes</span></div>
            </div>
            <div class="bg-card border border-primary p-6 rounded-2xl relative overflow-hidden backdrop-blur-sm">
                <div class="absolute top-4 right-4 w-2 h-2 rounded-full bg-red-500 animate-ping"></div>
                <div class="flex items-center gap-2 mb-1">
                    <component :is="AlertCircle" class="w-4 h-4 text-red-400" />
                    <span class="text-[10px] font-mono text-muted-light uppercase tracking-wide">Safety Stock Alerts</span>
                </div>
                <p class="text-2xl font-bold text-red-400 tracking-tight mt-1.5">2 <span class="text-xs font-normal text-muted-light">SKUs low</span></p>
                <div class="flex gap-2 text-[9px] font-mono text-muted mt-2"><span>Buffer Margin: 15% safety</span></div>
            </div>
            <div class="bg-card border border-primary p-6 rounded-2xl relative overflow-hidden backdrop-blur-sm">
                <div class="absolute top-4 right-4 text-blue-400 font-mono text-[10px] font-bold">100% SLA</div>
                <div class="flex items-center gap-2 mb-1">
                    <component :is="Target" class="w-4 h-4 text-blue-400" />
                    <span class="text-[10px] font-mono text-muted-light uppercase tracking-wide">Sourcing SLA Accuracy</span>
                </div>
                <p class="text-2xl font-bold text-primary tracking-tight mt-1.5">99.4%</p>
                <div class="flex gap-2 text-[9px] font-mono text-muted mt-2"><span>Active requisitions: 2 orders</span></div>
            </div>
        </div>

        <!-- Charts Grid -->
        <div class="grid lg:grid-cols-12 gap-8 mb-8">
            <div class="lg:col-span-8"><RevenueChart /></div>
            <div class="lg:col-span-4"><CategoryInventoryChart /></div>
        </div>

        <!-- Sub-grid: Warehouses, Low Stock, Branches -->
        <div class="grid lg:grid-cols-12 gap-8 mb-8">
            <div class="lg:col-span-4"><DistributionCenterChart /></div>
            
            <!-- Low Stock Ticker -->
            <div class="lg:col-span-4 bg-card border border-card rounded-2xl p-6 relative flex flex-col justify-between">
                <div>
                    <div class="flex items-center gap-2 mb-1">
                        <component :is="AlertTriangle" class="w-4 h-4 text-amber-400" />
                        <h4 class="text-sm font-medium text-muted font-sans">Active Sourcing Warnings</h4>
                    </div>
                    <p class="text-[10px] text-muted-light font-mono mt-0.5 uppercase">Triggered Safety stock alerts</p>
                </div>
                <div class="space-y-3 mt-4 flex-1">
                    <div v-for="p in lowStockProducts" :key="p.id" class="bg-primary p-3 rounded-xl border border-primary flex justify-between items-center text-xs">
                        <div>
                            <span class="text-[9px] font-mono text-muted-light block">{{ p.sku }}</span>
                            <h5 class="font-semibold text-primary truncate max-w-[140px]">{{ p.name }}</h5>
                            <span class="text-[10px] text-red-400 font-mono font-bold mt-0.5 block">{{ p.stock }} units left</span>
                        </div>
                        <button class="px-3 py-1 bg-emerald-600/10 hover:bg-emerald-600/20 text-emerald-400 border border-emerald-500/15 text-[10px] rounded font-mono font-semibold flex items-center gap-1">
                            <component :is="ShoppingCart" class="w-3 h-3" />
                            Refill 50
                        </button>
                    </div>
                </div>
            </div>

            <!-- Branch Performances -->
            <div class="lg:col-span-4 bg-card border border-card rounded-2xl p-6 flex flex-col justify-between">
                <div>
                    <div class="flex items-center gap-2 mb-1">
                        <component :is="Store" class="w-4 h-4 text-emerald-400" />
                        <h4 class="text-sm font-medium text-muted font-sans">Retail Branch Performances</h4>
                    </div>
                    <p class="text-[10px] text-muted-light font-mono mt-0.5 uppercase">Consolidated branch velocities</p>
                </div>
                <div class="space-y-3 mt-4 flex-1">
                    <div v-for="br in branches" :key="br.id" class="flex justify-between items-center text-xs">
                        <div class="flex items-center gap-2">
                            <component :is="MapPin" class="w-3 h-3 text-emerald-400" />
                            <span class="text-tertiary font-medium">{{ br.name.split(' ')[0] }} Store</span>
                        </div>
                        <span class="font-mono text-muted">Total: <span class="text-primary font-bold">${br.sales.toLocaleString()}</span></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-card-light border border-primary rounded-2xl p-6 space-y-4 mb-8">
            <div class="flex items-center gap-2">
                <component :is="Activity" class="w-4 h-4 text-blue-400" />
                <h3 class="text-xs font-semibold text-muted font-mono uppercase tracking-wider">Operational Quick Actions Launchdesk</h3>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 text-xs font-mono">
                <Link :href="route('dashboard.pos')" class="p-4 bg-primary border border-primary hover:border-tertiary hover:bg-card-50 rounded-xl flex items-center gap-3 text-left group text-tertiary hover:text-primary transition-all">
                    <component :is="ShoppingCart" class="w-5 h-5 text-blue-500" />
                    <div><span class="font-bold block">POS Checkout</span><span class="text-[9px] text-muted-light">Open Cashier Desk</span></div>
                </Link>
                <Link :href="route('dashboard.barcodes')" class="p-4 bg-primary border border-primary hover:border-tertiary hover:bg-card-50 rounded-xl flex items-center gap-3 text-left group text-tertiary hover:text-primary transition-all">
                    <component :is="Barcode" class="w-5 h-5 text-blue-500" />
                    <div><span class="font-bold block">Barcode Print</span><span class="text-[9px] text-muted-light">Thermal label print</span></div>
                </Link>
                <Link :href="route('dashboard.purchases')" class="p-4 bg-primary border border-primary hover:border-tertiary hover:bg-card-50 rounded-xl flex items-center gap-3 text-left group text-tertiary hover:text-primary transition-all">
                    <component :is="Truck" class="w-5 h-5 text-blue-500" />
                    <div><span class="font-bold block">Procurement</span><span class="text-[9px] text-muted-light">Stock intake orders</span></div>
                </Link>
                <Link :href="route('dashboard.finance')" class="p-4 bg-primary border border-primary hover:border-tertiary hover:bg-card-50 rounded-xl flex items-center gap-3 text-left group text-tertiary hover:text-primary transition-all">
                    <component :is="DollarSign" class="w-5 h-5 text-blue-500" />
                    <div><span class="font-bold block">Ledger Audit</span><span class="text-[9px] text-muted-light">Balance sheet verify</span></div>
                </Link>
            </div>
        </div>

        <!-- Audit Logs Feed -->
        <div class="bg-card border border-primary rounded-2xl overflow-hidden p-6 space-y-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center gap-2">
                    <component :is="CheckCircle" class="w-4 h-4 text-emerald-400" />
                    <h3 class="text-xs font-semibold text-muted font-mono uppercase tracking-wider">Immutable Security ledger</h3>
                </div>
                <Link :href="route('dashboard.audit-logs')" class="text-[10px] font-mono text-blue-400 hover:underline flex items-center gap-1">
                    Inspect Complete Audit Trail 
                    <component :is="ArrowRight" class="w-3 h-3" />
                </Link>
            </div>
            <div class="space-y-2">
                <div v-for="log in auditLogs" :key="log.id" class="p-3 bg-input rounded-xl border border-secondary flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2 text-xs font-mono">
                    <div class="flex items-center gap-3">
                        <component 
                            :is="AlertCircle" 
                            class="w-3.5 h-3.5"
                            :class="getModuleIconColor(log.module)"
                        />
                        <span class="text-muted-light text-[10px]">{{ log.timestamp }}</span>
                        <span class="text-secondary">{{ log.action }}</span>
                    </div>
                    <span class="bg-secondary text-muted-light px-2 py-0.5 rounded text-[9px]">{{ log.module }}</span>
                </div>
            </div>
        </div>
    </AppLayout>
</template>