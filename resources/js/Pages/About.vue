<script setup>
import Layout from '@/Layouts/Layout.vue';
import SeoHead from '@/Components/SeoHead.vue';
import { Link } from '@inertiajs/vue3';
import { company, quickStats, values, clientsServed } from '@/lib/kuitContent';

defineOptions({ layout: Layout });

defineProps({
    seo: {
        type: Object,
        default: () => ({}),
    },
});

const companySnapshot = [
    { label: 'Legal Name', value: company.legalName },
    { label: 'Registration Number', value: company.rcNumber },
    { label: 'Date of Incorporation', value: company.incorporated },
    { label: 'Registered Office', value: company.address },
    { label: 'Primary Telephone', value: company.primaryPhone },
    { label: 'Secondary Telephone', value: company.secondaryPhone },
    { label: 'Corporate Email', value: company.email },
    { label: 'Operational Scope', value: 'Marine, Equipment Leasing, Engineering, Oil & Gas Support, IT Services' },
];
</script>

<template>
    <SeoHead :seo="seo" />

    <div class="font-sans text-slate-800">
        <!-- Hero Section -->
        <section class="bg-gradient-to-b from-[#020B4F] via-[#06125E] to-[#020B4F] text-white py-16 lg:py-24 relative overflow-hidden">
            <div class="absolute inset-0 bg-[radial-gradient(#ffffff0a_1px,transparent_1px)] [background-size:24px_24px] pointer-events-none"></div>
            
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="max-w-3xl">
                    <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 text-[#F5A800] text-xs font-bold uppercase tracking-wider mb-4 border border-white/20">
                        {{ company.rcNumber }} • Established 2009
                    </span>
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black tracking-tight leading-tight">
                        About KUIT LIMITED
                    </h1>
                    <p class="mt-4 text-base sm:text-lg text-slate-200 leading-relaxed">
                        Marine services, heavy equipment leasing, civil construction, engineering, oil &amp; gas support, and modern technology solutions delivered across Nigeria to uncompromising standards.
                    </p>
                    <div class="mt-8 flex flex-wrap gap-4">
                        <Link
                            href="/contact"
                            class="btn-gold text-xs uppercase tracking-wider py-3.5 px-7"
                        >
                            Request a Quote
                        </Link>
                        <a
                            v-if="$page.props.site?.enable_profile_download"
                            :href="$page.props.site?.company_profile_url || '/docs/kuit-limited-company-profile.pdf'"
                            download="KUIT-LIMITED-Company-Profile.pdf"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="px-6 py-3.5 rounded-lg bg-amber-500 hover:bg-amber-400 text-[#020B4F] font-bold text-xs uppercase tracking-wider transition flex items-center gap-2 shadow-sm"
                        >
                            <font-awesome-icon :icon="['fas', 'file-arrow-down']" />
                            <span>Download Profile (PDF)</span>
                        </a>
                        <Link
                            href="/equipment"
                            class="px-6 py-3.5 rounded-lg bg-white/10 hover:bg-white/20 text-white font-bold text-xs uppercase tracking-wider border border-white/20 transition"
                        >
                            View Equipment &amp; Fleet
                        </Link>
                    </div>
                </div>
            </div>
        </section>

        <!-- Company Story & Snapshot -->
        <section class="py-16 sm:py-24 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
                    <!-- Left: Narrative -->
                    <div class="lg:col-span-7 space-y-6 text-slate-700 leading-relaxed text-base">
                        <div>
                            <span class="text-xs font-bold text-[#020B4F] uppercase tracking-widest bg-navy-100 px-3 py-1 rounded-full inline-block mb-3">
                                Company Background
                            </span>
                            <h2 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">
                                Delivering High-Quality Services to Uncompromising Standards Since 2009
                            </h2>
                        </div>

                        <p class="text-lg font-medium text-slate-900 leading-relaxed">
                            KUIT LIMITED was incorporated on 16 March 2009 and has since delivered high-quality services to uncompromising standards. As a marine services and construction/equipment leasing company, we specialise in leasing and contract services across marine, construction, engineering and oil &amp; gas support.
                        </p>

                        <p>
                            Over the years we have served the oil and gas industry and various government departments, both locally and internationally, including the <strong>Nigerian National Petroleum Company (NNPC)</strong>, the <strong>Nigerian Petroleum Development Company (NPDC)</strong> and <strong>Century Exploration and Production Limited (CEPL)</strong>, as well as road and bridge construction projects across Nigeria. Our excavators and other equipment are currently at work in various locations around the country.
                        </p>

                        <p>
                            We have recently expanded into technology, offering <strong>IT services</strong> including cloud solutions and application development.
                        </p>

                        <!-- Track Record Highlights -->
                        <div class="pt-4 grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div v-for="stat in quickStats" :key="stat.label" class="p-4 rounded-2xl bg-[#F4F6FA] border border-slate-200">
                                <div class="text-[11px] font-bold uppercase tracking-wider text-[#020B4F]">{{ stat.label }}</div>
                                <div class="text-base font-extrabold text-slate-900 mt-1">{{ stat.value }}</div>
                                <div class="text-xs text-slate-500 mt-0.5">{{ stat.detail }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Company Snapshot Table -->
                    <div class="lg:col-span-5">
                        <div class="bg-[#F4F6FA] rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-sm space-y-6">
                            <div>
                                <h3 class="text-xl font-bold text-slate-900">Company Snapshot</h3>
                                <p class="text-xs text-slate-500 mt-1">Official corporate registration &amp; profile information</p>
                            </div>

                            <dl class="divide-y divide-slate-200 text-xs sm:text-sm">
                                <div v-for="item in companySnapshot" :key="item.label" class="py-3 flex flex-col sm:flex-row sm:justify-between gap-1">
                                    <dt class="font-bold text-slate-900 sm:w-2/5 shrink-0">{{ item.label }}</dt>
                                    <dd class="text-slate-600 sm:w-3/5 break-words">{{ item.value }}</dd>
                                </div>
                            </dl>

                            <div class="pt-3 space-y-2">
                                <a 
                                    v-if="$page.props.site?.enable_profile_download"
                                    :href="$page.props.site?.company_profile_url || '/docs/kuit-limited-company-profile.pdf'" 
                                    download="KUIT-LIMITED-Company-Profile.pdf"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="w-full py-3 rounded-xl bg-[#F5A800] text-[#020B4F] font-bold text-xs uppercase tracking-wider text-center flex items-center justify-center gap-2 hover:bg-amber-400 transition shadow-sm"
                                >
                                    <font-awesome-icon :icon="['fas', 'file-arrow-down']" />
                                    <span>Download Company Profile (PDF)</span>
                                </a>

                                <a 
                                    :href="`mailto:${company.email}`" 
                                    class="w-full py-3 rounded-xl bg-[#020B4F] text-white font-bold text-xs uppercase tracking-wider text-center block hover:bg-navy-800 transition"
                                >
                                    Contact Corporate Office
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Smart, Safe, Safety & Security, and Community Relations -->
        <section class="py-16 sm:py-24 bg-[#020B4F] text-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span class="text-xs font-bold text-[#F5A800] uppercase tracking-widest bg-white/10 px-3.5 py-1.5 rounded-full inline-block mb-3 border border-white/20">
                        Operational Values
                    </span>
                    <h2 class="text-3xl sm:text-4xl font-black tracking-tight text-white">
                        The Smart &amp; Safe Principle
                    </h2>
                    <p class="mt-4 text-slate-200 text-base leading-relaxed">
                        Industry excellence and uncompromising health, safety, environmental, and community standards.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Smart Card -->
                    <div class="bg-white/10 rounded-3xl p-8 border border-white/15">
                        <div class="w-12 h-12 rounded-2xl bg-[#0A2FA8] text-[#F5A800] flex items-center justify-center text-xl mb-5">
                            <font-awesome-icon :icon="['fas', 'lightbulb']" />
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-3">Smart</h3>
                        <p class="text-slate-200 text-sm leading-relaxed">
                            {{ values.smart.body }}
                        </p>
                    </div>

                    <!-- Safe Card -->
                    <div class="bg-white/10 rounded-3xl p-8 border border-white/15">
                        <div class="w-12 h-12 rounded-2xl bg-[#0A2FA8] text-[#F5A800] flex items-center justify-center text-xl mb-5">
                            <font-awesome-icon :icon="['fas', 'shield-halved']" />
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-3">Safe</h3>
                        <p class="text-slate-200 text-sm leading-relaxed">
                            {{ values.safe.body }}
                        </p>
                    </div>

                    <!-- Safety and Security -->
                    <div class="bg-white/10 rounded-3xl p-8 border border-white/15">
                        <div class="w-12 h-12 rounded-2xl bg-[#0A2FA8] text-[#F5A800] flex items-center justify-center text-xl mb-5">
                            <font-awesome-icon :icon="['fas', 'user-shield']" />
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-3">Safety and Security</h3>
                        <p class="text-slate-200 text-sm leading-relaxed">
                            {{ values.security.body }}
                        </p>
                    </div>

                    <!-- Community Relations -->
                    <div class="bg-white/10 rounded-3xl p-8 border border-white/15">
                        <div class="w-12 h-12 rounded-2xl bg-[#0A2FA8] text-[#F5A800] flex items-center justify-center text-xl mb-5">
                            <font-awesome-icon :icon="['fas', 'handshake']" />
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-3">Community Relations &amp; Social Responsibility</h3>
                        <p class="text-slate-200 text-sm leading-relaxed">
                            {{ values.community.body }}
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Clients We Have Served Section -->
        <section class="py-16 sm:py-24 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto mb-12">
                    <span class="text-xs font-bold text-[#020B4F] uppercase tracking-widest bg-navy-100 px-3 py-1 rounded-full inline-block mb-3">
                        Track Record
                    </span>
                    <h2 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">
                        Notable Clients Served
                    </h2>
                    <p class="text-slate-600 text-sm mt-2">
                        Demonstrated performance across oil and gas facilities, government departments, and infrastructure projects.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div 
                        v-for="client in clientsServed" 
                        :key="client.name"
                        class="p-6 rounded-2xl bg-[#F4F6FA] border border-slate-200 flex flex-col justify-between"
                    >
                        <div>
                            <div class="w-10 h-10 rounded-xl bg-[#020B4F] text-[#F5A800] flex items-center justify-center text-base mb-3.5">
                                <font-awesome-icon :icon="['fas', 'building']" />
                            </div>
                            <h4 class="font-bold text-slate-900 text-sm leading-snug">
                                {{ client.name }}
                            </h4>
                        </div>
                        <p class="text-xs text-slate-500 mt-3 pt-3 border-t border-slate-200">
                            {{ client.sector }}
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
