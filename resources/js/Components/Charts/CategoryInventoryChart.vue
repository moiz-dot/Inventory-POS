<script setup>
import { 
  Package, 
  DollarSign, 
  ShoppingBag,
  Layers,
  Sparkles,
  HardDrive,
  Gem
} from 'lucide-vue-next';

const CATEGORY_DATA = [
    { name: 'Electronics', count: 160, value: 184000, color: '#3b82f6', icon: 'HardDrive' },
    { name: 'Apparel', count: 85, value: 25415, color: '#10b981', icon: 'ShoppingBag' },
    { name: 'Accessories', count: 9, value: 7650, color: '#f59e0b', icon: 'Sparkles' },
    { name: 'Cosmetics', count: 310, value: 23250, color: '#ec4899', icon: 'Gem' },
    { name: 'Hardware', count: 45, value: 8955, color: '#8b5cf6', icon: 'Package' }
];

const maxStockVal = Math.max(...CATEGORY_DATA.map(c => c.value));

// Map icon names to components
const iconMap = {
  HardDrive,
  ShoppingBag,
  Sparkles,
  Gem,
  Package
};
</script>

<template>
    <div class="bg-slate-900/30 border border-slate-800/80 rounded-2xl p-6 backdrop-blur-xl flex flex-col h-full">
        <div class="mb-5 flex items-center justify-between">
            <div>
                <h4 class="text-sm font-medium text-slate-400 font-sans">Inventory Allocation by Class</h4>
                <p class="text-xs text-slate-500 font-mono mt-0.5">Asset values based on landed cost price</p>
            </div>
            <component :is="Layers" class="w-5 h-5 text-slate-500" />
        </div>
        
        <div class="flex-1 flex flex-col justify-center gap-4">
            <div v-for="(cat, i) in CATEGORY_DATA" :key="i" class="group cursor-default">
                <div class="flex justify-between items-center text-xs mb-1.5">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full" :style="{ backgroundColor: cat.color }"></span>
                        <span class="text-slate-300 font-medium group-hover:text-white transition-colors">{{ cat.name }}</span>
                    </div>
                    <div class="text-right font-mono text-slate-400">
                        <span class="text-slate-200 font-bold">${cat.value.toLocaleString()}</span>
                        <span class="text-[10px] text-slate-500 ml-1.5">({{ cat.count }} units)</span>
                    </div>
                </div>
                <div class="w-full bg-slate-800/60 rounded-full h-2 overflow-hidden">
                    <div class="h-full rounded-full transition-all duration-1000 ease-out" :style="{ backgroundColor: cat.color, width: `${Math.round((cat.value / maxStockVal) * 100)}%` }"></div>
                </div>
            </div>
        </div>

        <div class="mt-4 pt-4 border-t border-slate-800/60 flex justify-between items-center text-xs text-slate-400 font-mono">
            <div class="flex items-center gap-2">
                <component :is="DollarSign" class="w-4 h-4 text-emerald-400" />
                <span>Total Assets Checked</span>
            </div>
            <div class="text-white font-bold">$249,120</div>
        </div>
    </div>
</template>