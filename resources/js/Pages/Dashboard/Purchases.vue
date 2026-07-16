<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';

// Import Lucide Vue icons
import {
  Truck,
  Package,
  ShoppingCart,
  DollarSign,
  Users,
  Mail,
  CheckCircle,
  AlertCircle,
  Plus,
  Minus,
  Search,
  Filter,
  Edit,
  Trash2,
  Eye,
  Clock,
  Shield,
  Building2,
  FileText,
  Calendar,
  ArrowRight,
  Save,
  X,
  Printer,
  Send,
  TrendingUp,
  AlertTriangle,
  Award,
  Briefcase,
  ExternalLink,
  Download,
  Upload,
  RefreshCw
} from 'lucide-vue-next';

const products = ref([
    { id: 'prod-2', sku: 'SKU-AP-14ST', name: 'Aether Studio Watch Elite', stock: 18 },
    { id: 'prod-4', sku: 'SKU-LD-5002', name: 'Vanguard Chrono Titanium', stock: 9 }
]);

const suppliers = ref([
    { id: 'sup-1', name: 'Aether Global Manufacturing', email: 'supply@aether-global.com', outstandingBalance: 145000 },
    { id: 'sup-2', name: 'Vanguard Steel Corp', email: 'orders@vanguardsteel.com', outstandingBalance: 32000 }
]);

const reqProdId = ref('prod-2');
const reqQty = ref(100);
const success = ref(false);
const selectedSupplier = ref(null);

const submit = (e) => {
    e.preventDefault();
    success.value = true;
    setTimeout(() => success.value = false, 4000);
};

// Get product by id
const getProduct = (id) => products.value.find(p => p.id === id);

// Calculate total
const totalValue = ref(0);
</script>

