<script setup>
import { ref, computed } from 'vue';
import { Link } from '@inertiajs/vue3';
import { equipmentFleet } from '@/lib/kuitContent';

const activeTab = ref('all');

const allItems = computed(() => {
    const list = [
        ...equipmentFleet.construction.map(i => ({ ...i, type: 'construction', typeLabel: 'Construction & Plant' })),
        ...equipmentFleet.marine.map(i => ({ ...i, type: 'marine', typeLabel: 'Marine Fleet' })),
    ];
    if (activeTab.value === 'all') return list.slice(0, 8);
    if (activeTab.value === 'construction') return list.filter(i => i.type === 'construction').slice(0, 8);
    if (activeTab.value === 'marine') return list.filter(i => i.type === 'marine');
    return list;
});
</script>

<template>
    <section class="py-16 sm:py-24 bg-white relative font-sans">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header & Filter Tabs -->
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12" data-aos="fade-up">
                <div>
                    <span class="text-xs font-bold text-[#020B4F] uppercase tracking-widest bg-navy-100 px-3.5 py-1.5 rounded-full inline-block mb-3">
                        Machinery &amp; Fleet
                    </span>
                    <h2 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight">
                        Featured Equipment &amp; Marine Fleet
                    </h2>
                    <p class="mt-2 text-slate-600 text-sm sm:text-base">
                        Available for short-term and long-term project leases with experienced operators across Nigeria.
                    </p>
                </div>

                <!-- Tabs -->
                <div class="flex items-center space-x-2 mt-6 md:mt-0 bg-slate-100 p-1.5 rounded-2xl shrink-0">
                    <button
                        @click="activeTab = 'all'"
                        class="px-4 py-2 rounded-xl text-xs font-bold transition"
                        :class="activeTab === 'all' ? 'bg-[#020B4F] text-white shadow-sm' : 'text-slate-600 hover:text-slate-900'"
                    >
                        All Equipment
                    </button>
                    <button
                        @click="activeTab = 'construction'"
                        class="px-4 py-2 rounded-xl text-xs font-bold transition"
                        :class="activeTab === 'construction' ? 'bg-[#020B4F] text-white shadow-sm' : 'text-slate-600 hover:text-slate-900'"
                    >
                        Construction Plant
                    </button>
                    <button
                        @click="activeTab = 'marine'"
                        class="px-4 py-2 rounded-xl text-xs font-bold transition"
                        :class="activeTab === 'marine' ? 'bg-[#020B4F] text-white shadow-sm' : 'text-slate-600 hover:text-slate-900'"
                    >
                        Marine Vessels
                    </button>
                </div>
            </div>

            <!-- Equipment Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div 
                    v-for="item in allItems" 
                    :key="item.name"
                    class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between group"
                    data-aos="fade-up"
                >
                    <div class="relative aspect-[4/3] bg-slate-100 overflow-hidden">
                        <img 
                            :src="item.image" 
                            :alt="item.name" 
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            @error="(e) => e.target.src = $page.props.site?.logo_url || '/images/logo.svg'"
                        />
                        <span class="absolute top-3 left-3 bg-[#020B4F]/90 backdrop-blur-sm text-white text-[10px] font-bold uppercase tracking-wider px-2.5 py-1 rounded-full">
                            {{ item.category }}
                        </span>
                    </div>

                    <div class="p-5 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="font-bold text-slate-900 text-sm mb-1.5 group-hover:text-[#0A2FA8] transition">
                                {{ item.name }}
                            </h3>
                            <p class="text-xs text-slate-500 leading-relaxed mb-4">
                                {{ item.specs }}
                            </p>
                        </div>

                        <div class="pt-3 border-t border-slate-100 flex items-center justify-between">
                            <span class="text-[11px] font-semibold text-slate-400">Lease on Request</span>
                            <Link 
                                :href="`/contact?equipment=${encodeURIComponent(item.name)}`" 
                                class="text-xs font-bold text-[#0A2FA8] hover:text-[#020B4F] flex items-center gap-1 group-hover:translate-x-0.5 transition"
                            >
                                <span>Enquire</span>
                                <font-awesome-icon :icon="['fas', 'arrow-right']" class="text-[10px]" />
                            </Link>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom CTA -->
            <div class="mt-12 text-center">
                <Link 
                    href="/equipment" 
                    class="inline-flex items-center space-x-2 px-6 py-3 rounded-xl bg-[#020B4F] text-white font-bold text-xs uppercase tracking-wider hover:bg-navy-800 transition"
                >
                    <span>View Complete Equipment Fleet</span>
                    <font-awesome-icon :icon="['fas', 'arrow-right']" />
                </Link>
            </div>
        </div>
    </section>
</template>
