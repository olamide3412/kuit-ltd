<script setup>
import { Link } from '@inertiajs/vue3';

const steps = [
    {
        num: '01',
        title: 'Enquire',
        desc: 'Reach out with your project requirements, machinery leasing duration, or marine charter scope.',
        icon: 'file-signature',
    },
    {
        num: '02',
        title: 'Site Survey & Planning',
        desc: 'We assess technical specifications, terrain conditions, and logistics to prepare a tailored commercial proposal.',
        icon: 'drafting-compass',
    },
    {
        num: '03',
        title: 'Mobilise & Execute',
        desc: 'Rapid transport of plant equipment, vessel departure, or deployment of qualified safety personnel to site.',
        icon: 'truck-monster',
    },
    {
        num: '04',
        title: 'Support & Handover',
        desc: 'Uncompromising adherence to safety, continuous field maintenance support, and structured completion.',
        icon: 'handshake',
    },
];
</script>

<template>
    <section class="py-16 sm:py-24 bg-white relative font-sans">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
                <span class="text-xs font-bold text-[#020B4F] uppercase tracking-widest bg-navy-100 px-3.5 py-1.5 rounded-full inline-block mb-3">
                    Our Engagement Process
                </span>
                <h2 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight">
                    Structured, Safe 4-Step Execution
                </h2>
                <p class="mt-4 text-slate-600 text-base leading-relaxed">
                    How we ensure dependable delivery, minimal downtime, and rigorous compliance across all operational sectors.
                </p>
            </div>

            <!-- Steps Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div 
                    v-for="(step, idx) in steps" 
                    :key="step.num"
                    class="rounded-3xl bg-slate-50 border border-slate-200/80 p-8 relative hover:bg-white hover:border-[#F5A800] hover:shadow-xl transition-all duration-300 group"
                    data-aos="fade-up"
                    :data-aos-delay="idx * 100"
                >
                    <!-- Step Number Badge -->
                    <div class="text-4xl font-black text-slate-200 group-hover:text-[#F5A800]/40 transition-colors mb-4">
                        {{ step.num }}
                    </div>

                    <div class="w-12 h-12 rounded-2xl bg-navy-50 text-[#020B4F] flex items-center justify-center text-lg mb-4 group-hover:bg-[#020B4F] group-hover:text-[#F5A800] transition-colors">
                        <font-awesome-icon :icon="['fas', step.icon]" />
                    </div>

                    <h3 class="text-lg font-bold text-slate-900 mb-2 group-hover:text-[#0A2FA8] transition">
                        {{ step.title }}
                    </h3>

                    <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                        {{ step.desc }}
                    </p>
                </div>
            </div>
        </div>
    </section>
</template>
