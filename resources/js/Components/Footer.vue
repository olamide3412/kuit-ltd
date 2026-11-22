<script setup>
import { computed } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';
import { company, servicePillars } from '@/lib/kuitContent';

const page = usePage();

const site = computed(() => ({
    name: page.props.site?.name || company.name,
    rc_number: page.props.site?.rc_number || company.rcNumber,
    logo_url: page.props.site?.logo_url || '/images/logo.svg',
    phone: page.props.site?.phone || company.primaryPhone,
    secondary_phone: page.props.site?.secondary_phone || company.secondaryPhone,
    email: page.props.site?.email || company.email,
    address: page.props.site?.address || company.address,
    tagline: page.props.site?.tagline || company.tagline,
    enable_profile_download: page.props.site?.enable_profile_download,
    company_profile_url: page.props.site?.company_profile_url || '/docs/kuit-limited-company-profile.pdf',
}));

const currentYear = new Date().getFullYear();

const scrollToTop = () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
};
</script>

<template>
    <footer class="bg-[#020B4F] text-slate-300 border-t-4 border-[#F5A800] relative overflow-hidden font-sans">
        <!-- Ambient subtle background decorative highlights -->
        <div class="absolute -top-40 right-0 w-96 h-96 bg-amber-500/5 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-40 left-0 w-96 h-96 bg-blue-600/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 pb-12 relative z-10">
            <!-- Top Grid: 4 Columns -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10 lg:gap-8 pb-14 border-b border-navy-800">
                <!-- Col 1: Corporate Identity & Overview (4 cols) -->
                <div class="lg:col-span-4 space-y-5">
                    <Link href="/" class="flex items-center space-x-3 group">
                        <img 
                            :src="site.logo_url" 
                            alt="KUIT LIMITED Logo" 
                            class="w-11 h-11 object-contain rounded-xl shadow-md group-hover:scale-105 transition-transform duration-300 shrink-0"
                        />
                        <div>
                            <span class="text-2xl font-black tracking-tight text-white flex items-center">
                                KUIT<span class="text-[#F5A800] ml-1.5 font-extrabold">LIMITED</span>
                            </span>
                            <span class="text-[11px] font-bold text-amber-400 tracking-wider uppercase block">
                                {{ site.rc_number }}
                            </span>
                        </div>
                    </Link>

                    <p class="text-slate-300 text-sm leading-relaxed pr-4">
                        KUIT LIMITED was incorporated on 16 March 2009. We deliver high-calibre marine services, equipment leasing, civil engineering, oil &amp; gas support, and modern IT solutions across Nigeria.
                    </p>

                    <!-- Factual Trust Indicators -->
                    <div class="flex flex-wrap gap-2 text-xs font-semibold text-slate-200">
                        <span class="px-3 py-1 rounded-full bg-navy-900 border border-navy-700 flex items-center gap-1.5">
                            <font-awesome-icon :icon="['fas', 'calendar-check']" class="text-amber-400" />
                            Inc. March 2009
                        </span>
                        <span class="px-3 py-1 rounded-full bg-navy-900 border border-navy-700 flex items-center gap-1.5">
                            <font-awesome-icon :icon="['fas', 'shield-halved']" class="text-emerald-400" />
                            Smart &amp; Safe Execution
                        </span>
                    </div>
                </div>

                <!-- Col 2: Core Service Sectors (3 cols) -->
                <div class="lg:col-span-3 space-y-4">
                    <h3 class="text-white text-sm font-bold uppercase tracking-wider border-b border-amber-500/40 pb-2 inline-block">
                        Services
                    </h3>
                    <ul class="space-y-2.5 text-sm">
                        <li v-for="service in servicePillars" :key="service.slug">
                            <Link :href="`/services#${service.slug}`" class="text-slate-300 hover:text-amber-400 transition flex items-center gap-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span>
                                <span>{{ service.name }}</span>
                            </Link>
                        </li>
                    </ul>
                </div>

                <!-- Col 3: Quick Navigation (2 cols) -->
                <div class="lg:col-span-2 space-y-4">
                    <h3 class="text-white text-sm font-bold uppercase tracking-wider border-b border-amber-500/40 pb-2 inline-block">
                        Company
                    </h3>
                    <ul class="space-y-2.5 text-sm">
                        <li>
                            <Link href="/" class="text-slate-300 hover:text-amber-400 transition">Home</Link>
                        </li>
                        <li>
                            <Link href="/about" class="text-slate-300 hover:text-amber-400 transition">About Us</Link>
                        </li>
                        <li v-if="site.enable_profile_download">
                            <a 
                                :href="site.company_profile_url"
                                download="KUIT-LIMITED-Company-Profile.pdf"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="text-amber-400 hover:text-amber-300 font-bold transition flex items-center gap-1.5"
                            >
                                <font-awesome-icon :icon="['fas', 'file-arrow-down']" class="text-xs" />
                                <span>Profile (PDF)</span>
                            </a>
                        </li>
                        <li>
                            <Link href="/equipment" class="text-slate-300 hover:text-amber-400 transition">Equipment &amp; Fleet</Link>
                        </li>
                        <li>
                            <Link href="/projects" class="text-slate-300 hover:text-amber-400 transition">Projects Gallery</Link>
                        </li>
                        <li>
                            <Link href="/blog" class="text-slate-300 hover:text-amber-400 transition">Blog</Link>
                        </li>
                        <li>
                            <Link href="/contact" class="text-slate-300 hover:text-amber-400 transition">Contact Us</Link>
                        </li>
                        <li>
                            <Link href="/privacy-policy" class="text-slate-300 hover:text-amber-400 transition">Privacy Policy</Link>
                        </li>
                        <li>
                            <Link href="/terms" class="text-slate-300 hover:text-amber-400 transition">Terms &amp; Conditions</Link>
                        </li>
                    </ul>
                </div>

                <!-- Col 4: Corporate Contact (3 cols) -->
                <div class="lg:col-span-3 space-y-4">
                    <h3 class="text-white text-sm font-bold uppercase tracking-wider border-b border-amber-500/40 pb-2 inline-block">
                        Office &amp; Contact
                    </h3>
                    <ul class="space-y-3 text-sm text-slate-300">
                        <li class="flex items-start gap-2.5">
                            <font-awesome-icon :icon="['fas', 'location-dot']" class="text-amber-400 mt-1 shrink-0" />
                            <span>{{ site.address }}</span>
                        </li>
                        <li class="flex items-center gap-2.5">
                            <font-awesome-icon :icon="['fas', 'phone']" class="text-amber-400 shrink-0" />
                            <div class="space-y-0.5">
                                <a :href="`tel:${site.phone}`" class="block hover:text-amber-400 transition font-medium">{{ site.phone }}</a>
                                <a :href="`tel:${site.secondary_phone}`" class="block hover:text-amber-400 transition text-xs text-slate-400">{{ site.secondary_phone }}</a>
                            </div>
                        </li>
                        <li class="flex items-center gap-2.5">
                            <font-awesome-icon :icon="['fas', 'envelope']" class="text-amber-400 shrink-0" />
                            <a :href="`mailto:${site.email}`" class="hover:text-amber-400 transition">{{ site.email }}</a>
                        </li>
                        <li class="pt-2">
                            <Link href="/contact" class="btn-gold inline-flex items-center gap-2 text-xs uppercase tracking-wider py-2 px-4">
                                <font-awesome-icon :icon="['fas', 'paper-plane']" />
                                <span>Send an Enquiry</span>
                            </Link>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Bar: Copyright & Back-to-Top -->
            <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-400">
                <p>© 2009–{{ currentYear }} KUIT LIMITED. All rights reserved. ({{ site.rc_number }})</p>
                <div class="flex items-center space-x-6">
                    <Link href="/privacy-policy" class="hover:text-amber-400 transition">Privacy</Link>
                    <Link href="/terms" class="hover:text-amber-400 transition">Terms</Link>
                    <button 
                        @click="scrollToTop" 
                        class="hover:text-amber-400 transition flex items-center space-x-1 font-semibold"
                        aria-label="Scroll to top"
                    >
                        <span>Back to top</span>
                        <font-awesome-icon :icon="['fas', 'arrow-up']" class="text-[10px]" />
                    </button>
                </div>
            </div>
        </div>
    </footer>
</template>