<template>
    <AppLayout title="Procurement">
        <div class="max-w-4xl space-y-6">
            <!-- Header -->
            <div>
                <div class="flex items-center gap-2">
                    <component :is="Truck" class="w-5 h-5 text-blue-400" />
                    <h2 class="text-xl font-bold text-white tracking-tight">Procurement & Purchases Requisition</h2>
                </div>
                <p class="text-xs text-slate-500 font-mono mt-0.5">Submit procurement orders directly to manufacturers</p>
            </div>

            <div class="grid md:grid-cols-12 gap-8 items-start">
                <!-- Left Column - Form -->
                <div class="md:col-span-5 bg-slate-900/40 border border-slate-800/80 p-6 rounded-2xl space-y-4">
                    <div class="flex items-center gap-2">
                        <component :is="ShoppingCart" class="w-4 h-4 text-blue-400" />
                        <h3 class="text-xs font-semibold text-slate-400 font-mono uppercase">Request Stock Intake</h3>
                    </div>

                    <form @submit="submit" class="space-y-4">
                        <div class="space-y-1.5">
                            <label class="text-[10px] font-mono text-slate-500 uppercase flex items-center gap-1.5">
                                <component :is="Package" class="w-3 h-3" />
                                Intake Product SKU
                            </label>
                            <select 
                                v-model="reqProdId" 
                                class="w-full bg-slate-950 border border-slate-800/80 focus:border-blue-500/40 rounded-lg p-2.5 text-xs text-slate-200 outline-none transition-all"
                            >
                                <option v-for="p in products" :key="p.id" :value="p.id">
                                    {{ p.name }} (Stock: {{ p.stock }})
                                </option>
                            </select>
                        </div>

                        <div class="space-y-1.5">
                            <label class="text-[10px] font-mono text-slate-500 uppercase flex items-center gap-1.5">
                                <component :is="TrendingUp" class="w-3 h-3" />
                                Quantity to Requisition
                            </label>
                            <div class="flex items-center gap-2">
                                <button @click="reqQty = Math.max(1, reqQty - 10)" type="button" class="p-2 rounded-lg bg-slate-800 hover:bg-slate-700 text-slate-400 hover:text-white transition-colors">
                                    <component :is="Minus" class="w-3.5 h-3.5" />
                                </button>
                                <input 
                                    type="number" 
                                    v-model="reqQty" 
                                    class="flex-1 bg-slate-950 border border-slate-800/80 focus:border-blue-500/40 rounded-lg p-2.5 text-xs text-white font-mono outline-none transition-all text-center"
                                />
                                <button @click="reqQty = Math.min(1000, reqQty + 10)" type="button" class="p-2 rounded-lg bg-slate-800 hover:bg-slate-700 text-slate-400 hover:text-white transition-colors">
                                    <component :is="Plus" class="w-3.5 h-3.5" />
                                </button>
                            </div>
                        </div>

                        <!-- Selected Product Info -->
                        <div v-if="getProduct(reqProdId)" class="bg-slate-950/50 border border-slate-800/60 rounded-lg p-2.5 text-[10px] font-mono text-slate-400">
                            <span class="text-slate-500">Current Stock:</span>
                            <span class="text-white font-bold">{{ getProduct(reqProdId).stock }} units</span>
                            <span class="text-slate-600 mx-1">|</span>
                            <span class="text-slate-500">After order:</span>
                            <span class="text-emerald-400 font-bold">{{ getProduct(reqProdId).stock + reqQty }} units</span>
                        </div>

                        <button type="submit" class="w-full py-2.5 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-xs text-white font-semibold rounded-lg flex items-center justify-center gap-2 transition-all shadow-lg shadow-blue-600/20">
                            <component :is="Send" class="w-4 h-4" />
                            Authorize Procurement Order
                        </button>
                    </form>

                    <!-- Success Message -->
                    <div v-if="success" class="bg-emerald-500/10 border border-emerald-500/20 p-3 rounded-lg text-xs text-emerald-400 flex items-center gap-2 font-mono animate-in fade-in slide-in-from-top-2 duration-300">
                        <component :is="CheckCircle" class="w-4 h-4" />
                        Ledger updated. Stock refilled successfully.
                    </div>
                </div>

                <!-- Right Column - Suppliers -->
                <div class="md:col-span-7 bg-slate-900/20 border border-slate-800/80 rounded-2xl p-6 space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <component :is="Users" class="w-4 h-4 text-emerald-400" />
                            <h3 class="text-xs font-semibold text-slate-300 font-mono">Verified Supplier List</h3>
                        </div>
                        <span class="text-[8px] font-mono text-slate-500">{{ suppliers.length }} active</span>
                    </div>

                    <div class="space-y-3">
                        <div v-for="sup in suppliers" :key="sup.id" class="group bg-slate-950 border border-slate-800/80 p-4 rounded-xl hover:border-slate-700/80 hover:bg-slate-900/30 transition-all">
                            <div class="flex justify-between items-start">
                                <div class="flex items-start gap-3">
                                    <div class="w-8 h-8 rounded-lg bg-gradient-to-r from-emerald-600 to-teal-600 flex items-center justify-center flex-shrink-0">
                                        <component :is="Building2" class="w-4 h-4 text-white" />
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-white text-xs">{{ sup.name }}</h4>
                                        <p class="text-[10px] font-mono text-slate-500 mt-0.5 flex items-center gap-1">
                                            <component :is="Mail" class="w-2.5 h-2.5" />
                                            {{ sup.email }}
                                        </p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <span class="text-[10px] font-mono text-slate-500 block">Unpaid Balance</span>
                                    <span class="font-mono text-slate-200 font-bold flex items-center justify-end gap-1">
                                        <component :is="DollarSign" class="w-3 h-3 text-amber-400" />
                                        ${{ sup.outstandingBalance.toLocaleString() }}
                                    </span>
                                </div>
                            </div>
                            <!-- Hover actions -->
                            <div class="mt-2 pt-2 border-t border-slate-800/60 flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                <button class="text-[8px] font-mono text-blue-400 hover:text-blue-300 transition-colors flex items-center gap-1">
                                    <component :is="Send" class="w-2.5 h-2.5" />
                                    Place Order
                                </button>
                                <span class="text-slate-600">|</span>
                                <button class="text-[8px] font-mono text-slate-500 hover:text-white transition-colors flex items-center gap-1">
                                    <component :is="Eye" class="w-2.5 h-2.5" />
                                    View History
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Supplier Stats -->
                    <div class="border-t border-slate-800/60 pt-3 flex justify-between text-[9px] font-mono text-slate-500">
                        <span class="flex items-center gap-1.5">
                            <component :is="DollarSign" class="w-3 h-3 text-amber-400" />
                            Total Outstanding: ${{ suppliers.reduce((sum, s) => sum + s.outstandingBalance, 0).toLocaleString() }}
                        </span>
                        <span class="flex items-center gap-1.5">
                            <component :is="Clock" class="w-3 h-3" />
                            Avg Lead Time: 5-7 days
                        </span>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="grid grid-cols-3 gap-3">
                <Link :href="route('dashboard.products')" class="p-3 bg-slate-900/30 border border-slate-800/80 rounded-xl text-center hover:border-slate-700/80 transition-all group">
                    <component :is="Package" class="w-4 h-4 text-blue-400 mx-auto mb-1 group-hover:scale-110 transition-transform" />
                    <span class="text-[8px] font-mono text-slate-400 group-hover:text-white transition-colors">View Inventory</span>
                </Link>
                <Link :href="route('dashboard.warehouses')" class="p-3 bg-slate-900/30 border border-slate-800/80 rounded-xl text-center hover:border-slate-700/80 transition-all group">
                    <component :is="Building2" class="w-4 h-4 text-emerald-400 mx-auto mb-1 group-hover:scale-110 transition-transform" />
                    <span class="text-[8px] font-mono text-slate-400 group-hover:text-white transition-colors">Warehouses</span>
                </Link>
                <Link :href="route('dashboard.finance')" class="p-3 bg-slate-900/30 border border-slate-800/80 rounded-xl text-center hover:border-slate-700/80 transition-all group">
                    <component :is="DollarSign" class="w-4 h-4 text-amber-400 mx-auto mb-1 group-hover:scale-110 transition-transform" />
                    <span class="text-[8px] font-mono text-slate-400 group-hover:text-white transition-colors">Finance Ledger</span>
                </Link>
            </div>
        </div>
    </AppLayout>
</template>