<script setup>
import { ref } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import ApplicationMark from '@/Components/ApplicationMark.vue';
import Banner from '@/Components/Banner.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';

// Import Lucide Vue icons
import {
  LayoutDashboard,
  Store,
  Warehouse,
  Package,
  Barcode,
  ShoppingCart,
  Users,
  DollarSign,
  FileText,
  Bell,
  User,
  LogOut,
  Menu,
  X,
  ChevronLeft,
  ChevronRight,
  Building2,
  Shield,
  Lock,
  UserCircle,
  Key,
  Mail,
  Layers,
  PanelLeftClose,
  PanelLeftOpen
} from 'lucide-vue-next';

defineProps({
    title: String,
});

const showingNavigationDropdown = ref(false);
const sidebarCollapsed = ref(false);

const switchToTeam = (team) => {
    router.put(route('current-team.update'), {
        team_id: team.id,
    }, {
        preserveState: false,
    });
};

const logout = () => {
    router.post(route('logout'));
};

// Navigation items
const navItems = [
  {
    section: 'Main Dashboard',
    items: [
      { label: 'Overview Metrics', route: 'dashboard', icon: LayoutDashboard }
    ]
  },
  {
    section: 'Organization',
    items: [
      { label: 'Retail Branches', route: 'dashboard.branches', icon: Store },
      { label: 'Depots & Warehouses', route: 'dashboard.warehouses', icon: Warehouse }
    ]
  },
  {
    section: 'Inventory Control',
    items: [
      { label: 'SKU Products list', route: 'dashboard.products', icon: Package },
      { label: 'Barcode Manager', route: 'dashboard.barcodes', icon: Barcode }
    ]
  },
  {
    section: 'Sales & Channels',
    items: [
      { label: 'POS Terminal Cashier', route: 'dashboard.pos', icon: ShoppingCart },
      { label: 'CRM loyalty clients', route: 'dashboard.crm', icon: Users }
    ]
  },
  {
    section: 'Ledgers & Finance',
    items: [
      { label: 'Reconciliation Finance', route: 'dashboard.finance', icon: DollarSign }
    ]
  },
  {
    section: 'System Audits',
    items: [
      { label: 'Audit Security Logs', route: 'dashboard.audit-logs', icon: FileText }
    ]
  }
];

// Toggle sidebar
const toggleSidebar = () => {
  sidebarCollapsed.value = !sidebarCollapsed.value;
};

// Mobile nav items
const mobileNavItems = [
  { label: 'Dashboard Overview', route: 'dashboard' },
  { label: 'Retail Branches', route: 'dashboard.branches' },
  { label: 'Warehouses', route: 'dashboard.warehouses' },
  { label: 'Products', route: 'dashboard.products' },
  { label: 'POS Terminal', route: 'dashboard.pos' }
];
</script>

