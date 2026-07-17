<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';

// Import Lucide Vue icons
import {
  Store,
  MapPin,
  User,
  DollarSign,
  Package,
  Circle,
  Plus,
  Building2,
  TrendingUp,
  Activity,
  CheckCircle,
  AlertCircle,
  Search,
  Filter,
  ArrowUpDown,
  MoreHorizontal,
  Shield,
  Clock,
  Users,
  Briefcase,
  Eye,
  Edit,
  Trash2
} from 'lucide-vue-next';

const branches = ref([
    { id: 'branch-1', name: 'Manhattan Flagship (NY-01)', location: 'Fifth Avenue, New York', manager: 'Sarah Jenkins', sales: 1452800, stockCount: 14200, status: 'active' },
    { id: 'branch-2', name: 'London Mayfair (LDN-02)', location: 'Bond Street, London', manager: 'Arthur Pendelton', sales: 984500, stockCount: 8900, status: 'active' },
    { id: 'branch-3', name: 'Tokyo Ginza (TYO-03)', location: 'Ginza district, Tokyo', manager: 'Kenji Takahashi', sales: 1876300, stockCount: 19400, status: 'active' },
    { id: 'branch-4', name: 'Frankfurt Zentrum (FRA-04)', location: 'Zeil Shopping Plaza, Frankfurt', manager: 'Dieter Muller', sales: 421000, stockCount: 4200, status: 'maintenance' }
]);

// Helper to get status color
const getStatusColor = (status) => {
  return status === 'active' ? 'text-emerald-400' : 'text-amber-400';
};

// Helper to get status dot color
const getStatusDotColor = (status) => {
  return status === 'active' ? 'bg-emerald-400' : 'bg-amber-400';
};
</script>

<template>
    <AppLayout title="Retail Branches">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
            <div>
                <div class="flex items-center gap-2">
                    <component :is="Store" class="w-5 h-5 text-blue-400" />
                    <h2 class="text-xl font-bold text-primary tracking-tight">Active Roster Branches</h2>
                    <span class="text-[9px] font-mono bg-blue-500/10 text-blue-400 px-2 py-0.5 rounded-full">{{ branches.length }} active</span>
                </div>
                <p class="text-xs text-muted-light font-mono mt-0.5">Multi-branch ledger integration status</p>
            </div>
            <div class="flex items-center gap-2 w-full sm:w-auto">
                <button class="px-4 py-2 bg-blue-600 hover:bg-blue-500 rounded-lg text-xs text-primary font-semibold flex items-center gap-1.5 transition-colors shadow-lg shadow-blue-600/20">
                    <component :is="Plus" class="w-4 h-4" />
                    Provision Retail Branch
                </button>
            </div>
        </div>

        <!-- Branch Cards Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div v-for="br in branches" :key="br.id" class="group bg-card-hover border border-card p-6 rounded-2xl relative hover:border-card hover:bg-card-active transition-all">
                <!-- Status Dot -->
                <span class="absolute top-4 right-4 flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full animate-pulse" :class="getStatusDotColor(br.status)"></span>
                    <span class="text-[8px] font-mono uppercase" :class="getStatusColor(br.status)">{{ br.status }}</span>
                </span>

                <!-- Location -->
                <div class="flex items-center gap-1.5 mb-1">
                    <component :is="MapPin" class="w-3 h-3 text-muted-light" />
                    <span class="text-[9px] font-mono text-muted-light uppercase tracking-widest">{{ br.location }}</span>
                </div>

                <!-- Branch Name -->
                <h3 class="text-sm font-bold text-primary mt-1.5 flex items-center gap-2">
                    <component :is="Store" class="w-3.5 h-3.5 text-blue-400 flex-shrink-0" />
                    {{ br.name }}
                </h3>

                <!-- Manager -->
                <p class="text-[10px] font-mono text-muted mt-0.5 flex items-center gap-1.5">
                    <component :is="User" class="w-3 h-3 text-muted-light" />
                    Director: {{ br.manager }}
                </p>

                <!-- Stats -->
                <div class="border-t border-light pt-4 mt-4 grid grid-cols-2 gap-2 text-xs font-mono">
                    <div>
                        <span class="text-[10px] text-muted-light block flex items-center gap-1">
                            <component :is="DollarSign" class="w-3 h-3" />
                            Life Sales
                        </span>
                        <span class="text-primary font-bold">${{ br.sales.toLocaleString() }}</span>
                    </div>
                    <div>
                        <span class="text-[10px] text-muted-light block flex items-center gap-1">
                            <component :is="Package" class="w-3 h-3" />
                            Stock Count
                        </span>
                        <span class="text-tertiary font-bold">{{ br.stockCount.toLocaleString() }}</span>
                    </div>
                </div>

                <!-- Hover Actions -->
                <div class="absolute bottom-3 right-3 opacity-0 group-hover:opacity-100 transition-opacity flex gap-1">
                    <button class="p-1.5 rounded bg-secondary hover:bg-card-active text-muted hover:text-primary transition-colors">
                        <component :is="Eye" class="w-3 h-3" />
                    </button>
                    <button class="p-1.5 rounded bg-secondary hover:bg-card-active text-muted hover:text-primary transition-colors">
                        <component :is="Edit" class="w-3 h-3" />
                    </button>
                </div>
            </div>
        </div>

        <!-- Quick Stats Footer -->
        <div class="mt-8 bg-card-light border border-card rounded-2xl p-4 grid grid-cols-2 sm:grid-cols-4 gap-4">
            <div class="text-center">
                <div class="flex items-center justify-center gap-1.5">
                    <component :is="Store" class="w-4 h-4 text-blue-400" />
                    <span class="text-lg font-bold text-primary">{{ branches.length }}</span>
                </div>
                <p class="text-[9px] font-mono text-muted-light uppercase">Total Branches</p>
            </div>
            <div class="text-center">
                <div class="flex items-center justify-center gap-1.5">
                    <component :is="CheckCircle" class="w-4 h-4 text-emerald-400" />
                    <span class="text-lg font-bold text-primary">{{ branches.filter(b => b.status === 'active').length }}</span>
                </div>
                <p class="text-[9px] font-mono text-muted-light uppercase">Active</p>
            </div>
            <div class="text-center">
                <div class="flex items-center justify-center gap-1.5">
                    <component :is="DollarSign" class="w-4 h-4 text-emerald-400" />
                    <span class="text-lg font-bold text-primary">${{ branches.reduce((sum, b) => sum + b.sales, 0).toLocaleString() }}</span>
                </div>
                <p class="text-[9px] font-mono text-muted-light uppercase">Total Revenue</p>
            </div>
            <div class="text-center">
                <div class="flex items-center justify-center gap-1.5">
                    <component :is="Package" class="w-4 h-4 text-blue-400" />
                    <span class="text-lg font-bold text-primary">{{ branches.reduce((sum, b) => sum + b.stockCount, 0).toLocaleString() }}</span>
                </div>
                <p class="text-[9px] font-mono text-muted-light uppercase">Total Stock</p>
            </div>
        </div>
    </AppLayout>
</template>