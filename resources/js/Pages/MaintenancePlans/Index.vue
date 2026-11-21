<script setup>
import Layout from '@/Layouts/Layout.vue';
import SeoHead from '@/Components/SeoHead.vue';
import { formatNaira } from '@/Utils/formatCurrency';
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

defineOptions({ layout: Layout });

const props = defineProps({
    plans: {
        type: Array,
        default: () => [],
    },
    seo: {
        type: Object,
        default: () => ({}),
    },
});

const page = usePage();
const companyWhatsApp = computed(() => page.props.support?.whatsapp || '+2348000000000');

const parseInclusions = (inc) => {
    if (Array.isArray(inc)) return inc;
    if (typeof inc === 'string') {
        try {
            const parsed = JSON.parse(inc);
            if (Array.isArray(parsed)) return parsed;
        } catch {
            return inc.split('\n').filter(Boolean);
        }
    }
    return [];
};
</script>

<template>
    <SeoHead :seo="seo" />

    <div class="bg-slate-50 min-h-screen py-10 lg:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-100 text-amber-800 text-xs font-bold uppercase tracking-wider mb-3">
                    Industrial Service Level Agreements (SLAs)
                </span>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-navy-950 tracking-tight">
                    Guaranteed Plant Uptime &amp; Facility Integrity
                </h1>
                <p class="mt-4 text-slate-600 text-sm sm:text-base leading-relaxed">
                    Unscheduled equipment breakdowns delay operations and cost millions in lost productivity. KUIT LIMITED delivers structured Service Level Agreements (SLAs) with scheduled preventive mechanical servicing, wellhead safety calibration, and rapid emergency technical dispatch across Nigeria.
                </p>
            </div>

            <!-- Pricing Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 items-stretch">
                <div
                    v-for="(plan, idx) in plans"
                    :key="plan.id"
                    :class="[
                        'rounded-3xl p-6 sm:p-8 flex flex-col justify-between transition-all duration-300 relative',
                        plan.is_featured
                            ? 'bg-gradient-to-b from-navy-950 to-navy-900 text-white shadow-xl ring-2 ring-amber-500 scale-100'
                            : 'bg-white text-slate-900 border border-slate-200 shadow-sm hover:shadow-md'
                    ]"
                >
                    <!-- Featured Badge -->
                    <div 
                        v-if="plan.is_featured"
                        class="absolute -top-3.5 left-1/2 -translate-x-1/2 px-4 py-1 rounded-full bg-amber-500 text-white text-[11px] font-black uppercase tracking-wider shadow-sm"
                    >
                        Recommended SLA
                    </div>

                    <div>
                        <!-- Plan Header -->
                        <div class="mb-6">
                            <span class="text-[11px] font-bold uppercase tracking-wider px-2.5 py-0.5 rounded-full" :class="plan.is_featured ? 'bg-amber-500/20 text-amber-300 border border-amber-400/30' : 'bg-slate-100 text-slate-700'">
                                {{ plan.billing_period || plan.interval }}
                            </span>
                            <h2 :class="['text-lg font-black mt-3', plan.is_featured ? 'text-white' : 'text-navy-950']">
                                {{ plan.name }}
                            </h2>
                            <p :class="['text-xs mt-2 leading-relaxed', plan.is_featured ? 'text-slate-300' : 'text-slate-500']">
                                {{ plan.description || plan.summary }}
                            </p>
                        </div>

                        <!-- Price -->
                        <div class="mb-6 pb-6 border-b" :class="plan.is_featured ? 'border-slate-800' : 'border-slate-100'">
                            <div class="flex items-baseline gap-1">
                                <span class="text-2xl sm:text-3xl font-black" :class="plan.is_featured ? 'text-amber-400' : 'text-navy-950'">
                                    {{ formatNaira(plan.price) }}
                                </span>
                                <span :class="['text-xs font-semibold uppercase tracking-wider', plan.is_featured ? 'text-slate-400' : 'text-slate-500']">
                                    / {{ plan.billing_period || plan.interval }}
                                </span>
                            </div>
                            <div class="text-[11px] font-bold mt-1" :class="plan.is_featured ? 'text-amber-300' : 'text-amber-700'">
                                ✓ {{ plan.visits_per_year }} Certified Field Visits / Year
                            </div>
                        </div>

                        <!-- Inclusions -->
                        <div class="space-y-3 mb-8">
                            <div class="text-xs font-bold uppercase tracking-wider" :class="plan.is_featured ? 'text-slate-300' : 'text-slate-400'">
                                Included in this SLA:
                            </div>
                            <ul class="space-y-2.5 text-xs">
                                <li
                                    v-for="(item, i) in parseInclusions(plan.inclusions)"
                                    :key="i"
                                    class="flex items-start gap-2.5"
                                >
                                    <font-awesome-icon
                                        icon="circle-check"
                                        :class="['mt-0.5 text-sm flex-shrink-0', plan.is_featured ? 'text-amber-400' : 'text-emerald-500']"
                                    />
                                    <span :class="plan.is_featured ? 'text-slate-200' : 'text-slate-700'">
                                        {{ item }}
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- CTA -->
                    <div class="pt-4 border-t" :class="plan.is_featured ? 'border-slate-800' : 'border-slate-100'">
                        <a
                            :href="`https://wa.me/${companyWhatsApp.replace(/[^0-9]/g, '')}?text=Hello%20KUIT%20Operations,%20we%20are%20interested%20in%20an%20SLA%20contract%20for%20${encodeURIComponent(plan.name)}.`"
                            target="_blank"
                            :class="[
                                'w-full py-3 px-4 rounded-xl font-extrabold text-xs tracking-wider uppercase transition text-center flex items-center justify-center gap-2 shadow-sm',
                                plan.is_featured
                                    ? 'bg-amber-500 hover:bg-amber-400 text-white'
                                    : 'bg-navy-900 hover:bg-navy-800 text-white'
                            ]"
                        >
                            <font-awesome-icon :icon="['fab', 'whatsapp']" />
                            <span>Request SLA via WhatsApp</span>
                        </a>

                        <div class="text-center mt-2.5">
                            <Link
                                :href="route('contact')"
                                :class="['text-[11px] font-semibold underline', plan.is_featured ? 'text-slate-400 hover:text-white' : 'text-slate-500 hover:text-navy-900']"
                            >
                                Or request a custom corporate tender
                            </Link>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Value Props -->
            <div class="mt-16 bg-white rounded-3xl p-8 sm:p-12 border border-slate-200 shadow-sm">
                <div class="text-center max-w-2xl mx-auto mb-10">
                    <h3 class="text-xl sm:text-2xl font-bold text-navy-950">Why Partner with KUIT for Maintenance SLAs?</h3>
                    <p class="text-xs sm:text-sm text-slate-500 mt-2">
                        Proactive preventive maintenance pays for itself by preventing catastrophic plant failure, safety penalties, and project downtime.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="p-4">
                        <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center font-bold text-lg mb-3">
                            <font-awesome-icon icon="wrench" />
                        </div>
                        <h4 class="font-bold text-navy-950 text-sm">Zero Unplanned Downtime</h4>
                        <p class="text-xs text-slate-600 mt-1 leading-relaxed">
                            Scheduled oil/fuel filter replacements, hydraulic pressure diagnostics, and pin wear monitoring keep earthmoving and marine plant operating at peak efficiency.
                        </p>
                    </div>

                    <div class="p-4">
                        <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center font-bold text-lg mb-3">
                            <font-awesome-icon icon="shield-halved" />
                        </div>
                        <h4 class="font-bold text-navy-950 text-sm">Certified Technical Inspections</h4>
                        <p class="text-xs text-slate-600 mt-1 leading-relaxed">
                            Comprehensive Robertshaw wellhead safety panel servicing, valve recertification, and instrument calibration conforming to strict Nigerian industry safety regulations.
                        </p>
                    </div>

                    <div class="p-4">
                        <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold text-lg mb-3">
                            <font-awesome-icon icon="truck" />
                        </div>
                        <h4 class="font-bold text-navy-950 text-sm">Rapid Priority Mobile Dispatch</h4>
                        <p class="text-xs text-slate-600 mt-1 leading-relaxed">
                            Dedicated heavy mechanics and engineering specialists dispatched on-site across Delta State, Rivers State, and nationwide project locations within hours of request.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
