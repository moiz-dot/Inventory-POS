<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { ref, computed } from 'vue';
import { Link } from '@inertiajs/vue3';

// Import Lucide Vue icons
import {
  FileText,
  Clock,
  User,
  Shield,
  AlertTriangle,
  CheckCircle,
  XCircle,
  AlertCircle,
  Search,
  Filter,
  ArrowUpDown,
  MoreHorizontal,
  Calendar,
  Globe,
  Server,
  Lock,
  Eye,
  Edit,
  Trash2,
  Activity,
  Zap,
  Award,
  Database,
  HardDrive,
  Terminal,
  LogOut,
  UserCheck,
  UserX,
  Mail,
  Key,
  Fingerprint,
  RefreshCw,
  Download,
  Printer,
  Settings,
  Info,
  TrendingUp,
  TrendingDown
} from 'lucide-vue-next';

const auditLogs = ref([
    { id: 'log-1', timestamp: '2026-07-16 11:15:24', user: 'Sarah Jenkins (sarah.j@aether.com)', action: 'Modified product price for SKU-AP-14PX from $1,199 to $1,299', module: 'Inventory / Product Management', ipAddress: '192.168.1.45', status: 'success' },
    { id: 'log-2', timestamp: '2026-07-16 10:48:12', user: 'Kenji Takahashi (kenji.t@aether.com)', action: 'Authorized Transfer of 500 units to Ginza warehouse (wh-3)', module: 'Procurement / Transfers', ipAddress: '203.0.113.195', status: 'success' },
    { id: 'log-3', timestamp: '2026-07-16 09:30:00', user: 'System Admin (admin@aether.com)', action: 'Failed backup replication sequence due to Cloud Storage timeout', module: 'System Administration', ipAddress: '10.0.4.12', status: 'warning' },
    { id: 'log-4', timestamp: '2026-07-15 18:22:15', user: 'Intruder Alert Script', action: 'Blocked 4 consecutive SSH login attempts on main gateway', module: 'Security Engine', ipAddress: '198.51.100.74', status: 'failed' }
]);

// Helper for status icon and color
const getStatusIcon = (status) => {
    if (status === 'success') return CheckCircle;
    if (status === 'warning') return AlertTriangle;
    return XCircle;
};

const getStatusColor = (status) => {
    if (status === 'success') return 'text-emerald-400';
    if (status === 'warning') return 'text-amber-400';
    return 'text-red-400';
};

const getStatusDotColor = (status) => {
    if (status === 'success') return 'bg-emerald-400';
    if (status === 'warning') return 'bg-amber-400';
    return 'bg-red-400';
};

const getStatusBgColor = (status) => {
    if (status === 'success') return 'bg-emerald-500/10 text-emerald-400 border-emerald-500/20';
    if (status === 'warning') return 'bg-amber-500/10 text-amber-400 border-amber-500/20';
    return 'bg-red-500/10 text-red-400 border-red-500/20';
};

// Calculate stats
const stats = computed(() => ({
    total: auditLogs.value.length,
    success: auditLogs.value.filter(l => l.status === 'success').length,
    warnings: auditLogs.value.filter(l => l.status === 'warning').length,
    failed: auditLogs.value.filter(l => l.status === 'failed').length
}));

const searchQuery = ref('');
const filteredLogs = computed(() => {
    if (!searchQuery.value) return auditLogs.value;
    const query = searchQuery.value.toLowerCase();
    return auditLogs.value.filter(log => 
        log.user.toLowerCase().includes(query) ||
        log.action.toLowerCase().includes(query) ||
        log.module.toLowerCase().includes(query) ||
        log.ipAddress.includes(query)
    );
});
</script>

