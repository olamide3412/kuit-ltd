<script setup>
import { Link } from '@inertiajs/vue3';
import { values } from '@/lib/kuitContent';

const pillars = [
    {
        title: values.smart.title,
        badge: 'Industry Performance',
        desc: values.smart.body,
        icon: 'lightbulb',
    },
    {
        title: values.safe.title,
        badge: 'Zero Compromise',
        desc: values.safe.body,
        icon: 'shield-halved',
    },
    {
        title: values.security.title,
        badge: 'On-Site Standards',
        desc: values.security.body,
        icon: 'user-shield',
    },
    {
        title: values.community.title,
        badge: 'Responsible Engagement',
        desc: values.community.body,
        icon: 'handshake',
    },
];
</script>

<template>
    <section class="py-16 sm:py-24 bg-[#020B4F] text-white relative overflow-hidden font-sans">
        <!-- Subtle background styling -->
        <div class="absolute inset-0 bg-[radial-gradient(#ffffff0a_1px,transparent_1px)] [background-size:24px_24px] pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Header -->
            <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
                <span class="text-xs font-bold text-[#F5A800] uppercase tracking-widest bg-white/10 border border-white/20 px-3.5 py-1.5 rounded-full inline-block mb-3">
                    The KUIT Standard
                </span>
                <h2 class="text-3xl sm:text-4xl font-black tracking-tight text-white">
                    Smart, Safe &amp; Reliable Delivery
                </h2>
                <p class="mt-4 text-slate-200 text-base leading-relaxed">
                    We maintain uncompromising standards of excellence with international reach, practical innovation, and an unwavering commitment to health, safety, and community relations.
                </p>
            </div>

            <!-- Pillars Grid (4 Cards) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div 
                    v-for="(item, idx) in pillars" 
                    :key="item.title"
                    class="p-8 rounded-3xl bg-white/10 backdrop-blur-sm border border-white/15 hover:border-[#F5A800]/50 transition-all duration-300 flex flex-col justify-between"
                    data-aos="fade-up"
                    :data-aos-delay="idx * 100"
                >
                    <div>
                        <div class="flex items-center justify-between mb-5">
                            <div class="w-12 h-12 rounded-2xl bg-[#0A2FA8] text-[#F5A800] flex items-center justify-center text-xl">
                                <font-awesome-icon :icon="['fas', item.icon]" />
                            </div>
                            <span class="text-[11px] font-bold uppercase tracking-wider px-3 py-1 rounded-full bg-white/10 text-[#F5A800] border border-white/10">
                                {{ item.badge }}
                            </span>
                        </div>

                        <h3 class="text-xl font-bold text-white mb-3">
                            {{ item.title }}
                        </h3>

                        <p class="text-slate-200 text-sm leading-relaxed">
                            {{ item.desc }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Bottom CTA strip -->
            <div class="mt-14 pt-10 border-t border-navy-800 flex flex-col sm:flex-row items-center justify-between gap-6">
                <div>
                    <h4 class="text-lg font-bold text-white">Looking for an experienced technical partner?</h4>
                    <p class="text-xs text-slate-300 mt-1">Talk to our project planning and logistics team at our Effurun-Warri office.</p>
                </div>
                <div class="flex items-center space-x-4">
                    <Link href="/about" class="px-5 py-2.5 rounded-lg bg-white/10 hover:bg-white/20 text-white text-xs font-bold transition">
                        Our Full Story
                    </Link>
                    <Link href="/contact" class="btn-gold text-xs uppercase tracking-wider py-2.5 px-6">
                        Contact Us
                    </Link>
                </div>
            </div>
        </div>
    </section>
</template>
