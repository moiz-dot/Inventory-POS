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
    <div class="bg-card border border-secondary rounded-2xl p-6 backdrop-blur-xl flex flex-col h-full">
        <div class="mb-5 flex items-center justify-between">
            <div>
                <h4 class="text-sm font-medium text-muted font-sans">Inventory Allocation by Class</h4>
                <p class="text-xs text-muted-light font-mono mt-0.5">Asset values based on landed cost price</p>
            </div>
            <component :is="Layers" class="w-5 h-5 text-muted-light" />
        </div>
        
        <div class="flex-1 flex flex-col justify-center gap-4">
            <div v-for="(cat, i) in CATEGORY_DATA" :key="i" class="group cursor-default">
                <div class="flex justify-between items-center text-xs mb-1.5">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full" :style="{ backgroundColor: cat.color }"></span>
                        <span class="text-tertiary font-medium group-hover:text-primary transition-colors">{{ cat.name }}</span>
                    </div>
                    <div class="text-right font-mono text-muted">
                        <span class="text-secondary font-bold">${cat.value.toLocaleString()}</span>
                        <span class="text-[10px] text-muted-light ml-1.5">({{ cat.count }} units)</span>
                    </div>
                </div>
                <div class="w-full bg-card-hover rounded-full h-2 overflow-hidden">
                    <div class="h-full rounded-full transition-all duration-1000 ease-out" :style="{ backgroundColor: cat.color, width: `${Math.round((cat.value / maxStockVal) * 100)}%` }"></div>
                </div>
            </div>
        </div>

        <div class="mt-4 pt-4 border-t border-light flex justify-between items-center text-xs text-muted font-mono">
            <div class="flex items-center gap-2">
                <component :is="DollarSign" class="w-4 h-4 text-emerald-400" />
                <span>Total Assets Checked</span>
            </div>
            <div class="text-primary font-bold">$249,120</div>
        </div>
    </div>
</template>