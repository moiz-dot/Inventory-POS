<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { ref, computed } from 'vue';
import { Link } from '@inertiajs/vue3';

// Import Lucide Vue icons
import {
  ShoppingCart,
  Search,
  CheckCircle,
  XCircle,
  X,
  Trash2,
  Plus,
  Minus,
  User,
  Users,
  Tag,
  DollarSign,
  Package,
  Barcode,
  Printer,
  Receipt,
  CreditCard,
  Wallet,
  Lock,
  Shield,
  Zap,
  Clock,
  AlertCircle,
  AlertTriangle,
  ArrowRight,
  Save,
  Send,
  TrendingUp,
  Award,
  Briefcase,
  Building2,
  Mail,
  Phone,
  MapPin,
  Globe,
  RefreshCw
} from 'lucide-vue-next';

const products = ref([
    { id: 'prod-1', sku: 'SKU-AP-14PX', name: 'Aether 14 Pro Max Carbon', stock: 142, salePrice: 1299 },
    { id: 'prod-2', sku: 'SKU-AP-14ST', name: 'Aether Studio Watch Elite', stock: 18, salePrice: 399 },
    { id: 'prod-3', sku: 'SKU-LD-5001', name: 'Lumina Silk Trench Coat', stock: 85, salePrice: 299 }
]);

const customers = ref([
    { id: 'cust-1', name: 'Apex Retail Group', tier: 'Wholesale' },
    { id: 'cust-2', name: 'Eleanor Vance', tier: 'VIP' }
]);

const cart = ref([]);
const custId = ref('cust-2');
const barcodeSearch = ref('');
const posSuccess = ref(null);

const selectedCustomer = computed(() => customers.value.find(c => c.id === custId.value) || customers.value[0]);
const discountPercent = computed(() => 
    selectedCustomer.value.tier === 'VIP' ? 15 : 
    selectedCustomer.value.tier === 'Wholesale' ? 10 : 0
);

const totalCartPrice = computed(() => 
    cart.value.reduce((acc, curr) => acc + (curr.product.salePrice * curr.quantity), 0)
);

const finalCartPrice = computed(() => 
    totalCartPrice.value * (1 - discountPercent.value / 100)
);

const addToCart = (prod) => {
    if (prod.stock <= 0) return;
    const exist = cart.value.find(item => item.product.id === prod.id);
    if (exist) {
        if (exist.quantity >= prod.stock) return;
        exist.quantity++;
    } else {
        cart.value.push({ product: prod, quantity: 1 });
    }
};

const handleBarcode = (e) => {
    e.preventDefault();
    const found = products.value.find(p => 
        p.barcode === barcodeSearch.value || 
        p.sku.toLowerCase() === barcodeSearch.value.toLowerCase()
    );
    if (found) {
        addToCart(found);
        barcodeSearch.value = '';
    }
};

const checkout = () => {
    if (cart.value.length === 0) return;
    cart.value.forEach(item => {
        const p = products.value.find(x => x.id === item.product.id);
        if (p) p.stock -= item.quantity;
    });
    posSuccess.value = `TX-${Math.floor(Math.random() * 90000) + 10000}`;
    cart.value = [];
};

// Helper for tier badge color
const getTierColor = (tier) => {
    if (tier === 'VIP') return 'bg-purple-500/10 text-purple-400 border-purple-500/20';
    if (tier === 'Wholesale') return 'bg-blue-500/10 text-blue-400 border-blue-500/20';
    return 'bg-slate-500/10 text-slate-400 border-slate-500/20';
};
</script>

