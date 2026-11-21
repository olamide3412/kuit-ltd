<script setup>
import { Link } from '@inertiajs/vue3';
import { company } from '@/lib/kuitContent';

defineProps({
    keyStates: {
        type: Array,
        default: () => []
    }
});
</script>

<template>
    <section class="py-16 sm:py-24 bg-white relative font-sans">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="rounded-3xl bg-gradient-to-br from-[#020B4F] via-[#06125E] to-[#0A2FA8] p-8 sm:p-12 lg:p-16 text-white border border-navy-800 shadow-2xl relative overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center relative z-10">
                    <div class="lg:col-span-7 space-y-5">
                        <span class="text-xs font-bold text-[#F5A800] uppercase tracking-widest bg-white/10 border border-white/20 px-3.5 py-1.5 rounded-full inline-block">
                            Operational Base &amp; Reach
                        </span>
                        <h2 class="text-3xl sm:text-4xl font-black tracking-tight text-white">
                            Effurun-Warri Operational Hub &amp; Nationwide Deployment
                        </h2>
                        <p class="text-slate-200 text-sm sm:text-base leading-relaxed">
                            Based at {{ company.address }}, KUIT LIMITED deploys plant machinery, earthmoving equipment, and marine vessels across Delta State, the Niger Delta energy corridor, and nationwide civil construction sites.
                        </p>
                        
                        <div class="pt-2 flex flex-wrap gap-4 text-xs font-semibold text-slate-200">
                            <div class="flex items-center space-x-2">
                                <font-awesome-icon :icon="['fas', 'location-dot']" class="text-amber-400" />
                                <span>Effurun-Warri Yard</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <font-awesome-icon :icon="['fas', 'truck-fast']" class="text-amber-400" />
                                <span>Low-bed Heavy Mobilisation</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <font-awesome-icon :icon="['fas', 'shield-halved']" class="text-emerald-400" />
                                <span>Certified Safety &amp; QSP</span>
                            </div>
                        </div>
                    </div>

                    <!-- Operational Hubs Strip -->
                    <div class="lg:col-span-5 grid grid-cols-2 gap-3.5">
                        <div class="bg-white/10 border border-white/15 rounded-2xl p-4 text-center">
                            <div class="font-bold text-white text-sm mb-1">Delta State</div>
                            <div class="text-[11px] text-[#F5A800] uppercase font-semibold">Headquarters &amp; Yard</div>
                        </div>
                        <div class="bg-white/10 border border-white/15 rounded-2xl p-4 text-center">
                            <div class="font-bold text-white text-sm mb-1">Niger Delta</div>
                            <div class="text-[11px] text-[#F5A800] uppercase font-semibold">Energy &amp; Marine Operations</div>
                        </div>
                        <div class="bg-white/10 border border-white/15 rounded-2xl p-4 text-center">
                            <div class="font-bold text-white text-sm mb-1">Lagos &amp; West</div>
                            <div class="text-[11px] text-[#F5A800] uppercase font-semibold">Logistics &amp; IT Solutions</div>
                        </div>
                        <div class="bg-white/10 border border-white/15 rounded-2xl p-4 text-center">
                            <div class="font-bold text-white text-sm mb-1">Nationwide</div>
                            <div class="text-[11px] text-[#F5A800] uppercase font-semibold">Civil &amp; Road Works</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
