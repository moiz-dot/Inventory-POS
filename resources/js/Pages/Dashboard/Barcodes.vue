<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { ref, computed } from 'vue';
import { Link } from '@inertiajs/vue3';

// Import Lucide Vue icons
import {
  Barcode,
  Printer,
  Package,
  Plus,
  Minus,
  CheckCircle,
  AlertCircle,
  Download,
  Upload,
  Save,
  RefreshCw,
  X,
  Edit,
  Eye,
  Trash2,
  Search,
  Filter,
  ArrowUpDown,
  MoreHorizontal,
  Clock,
  Settings,
  Zap,
  Shield,
  Layers,
  Grid3x3,
  List,
  Tag,
  Building2,
  DollarSign,
  Users,
  Calendar,
  FileText,
  HelpCircle,
  Info,
  AlertTriangle,
  Copy,
  ExternalLink
} from 'lucide-vue-next';

const products = ref([
    { id: 'prod-1', sku: 'SKU-AP-14PX', name: 'Aether 14 Pro Max Carbon', barcode: '4006381333931' },
    { id: 'prod-2', sku: 'SKU-AP-14ST', name: 'Aether Studio Watch Elite', barcode: '4006381333948' }
]);

const prodId = ref('prod-1');
const count = ref(24);
const generated = ref(false);

const activeProd = computed(() => products.value.find(p => p.id === prodId.value) || products.value[0]);

// Simulate barcode width patterns
const generateBarcodePattern = () => {
    // Simulate Code-128 pattern
    const patterns = [
        [1, 3, 1, 2, 4, 1, 3, 2, 1, 4, 2, 1, 3, 1, 1, 4, 2, 2, 3, 1, 1, 2],
        [2, 1, 3, 1, 4, 2, 1, 3, 2, 1, 4, 1, 2, 3, 1, 2, 4, 1, 3, 2, 1, 1],
        [1, 2, 4, 1, 3, 1, 2, 4, 1, 3, 2, 1, 4, 2, 1, 3, 1, 2, 4, 1, 3, 1]
    ];
    return patterns[Math.floor(Math.random() * patterns.length)];
};

const barcodePattern = ref(generateBarcodePattern());

const regenerateBarcode = () => {
    barcodePattern.value = generateBarcodePattern();
    generated.value = true;
};
</script>

