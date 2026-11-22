<script setup>
import { ref, computed } from 'vue';
import Layout from '@/Layouts/Layout.vue';
import SeoHead from '@/Components/SeoHead.vue';
import { Link } from '@inertiajs/vue3';
import { equipmentFleet } from '@/lib/kuitContent';

defineOptions({ layout: Layout });

defineProps({
    seo: Object,
});

const activeTab = ref('all');

const items = computed(() => {
    if (activeTab.value === 'construction') return equipmentFleet.construction;
    if (activeTab.value === 'marine') return equipmentFleet.marine;
    return [...equipmentFleet.construction, ...equipmentFleet.marine];
});
</script>

<template>
    <SeoHead :seo="seo" />

    <div class="bg-slate-50 min-h-screen font-sans">
        <!-- Hero Header -->
        <div class="bg-gradient-to-b from-[#020B4F] via-[#06125E] to-[#020B4F] text-white py-16 sm:py-24 border-b border-navy-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center sm:text-left">
                <nav class="flex items-center space-x-2 text-xs text-slate-300 mb-4 justify-center sm:justify-start">
                    <Link href="/" class="hover:text-amber-400 transition">Home</Link>
                    <span>/</span>
                    <span class="text-[#F5A800] font-bold">Equipment &amp; Fleet</span>
                </nav>
                <span class="inline-block px-3 py-1 rounded-full bg-white/10 text-[#F5A800] text-xs font-bold uppercase tracking-wider mb-3 border border-white/20">
                    Fleet Registry &amp; Plant Hire
                </span>
                <h1 class="text-3xl sm:text-5xl font-black tracking-tight text-white">
                    Equipment &amp; Marine Fleet
                </h1>
                <p class="mt-4 text-slate-200 text-base max-w-3xl leading-relaxed">
                    Heavy earthmoving equipment, construction plant, low-bed transport trailers, and certified marine vessels available for lease across Nigeria.
                </p>

                <!-- Filter Tabs -->
                <div class="mt-8 flex items-center space-x-2 bg-white/10 p-1.5 rounded-2xl w-fit mx-auto sm:mx-0 border border-white/20">
                    <button
                        @click="activeTab = 'all'"
                        class="px-5 py-2.5 rounded-xl text-xs font-bold transition cursor-pointer"
                        :class="activeTab === 'all' ? 'bg-[#F5A800] text-[#020B4F] shadow-sm' : 'text-white hover:bg-white/10'"
                    >
                        All Fleet ({{ equipmentFleet.construction.length + equipmentFleet.marine.length }})
                    </button>
                    <button
                        @click="activeTab = 'construction'"
                        class="px-5 py-2.5 rounded-xl text-xs font-bold transition cursor-pointer"
                        :class="activeTab === 'construction' ? 'bg-[#F5A800] text-[#020B4F] shadow-sm' : 'text-white hover:bg-white/10'"
                    >
                        Construction &amp; Plant ({{ equipmentFleet.construction.length }})
                    </button>
                    <button
                        @click="activeTab = 'marine'"
                        class="px-5 py-2.5 rounded-xl text-xs font-bold transition cursor-pointer"
                        :class="activeTab === 'marine' ? 'bg-[#F5A800] text-[#020B4F] shadow-sm' : 'text-white hover:bg-white/10'"
                    >
                        Marine Fleet ({{ equipmentFleet.marine.length }})
                    </button>
                </div>
            </div>
        </div>

        <!-- Equipment Grid -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <div 
                    v-for="item in items" 
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
                        <span class="absolute top-3 left-3 bg-[#020B4F]/90 backdrop-blur-sm text-[#F5A800] text-[10px] font-bold uppercase tracking-wider px-2.5 py-1 rounded-full">
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
                            <span class="text-[11px] font-semibold text-slate-400">Dry / Wet Lease</span>
                            <Link 
                                :href="`/contact?equipment=${encodeURIComponent(item.name)}`" 
                                class="btn-gold text-[11px] uppercase tracking-wider py-1.5 px-3"
                            >
                                Enquire
                            </Link>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Leasing Support Notice -->
            <div class="mt-16 p-8 rounded-3xl bg-white border border-slate-200 shadow-sm flex flex-col md:flex-row items-center justify-between gap-6">
                <div class="space-y-1">
                    <h3 class="text-lg font-bold text-slate-900">Custom Fleet Requirements or Long-Term Projects?</h3>
                    <p class="text-xs text-slate-600">We arrange dedicated low-bed transport mobilization to your project location with certified operators.</p>
                </div>
                <div class="flex flex-wrap items-center gap-3 shrink-0">
                    <a
                        v-if="$page.props.site?.enable_profile_download"
                        :href="$page.props.site?.company_profile_url || '/docs/kuit-limited-company-profile.pdf'"
                        download="KUIT-LIMITED-Company-Profile.pdf"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="px-5 py-3 rounded-xl bg-slate-100 hover:bg-slate-200 text-[#020B4F] font-bold text-xs uppercase tracking-wider border border-slate-200 transition flex items-center gap-2"
                    >
                        <font-awesome-icon :icon="['fas', 'file-arrow-down']" class="text-amber-500" />
                        <span>Download Profile (PDF)</span>
                    </a>
                    <Link href="/contact" class="btn-gold text-xs uppercase tracking-wider py-3 px-6">
                        Request Full Plant Catalog
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>

