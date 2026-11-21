<script setup>
import { onMounted } from 'vue';
import Layout from '@/Layouts/Layout.vue';
import SeoHead from '@/Components/SeoHead.vue';
import { useForm, usePage, Link } from '@inertiajs/vue3';
import { company } from '@/lib/kuitContent';

defineOptions({ layout: Layout });

defineProps({
    seo: {
        type: Object,
        default: () => ({}),
    },
});

const page = usePage();

const form = useForm({
    name: '',
    company: '',
    phone: '',
    email: '',
    service_interest: 'Equipment Leasing',
    subject: '',
    message: '',
    b_field: '', // Honeypot trap
});

onMounted(() => {
    if (typeof window !== 'undefined') {
        const params = new URLSearchParams(window.location.search);
        const equip = params.get('equipment');
        const srv = params.get('service');
        const proj = params.get('project');

        if (equip) {
            form.service_interest = 'Equipment Leasing';
            form.subject = `Lease Enquiry: ${equip}`;
            form.message = `Hello KUIT LIMITED, I would like to enquire about leasing the ${equip} for an upcoming project.`;
        } else if (srv) {
            form.service_interest = srv;
            form.subject = `Service Enquiry: ${srv}`;
        } else if (proj) {
            form.subject = `Project Enquiry: ${proj}`;
        }
    }
});

const submit = () => {
    form.post(route('contact.submit'), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset('name', 'company', 'phone', 'email', 'subject', 'message');
        },
    });
};
</script>