<template>
    <AppLayout title="Barcode Manager">
        <div class="max-w-2xl space-y-6">
            <!-- Header -->
            <div>
                <div class="flex items-center gap-2">
                    <component :is="Barcode" class="w-5 h-5 text-blue-400" />
                    <h2 class="text-xl font-bold text-primary tracking-tight">Barcode & QR Code Management</h2>
                </div>
                <p class="text-xs text-muted-light font-mono mt-0.5">Direct character compilation of standard Code-128 patterns</p>
            </div>

            <!-- Main Card -->
            <div class="bg-card-hover border border-card p-6 rounded-2xl space-y-6">
                <!-- Form -->
                <div class="grid sm:grid-cols-2 gap-4">
                    <div class="space-y-1.5">
                        <label class="text-[10px] font-mono text-muted-light uppercase flex items-center gap-1.5">
                            <component :is="Package" class="w-3 h-3" />
                            Select Target Product SKU
                        </label>
                        <select 
                            v-model="prodId" 
                            @change="generated = false; barcodePattern = generateBarcodePattern()" 
                            class="w-full bg-primary border border-card focus:border-blue-500/40 rounded-lg p-2.5 text-xs text-secondary outline-none transition-all"
                        >
                            <option v-for="p in products" :key="p.id" :value="p.id">
                                {{ p.name }} ({{ p.sku }})
                            </option>
                        </select>
                    </div>
                    <div class="space-y-1.5">
                        <label class="text-[10px] font-mono text-muted-light uppercase flex items-center gap-1.5">
                            <component :is="Printer" class="w-3 h-3" />
                            Thermal Print Label Count
                        </label>
                        <div class="flex items-center gap-2">
                            <button @click="count = Math.max(1, count - 1)" class="p-2 rounded-lg bg-secondary hover:bg-card-active text-muted hover:text-primary transition-colors">
                                <component :is="Minus" class="w-3.5 h-3.5" />
                            </button>
                            <input 
                                type="number" 
                                v-model="count" 
                                class="flex-1 bg-primary border border-card focus:border-blue-500/40 rounded-lg p-2.5 text-xs text-primary font-mono outline-none transition-all text-center"
                            />
                            <button @click="count = Math.min(100, count + 1)" class="p-2 rounded-lg bg-secondary hover:bg-card-active text-muted hover:text-primary transition-colors">
                                <component :is="Plus" class="w-3.5 h-3.5" />
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Generate Button -->
                <button 
                    @click="regenerateBarcode" 
                    class="w-full py-3 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-xs text-primary font-semibold rounded-lg flex items-center justify-center gap-2 transition-all shadow-lg shadow-blue-600/20"
                >
                    <component :is="Barcode" class="w-4 h-4" />
                    Generate Thermal Label Code Block
                </button>

                <!-- Generated Barcode -->
                <div v-if="generated" class="border border-card bg-card-50 p-6 rounded-xl flex flex-col items-center justify-center text-center space-y-4 animate-in fade-in slide-in-from-bottom-2 duration-300">
                    <div class="flex items-center gap-2 text-[9px] font-mono text-muted-light uppercase">
                        <component :is="Barcode" class="w-3.5 h-3.5 text-blue-400" />
                        <span>SIMULATED ESC/POS PRINT BLOCK</span>
                        <span class="text-placeholder">|</span>
                        <span class="text-emerald-400">{{ activeProd.sku }}</span>
                    </div>

                    <!-- Barcode Visualization -->
                    <div class="bg-white p-4 rounded-lg border-2 border-slate-200 dark:border-tertiary flex flex-col items-center shadow-lg">
                        <div class="flex gap-0.5 h-16">
                            <span 
                                v-for="(w, idx) in barcodePattern" 
                                :key="idx" 
                                class="bg-black transition-all"
                                :style="{ width: w * 1.5 + 'px' }"
                            ></span>
                        </div>
                        <span class="text-slate-900 font-mono text-xs font-bold tracking-widest mt-3 pt-2 border-t border-slate-200 dark:border-tertiary w-full text-center">
                            {{ activeProd.barcode }}
                        </span>
                    </div>

                    <!-- Details -->
                    <div class="grid grid-cols-2 gap-4 w-full text-xs font-mono text-muted">
                        <div class="bg-secondary-50 p-2 rounded-lg text-center">
                            <p class="text-[8px] text-muted-light uppercase">SKU Reference</p>
                            <p class="text-primary font-bold text-sm">{{ activeProd.sku }}</p>
                        </div>
                        <div class="bg-secondary-50 p-2 rounded-lg text-center">
                            <p class="text-[8px] text-muted-light uppercase">Queue Position</p>
                            <p class="text-emerald-400 font-bold text-sm flex items-center justify-center gap-1">
                                <component :is="Printer" class="w-3 h-3" />
                                {{ count }} thermal sheets pending
                            </p>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex gap-3 w-full">
                        <button class="flex-1 py-2 bg-secondary hover:bg-card-active border border-tertiary text-[10px] text-tertiary hover:text-primary rounded-lg transition-colors flex items-center justify-center gap-1.5">
                            <component :is="Printer" class="w-3.5 h-3.5" />
                            Transfer to USB Printer
                        </button>
                        <button class="flex-1 py-2 bg-emerald-600/10 hover:bg-emerald-600/20 border border-emerald-500/15 text-[10px] text-emerald-400 hover:text-emerald-300 rounded-lg transition-colors flex items-center justify-center gap-1.5">
                            <component :is="Copy" class="w-3.5 h-3.5" />
                            Copy Barcode
                        </button>
                    </div>
                </div>
            </div>

            <!-- Quick Tips -->
            <div class="bg-card-light border border-card rounded-2xl p-4 flex items-start gap-3">
                <component :is="Info" class="w-4 h-4 text-blue-400 flex-shrink-0 mt-0.5" />
                <div>
                    <p class="text-[10px] font-mono text-muted">
                        <span class="text-primary font-semibold">Tip:</span> 
                        Barcodes are generated using Code-128 standard. Each label includes the product SKU and unique identifier for inventory tracking.
                    </p>
                    <div class="flex gap-3 mt-1.5 text-[8px] font-mono text-muted-light">
                        <span class="flex items-center gap-1">
                            <component :is="CheckCircle" class="w-2.5 h-2.5 text-emerald-400" />
                            Thermal printer ready
                        </span>
                        <span class="flex items-center gap-1">
                            <component :is="CheckCircle" class="w-2.5 h-2.5 text-emerald-400" />
                            ESC/POS compatible
                        </span>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="grid grid-cols-2 gap-3">
                <Link :href="route('dashboard.products')" class="p-3 bg-card border border-card rounded-xl text-center hover:border-card transition-all group">
                    <component :is="Package" class="w-4 h-4 text-blue-400 mx-auto mb-1 group-hover:scale-110 transition-transform" />
                    <span class="text-[9px] font-mono text-muted group-hover:text-primary transition-colors">View Products</span>
                </Link>
                <Link :href="route('dashboard.warehouses')" class="p-3 bg-card border border-card rounded-xl text-center hover:border-card transition-all group">
                    <component :is="Printer" class="w-4 h-4 text-emerald-400 mx-auto mb-1 group-hover:scale-110 transition-transform" />
                    <span class="text-[9px] font-mono text-muted group-hover:text-primary transition-colors">Print Queue</span>
                </Link>
            </div>
        </div>
    </AppLayout>
</template>