<template>
    <div class="min-h-screen h-screen bg-slate-950 text-slate-100 flex font-sans select-none overflow-hidden">
        <Head :title="title" />
        <Banner />

        <!-- Background static layers -->
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_60%_60%_at_20%_20%,rgba(59,130,246,0.05),transparent)] pointer-events-none z-0" />

        <!-- LEFT SIDEBAR NAVIGATION -->
        <aside 
            class="hidden md:flex flex-col border-r border-slate-900 bg-slate-950/80 backdrop-blur-xl relative z-30 transition-all duration-300 sidebar-container h-screen flex-shrink-0"
            :class="sidebarCollapsed ? 'w-16' : 'w-64'"
        >
            <!-- Sidebar Header Brandmark -->
            <div class="h-16 border-b border-slate-900 flex items-center justify-between px-3 flex-shrink-0" :class="sidebarCollapsed ? 'justify-center' : 'px-5'">
                <div v-if="!sidebarCollapsed" class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded bg-gradient-to-tr from-blue-600 to-indigo-600 flex items-center justify-center font-display font-extrabold text-sm text-white">
                        Æ
                    </div>
                    <div>
                        <span class="font-display font-bold text-sm tracking-wider">AETHER</span>
                        <span class="text-[8px] font-mono text-slate-500 block">CORE PLATFORM v4.2</span>
                    </div>
                </div>
                <div v-else class="w-8 h-8 rounded bg-gradient-to-tr from-blue-600 to-indigo-600 flex items-center justify-center font-display font-extrabold text-sm text-white mx-auto">
                    Æ
                </div>
                <!-- Collapse Toggle Button -->
                <button 
                    @click="toggleSidebar" 
                    class="text-slate-500 hover:text-white transition-colors flex-shrink-0"
                    :class="sidebarCollapsed ? 'mx-auto mt-2' : ''"
                >
                    <component :is="sidebarCollapsed ? PanelLeftOpen : PanelLeftClose" class="w-4 h-4" />
                </button>
            </div>

            <!-- Sidebar Accordion Menus - Scrollable -->
            <nav class="flex-1 overflow-y-auto py-6 px-3 space-y-6 sidebar-nav" :class="sidebarCollapsed ? 'px-2' : ''">
                <div v-for="(navGroup, groupIdx) in navItems" :key="groupIdx" class="space-y-1.5">
                    <span v-if="!sidebarCollapsed" class="text-[9px] font-mono text-slate-600 uppercase tracking-wider px-3.5 block">
                        {{ navGroup.section }}
                    </span>
                    <div v-else class="h-0.5 w-full bg-slate-800/60 rounded-full my-2"></div>
                    
                    <div class="space-y-0.5">
                        <Link 
                            v-for="(item, itemIdx) in navGroup.items" 
                            :key="itemIdx"
                            :href="route(item.route)" 
                            class="w-full flex items-center gap-3 px-3 py-2 text-xs rounded-lg transition-all group relative"
                            :class="[
                                sidebarCollapsed ? 'justify-center px-2' : '',
                                $page.url === route(item.route).url || $page.url.startsWith(route(item.route).url + '/') 
                                    ? 'bg-slate-900 text-blue-400 font-semibold border border-slate-800/80' 
                                    : 'text-slate-400 hover:text-white hover:bg-slate-900/30'
                            ]"
                        >
                            <component :is="item.icon" class="w-4 h-4 flex-shrink-0" />
                            <span v-if="!sidebarCollapsed" class="truncate">{{ item.label }}</span>
                            
                            <!-- Tooltip on hover when collapsed -->
                            <div v-if="sidebarCollapsed" class="absolute left-full ml-2 px-2 py-1 bg-slate-900 border border-slate-800 rounded text-[10px] text-white whitespace-nowrap opacity-0 pointer-events-none group-hover:opacity-100 transition-opacity z-50">
                                {{ item.label }}
                            </div>
                        </Link>
                    </div>
                </div>
            </nav>

            <!-- Sidebar Footer -->
            <div class="p-4 border-t border-slate-900 bg-slate-950/40 text-xs font-mono text-slate-500 flex-shrink-0" :class="sidebarCollapsed ? 'text-center' : ''">
                <div class="flex items-center gap-2" :class="sidebarCollapsed ? 'justify-center' : ''">
                    <span class="w-1.5 h-1.5 bg-emerald-400 rounded-full animate-pulse flex-shrink-0"></span>
                    <span v-if="!sidebarCollapsed" class="flex items-center gap-1.5">
                        <component :is="Lock" class="w-3 h-3" />
                        LOCKED SECURE SSL
                    </span>
                    <span v-else class="sr-only">SSL</span>
                </div>
            </div>
        </aside>

        <!-- MAIN VIEWPORT BODY -->
        <div class="flex-1 flex flex-col min-w-0 relative z-10 h-screen">
            <!-- TOP NAVIGATION BAR -->
            <header class="h-16 border-b border-slate-900 bg-slate-950/40 backdrop-blur-md flex items-center justify-between px-6 flex-shrink-0">
                <div class="flex items-center gap-4">
                    <button @click="showingNavigationDropdown = !showingNavigationDropdown" class="md:hidden text-slate-400 hover:text-white">
                        <component :is="Menu" class="w-5 h-5" />
                    </button>
                    <div class="hidden sm:flex items-center gap-2 text-xs font-mono text-slate-500">
                        <component :is="Layers" class="w-3 h-3" />
                        <span>LEDGER DEPOT</span>
                        <span>/</span>
                        <span class="text-white font-sans font-semibold capitalize">Overview</span>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <!-- Notifications Alert Bell -->
                    <div class="relative">
                        <button class="p-2 text-slate-400 hover:text-white rounded-lg hover:bg-slate-900/50 transition-colors relative">
                            <component :is="Bell" class="w-4 h-4" />
                            <span class="absolute top-1.5 right-1.5 w-2 h-2 rounded-full bg-blue-500"></span>
                        </button>
                    </div>

                    <!-- Roster Profile Dropdown -->
                    <div class="relative">
                        <Dropdown align="right" width="48">
                            <template #trigger>
                                <button class="flex items-center gap-2.5 pl-2 py-1 pr-1 rounded-lg hover:bg-slate-900/40 transition-colors">
                                    <div class="w-7 h-7 rounded-md bg-blue-600 flex items-center justify-center font-bold text-xs text-white">
                                        {{ $page.props.auth.user.name.charAt(0) }}
                                    </div>
                                    <div class="hidden lg:block text-left">
                                        <span class="text-xs font-semibold text-white block">{{ $page.props.auth.user.name }}</span>
                                        <span class="text-[9px] font-mono text-slate-500 block -mt-0.5">{{ $page.props.auth.user.email }}</span>
                                    </div>
                                </button>
                            </template>

                            <template #content>
                                <div class="space-y-1">
                                    <span class="text-[9px] font-mono bg-blue-500/10 text-blue-400 px-2 py-0.5 rounded font-bold uppercase flex items-center gap-1">
                                        <component :is="Shield" class="w-3 h-3" />
                                        Authenticated User
                                    </span>
                                    <h4 class="text-xs font-bold text-white mt-1 flex items-center gap-1.5">
                                        <component :is="UserCircle" class="w-3.5 h-3.5 text-blue-400" />
                                        {{ $page.props.auth.user.name }}
                                    </h4>
                                    <p class="text-[10px] font-mono text-slate-500 truncate flex items-center gap-1">
                                        <component :is="Mail" class="w-3 h-3" />
                                        {{ $page.props.auth.user.email }}
                                    </p>
                                </div>
                                <div class="border-t border-slate-900 pt-3 space-y-1 text-xs">
                                    <DropdownLink :href="route('profile.show')">
                                        <component :is="User" class="w-3.5 h-3.5 mr-2" />
                                        Profile
                                    </DropdownLink>
                                    <DropdownLink v-if="$page.props.jetstream.hasApiFeatures" :href="route('api-tokens.index')">
                                        <component :is="Key" class="w-3.5 h-3.5 mr-2" />
                                        API Tokens
                                    </DropdownLink>
                                    <div class="border-t border-slate-900"></div>
                                    <form @submit.prevent="logout">
                                        <DropdownLink as="button" class="text-red-400">
                                            <component :is="LogOut" class="w-3.5 h-3.5 mr-2" />
                                            Close Session
                                        </DropdownLink>
                                    </form>
                                </div>
                            </template>
                        </Dropdown>
                    </div>
                </div>
            </header>

            <!-- CONTENT DESK FRAME - This will scroll -->
            <main class="flex-1 overflow-y-auto p-6 md:p-8 relative z-10">
                <div class="max-w-7xl mx-auto">
                    <slot />
                </div>
            </main>
        </div>

        <!-- Mobile Navigation Panel -->
        <div v-if="showingNavigationDropdown" class="fixed inset-0 z-50 bg-slate-950/80 backdrop-blur-sm md:hidden flex justify-start">
            <div class="w-64 bg-slate-950 border-r border-slate-900 p-5 space-y-6 flex flex-col justify-between animate-in slide-in-from-left duration-200">
                <div class="space-y-6">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-2">
                            <div class="w-7 h-7 rounded bg-blue-600 flex items-center justify-center font-bold text-sm text-white">Æ</div>
                            <span class="font-display font-bold text-sm tracking-widest">AETHER</span>
                        </div>
                        <button @click="showingNavigationDropdown = false" class="text-slate-500 hover:text-white">
                            <component :is="X" class="w-5 h-5" />
                        </button>
                    </div>
                    <div class="space-y-4 overflow-y-auto max-h-[75vh]">
                        <Link 
                            v-for="(item, idx) in mobileNavItems" 
                            :key="idx"
                            :href="route(item.route)" 
                            class="block px-3 py-2 text-xs text-slate-400 hover:text-white hover:bg-slate-900/30 rounded-lg transition-colors"
                            :class="idx === 0 ? 'text-white bg-slate-900' : ''"
                            @click="showingNavigationDropdown = false"
                        >
                            {{ item.label }}
                        </Link>
                    </div>
                </div>
                <form @submit.prevent="logout">
                    <button class="w-full py-2.5 rounded bg-red-600/10 border border-red-500/25 text-red-400 font-mono text-xs hover:bg-red-600/20 flex items-center justify-center gap-2">
                        <component :is="LogOut" class="w-3.5 h-3.5" />
                        Close Session
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<style scoped>
/* Global scrollbar */
::-webkit-scrollbar {
    width: 4px;
    height: 4px;
}
::-webkit-scrollbar-track {
    background: transparent;
}
::-webkit-scrollbar-thumb {
    background: rgba(148, 163, 184, 0.15);
    border-radius: 9999px;
}
::-webkit-scrollbar-thumb:hover {
    background: rgba(148, 163, 184, 0.3);
}

/* Sidebar specific scrollbar - even thinner */
.sidebar-nav::-webkit-scrollbar {
    width: 3px;
}
.sidebar-nav::-webkit-scrollbar-track {
    background: transparent;
}
.sidebar-nav::-webkit-scrollbar-thumb {
    background: rgba(148, 163, 184, 0.12);
    border-radius: 9999px;
}
.sidebar-nav::-webkit-scrollbar-thumb:hover {
    background: rgba(148, 163, 184, 0.25);
}

/* Firefox scrollbar support */
.sidebar-nav {
    scrollbar-width: thin;
    scrollbar-color: rgba(148, 163, 184, 0.12) transparent;
}

/* Prevent sidebar container from overflowing */
.sidebar-container {
    min-height: 0;
    height: 100vh;
    max-height: 100vh;
}
</style>