<template>
    <AppLayout title="POS Terminal">
        <div class="space-y-6">
            <!-- Header -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
                <div>
                    <div class="flex items-center gap-2">
                        <component :is="ShoppingCart" class="w-5 h-5 text-blue-400" />
                        <h2 class="text-xl font-bold text-white tracking-tight">Edge POS Terminal Cashier</h2>
                    </div>
                    <p class="text-xs text-slate-500 font-mono mt-0.5">Local offline-capable checkout engine</p>
                </div>
                <span class="flex items-center gap-1.5 text-xs font-mono bg-emerald-500/10 text-emerald-400 px-3 py-1 rounded-full border border-emerald-500/20">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    <component :is="Zap" class="w-3 h-3" />
                    Terminal v4 Active
                </span>
            </div>

            <!-- Success Modal -->
            <div v-if="posSuccess" class="fixed inset-0 z-50 bg-slate-950/85 backdrop-blur-sm flex items-center justify-center p-4">
                <div class="bg-slate-950 border border-slate-800 rounded-3xl p-6 max-w-sm w-full space-y-6 text-center animate-in fade-in zoom-in-95 duration-200">
                    <div class="w-16 h-16 rounded-full bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center mx-auto">
                        <component :is="CheckCircle" class="w-10 h-10 text-emerald-400" />
                    </div>
                    <div>
                        <h3 class="text-base font-bold text-white">Consolidated Ledger Committed</h3>
                        <p class="text-xs text-slate-400 mt-1 flex items-center justify-center gap-1">
                            <component :is="Receipt" class="w-3 h-3" />
                            Transaction ID: <span class="font-mono text-white">{{ posSuccess }}</span>
                        </p>
                    </div>
                    <button @click="posSuccess = null" class="w-full py-2.5 bg-blue-600 hover:bg-blue-500 text-xs text-white font-semibold rounded-lg transition-colors flex items-center justify-center gap-2">
                        <component :is="ShoppingCart" class="w-4 h-4" />
                        Unlock POS for Next Customer
                    </button>
                </div>
            </div>

            <!-- Main Grid -->
            <div class="grid lg:grid-cols-12 gap-8 items-start">
                <!-- Left Column - Products -->
                <div class="lg:col-span-7 space-y-4">
                    <!-- Barcode Search -->
                    <form @submit="handleBarcode" class="relative">
                        <component :is="Search" class="w-4 h-4 text-slate-500 absolute left-4 top-1/2 -translate-y-1/2" />
                        <input 
                            v-model="barcodeSearch" 
                            type="text" 
                            placeholder="Scan barcode or input SKU..." 
                            class="w-full bg-slate-900/40 border border-slate-800/80 focus:border-blue-500/40 focus:ring-1 focus:ring-blue-500/20 rounded-xl py-2.5 pl-12 pr-4 text-xs text-slate-200 outline-none transition-all font-mono placeholder:text-slate-500" 
                        />
                    </form>

                    <!-- Product Grid -->
                    <div class="grid sm:grid-cols-3 gap-4">
                        <div 
                            v-for="p in products" 
                            :key="p.id" 
                            @click="addToCart(p)" 
                            class="group p-4 rounded-2xl border transition-all select-none flex flex-col justify-between cursor-pointer relative overflow-hidden"
                            :class="p.stock <= 0 ? 'border-slate-800/50 bg-slate-900/10 opacity-40 cursor-not-allowed' : 'border-slate-800/80 bg-slate-900/20 hover:border-blue-500/40 hover:bg-slate-900/40'"
                        >
                            <div class="relative">
                                <div class="flex items-start justify-between">
                                    <span class="text-[9px] font-mono text-slate-500 block flex items-center gap-1">
                                        <component :is="Barcode" class="w-2.5 h-2.5" />
                                        {{ p.sku }}
                                    </span>
                                    <span v-if="p.stock <= 10" class="text-[8px] font-mono bg-red-500/10 text-red-400 px-1.5 py-0.5 rounded-full flex items-center gap-0.5">
                                        <component :is="AlertTriangle" class="w-2.5 h-2.5" />
                                        Low
                                    </span>
                                </div>
                                <h4 class="text-xs font-semibold text-white mt-1 leading-snug group-hover:text-blue-200 transition-colors">{{ p.name }}</h4>
                            </div>
                            <div class="flex justify-between items-center border-t border-slate-800/60 pt-3 mt-3">
                                <span class="text-xs font-bold text-white font-mono flex items-center gap-0.5">
                                    <component :is="DollarSign" class="w-3 h-3 text-emerald-400" />
                                    {{ p.salePrice }}
                                </span>
                                <span class="text-[10px] font-mono text-slate-500 flex items-center gap-1">
                                    <component :is="Package" class="w-2.5 h-2.5" />
                                    {{ p.stock }} pcs
                                </span>
                            </div>
                            <div v-if="p.stock <= 0" class="absolute inset-0 bg-slate-950/60 backdrop-blur-sm flex items-center justify-center">
                                <span class="text-[9px] font-mono text-red-400 bg-red-500/10 px-3 py-1 rounded-full border border-red-500/20">Out of Stock</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Cart -->
                <div class="lg:col-span-5 bg-slate-900/40 border border-slate-800/80 p-6 rounded-2xl space-y-6 sticky top-6">
                    <!-- Cart Header -->
                    <div class="flex justify-between items-center border-b border-slate-800/60 pb-4">
                        <div class="flex items-center gap-2">
                            <component :is="ShoppingCart" class="w-4 h-4 text-blue-400" />
                            <h3 class="text-xs font-semibold text-slate-400 font-mono uppercase">Checkout Roster</h3>
                            <span class="text-[8px] font-mono bg-slate-800 text-slate-400 px-1.5 py-0.5 rounded-full">{{ cart.length }}</span>
                        </div>
                        <button @click="cart = []" class="text-slate-600 hover:text-red-400 text-[10px] font-mono flex items-center gap-1 transition-colors">
                            <component :is="Trash2" class="w-3 h-3" />
                            Clear Desk
                        </button>
                    </div>

                    <!-- Customer Select -->
                    <div class="space-y-1.5">
                        <label class="text-[10px] font-mono text-slate-500 uppercase flex items-center gap-1.5">
                            <component :is="Users" class="w-3 h-3" />
                            Loyalty Customer Profile
                        </label>
                        <div class="flex gap-2">
                            <select 
                                v-model="custId" 
                                class="flex-1 bg-slate-950 border border-slate-800/80 focus:border-blue-500/40 rounded-lg p-2.5 text-xs text-slate-200 outline-none transition-all"
                            >
                                <option v-for="c in customers" :key="c.id" :value="c.id">
                                    {{ c.name }} ({{ c.tier }})
                                </option>
                            </select>
                            <span class="flex items-center gap-1 text-[8px] font-mono px-2 py-0.5 rounded-full border" :class="getTierColor(selectedCustomer.tier)">
                                <component :is="Award" class="w-2.5 h-2.5" />
                                {{ selectedCustomer.tier }}
                            </span>
                        </div>
                    </div>

                    <!-- Cart Items -->
                    <div class="space-y-2 max-h-[220px] overflow-y-auto pr-1 custom-scroll">
                        <div v-if="cart.length === 0" class="text-center py-8 text-slate-500 text-xs font-mono flex flex-col items-center gap-2">
                            <component :is="ShoppingCart" class="w-8 h-8 text-slate-600" />
                            Shopping Cart Empty
                        </div>
                        <div v-for="(item, idx) in cart" :key="idx" class="group bg-slate-950/60 p-3 rounded-xl border border-slate-800/60 hover:border-slate-700/80 transition-all flex justify-between items-center text-xs">
                            <div>
                                <h5 class="font-semibold text-white group-hover:text-blue-200 transition-colors">{{ item.product.name }}</h5>
                                <span class="text-[10px] font-mono text-slate-500 flex items-center gap-1">
                                    <component :is="Tag" class="w-2.5 h-2.5" />
                                    Qty: {{ item.quantity }} x ${{ item.product.salePrice }}
                                </span>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="font-mono font-bold text-white">${{ (item.product.salePrice * item.quantity).toLocaleString() }}</span>
                                <button @click="cart.splice(idx, 1)" class="text-slate-600 hover:text-red-400 transition-colors p-1 rounded hover:bg-red-500/10">
                                    <component :is="X" class="w-3.5 h-3.5" />
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Totals -->
                    <div class="border-t border-slate-800/60 pt-4 space-y-1 text-xs font-mono">
                        <div class="flex justify-between text-slate-400">
                            <span class="flex items-center gap-1">
                                <component :is="Package" class="w-3 h-3" />
                                Items Subtotal
                            </span>
                            <span>${{ totalCartPrice.toLocaleString() }}</span>
                        </div>
                        <div v-if="discountPercent > 0" class="flex justify-between text-emerald-400">
                            <span class="flex items-center gap-1">
                                <component :is="Award" class="w-3 h-3" />
                                Loyalty Discount ({{ discountPercent }}%)
                            </span>
                            <span>-${{ (totalCartPrice * (discountPercent / 100)).toLocaleString() }}</span>
                        </div>
                        <div class="flex justify-between text-white font-bold text-sm border-t border-dashed border-slate-700 pt-2 mt-1">
                            <span class="flex items-center gap-1">
                                <component :is="DollarSign" class="w-3.5 h-3.5 text-emerald-400" />
                                Consolidated Bill
                            </span>
                            <span>${{ finalCartPrice.toLocaleString() }}</span>
                        </div>
                    </div>

                    <!-- Checkout Button -->
                    <button 
                        @click="checkout" 
                        :disabled="cart.length === 0" 
                        class="w-full py-3 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 disabled:opacity-40 disabled:cursor-not-allowed text-xs text-white font-bold rounded-lg shadow-lg shadow-blue-500/20 transition-all flex items-center justify-center gap-2"
                    >
                        <component :is="CreditCard" class="w-4 h-4" />
                        Validate Cash Checkout
                    </button>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>
.custom-scroll::-webkit-scrollbar {
    width: 3px;
}
.custom-scroll::-webkit-scrollbar-track {
    background: transparent;
}
.custom-scroll::-webkit-scrollbar-thumb {
    background: rgba(148, 163, 184, 0.2);
    border-radius: 9999px;
}
.custom-scroll::-webkit-scrollbar-thumb:hover {
    background: rgba(148, 163, 184, 0.4);
}
</style>