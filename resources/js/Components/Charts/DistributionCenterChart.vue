<script setup>
import { 
  Warehouse, 
  HardDrive, 
  Zap,
  CheckCircle2,
  Clock,
  TrendingUp,
  MapPin
} from 'lucide-vue-next';

const centers = [
    { name: 'East Coast DC', fill: 82, total: '250k sq ft', value: '$14.8M', active: true },
    { name: 'West Coast Hub', fill: 64, total: '180k sq ft', value: '$9.2M', active: true },
    { name: 'European Depot', fill: 41, total: '320k sq ft', value: '$6.1M', active: false }
];
</script>

<template>
    <div class="bg-slate-900/30 border border-slate-800/80 rounded-2xl p-6 backdrop-blur-xl flex flex-col h-full">
        <div class="mb-5 flex items-center justify-between">
            <div>
                <h4 class="text-sm font-medium text-slate-400 font-sans">Warehouse Capacities</h4>
                <p class="text-xs text-slate-500 font-mono mt-0.5">Real-time square footage utilization</p>
            </div>
            <component :is="Warehouse" class="w-5 h-5 text-slate-500" />
        </div>
        
        <div class="flex-1 flex flex-col justify-around gap-4">
            <div v-for="(c, i) in centers" :key="i" class="flex items-center gap-4">
                <div class="relative w-12 h-12 flex items-center justify-center">
                    <svg class="w-full h-full transform -rotate-90">
                        <circle cx="24" cy="24" r="20" stroke="#1e293b" stroke-width="3.5" fill="transparent" />
                        <circle cx="24" cy="24" r="20" :stroke="c.fill > 80 ? '#ef4444' : c.fill > 60 ? '#f59e0b' : '#3b82f6'" stroke-width="3.5" fill="transparent" :stroke-dasharray="`${2 * Math.PI * 20}`" :stroke-dashoffset="`${2 * Math.PI * 20 * (1 - c.fill / 100)}`" stroke-linecap="round" class="transition-all duration-1000" />
                    </svg>
                    <span class="absolute text-[10px] font-mono text-white font-semibold">{{ c.fill }}%</span>
                </div>
                
                <div class="flex-1 min-w-0">
                    <div class="flex justify-between items-center mb-0.5">
                        <div class="flex items-center gap-2">
                            <component :is="MapPin" class="w-3.5 h-3.5 text-slate-500" />
                            <h5 class="text-xs text-slate-200 font-medium truncate">{{ c.name }}</h5>
                        </div>
                        <span class="text-[10px] font-mono text-slate-400">{{ c.value }}</span>
                    </div>
                    <div class="flex justify-between items-center text-[10px] text-slate-500 font-mono">
                        <div class="flex items-center gap-1.5">
                            <component :is="HardDrive" class="w-3 h-3 text-slate-600" />
                            <span>{{ c.total }} capacity</span>
                        </div>
                        <span class="flex items-center gap-1.5">
                            <component 
                                :is="c.active ? CheckCircle2 : Clock" 
                                :class="c.active ? 'text-emerald-400' : 'text-slate-500'"
                                class="w-3 h-3"
                            />
                            <span :class="c.active ? 'text-emerald-400' : 'text-slate-500'">
                                {{ c.active ? 'Sync Live' : 'Idle' }}
                            </span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>