<template>
    <AppLayout title="Audit Logs">
        <div class="space-y-6">
            <!-- Header -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <div class="flex items-center gap-2">
                        <component :is="FileText" class="w-5 h-5 text-blue-400" />
                        <h2 class="text-xl font-bold text-primary tracking-tight">Security Audit Logging</h2>
                        <span class="text-[9px] font-mono bg-blue-500/10 text-blue-400 px-2 py-0.5 rounded-full">{{ auditLogs.length }} entries</span>
                    </div>
                    <p class="text-xs text-muted-light font-mono mt-0.5">Immutable staff ledger tracking records</p>
                </div>
                <div class="flex items-center gap-2">
                    <button class="px-3 py-2 bg-secondary border border-tertiary hover:border-tertiary rounded-lg text-[10px] text-muted hover:text-primary transition-colors flex items-center gap-1.5">
                        <component :is="RefreshCw" class="w-3.5 h-3.5" />
                        Refresh
                    </button>
                    <button class="px-3 py-2 bg-secondary border border-tertiary hover:border-tertiary rounded-lg text-[10px] text-muted hover:text-primary transition-colors flex items-center gap-1.5">
                        <component :is="Download" class="w-3.5 h-3.5" />
                        Export
                    </button>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                <div class="bg-card-light border border-card p-4 rounded-xl text-center">
                    <div class="flex items-center justify-center gap-1.5">
                        <component :is="Activity" class="w-4 h-4 text-blue-400" />
                        <span class="text-lg font-bold text-primary">{{ stats.total }}</span>
                    </div>
                    <p class="text-[9px] font-mono text-muted-light uppercase">Total Events</p>
                </div>
                <div class="bg-card-light border border-card p-4 rounded-xl text-center">
                    <div class="flex items-center justify-center gap-1.5">
                        <component :is="CheckCircle" class="w-4 h-4 text-emerald-400" />
                        <span class="text-lg font-bold text-primary">{{ stats.success }}</span>
                    </div>
                    <p class="text-[9px] font-mono text-muted-light uppercase">Successful</p>
                </div>
                <div class="bg-card-light border border-card p-4 rounded-xl text-center">
                    <div class="flex items-center justify-center gap-1.5">
                        <component :is="AlertTriangle" class="w-4 h-4 text-amber-400" />
                        <span class="text-lg font-bold text-primary">{{ stats.warnings }}</span>
                    </div>
                    <p class="text-[9px] font-mono text-muted-light uppercase">Warnings</p>
                </div>
                <div class="bg-card-light border border-card p-4 rounded-xl text-center">
                    <div class="flex items-center justify-center gap-1.5">
                        <component :is="XCircle" class="w-4 h-4 text-red-400" />
                        <span class="text-lg font-bold text-primary">{{ stats.failed }}</span>
                    </div>
                    <p class="text-[9px] font-mono text-muted-light uppercase">Failed</p>
                </div>
            </div>

            <!-- Search -->
            <div class="relative max-w-md">
                <component :is="Search" class="w-4 h-4 text-muted-light absolute left-4 top-1/2 -translate-y-1/2" />
                <input 
                    v-model="searchQuery" 
                    type="text" 
                    placeholder="Search logs by user, action, module or IP..." 
                    class="w-full bg-card-hover border border-card focus:border-blue-500/40 focus:ring-1 focus:ring-blue-500/20 rounded-xl py-2.5 pl-12 pr-4 text-xs text-secondary outline-none transition-all placeholder:text-muted-light"
                />
                <button v-if="searchQuery" @click="searchQuery = ''" class="absolute right-3 top-1/2 -translate-y-1/2 text-muted-light hover:text-primary transition-colors">
                    <component :is="XCircle" class="w-3.5 h-3.5" />
                </button>
            </div>

            <!-- Table -->
            <div class="bg-card-light border border-card rounded-2xl overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-card font-mono text-[9px] text-muted-light uppercase tracking-wider bg-card">
                                <th class="p-4 flex items-center gap-1">
                                    <component :is="Clock" class="w-3 h-3" />
                                    Timestamp
                                </th>
                                <th class="p-4 flex items-center gap-1">
                                    <component :is="User" class="w-3 h-3" />
                                    Authorized User
                                </th>
                                <th class="p-4">Action Committed</th>
                                <th class="p-4 flex items-center gap-1">
                                    <component :is="Settings" class="w-3 h-3" />
                                    Module Class
                                </th>
                                <th class="p-4 flex items-center gap-1">
                                    <component :is="Server" class="w-3 h-3" />
                                    IP Address
                                </th>
                                <th class="p-4 text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-800/60 text-xs text-tertiary">
                            <tr v-for="log in filteredLogs" :key="log.id" class="hover:bg-card transition-colors group">
                                <td class="p-4 font-mono text-[10px] text-muted-light whitespace-nowrap flex items-center gap-1.5">
                                    <component :is="Clock" class="w-3 h-3 text-placeholder" />
                                    {{ log.timestamp }}
                                </td>
                                <td class="p-4 font-medium text-primary text-[10px] flex items-center gap-1.5">
                                    <component :is="User" class="w-3 h-3 text-muted-light flex-shrink-0" />
                                    {{ log.user }}
                                </td>
                                <td class="p-4 text-tertiary text-[10px]">{{ log.action }}</td>
                                <td class="p-4">
                                    <span class="bg-secondary text-muted px-2.5 py-1 rounded-full text-[9px] font-mono whitespace-nowrap border border-light flex items-center gap-1">
                                        <component :is="Activity" class="w-2.5 h-2.5" />
                                        {{ log.module }}
                                    </span>
                                </td>
                                <td class="p-4 font-mono text-[10px] text-muted-light flex items-center gap-1.5">
                                    <component :is="Globe" class="w-3 h-3 text-placeholder" />
                                    {{ log.ipAddress }}
                                </td>
                                <td class="p-4 text-center">
                                    <span class="px-2.5 py-1 rounded-full text-[9px] font-mono font-semibold border flex items-center justify-center gap-1" :class="getStatusBgColor(log.status)">
                                        <component :is="getStatusIcon(log.status)" class="w-2.5 h-2.5" />
                                        {{ log.status.charAt(0).toUpperCase() + log.status.slice(1) }}
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Footer -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 bg-card-light border border-card rounded-2xl p-4">
                <div class="flex items-center gap-2 text-[10px] font-mono text-muted-light">
                    <component :is="Lock" class="w-3.5 h-3.5 text-emerald-400" />
                    <span>Logs are immutable and cryptographically signed</span>
                    <span class="text-placeholder">|</span>
                    <span class="flex items-center gap-1">
                        <component :is="Database" class="w-3 h-3" />
                        {{ auditLogs.length }} records
                    </span>
                </div>
                <div class="flex items-center gap-3 text-[9px] font-mono text-muted-light">
                    <span class="flex items-center gap-1">
                        <component :is="CheckCircle" class="w-2.5 h-2.5 text-emerald-400" />
                        {{ stats.success }} success
                    </span>
                    <span class="flex items-center gap-1">
                        <component :is="AlertTriangle" class="w-2.5 h-2.5 text-amber-400" />
                        {{ stats.warnings }} warnings
                    </span>
                    <span class="flex items-center gap-1">
                        <component :is="XCircle" class="w-2.5 h-2.5 text-red-400" />
                        {{ stats.failed }} failed
                    </span>
                </div>
            </div>
        </div>
    </AppLayout>
</template>