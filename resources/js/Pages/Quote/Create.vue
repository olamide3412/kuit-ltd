<script setup>
import { ref, computed } from 'vue';
import Layout from '@/Layouts/Layout.vue';
import SeoHead from '@/Components/SeoHead.vue';
import { useForm, usePage } from '@inertiajs/vue3';
import { company, servicePillars } from '@/lib/kuitContent';

defineOptions({ layout: Layout });

const props = defineProps({
    services: Array,
    states: Array,
    seo: Object,
});

const page = usePage();

const form = useForm({
    name: '',
    phone: '',
    email: '',
    service_type: 'equipment-leasing',
    property_type: 'industrial',
    state_id: '',
    city: '',
    address: '',
    budget_range: '',
    details: '',
    preferred_contact: 'phone',
});

const submittedQuote = ref(null);

const activeReference = computed(() => {
    return submittedQuote.value?.reference || page.props.flash?.quote_reference || null;
});

const submit = () => {
    form.post(route('quotes.store'), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
        },
    });
};
</script>

<template>
    <SeoHead :seo="seo" />

    <div class="bg-slate-50 min-h-screen py-10 lg:py-16 font-sans">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-10">
                <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-navy-100 text-[#020B4F] text-xs font-bold uppercase tracking-wider mb-3">
                    Formal Quotation
                </span>
                <h1 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight">
                    Request a Service Quotation
                </h1>
                <p class="mt-3 text-slate-600 text-sm max-w-xl mx-auto">
                    Provide your project details, equipment requirements, or marine charter scope for a tailored quotation from KUIT LIMITED.
                </p>
            </div>

            <!-- Confirmation Banner -->
            <div 
                v-if="activeReference" 
                class="mb-8 p-6 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-900 shadow-sm"
            >
                <div class="flex items-center space-x-3 mb-2">
                    <font-awesome-icon :icon="['fas', 'circle-check']" class="text-emerald-600 text-xl" />
                    <h3 class="font-bold text-base">Quotation Request Submitted Successfully!</h3>
                </div>
                <p class="text-xs text-emerald-700 leading-relaxed mb-3">
                    Your reference number is <strong class="font-bold underline">{{ activeReference }}</strong>. Our planning team will review your specifications and contact you promptly.
                </p>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-3xl p-8 sm:p-10 border border-slate-200 shadow-sm">
                <form @submit.prevent="submit" class="space-y-6">
                    <!-- Step 1: Sector / Service of Interest -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-3">
                            1. Select Primary Service Sector <span class="text-red-500">*</span>
                        </label>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
                            <label 
                                v-for="srv in servicePillars" 
                                :key="srv.id"
                                class="p-4 rounded-xl border cursor-pointer transition flex items-center space-x-3"
                                :class="form.service_type === srv.id ? 'border-[#020B4F] bg-navy-50/70 text-[#020B4F]' : 'border-slate-200 hover:border-slate-300 text-slate-700'"
                            >
                                <input type="radio" v-model="form.service_type" :value="srv.id" class="hidden" />
                                <div class="w-8 h-8 rounded-lg bg-white shadow-sm flex items-center justify-center shrink-0">
                                    <font-awesome-icon :icon="['fas', srv.icon]" />
                                </div>
                                <span class="text-xs font-bold leading-tight">{{ srv.name }}</span>
                            </label>
                        </div>
                    </div>

                    <!-- Step 2: Project Classification -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                2. Project Classification <span class="text-red-500">*</span>
                            </label>
                            <select
                                v-model="form.property_type"
                                required
                                class="w-full text-xs sm:text-sm rounded-xl border border-slate-300 px-4 py-3 bg-white focus:ring-2 focus:ring-[#020B4F]"
                            >
                                <option value="oil_gas">Oil &amp; Gas / Energy Facility</option>
                                <option value="civil_infrastructure">Civil &amp; Road Infrastructure</option>
                                <option value="government">Government Ministry / Department</option>
                                <option value="commercial">Commercial Enterprise</option>
                                <option value="marine_offshore">Marine &amp; Offshore Logistics</option>
                                <option value="technology">Corporate IT &amp; Cloud</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                Operational State / Location
                            </label>
                            <select
                                v-model="form.state_id"
                                class="w-full text-xs sm:text-sm rounded-xl border border-slate-300 px-4 py-3 bg-white focus:ring-2 focus:ring-[#020B4F]"
                            >
                                <option value="">Select State</option>
                                <option v-for="st in states" :key="st.id" :value="st.id">
                                    {{ st.name }}
                                </option>
                            </select>
                        </div>
                    </div>

                    <!-- Step 3: Project Requirements -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                            3. Scope / Machinery / Specifications <span class="text-red-500">*</span>
                        </label>
                        <textarea
                            v-model="form.details"
                            rows="4"
                            required
                            placeholder="Specify equipment models (e.g. CAT 330, D8), vessel type, pipeline welding scope, or rental duration..."
                            class="w-full text-xs sm:text-sm rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-[#020B4F]"
                        ></textarea>
                    </div>

                    <!-- Step 4: Contact Information -->
                    <div class="border-t border-slate-100 pt-6 space-y-4">
                        <h3 class="text-xs font-bold text-slate-700 uppercase tracking-wider">
                            4. Your Contact Details
                        </h3>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-slate-600 mb-1">
                                    Full Name <span class="text-red-500">*</span>
                                </label>
                                <input
                                    v-model="form.name"
                                    type="text"
                                    required
                                    placeholder="Your Name"
                                    class="w-full text-xs sm:text-sm rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-[#020B4F]"
                                />
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-slate-600 mb-1">
                                    Phone Number <span class="text-red-500">*</span>
                                </label>
                                <input
                                    v-model="form.phone"
                                    type="tel"
                                    required
                                    placeholder="0803 000 0000"
                                    class="w-full text-xs sm:text-sm rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-[#020B4F]"
                                />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-slate-600 mb-1">
                                    Email Address <span class="text-red-500">*</span>
                                </label>
                                <input
                                    v-model="form.email"
                                    type="email"
                                    required
                                    placeholder="you@company.com"
                                    class="w-full text-xs sm:text-sm rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-[#020B4F]"
                                />
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-slate-600 mb-1">
                                    Preferred Contact Channel
                                </label>
                                <select
                                    v-model="form.preferred_contact"
                                    class="w-full text-xs sm:text-sm rounded-xl border border-slate-300 px-4 py-3 bg-white focus:ring-2 focus:ring-[#020B4F]"
                                >
                                    <option value="phone">Phone Call</option>
                                    <option value="email">Email</option>
                                    <option value="whatsapp">WhatsApp</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="btn-gold w-full py-4 text-xs uppercase tracking-wider font-bold cursor-pointer"
                    >
                        <span v-if="form.processing">Submitting Quotation Request...</span>
                        <span v-else>Submit Quotation Request</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>
