<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';

// Import Lucide Vue icons
import {
  Shield,
  User,
  Users,
  CheckCircle,
  XCircle,
  Lock,
  Key,
  Settings,
  Database,
  Briefcase,
  ShoppingCart,
  DollarSign,
  FileText,
  UserPlus,
  Edit,
  Eye,
  AlertTriangle,
  Plus,
  Search,
  Filter,
  ArrowUpDown,
  MoreHorizontal,
  Clock,
  Award,
  Building2,
  Package,
  Truck,
  Globe,
  Zap,
  Save,
  RefreshCw
} from 'lucide-vue-next';

const roles = ref([
    { id: 'role-1', name: 'Chief Logistical Director', description: 'Complete system authorization', modules: ['all'], userCount: 3 },
    { id: 'role-2', name: 'Store Manager', description: 'Branch specific management', modules: ['inventory', 'sales', 'pos', 'customers'], userCount: 12 },
    { id: 'role-3', name: 'Standard Cashier', description: 'POS interface operations only', modules: ['pos', 'customers'], userCount: 45 },
    { id: 'role-4', name: 'Sourcing Auditor', description: 'Procurement portal approvals', modules: ['inventory', 'purchases', 'suppliers'], userCount: 6 }
]);

const selectedRoleIndex = ref(1);

const permissions = [
    { key: 'inventory', title: 'Inventory Write / Damaged Write-Off', icon: Package },
    { key: 'pos', title: 'POS cashier checkout terminal operations', icon: ShoppingCart },
    { key: 'purchases', title: 'Authorize Supplier Purchase Requisitions', icon: Truck },
    { key: 'finance', title: 'Write General Ledgers & Audits', icon: DollarSign },
    { key: 'crm', title: 'Edit loyalty VIP accounts & send blasts', icon: Users },
    { key: 'settings', title: 'Access global system settings', icon: Settings }
];

const togglePermission = (key) => {
    const role = roles.value[selectedRoleIndex.value];
    if (role.modules.includes('all')) return;
    const idx = role.modules.indexOf(key);
    if (idx > -1) role.modules.splice(idx, 1);
    else role.modules.push(key);
};

const hasPermission = (key) => 
    roles.value[selectedRoleIndex.value].modules.includes('all') || 
    roles.value[selectedRoleIndex.value].modules.includes(key);

// Helper to get role icon
const getRoleIcon = (roleName) => {
    const icons = {
        'Chief Logistical Director': Award,
        'Store Manager': Briefcase,
        'Standard Cashier': User,
        'Sourcing Auditor': Shield
    };
    return icons[roleName] || Shield;
};

// Helper to get role color
const getRoleColor = (roleName) => {
    const colors = {
        'Chief Logistical Director': 'from-purple-500 to-pink-500',
        'Store Manager': 'from-blue-500 to-cyan-500',
        'Standard Cashier': 'from-emerald-500 to-teal-500',
        'Sourcing Auditor': 'from-amber-500 to-orange-500'
    };
    return colors[roleName] || 'from-blue-500 to-cyan-500';
};
</script>

