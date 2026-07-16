<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';

// Import Lucide Vue icons
import {
  Warehouse,
  Building2,
  User,
  DollarSign,
  Boxes,
  Package,
  MapPin,
  TrendingUp,
  Activity,
  CheckCircle,
  AlertTriangle,
  Shield,
  Plus,
  Search,
  Filter,
  ArrowUpDown,
  MoreHorizontal,
  Eye,
  Edit,
  Trash2,
  Clock,
  Layers,
  HardDrive,
  Zap,
  Award
} from 'lucide-vue-next';

const warehouses = ref([
    { id: 'wh-1', name: 'East Coast Distribution Center', code: 'ECDC-NJ', capacity: '250,000 sq ft', utilization: 82, manager: 'Douglas Vance', stockValue: 14850000 },
    { id: 'wh-2', name: 'West Coast Logistics Hub', code: 'WCLH-CA', capacity: '180,000 sq ft', utilization: 64, manager: 'Elena Rostova', stockValue: 9240000 },
    { id: 'wh-3', name: 'European Central Depot', code: 'ECD-AMS', capacity: '320,000 sq ft', utilization: 41, manager: 'Hans de Boer', stockValue: 6120000 }
]);

// Helper to get utilization color
const getUtilizationColor = (utilization) => {
  if (utilization > 80) return 'bg-red-500';
  if (utilization > 60) return 'bg-amber-500';
  return 'bg-blue-500';
};

// Helper to get utilization status text
const getUtilizationStatus = (utilization) => {
  if (utilization > 80) return 'High';
  if (utilization > 60) return 'Medium';
  return 'Low';
};

// Helper to get utilization status color
const getUtilizationStatusColor = (utilization) => {
  if (utilization > 80) return 'text-red-400';
  if (utilization > 60) return 'text-amber-400';
  return 'text-blue-400';
};

// Calculate total stats
const totalCapacity = warehouses.reduce((sum, w) => sum + parseInt(w.capacity.replace(/,/g, '').replace(' sq ft', '')), 0);
const totalValue = warehouses.reduce((sum, w) => sum + w.stockValue, 0);
const avgUtilization = Math.round(warehouses.reduce((sum, w) => sum + w.utilization, 0) / warehouses.length);
</script>

