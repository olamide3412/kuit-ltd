<script setup>
import { Link } from '@inertiajs/vue3';
import { servicePillars } from '@/lib/kuitContent';

defineProps({
    services: {
        type: Array,
        default: () => [],
    },
});
</script>

<template>
    <section class="py-16 sm:py-24 bg-[#F4F6FA] relative overflow-hidden font-sans">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto mb-14" data-aos="fade-up">
                <span class="text-xs font-bold text-[#020B4F] uppercase tracking-widest bg-navy-100 px-3.5 py-1.5 rounded-full inline-block mb-3">
                    Our Core Capabilities
                </span>
                <h2 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight">
                    Five Strategic Service Pillars
                </h2>
                <p class="mt-4 text-slate-600 text-base leading-relaxed">
                    KUIT LIMITED provides leasing, construction, engineering, marine, oil &amp; gas and IT services, delivered by qualified personnel and project partners in line with project requirements.
                </p>
            </div>

            <!-- Pillars Grid (5 Cards: 3 on top row, 2 centered or balanced on bottom) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                <div 
                    v-for="(service, idx) in servicePillars" 
                    :key="service.id"
                    class="bg-white rounded-3xl p-7 sm:p-8 border border-slate-200/80 shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 group flex flex-col justify-between"
                    :class="{ 'lg:col-span-1 md:col-span-2 lg:translate-x-0': idx === 3, 'lg:col-span-1': idx === 4 }"
                    data-aos="fade-up"
                    :data-aos-delay="idx * 75"
                >
                    <div>
                        <div class="w-14 h-14 rounded-2xl bg-navy-50 text-[#020B4F] flex items-center justify-center text-2xl mb-6 group-hover:bg-[#020B4F] group-hover:text-[#F5A800] transition-colors duration-300">
                            <font-awesome-icon :icon="['fas', service.icon]" />
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-[#0A2FA8] transition">
                            {{ service.name }}
                        </h3>
                        <p class="text-slate-600 text-sm leading-relaxed mb-5">
                            {{ service.summary }}
                        </p>

                        <!-- Key Capabilities List -->
                        <ul class="space-y-2 text-xs text-slate-700 font-medium mb-6">
                            <li v-for="item in (service.items || []).slice(0, 4)" :key="item" class="flex items-start space-x-2">
                                <font-awesome-icon :icon="['fas', 'check-circle']" class="text-[#F5A800] mt-0.5 shrink-0" />
                                <span>{{ item }}</span>
                            </li>
                        </ul>
                    </div>

                    <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                        <Link 
                            :href="`/services#${service.slug}`" 
                            class="text-xs font-bold text-[#0A2FA8] hover:text-[#020B4F] flex items-center space-x-1.5 transition"
                        >
                            <span>Learn more</span>
                            <font-awesome-icon :icon="['fas', 'arrow-right']" class="text-[10px]" />
                        </Link>

                        <Link 
                            href="/contact" 
                            class="text-xs font-semibold text-slate-500 hover:text-[#F5A800] transition"
                        >
                            Enquire &rarr;
                        </Link>
                    </div>
                </div>
            </div>

            <!-- Bottom Action Banner -->
            <div class="mt-12 text-center">
                <Link 
                    href="/services" 
                    class="inline-flex items-center space-x-2 px-6 py-3 rounded-xl bg-white border border-slate-200 text-slate-800 font-bold text-sm hover:bg-slate-50 shadow-sm transition"
                >
                    <span>View Full Service Catalog &amp; Specifications</span>
                    <font-awesome-icon :icon="['fas', 'arrow-right']" class="text-xs text-amber-500" />
                </Link>
            </div>
        </div>
    </section>
</template>