<template>
    <SeoHead :seo="seo" />

    <div class="bg-slate-50 min-h-screen py-10 lg:py-16 font-sans">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center max-w-3xl mx-auto mb-12">
                <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-navy-100 text-[#020B4F] text-xs font-bold uppercase tracking-wider mb-3">
                    Reach Out
                </span>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900 tracking-tight">
                    Contact KUIT LIMITED
                </h1>
                <p class="mt-4 text-slate-600 text-sm sm:text-base leading-relaxed">
                    Have questions about machinery leasing, vessel charter, pipeline works, engineering consultancy, or technology solutions? Our operations base is ready to assist.
                </p>
            </div>

            <!-- Flash Success Message -->
            <div
                v-if="$page.props.flash?.success"
                class="mb-8 max-w-4xl mx-auto p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm flex items-center gap-3 shadow-sm"
            >
                <font-awesome-icon :icon="['fas', 'circle-check']" class="text-emerald-600 text-xl shrink-0" />
                <span>{{ $page.props.flash.success }}</span>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start max-w-6xl mx-auto">
                <!-- Left: Corporate Contact Info & Warri Location (5 cols) -->
                <div class="lg:col-span-5 space-y-6">
                    <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-sm space-y-6">
                        <div>
                            <span class="text-xs font-bold text-amber-600 uppercase tracking-wider block mb-1">Head Office</span>
                            <h2 class="text-xl font-bold text-slate-900">{{ company.name }}</h2>
                            <p class="text-xs font-bold text-slate-500">{{ company.rcNumber }}</p>
                        </div>

                        <div class="space-y-4 text-sm text-slate-700">
                            <div class="flex items-start space-x-3">
                                <div class="w-9 h-9 rounded-xl bg-navy-50 text-[#020B4F] flex items-center justify-center shrink-0 mt-0.5">
                                    <font-awesome-icon :icon="['fas', 'location-dot']" />
                                </div>
                                <div>
                                    <span class="font-bold text-slate-900 block text-xs uppercase tracking-wider">Address</span>
                                    <p class="text-slate-600 text-xs sm:text-sm mt-0.5">{{ company.address }}</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="w-9 h-9 rounded-xl bg-navy-50 text-[#020B4F] flex items-center justify-center shrink-0 mt-0.5">
                                    <font-awesome-icon :icon="['fas', 'phone']" />
                                </div>
                                <div>
                                    <span class="font-bold text-slate-900 block text-xs uppercase tracking-wider">Telephone</span>
                                    <div class="space-y-1 mt-0.5">
                                        <a :href="`tel:${company.primaryPhone}`" class="block text-slate-700 hover:text-[#0A2FA8] font-semibold text-xs sm:text-sm">
                                            {{ company.primaryPhone }}
                                        </a>
                                        <a :href="`tel:${company.secondaryPhone}`" class="block text-slate-700 hover:text-[#0A2FA8] font-semibold text-xs sm:text-sm">
                                            {{ company.secondaryPhone }}
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="w-9 h-9 rounded-xl bg-navy-50 text-[#020B4F] flex items-center justify-center shrink-0 mt-0.5">
                                    <font-awesome-icon :icon="['fas', 'envelope']" />
                                </div>
                                <div>
                                    <span class="font-bold text-slate-900 block text-xs uppercase tracking-wider">Email</span>
                                    <a :href="`mailto:${company.email}`" class="text-slate-700 hover:text-[#0A2FA8] font-semibold text-xs sm:text-sm block mt-0.5">
                                        {{ company.email }}
                                    </a>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="w-9 h-9 rounded-xl bg-navy-50 text-[#020B4F] flex items-center justify-center shrink-0 mt-0.5">
                                    <font-awesome-icon :icon="['fas', 'clock']" />
                                </div>
                                <div>
                                    <span class="font-bold text-slate-900 block text-xs uppercase tracking-wider">Business Hours</span>
                                    <p class="text-slate-600 text-xs sm:text-sm mt-0.5">Monday – Saturday: 8:00 AM – 5:00 PM</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Map Embed Container (Warri Airport Road) -->
                    <div class="bg-white rounded-3xl p-4 border border-slate-200 shadow-sm overflow-hidden">
                        <div class="text-xs font-bold text-slate-700 mb-2 px-2 flex items-center gap-1.5">
                            <font-awesome-icon :icon="['fas', 'map-location-dot']" class="text-amber-500" />
                            <span>Airport Road, Effurun-Warri Location</span>
                        </div>
                        <div class="aspect-[16/10] w-full rounded-2xl overflow-hidden bg-slate-100">
                            <iframe
                                title="KUIT LIMITED Office Location Map"
                                width="100%"
                                height="100%"
                                style="border:0;"
                                loading="lazy"
                                allowfullscreen
                                referrerpolicy="no-referrer-when-downgrade"
                                src="https://maps.google.com/maps?q=Airport%20Road,%20Effurun-Warri,%20Delta%20State,%20Nigeria&t=&z=14&ie=UTF8&iwloc=&output=embed"
                            ></iframe>
                        </div>
                    </div>
                </div>

                <!-- Right: Enquiry Form (7 cols) -->
                <div class="lg:col-span-7">
                    <div class="bg-white rounded-3xl p-8 sm:p-10 border border-slate-200 shadow-sm">
                        <div class="mb-6 border-b border-slate-100 pb-4">
                            <h2 class="text-2xl font-black text-slate-900">Send Service Enquiry</h2>
                            <p class="text-xs text-slate-500 mt-1">Fill out the form below and our operations desk will respond promptly.</p>
                        </div>

                        <form @submit.prevent="submit" class="space-y-4">
                            <!-- Honeypot anti-spam trap (invisible to real users) -->
                            <input 
                                type="text" 
                                v-model="form.b_field" 
                                class="hidden" 
                                tabindex="-1" 
                                autocomplete="off" 
                            />

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                        Your Full Name <span class="text-red-500">*</span>
                                    </label>
                                    <input
                                        v-model="form.name"
                                        type="text"
                                        required
                                        placeholder="e.g. Engr. Johnson Emeka"
                                        class="w-full text-xs sm:text-sm rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-[#020B4F]"
                                    />
                                    <div v-if="form.errors.name" class="text-red-500 text-xs mt-1">{{ form.errors.name }}</div>
                                </div>

                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                        Company / Organisation
                                    </label>
                                    <input
                                        v-model="form.company"
                                        type="text"
                                        placeholder="e.g. Apex Marine / Energy Ltd"
                                        class="w-full text-xs sm:text-sm rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-[#020B4F]"
                                    />
                                    <div v-if="form.errors.company" class="text-red-500 text-xs mt-1">{{ form.errors.company }}</div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                        Phone Number <span class="text-red-500">*</span>
                                    </label>
                                    <input
                                        v-model="form.phone"
                                        type="tel"
                                        required
                                        placeholder="0803 000 0000"
                                        class="w-full text-xs sm:text-sm rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-[#020B4F]"
                                    />
                                    <div v-if="form.errors.phone" class="text-red-500 text-xs mt-1">{{ form.errors.phone }}</div>
                                </div>

                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                        Email Address <span class="text-red-500">*</span>
                                    </label>
                                    <input
                                        v-model="form.email"
                                        type="email"
                                        required
                                        placeholder="you@company.com"
                                        class="w-full text-xs sm:text-sm rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-[#020B4F]"
                                    />
                                    <div v-if="form.errors.email" class="text-red-500 text-xs mt-1">{{ form.errors.email }}</div>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                        Service of Interest <span class="text-red-500">*</span>
                                    </label>
                                    <select
                                        v-model="form.service_interest"
                                        required
                                        class="w-full text-xs sm:text-sm rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-[#020B4F] bg-white"
                                    >
                                        <option value="Marine">Marine Services</option>
                                        <option value="Equipment Leasing">Construction &amp; Equipment Leasing</option>
                                        <option value="Engineering">Engineering Services</option>
                                        <option value="Oil & Gas">Oil &amp; Gas Services</option>
                                        <option value="IT Services">IT Services &amp; Cloud Solutions</option>
                                        <option value="Other">Other Enquiries</option>
                                    </select>
                                    <div v-if="form.errors.service_interest" class="text-red-500 text-xs mt-1">{{ form.errors.service_interest }}</div>
                                </div>

                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                        Subject
                                    </label>
                                    <input
                                        v-model="form.subject"
                                        type="text"
                                        placeholder="e.g. CAT 330 Excavator 30-Day Lease"
                                        class="w-full text-xs sm:text-sm rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-[#020B4F]"
                                    />
                                    <div v-if="form.errors.subject" class="text-red-500 text-xs mt-1">{{ form.errors.subject }}</div>
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1.5">
                                    Project Requirements / Message <span class="text-red-500">*</span>
                                </label>
                                <textarea
                                    v-model="form.message"
                                    rows="5"
                                    required
                                    placeholder="Describe machinery needed, charter duration, site location, or technical scope..."
                                    class="w-full text-xs sm:text-sm rounded-xl border border-slate-300 px-4 py-3 focus:ring-2 focus:ring-[#020B4F]"
                                ></textarea>
                                <div v-if="form.errors.message" class="text-red-500 text-xs mt-1">{{ form.errors.message }}</div>
                            </div>

                            <button
                                type="submit"
                                :disabled="form.processing"
                                class="btn-gold w-full py-4 text-xs uppercase tracking-wider flex items-center justify-center space-x-2 font-bold cursor-pointer"
                            >
                                <span v-if="form.processing">Submitting Message...</span>
                                <span v-else class="flex items-center space-x-2">
                                    <font-awesome-icon :icon="['fas', 'paper-plane']" />
                                    <span>Send Service Enquiry</span>
                                </span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