<template>
    <AppLayout title="Warehouses">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
            <div>
                <div class="flex items-center gap-2">
                    <component :is="Warehouse" class="w-5 h-5 text-blue-400" />
                    <h2 class="text-xl font-bold text-white tracking-tight">Distribution Centers & Depots</h2>
                    <span class="text-[9px] font-mono bg-blue-500/10 text-blue-400 px-2 py-0.5 rounded-full">{{ warehouses.length }} facilities</span>
                </div>
                <p class="text-xs text-slate-500 font-mono mt-0.5">Core physical stock supply centers</p>
            </div>
            <div class="flex items-center gap-2 w-full sm:w-auto">
                <button class="px-4 py-2 bg-blue-600 hover:bg-blue-500 rounded-lg text-xs text-white font-semibold flex items-center gap-1.5 transition-colors shadow-lg shadow-blue-600/20">
                    <component :is="Plus" class="w-4 h-4" />
                    Add Depot
                </button>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-6">
            <div class="bg-slate-900/20 border border-slate-800/80 p-4 rounded-xl text-center">
                <div class="flex items-center justify-center gap-1.5">
                    <component :is="Warehouse" class="w-4 h-4 text-blue-400" />
                    <span class="text-lg font-bold text-white">{{ warehouses.length }}</span>
                </div>
                <p class="text-[9px] font-mono text-slate-500 uppercase">Total Depots</p>
            </div>
            <div class="bg-slate-900/20 border border-slate-800/80 p-4 rounded-xl text-center">
                <div class="flex items-center justify-center gap-1.5">
                    <component :is="Boxes" class="w-4 h-4 text-emerald-400" />
                    <span class="text-lg font-bold text-white">{{ totalCapacity.toLocaleString() }}</span>
                </div>
                <p class="text-[9px] font-mono text-slate-500 uppercase">Total Sq Ft</p>
            </div>
            <div class="bg-slate-900/20 border border-slate-800/80 p-4 rounded-xl text-center">
                <div class="flex items-center justify-center gap-1.5">
                    <component :is="TrendingUp" class="w-4 h-4 text-amber-400" />
                    <span class="text-lg font-bold text-white">{{ avgUtilization }}%</span>
                </div>
                <p class="text-[9px] font-mono text-slate-500 uppercase">Avg Utilization</p>
            </div>
            <div class="bg-slate-900/20 border border-slate-800/80 p-4 rounded-xl text-center">
                <div class="flex items-center justify-center gap-1.5">
                    <component :is="DollarSign" class="w-4 h-4 text-emerald-400" />
                    <span class="text-lg font-bold text-white">${{ totalValue.toLocaleString() }}</span>
                </div>
                <p class="text-[9px] font-mono text-slate-500 uppercase">Total Asset Value</p>
            </div>
        </div>

        <!-- Warehouse Cards -->
        <div class="grid md:grid-cols-3 gap-6">
            <div v-for="wh in warehouses" :key="wh.id" class="group bg-slate-900/40 border border-slate-800/80 p-6 rounded-2xl space-y-4 hover:border-slate-700/80 hover:bg-slate-900/60 transition-all relative overflow-hidden">
                <!-- Background glow -->
                <div class="absolute -inset-1 bg-gradient-to-r from-blue-500/5 to-indigo-500/5 opacity-0 group-hover:opacity-100 blur-2xl transition-opacity"></div>

                <!-- Header -->
                <div class="relative">
                    <div class="flex justify-between items-start">
                        <div class="flex items-start gap-2.5">
                            <div class="w-9 h-9 rounded-lg bg-gradient-to-r from-blue-600 to-indigo-600 flex items-center justify-center flex-shrink-0">
                                <component :is="Warehouse" class="w-4 h-4 text-white" />
                            </div>
                            <div>
                                <h3 class="text-sm font-bold text-white leading-snug group-hover:text-blue-200 transition-colors">{{ wh.name }}</h3>
                                <p class="text-[10px] font-mono text-slate-500 mt-0.5 flex items-center gap-1.5">
                                    <component :is="User" class="w-3 h-3" />
                                    Manager: {{ wh.manager }}
                                </p>
                            </div>
                        </div>
                        <span class="text-[9px] font-mono bg-blue-500/10 text-blue-400 px-2 py-0.5 rounded border border-blue-500/20 flex items-center gap-1">
                            <component :is="Shield" class="w-2.5 h-2.5" />
                            {{ wh.code }}
                        </span>
                    </div>
                </div>

                <!-- Utilization -->
                <div class="relative space-y-1.5">
                    <div class="flex justify-between items-center text-[10px] font-mono text-slate-400">
                        <span class="flex items-center gap-1">
                            <component :is="HardDrive" class="w-3 h-3 text-slate-500" />
                            Capacity: {{ wh.capacity }}
                        </span>
                        <span class="flex items-center gap-1" :class="getUtilizationStatusColor(wh.utilization)">
                            <component :is="Activity" class="w-3 h-3" />
                            {{ wh.utilization }}% utilized
                        </span>
                    </div>
                    <div class="w-full bg-slate-800 h-2 rounded-full overflow-hidden">
                        <div class="h-full rounded-full transition-all duration-500" :class="getUtilizationColor(wh.utilization)" :style="{ width: wh.utilization + '%' }"></div>
                    </div>
                    <div class="flex justify-between text-[8px] font-mono text-slate-600">
                        <span>0%</span>
                        <span class="flex items-center gap-0.5">
                            <component :is="getUtilizationStatus(wh.utilization) === 'High' ? AlertTriangle : getUtilizationStatus(wh.utilization) === 'Medium' ? Clock : CheckCircle" 
                                class="w-2.5 h-2.5" 
                                :class="getUtilizationStatusColor(wh.utilization)" />
                            {{ getUtilizationStatus(wh.utilization) }} Utilization
                        </span>
                        <span>100%</span>
                    </div>
                </div>

                <!-- Footer -->
                <div class="relative border-t border-slate-800/60 pt-4 flex justify-between items-center font-mono text-xs">
                    <span class="text-slate-500 flex items-center gap-1.5">
                        <component :is="DollarSign" class="w-3 h-3" />
                        Asset Value
                    </span>
                    <span class="text-white font-bold">${{ wh.stockValue.toLocaleString() }}</span>
                </div>

                <!-- Hover Actions -->
                <div class="absolute bottom-3 right-3 opacity-0 group-hover:opacity-100 transition-opacity flex gap-1">
                    <button class="p-1.5 rounded bg-slate-800 hover:bg-slate-700 text-slate-400 hover:text-white transition-colors">
                        <component :is="Eye" class="w-3 h-3" />
                    </button>
                    <button class="p-1.5 rounded bg-slate-800 hover:bg-slate-700 text-slate-400 hover:text-white transition-colors">
                        <component :is="Edit" class="w-3 h-3" />
                    </button>
                </div>
            </div>
        </div>

        <!-- Empty state if no warehouses -->
        <div v-if="warehouses.length === 0" class="text-center py-16 bg-slate-900/20 border border-slate-800/80 rounded-2xl">
            <component :is="Warehouse" class="w-12 h-12 text-slate-600 mx-auto mb-3" />
            <p class="text-sm text-slate-400">No distribution centers configured</p>
            <p class="text-xs text-slate-500 mt-1">Add your first warehouse to start tracking inventory</p>
        </div>
    </AppLayout>
</template>