<template>
    <AppLayout title="Access Control">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6">
            <div>
                <div class="flex items-center gap-2">
                    <component :is="Shield" class="w-5 h-5 text-blue-400" />
                    <h2 class="text-xl font-bold text-primary tracking-tight">Access Control & Staff Security</h2>
                    <span class="text-[9px] font-mono bg-blue-500/10 text-blue-400 px-2 py-0.5 rounded-full">{{ roles.length }} roles</span>
                </div>
                <p class="text-xs text-muted-light font-mono mt-0.5">Role-Based Access Control (RBAC) definitions</p>
            </div>
            <div class="flex items-center gap-2 w-full sm:w-auto">
                <button class="px-4 py-2 bg-blue-600 hover:bg-blue-500 rounded-lg text-xs text-primary font-semibold flex items-center gap-1.5 transition-colors shadow-lg shadow-blue-600/20">
                    <component :is="UserPlus" class="w-4 h-4" />
                    New Role
                </button>
            </div>
        </div>

        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Roles List -->
            <div class="space-y-3 lg:col-span-1">
                <div class="flex items-center gap-2 mb-2">
                    <component :is="Users" class="w-4 h-4 text-muted" />
                    <h3 class="text-xs font-semibold text-muted font-mono uppercase">Roster Roles</h3>
                </div>
                <div class="flex flex-col gap-1">
                    <div 
                        v-for="(role, idx) in roles" 
                        :key="role.id" 
                        @click="selectedRoleIndex = idx" 
                        class="group p-4 rounded-xl border cursor-pointer transition-all relative"
                        :class="selectedRoleIndex === idx ? 'bg-secondary border-blue-500/40 shadow-md shadow-blue-500/5' : 'border-card bg-transparent hover:bg-card hover:border-card'"
                    >
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-gradient-to-br flex items-center justify-center flex-shrink-0" :class="getRoleColor(role.name)">
                                <component :is="getRoleIcon(role.name)" class="w-4 h-4 text-primary" />
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex justify-between items-start">
                                    <h4 class="text-xs font-bold text-primary truncate">{{ role.name }}</h4>
                                    <span class="text-[9px] font-mono bg-secondary text-muted px-2 py-0.5 rounded-full flex items-center gap-1">
                                        <component :is="User" class="w-2.5 h-2.5" />
                                        {{ role.userCount }}
                                    </span>
                                </div>
                                <p class="text-[10px] text-muted mt-0.5 truncate">{{ role.description }}</p>
                                <div v-if="selectedRoleIndex === idx" class="mt-1.5 flex items-center gap-1">
                                    <component :is="CheckCircle" class="w-2.5 h-2.5 text-emerald-400" />
                                    <span class="text-[8px] font-mono text-emerald-400">Selected</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="bg-card-light border border-card rounded-xl p-3 mt-4">
                    <div class="flex justify-between text-[9px] font-mono text-muted-light">
                        <span class="flex items-center gap-1">
                            <component :is="Users" class="w-3 h-3" />
                            Total Staff: {{ roles.reduce((sum, r) => sum + r.userCount, 0) }}
                        </span>
                        <span class="flex items-center gap-1">
                            <component :is="Shield" class="w-3 h-3" />
                            {{ roles.filter(r => r.modules.includes('all')).length }} Admin Roles
                        </span>
                    </div>
                </div>
            </div>

            <!-- Permissions Panel -->
            <div class="bg-card-light border border-card rounded-2xl p-6 lg:col-span-2 space-y-6">
                <div class="flex items-start justify-between">
                    <div>
                        <div class="flex items-center gap-2">
                            <component :is="Lock" class="w-4 h-4 text-blue-400" />
                            <h3 class="text-sm font-semibold text-primary">Active Modules Permission Roster</h3>
                        </div>
                        <p class="text-[10px] text-muted-light mt-0.5 flex items-center gap-1">
                            Configure access constraints for:
                            <span class="text-blue-400 font-bold flex items-center gap-1">
                                <component :is="getRoleIcon(roles[selectedRoleIndex].name)" class="w-3 h-3" />
                                {{ roles[selectedRoleIndex].name }}
                            </span>
                        </p>
                    </div>
                    <span v-if="roles[selectedRoleIndex].modules.includes('all')" class="text-[9px] font-mono bg-purple-500/10 text-purple-400 px-2 py-0.5 rounded-full border border-purple-500/20 flex items-center gap-1">
                        <component :is="Award" class="w-3 h-3" />
                        Full Access
                    </span>
                </div>

                <!-- Permissions Grid -->
                <div class="grid sm:grid-cols-2 gap-3">
                    <div 
                        v-for="perm in permissions" 
                        :key="perm.key" 
                        @click="togglePermission(perm.key)" 
                        class="group flex items-center justify-between p-3 bg-input border rounded-xl cursor-pointer transition-all"
                        :class="hasPermission(perm.key) ? 'border-blue-500/30 bg-primary' : 'border-card hover:border-card'"
                    >
                        <div class="flex items-center gap-2.5">
                            <component :is="perm.icon" class="w-4 h-4 flex-shrink-0" :class="hasPermission(perm.key) ? 'text-blue-400' : 'text-muted-light'" />
                            <span class="text-xs text-tertiary leading-snug group-hover:text-primary transition-colors">{{ perm.title }}</span>
                        </div>
                        <div class="w-5 h-5 rounded flex items-center justify-center border transition-all flex-shrink-0" 
                            :class="hasPermission(perm.key) ? 'bg-blue-600 border-blue-500 text-primary' : 'border-tertiary bg-transparent'">
                            <component v-if="hasPermission(perm.key)" :is="CheckCircle" class="w-3.5 h-3.5" />
                        </div>
                    </div>
                </div>

                <!-- Action Footer -->
                <div class="border-t border-light pt-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
                    <div class="flex items-center gap-2 text-[10px] font-mono text-muted-light">
                        <component :is="Database" class="w-3 h-3 text-emerald-400" />
                        <span>Security hash committed to ledger logs</span>
                        <span class="w-1 h-1 rounded-full bg-muted-light"></span>
                        <span class="flex items-center gap-1">
                            <component :is="Clock" class="w-3 h-3" />
                            Last updated: Today
                        </span>
                    </div>
                    <button class="w-full sm:w-auto px-5 py-2 bg-blue-600 hover:bg-blue-500 text-xs text-primary font-semibold rounded-lg shadow-lg shadow-blue-600/20 transition-colors flex items-center justify-center gap-2">
                        <component :is="Save" class="w-4 h-4" />
                        Commit Security Modifications
                    </button>
                </div>
            </div>
        </div>
    </AppLayout>
</template>