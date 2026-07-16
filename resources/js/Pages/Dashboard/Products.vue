<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { ref, computed } from 'vue';
import { Link } from '@inertiajs/vue3';

// Import Lucide Vue icons
import {
  Package,
  Search,
  Filter,
  Plus,
  Edit,
  Eye,
  Trash2,
  AlertTriangle,
  CheckCircle,
  X,
  Minus,
  Plus as PlusIcon,
  DollarSign,
  Tag,
  Barcode,
  MapPin,
  Building2,
  Boxes,
  List,
  Grid3x3,
  ArrowUpDown,
  MoreHorizontal,
  Clock,
  AlertCircle,
  TrendingUp,
  ShoppingBag,
  Layers,
  Database,
  Save,
  RefreshCw,
  Download,
  Printer,
  Upload
} from 'lucide-vue-next';

const products = ref([
    { id: 'prod-1', sku: 'SKU-AP-14PX', name: 'Aether 14 Pro Max Carbon', category: 'Electronics', brand: 'Aether Inc.', unit: 'pcs', stock: 142, minStock: 25, costPrice: 890, salePrice: 1299, barcode: '4006381333931', location: 'Aisle 4, Shelf B' },
    { id: 'prod-2', sku: 'SKU-AP-14ST', name: 'Aether Studio Watch Elite', category: 'Electronics', brand: 'Aether Inc.', unit: 'pcs', stock: 18, minStock: 20, costPrice: 240, salePrice: 399, barcode: '4006381333948', location: 'Aisle 4, Shelf A' },
    { id: 'prod-3', sku: 'SKU-LD-5001', name: 'Lumina Silk Trench Coat', category: 'Apparel', brand: 'Lumina Design', unit: 'pcs', stock: 85, minStock: 15, costPrice: 135, salePrice: 299, barcode: '4006381333955', location: 'Aisle 12, Hanger Row' },
    { id: 'prod-4', sku: 'SKU-LD-5002', name: 'Vanguard Chrono Titanium', category: 'Accessories', brand: 'Vanguard Steel', unit: 'pcs', stock: 9, minStock: 10, costPrice: 450, salePrice: 850, barcode: '4006381333962', location: 'Aisle 2, Premium Case' }
]);

const search = ref('');
const category = ref('All');
const categories = computed(() => ['All', ...new Set(products.value.map(p => p.category))]);
const filtered = computed(() => products.value.filter(p => 
    (p.name.toLowerCase().includes(search.value.toLowerCase()) || 
     p.sku.toLowerCase().includes(search.value.toLowerCase())) && 
    (category.value === 'All' || p.category === category.value)
));

const selectedProd = ref(null);
const adjustVal = ref(10);

const adjustStock = (add) => {
    if (!selectedProd.value) return;
    const p = products.value.find(x => x.id === selectedProd.value.id);
    if (p) p.stock = Math.max(0, p.stock + (add ? adjustVal.value : -adjustVal.value));
    selectedProd.value = null;
};

// Helper to get stock status
const getStockStatus = (stock, minStock) => {
    if (stock <= minStock) return 'critical';
    if (stock <= minStock * 2) return 'low';
    return 'healthy';
};

const getStockColor = (stock, minStock) => {
    const status = getStockStatus(stock, minStock);
    if (status === 'critical') return 'bg-red-500/10 text-red-400 border-red-500/20';
    if (status === 'low') return 'bg-amber-500/10 text-amber-400 border-amber-500/20';
    return 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20';
};

const getStockIcon = (stock, minStock) => {
    const status = getStockStatus(stock, minStock);
    if (status === 'critical') return AlertTriangle;
    if (status === 'low') return AlertCircle;
    return CheckCircle;
};
</script>

