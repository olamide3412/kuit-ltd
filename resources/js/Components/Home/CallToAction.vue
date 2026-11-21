<script setup>
import { computed } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';
import { company } from '@/lib/kuitContent';

const page = usePage();

const phone = computed(() => {
    return page.props.site?.phone || company.primaryPhone;
});
</script>

<template>
    <section class="bg-gradient-to-r from-[#020B4F] via-[#06125E] to-[#0A2FA8] text-white py-16 sm:py-20 border-t border-navy-800 relative overflow-hidden font-sans">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-8 text-center lg:text-left">
                <div class="space-y-3 max-w-2xl">
                    <span class="text-xs font-bold text-[#F5A800] uppercase tracking-widest bg-white/10 border border-white/20 px-3.5 py-1 rounded-full inline-block">
                        Ready to Mobilise?
                    </span>
                    <h2 class="text-3xl sm:text-4xl font-black text-white tracking-tight">
                        Need Equipment, a Vessel or an Engineering Partner?
                    </h2>
                    <p class="text-slate-200 text-sm sm:text-base leading-relaxed">
                        Talk directly to our operations and logistics team in Effurun-Warri. We provide fast mobilisation, transparent terms, and uncompromising safety standards.
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row items-center gap-3 shrink-0">
                    <Link 
                        href="/contact"
                        class="btn-gold w-full sm:w-auto px-7 py-3.5 text-xs uppercase tracking-wider flex items-center justify-center space-x-2"
                    >
                        <font-awesome-icon :icon="['fas', 'file-signature']" />
                        <span>Request a Quote</span>
                    </Link>

                    <a 
                        v-if="$page.props.site?.enable_profile_download"
                        :href="$page.props.site?.company_profile_url || '/docs/kuit-limited-company-profile.pdf'"
                        download="KUIT-LIMITED-Company-Profile.pdf"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="w-full sm:w-auto px-6 py-3.5 rounded-lg bg-amber-500/20 hover:bg-amber-500/30 text-amber-300 font-bold text-xs uppercase tracking-wider border border-amber-500/40 transition flex items-center justify-center space-x-2 shadow-sm"
                    >
                        <font-awesome-icon :icon="['fas', 'file-arrow-down']" class="text-amber-400" />
                        <span>Profile (PDF)</span>
                    </a>

                    <a 
                        :href="`tel:${phone}`"
                        class="w-full sm:w-auto px-6 py-3.5 rounded-lg bg-white/10 hover:bg-white/20 text-white font-bold text-xs uppercase tracking-wider border border-white/20 transition flex items-center justify-center space-x-2"
                    >
                        <font-awesome-icon :icon="['fas', 'phone']" class="text-amber-400" />
                        <span>Call {{ phone }}</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
</template>
