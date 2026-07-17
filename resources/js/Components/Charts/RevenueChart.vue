<script setup>
import { ref, computed } from 'vue';
import { 
  TrendingUp, 
  Package, 
  Users, 
  Zap, 
  BarChart3, 
  Calendar,
  AlertCircle,
  CheckCircle2,
  Clock
} from 'lucide-vue-next';

const hoveredIndex = ref(null);

const REVENUE_DATA = [
    { month: 'Jan', value: 340000, transactions: 2400 },
    { month: 'Feb', value: 410000, transactions: 2900 },
    { month: 'Mar', value: 390000, transactions: 2700 },
    { month: 'Apr', value: 520000, transactions: 3800 },
    { month: 'May', value: 680000, transactions: 4900 },
    { month: 'Jun', value: 810000, transactions: 5800 },
    { month: 'Jul', value: 924500, transactions: 6100 }
];

const width = 600;
const height = 240;
const paddingX = 40;
const paddingY = 30;
const chartWidth = width - paddingX * 2;
const chartHeight = height - paddingY * 2;

const maxVal = Math.max(...REVENUE_DATA.map(d => d.value)) * 1.1;
const minVal = Math.min(...REVENUE_DATA.map(d => d.value)) * 0.9;

const getX = (index) => paddingX + (index / (REVENUE_DATA.length - 1)) * chartWidth;
const getY = (val) => paddingY + chartHeight - ((val - minVal) / (maxVal - minVal)) * chartHeight;

const { linePath, areaPath } = computed(() => {
    let line = '';
    let area = '';
    REVENUE_DATA.forEach((d, i) => {
        const x = getX(i);
        const y = getY(d.value);
        if (i === 0) {
            line += `M ${x} ${y}`;
            area += `M ${x} ${paddingY + chartHeight} L ${x} ${y}`;
        } else {
            line += ` L ${x} ${y}`;
            area += ` L ${x} ${y}`;
        }
        if (i === REVENUE_DATA.length - 1) {
            area += ` L ${x} ${paddingY + chartHeight} Z`;
        }
    });
    return { linePath: line, areaPath: area };
}).value;
</script>

<template>
    <div class="w-full bg-card border border-secondary rounded-2xl p-6 relative overflow-hidden backdrop-blur-xl">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-2">
            <div>
                <h4 class="text-sm font-medium text-muted font-sans">Global Consolidated Revenue</h4>
                <p class="text-2xl font-semibold text-primary tracking-tight font-display">$924,500 <span class="text-xs text-emerald-400 font-normal font-mono ml-1">+14.2%</span></p>
            </div>
            <div class="flex items-center gap-4 text-xs font-mono text-muted">
                <div class="flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                    <span>Monthly Revenue</span>
                </div>
                <span class="text-placeholder">|</span>
                <span>Rolling 7 Months</span>
            </div>
        </div>
        
        <div class="w-full overflow-x-auto">
            <div class="min-w-[500px] h-[240px] relative">
                <svg :viewBox="`0 0 ${width} ${height}`" class="w-full h-full overflow-visible">
                    <defs>
                        <linearGradient id="areaGrad" x1="0" y1="0" x2="0" y2="1">
                            <stop offset="0%" stop-color="#3b82f6" stop-opacity="0.3" />
                            <stop offset="100%" stop-color="#3b82f6" stop-opacity="0.0" />
                        </linearGradient>
                    </defs>
                    
                    <!-- Gridlines -->
                    <g v-for="(p, i) in [0, 0.25, 0.5, 0.75, 1]" :key="i">
                        <line :x1="paddingX" :y1="paddingY + chartHeight * p" :x2="width - paddingX" :y2="paddingY + chartHeight * p" stroke="#1e293b" stroke-width="1" stroke-dasharray="4 4" />
                        <text :x="paddingX - 10" :y="paddingY + chartHeight * p + 3" fill="#64748b" font-size="9" font-family="monospace" text-anchor="end">${Math.round((maxVal - p * (maxVal - minVal)) / 1000)}k</text>
                    </g>

                    <path :d="areaPath" fill="url(#areaGrad)" />
                    <path :d="linePath" fill="none" stroke="#3b82f6" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />

                    <!-- Interaction points -->
                    <g v-for="(d, i) in REVENUE_DATA" :key="i">
                        <rect :x="getX(i) - 25" :y="paddingY" width="50" :height="chartHeight" fill="transparent" class="cursor-pointer" @mouseenter="hoveredIndex = i" @mouseleave="hoveredIndex = null" />
                        
                        <line v-if="hoveredIndex === i" :x1="getX(i)" :y1="paddingY" :x2="getX(i)" :y2="paddingY + chartHeight" stroke="#475569" stroke-width="1.5" stroke-dasharray="2 2" />
                        
                        <circle :cx="getX(i)" :cy="getY(d.value)" :r="hoveredIndex === i ? 6 : 4" :fill="hoveredIndex === i ? '#60a5fa' : '#1e3a8a'" stroke="#3b82f6" :stroke-width="hoveredIndex === i ? 2 : 1.5" class="transition-all duration-200" />
                        
                        <text :x="getX(i)" :y="height - 5" fill="#64748b" font-size="10" font-family="sans-serif" text-anchor="middle">{{ d.month }}</text>
                    </g>
                </svg>

                <!-- Tooltip -->
                <div v-if="hoveredIndex !== null" class="absolute bg-primary border border-tertiary rounded-lg p-2.5 text-xs text-tertiary pointer-events-none shadow-2xl backdrop-blur-md z-10" :style="{ left: `${getX(hoveredIndex) + 20}px`, top: `${getY(REVENUE_DATA[hoveredIndex].value) - 10}px` }">
                    <p class="font-semibold text-primary mb-1">{{ REVENUE_DATA[hoveredIndex].month }} Consolidated</p>
                    <div class="flex gap-4 font-mono text-[10px]">
                        <div><span class="text-muted-light">Revenue:</span> <span class="text-blue-400 font-bold">${REVENUE_DATA[hoveredIndex].value.toLocaleString()}</span></div>
                        <div><span class="text-muted-light">Sales:</span> <span class="text-emerald-400">{{ REVENUE_DATA[hoveredIndex].transactions }}</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>