<template>
    <AppLayout title="Inventory Products">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
            <div>
                <div class="flex items-center gap-2">
                    <component :is="Package" class="w-5 h-5 text-blue-400" />
                    <h2 class="text-xl font-bold text-white tracking-tight">Physical Stock Inventory</h2>
                    <span class="text-[9px] font-mono bg-blue-500/10 text-blue-400 px-2 py-0.5 rounded-full">{{ products.length }} SKUs</span>
                </div>
                <p class="text-xs text-slate-500 font-mono mt-0.5">Consolidated SKU and shelf quantities</p>
            </div>
            <div class="flex items-center gap-2 w-full sm:w-auto">
                <button class="px-4 py-2 bg-blue-600 hover:bg-blue-500 rounded-lg text-xs text-white font-semibold flex items-center gap-1.5 transition-colors shadow-lg shadow-blue-600/20">
                    <component :is="Plus" class="w-4 h-4" />
                    Provision New SKU
                </button>
            </div>
        </div>

        <!-- Filters -->
        <div class="grid sm:grid-cols-12 gap-4 mb-6">
            <div class="sm:col-span-8 relative">
                <component :is="Search" class="w-4 h-4 text-slate-500 absolute left-4 top-1/2 -translate-y-1/2" />
                <input 
                    v-model="search" 
                    type="text" 
                    class="w-full bg-slate-900/40 border border-slate-800/80 focus:border-blue-500/40 focus:ring-1 focus:ring-blue-500/20 rounded-xl py-2.5 pl-12 pr-4 text-xs text-slate-200 outline-none transition-all placeholder:text-slate-500" 
                    placeholder="Search by SKU label, code, name..." 
                />
            </div>
            <div class="sm:col-span-4 flex gap-2">
                <select 
                    v-model="category" 
                    class="flex-1 bg-slate-900/40 border border-slate-800/80 focus:border-blue-500/40 rounded-xl py-2.5 px-4 text-xs text-slate-200 outline-none transition-all"
                >
                    <option v-for="c in categories" :key="c" :value="c">{{ c }}</option>
                </select>
                <button class="px-3 py-2.5 bg-slate-900/40 border border-slate-800/80 rounded-xl text-slate-400 hover:text-white hover:border-slate-700/80 transition-all">
                    <component :is="Filter" class="w-4 h-4" />
                </button>
            </div>
        </div>

        <!-- Products Table -->
        <div class="bg-slate-900/20 border border-slate-800/80 rounded-2xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-slate-800/80 font-mono text-[9px] text-slate-500 uppercase tracking-wider bg-slate-900/30">
                            <th class="p-4">SKU / BARCODE</th>
                            <th class="p-4">Product Name</th>
                            <th class="p-4">Category</th>
                            <th class="p-4 text-right">Cost</th>
                            <th class="p-4 text-right">MSRP</th>
                            <th class="p-4 text-center">Stock</th>
                            <th class="p-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800/60 text-xs text-slate-300">
                        <tr v-for="p in filtered" :key="p.id" class="hover:bg-slate-900/30 transition-colors group">
                            <td class="p-4 font-mono text-[10px]">
                                <span class="text-slate-500 block">{{ p.sku }}</span>
                                <span class="text-slate-400 flex items-center gap-1">
                                    <component :is="Barcode" class="w-3 h-3 text-slate-500" />
                                    {{ p.barcode }}
                                </span>
                            </td>
                            <td class="p-4">
                                <span class="text-white font-semibold block flex items-center gap-1.5">
                                    <component :is="Package" class="w-3 h-3 text-blue-400" />
                                    {{ p.name }}
                                </span>
                                <span class="text-[10px] text-slate-500 font-mono flex items-center gap-1">
                                    <component :is="Building2" class="w-2.5 h-2.5" />
                                    {{ p.brand }}
                                </span>
                            </td>
                            <td class="p-4">
                                <span class="bg-slate-900 text-slate-400 px-2 py-0.5 rounded text-[10px] font-mono border border-slate-800/60">
                                    {{ p.category }}
                                </span>
                            </td>
                            <td class="p-4 text-right font-mono text-slate-400 flex items-center justify-end gap-1">
                                <component :is="DollarSign" class="w-3 h-3" />
                                {{ p.costPrice }}
                            </td>
                            <td class="p-4 text-right font-mono text-slate-200 flex items-center justify-end gap-1">
                                <component :is="DollarSign" class="w-3 h-3 text-emerald-400" />
                                {{ p.salePrice }}
                            </td>
                            <td class="p-4 text-center">
                                <span class="px-2.5 py-1 rounded font-mono font-bold text-[10px] inline-flex items-center gap-1.5 border" :class="getStockColor(p.stock, p.minStock)">
                                    <component :is="getStockIcon(p.stock, p.minStock)" class="w-3 h-3" />
                                    {{ p.stock }} {{ p.unit }}
                                </span>
                            </td>
                            <td class="p-4 text-right">
                                <button @click="selectedProd = p" class="px-3 py-1 bg-slate-900 hover:bg-slate-800 border border-slate-800 text-[10px] rounded hover:text-white transition-colors flex items-center gap-1 ml-auto">
                                    <component :is="Edit" class="w-3 h-3" />
                                    Triage Stock
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal -->
        <div v-if="selectedProd" class="fixed inset-0 z-50 bg-slate-950/80 backdrop-blur-sm flex items-center justify-center p-4" @click.self="selectedProd = null">
            <div class="bg-slate-950 border border-slate-800 rounded-2xl p-6 max-w-sm w-full space-y-6 relative animate-in fade-in zoom-in-95 duration-200">
                <!-- Close -->
                <button @click="selectedProd = null" class="absolute top-4 right-4 text-slate-500 hover:text-white transition-colors">
                    <component :is="X" class="w-4 h-4" />
                </button>

                <div>
                    <div class="flex items-center gap-2">
                        <component :is="Package" class="w-4 h-4 text-blue-400" />
                        <h3 class="text-sm font-semibold text-white">Manually Triage Stock Buffer</h3>
                    </div>
                    <p class="text-[10px] font-mono text-slate-500 mt-1">{{ selectedProd.name }} | {{ selectedProd.sku }}</p>
                </div>

                <div class="space-y-4">
                    <div class="flex justify-between items-center text-[9px] font-mono text-slate-500">
                        <span>Current Stock:</span>
                        <span class="text-white font-bold text-base">{{ selectedProd.stock }} pcs</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <component :is="Minus" class="w-4 h-4 text-slate-500" />
                        <input 
                            type="number" 
                            v-model="adjustVal" 
                            class="flex-1 bg-slate-950 border border-slate-800 focus:border-blue-500/40 rounded-lg p-2.5 text-xs text-white font-mono outline-none transition-all text-center"
                        />
                        <component :is="PlusIcon" class="w-4 h-4 text-slate-500" />
                    </div>
                    <div class="flex gap-3">
                        <button @click="adjustStock(false)" class="flex-1 py-2.5 rounded bg-red-600/10 hover:bg-red-600/20 text-red-400 text-xs font-semibold border border-red-500/15 transition-colors flex items-center justify-center gap-1.5">
                            <component :is="Minus" class="w-3.5 h-3.5" />
                            Deduct
                        </button>
                        <button @click="adjustStock(true)" class="flex-1 py-2.5 rounded bg-emerald-600/10 hover:bg-emerald-600/20 text-emerald-400 text-xs font-semibold border border-emerald-500/15 transition-colors flex items-center justify-center gap-1.5">
                            <component :is="PlusIcon" class="w-3.5 h-3.5" />
                            Receive
                        </button>
                    </div>
                </div>

                <button @click="selectedProd = null" class="w-full py-2.5 bg-slate-900 border border-slate-800 text-xs text-slate-400 hover:text-white rounded-lg transition-colors">
                    Cancel
                </button>
            </div>
        </div>

        <!-- Quick Stats Footer -->
        <div class="mt-6 bg-slate-900/20 border border-slate-800/80 rounded-2xl p-4 grid grid-cols-2 sm:grid-cols-4 gap-4">
            <div class="text-center">
                <div class="flex items-center justify-center gap-1.5">
                    <component :is="Package" class="w-4 h-4 text-blue-400" />
                    <span class="text-lg font-bold text-white">{{ products.length }}</span>
                </div>
                <p class="text-[9px] font-mono text-slate-500 uppercase">Total SKUs</p>
            </div>
            <div class="text-center">
                <div class="flex items-center justify-center gap-1.5">
                    <component :is="AlertTriangle" class="w-4 h-4 text-red-400" />
                    <span class="text-lg font-bold text-white">{{ products.filter(p => p.stock <= p.minStock).length }}</span>
                </div>
                <p class="text-[9px] font-mono text-slate-500 uppercase">Low Stock</p>
            </div>
            <div class="text-center">
                <div class="flex items-center justify-center gap-1.5">
                    <component :is="ShoppingBag" class="w-4 h-4 text-emerald-400" />
                    <span class="text-lg font-bold text-white">{{ products.reduce((sum, p) => sum + p.stock, 0) }}</span>
                </div>
                <p class="text-[9px] font-mono text-slate-500 uppercase">Total Units</p>
            </div>
            <div class="text-center">
                <div class="flex items-center justify-center gap-1.5">
                    <component :is="DollarSign" class="w-4 h-4 text-emerald-400" />
                    <span class="text-lg font-bold text-white">${{ products.reduce((sum, p) => sum + (p.costPrice * p.stock), 0).toLocaleString() }}</span>
                </div>
                <p class="text-[9px] font-mono text-slate-500 uppercase">Total Value</p>
            </div>
        </div>
    </AppLayout>
</template>