<script setup>
import Layout from '@/Layouts/Layout.vue';
import SeoHead from '@/Components/SeoHead.vue';
import { Link } from '@inertiajs/vue3';
import { company } from '@/lib/kuitContent';

defineOptions({ layout: Layout });

const props = defineProps({
    pageSlug: {
        type: String,
        required: true,
    },
    pageTitle: {
        type: String,
        required: true,
    },
    seo: {
        type: Object,
        default: () => ({}),
    },
});

const legalLinks = [
    { slug: 'privacy-policy', label: 'Privacy Policy (NDPA 2023)' },
    { slug: 'terms', label: 'Terms of Service & Leasing' },
    { slug: 'warranty', label: 'Quality & Safety Standards' },
    { slug: 'refund-policy', label: 'Mobilisation & Cancellation' },
];
</script>

<template>
    <SeoHead :seo="seo" />

    <div class="bg-slate-50 min-h-screen py-10 lg:py-16 font-sans">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumbs -->
            <nav class="flex items-center text-xs text-slate-500 mb-6">
                <Link href="/" class="hover:text-amber-500 transition-colors">Home</Link>
                <span class="mx-2">/</span>
                <span class="text-slate-800 font-medium">{{ pageTitle }}</span>
            </nav>

            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-start">
                <!-- Sidebar -->
                <div class="md:col-span-4 bg-white rounded-2xl p-5 border border-slate-200 shadow-sm sticky top-24">
                    <div class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-3">Legal &amp; Compliance</div>
                    <nav class="space-y-1">
                        <Link
                            v-for="item in legalLinks"
                            :key="item.slug"
                            :href="`/${item.slug}`"
                            :class="[
                                'block px-3.5 py-2.5 rounded-xl text-xs font-bold transition',
                                pageSlug === item.slug
                                    ? 'bg-[#020B4F] text-[#F5A800] font-extrabold shadow-sm'
                                    : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900'
                            ]"
                        >
                            {{ item.label }}
                        </Link>
                    </nav>

                    <div class="mt-6 pt-4 border-t border-slate-100 text-[11px] text-slate-500 space-y-1">
                        <p class="font-bold text-slate-800">{{ company.name }}</p>
                        <p>{{ company.rcNumber }} • Inc. {{ company.incorporated }}</p>
                        <p>{{ company.address }}</p>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="md:col-span-8 bg-white rounded-3xl p-6 sm:p-10 border border-slate-200 shadow-sm prose prose-slate max-w-none prose-headings:text-[#020B4F] prose-headings:font-bold prose-a:text-[#0A2FA8]">
                    <h1 class="text-2xl sm:text-3xl font-black text-[#020B4F] mb-2 not-prose">{{ pageTitle }}</h1>
                    <p class="text-xs text-slate-400 mb-8 not-prose">Last Updated: March 2026 &bull; KUIT LIMITED Operational Compliance</p>

                    <!-- Privacy Policy -->
                    <div v-if="pageSlug === 'privacy-policy'" class="space-y-4 text-sm text-slate-600 leading-relaxed">
                        <h2 class="text-lg font-bold text-[#020B4F]">1. Compliance with the Nigeria Data Protection Act (NDPA) 2023</h2>
                        <p>
                            KUIT LIMITED (RC 806865, "we", "our", "us") is dedicated to protecting the privacy and confidentiality of client data, vendor records, and site personnel information in strict compliance with the Nigeria Data Protection Act (NDPA) 2023.
                        </p>

                        <h2 class="text-lg font-bold text-[#020B4F]">2. Information Collected</h2>
                        <p>We collect information strictly required to deliver contract operations, execute machinery leasing, coordinate marine charter voyages, and provide technical services:</p>
                        <ul class="list-disc pl-5 space-y-1 text-xs">
                            <li>Contact information: Name, corporate designation, email address, phone numbers.</li>
                            <li>Operational data: Project site coordinates, equipment delivery destinations, charter timelines.</li>
                            <li>Financial &amp; invoicing information: Bank transaction records, corporate invoice details, payment receipts.</li>
                        </ul>

                        <h2 class="text-lg font-bold text-[#020B4F]">3. Data Security &amp; Inquiries</h2>
                        <p>
                            Your information is never sold or shared with unauthorised third parties. For data inquiries or corrections, contact our corporate office at <a :href="`mailto:${company.email}`">{{ company.email }}</a>.
                        </p>
                    </div>

                    <!-- Terms of Service & Leasing -->
                    <div v-else-if="pageSlug === 'terms'" class="space-y-4 text-sm text-slate-600 leading-relaxed">
                        <h2 class="text-lg font-bold text-[#020B4F]">1. Equipment Leasing &amp; Plant Hire Agreements</h2>
                        <p>
                            All machinery leasing quotations issued by KUIT LIMITED are subject to machinery availability and mutually executed dry or wet lease agreements. Mobilisation occurs upon receipt of agreed commitment deposits.
                        </p>

                        <h2 class="text-lg font-bold text-[#020B4F]">2. Marine Vessel Charters</h2>
                        <p>
                            Marine vessel charters (tanker vessels, supply vessels, sea-going tugs, passenger crew boats) operate strictly within approved navigation routes and maritime safety regulations.
                        </p>

                        <h2 class="text-lg font-bold text-[#020B4F]">3. Site Safety &amp; Qualified Personnel</h2>
                        <p>
                            In line with our Smart &amp; Safe operating policy, Qualified Safety Personnel (QSP) are deployed to sites to supervise machinery offloading, civil works, and pipeline execution.
                        </p>
                    </div>

                    <!-- Quality & Safety Standards -->
                    <div v-else-if="pageSlug === 'warranty'" class="space-y-4 text-sm text-slate-600 leading-relaxed">
                        <h2 class="text-lg font-bold text-[#020B4F]">1. The KUIT Engineering Standard</h2>
                        <p>
                            KUIT LIMITED maintains high standards of excellence across all civil infrastructure, equipment leasing, pipeline welding, and marine logistics contracts.
                        </p>

                        <h2 class="text-lg font-bold text-[#020B4F]">2. Plant Readiness &amp; Maintenance Support</h2>
                        <p>
                            Every plant machine (CAT excavators, bulldozers, graders, loaders) undergoes pre-dispatch functional audits, ensuring that hydraulic pressures, engine fluids, and safety features meet field operational specifications.
                        </p>
                    </div>

                    <!-- Mobilisation & Cancellation Policy -->
                    <div v-else-if="pageSlug === 'refund-policy'" class="space-y-4 text-sm text-slate-600 leading-relaxed">
                        <h2 class="text-lg font-bold text-[#020B4F]">1. Mobilisation Terms</h2>
                        <p>
                            Low-bed trailer transport and equipment dispatch are scheduled upon confirmation of lease agreements. Mobilisation fees cover insured freight directly to the client's designated site.
                        </p>

                        <h2 class="text-lg font-bold text-[#020B4F]">2. Contract Adjustments</h2>
                        <p>
                            Changes in project schedule, lease extension requests, or demobilisation coordinates must be communicated in writing to <a :href="`mailto:${company.email}`">{{ company.email }}</a> to enable seamless logistics coordination.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
