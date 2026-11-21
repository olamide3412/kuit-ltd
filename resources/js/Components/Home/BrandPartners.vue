<script setup>
import { clientsServed } from '@/lib/kuitContent';
</script>

<template>
    <section class="relative bg-slate-900 border-y border-slate-800 py-12 sm:py-16 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Header -->
            <div class="text-center max-w-3xl mx-auto mb-8 sm:mb-10">
                <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 rounded-full bg-navy-800 border border-navy-700 text-[#F5A800] text-xs font-bold tracking-wider uppercase mb-3">
                    <font-awesome-icon :icon="['fas', 'award']" />
                    <span>Track Record &amp; Industry Reach</span>
                </div>
                <h2 class="text-xl sm:text-3xl font-black text-white tracking-tight">
                    Clients &amp; Sectors We Have Served
                </h2>
                <p class="text-xs sm:text-sm text-slate-300 mt-2 max-w-2xl mx-auto">
                    Over the years, KUIT LIMITED has served major oil and gas operators and government infrastructure projects, both locally and across the Niger Delta.
                </p>
            </div>

            <!-- Plain Text Clients Grid (Strictly Factual, No Unlicensed Logos) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                <div 
                    v-for="client in clientsServed" 
                    :key="client.name"
                    class="p-5 sm:p-6 rounded-2xl bg-white/5 border border-white/10 hover:border-[#F5A800]/50 hover:bg-white/10 transition-all duration-300 flex flex-col justify-between"
                >
                    <div>
                        <div class="w-10 h-10 rounded-xl bg-[#020B4F] border border-white/10 flex items-center justify-center text-[#F5A800] text-base mb-3.5">
                            <font-awesome-icon :icon="['fas', 'building-shield']" />
                        </div>
                        <h4 class="text-sm sm:text-base font-bold text-white leading-snug">
                            {{ client.name }}
                        </h4>
                    </div>
                    <div class="mt-4 pt-3 border-t border-white/10 text-xs text-slate-400 font-medium">
                        {{ client.sector }}
                    </div>
                </div>
            </div>

            <!-- Notice on project photos and equipment -->
            <div class="text-center mt-8">
                <p class="text-xs text-slate-400">
                    Our excavators and other plant equipment are currently at work in various locations across Nigeria.
                </p>
            </div>
        </div>
    </section>
</template>
