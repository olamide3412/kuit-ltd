<script setup>
import Layout from '@/Layouts/Layout.vue';
import SeoHead from '@/Components/SeoHead.vue';
import { Link } from '@inertiajs/vue3';
import CallToAction from '@/Components/Home/CallToAction.vue';
import { servicePillars } from '@/lib/kuitContent';

defineOptions({ layout: Layout });

defineProps({
    seo: Object,
});
</script>

<template>
    <SeoHead :seo="seo" />

    <div class="bg-slate-50 min-h-screen font-sans">
        <!-- Page Hero Header -->
        <div class="bg-gradient-to-b from-[#020B4F] via-[#06125E] to-[#020B4F] text-white py-16 sm:py-24 border-b border-navy-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center sm:text-left">
                <nav class="flex items-center space-x-2 text-xs text-slate-300 mb-4 justify-center sm:justify-start">
                    <Link href="/" class="hover:text-amber-400 transition">Home</Link>
                    <span>/</span>
                    <span class="text-[#F5A800] font-bold">Services</span>
                </nav>
                <span class="inline-block px-3 py-1 rounded-full bg-white/10 text-[#F5A800] text-xs font-bold uppercase tracking-wider mb-3 border border-white/20">
                    Operational Scope
                </span>
                <h1 class="text-3xl sm:text-5xl font-black tracking-tight text-white">
                    Our Services &amp; Capabilities
                </h1>
                <p class="mt-4 text-slate-200 text-base max-w-3xl leading-relaxed">
                    KUIT LIMITED provides leasing, construction, engineering, marine, oil &amp; gas and IT services, delivered by qualified personnel and project partners in line with project requirements.
                </p>

                <!-- Quick Navigation Pills -->
                <div class="mt-8 flex flex-wrap gap-2.5 justify-center sm:justify-start">
                    <a 
                        v-for="pillar in servicePillars" 
                        :key="pillar.slug"
                        :href="`#${pillar.slug}`"
                        class="px-3.5 py-1.5 rounded-full bg-white/10 hover:bg-[#F5A800] hover:text-[#020B4F] text-xs font-bold transition text-slate-200"
                    >
                        {{ pillar.name }}
                    </a>
                </div>
            </div>
        </div>

        <!-- 5 Detailed Service Sections -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-16">
            <!-- 1. Marine Services -->
            <section id="marine" class="bg-white rounded-3xl p-8 sm:p-12 border border-slate-200 shadow-sm scroll-mt-24">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 rounded-2xl bg-navy-50 text-[#020B4F] flex items-center justify-center text-xl font-bold">
                        <font-awesome-icon :icon="['fas', 'ship']" />
                    </div>
                    <div>
                        <span class="text-xs font-bold text-amber-600 uppercase tracking-widest">Section 1</span>
                        <h2 class="text-2xl sm:text-3xl font-black text-slate-900">Marine Services</h2>
                    </div>
                </div>

                <p class="text-slate-600 text-base leading-relaxed mb-8 max-w-4xl">
                    KUIT LIMITED provides dependable marine vessel operations and charter services to support energy exploration, offshore logistics, and waterway cargo movement across Nigeria.
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="p-5 rounded-2xl bg-[#F4F6FA] border border-slate-200">
                        <div class="font-bold text-slate-900 text-sm mb-1">Tanker Vessels</div>
                        <p class="text-xs text-slate-500">Coastal and regional clean petroleum product transport and bunkering.</p>
                    </div>
                    <div class="p-5 rounded-2xl bg-[#F4F6FA] border border-slate-200">
                        <div class="font-bold text-slate-900 text-sm mb-1">Supply Vessels</div>
                        <p class="text-xs text-slate-500">Offshore supply operations, deck cargo, fuel, and fresh water logistics.</p>
                    </div>
                    <div class="p-5 rounded-2xl bg-[#F4F6FA] border border-slate-200">
                        <div class="font-bold text-slate-900 text-sm mb-1">Sea-Going Tug Boats</div>
                        <p class="text-xs text-slate-500">Ocean towing, anchor handling, rig positioning, and barge escort.</p>
                    </div>
                    <div class="p-5 rounded-2xl bg-[#F4F6FA] border border-slate-200">
                        <div class="font-bold text-slate-900 text-sm mb-1">Passenger Crew Boats</div>
                        <p class="text-xs text-slate-500">Fast, secure personnel shift transfers between offshore bases and platforms.</p>
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-slate-100 flex flex-wrap items-center justify-between gap-4">
                    <span class="text-xs text-slate-500 font-medium">Available on spot or time charter agreements</span>
                    <Link href="/contact?service=Marine" class="btn-gold text-xs uppercase tracking-wider py-2.5 px-6">
                        Enquire About Marine Charter
                    </Link>
                </div>
            </section>

            <!-- 2. Construction & Equipment Leasing -->
            <section id="construction-equipment-leasing" class="bg-white rounded-3xl p-8 sm:p-12 border border-slate-200 shadow-sm scroll-mt-24">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 rounded-2xl bg-navy-50 text-[#020B4F] flex items-center justify-center text-xl font-bold">
                        <font-awesome-icon :icon="['fas', 'truck-monster']" />
                    </div>
                    <div>
                        <span class="text-xs font-bold text-amber-600 uppercase tracking-widest">Section 2</span>
                        <h2 class="text-2xl sm:text-3xl font-black text-slate-900">Construction &amp; Equipment Leasing</h2>
                    </div>
                </div>

                <p class="text-slate-600 text-base leading-relaxed mb-6 max-w-4xl">
                    We maintain an extensive, heavy-duty earthmoving and construction machinery fleet available on dry or wet lease with experienced operators, backed by field maintenance crews.
                </p>

                <!-- Equipment List -->
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 mb-8">
                    <div v-for="equip in servicePillars[1].items" :key="equip" class="p-3.5 rounded-xl bg-[#F4F6FA] border border-slate-200 text-xs font-bold text-slate-800 flex items-center gap-2">
                        <font-awesome-icon :icon="['fas', 'check']" class="text-amber-500 text-xs shrink-0" />
                        <span>{{ equip }}</span>
                    </div>
                </div>

                <div class="p-6 rounded-2xl bg-navy-50 border border-navy-100 mb-8">
                    <h3 class="font-bold text-[#020B4F] text-sm mb-2">Civil Works &amp; Infrastructure Projects</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Beyond plant hire, KUIT LIMITED undertakes turnkey civil contracts: road and bridge construction projects, building demolition and site clearance, drainage channel excavation, earthworks and sand filling.
                    </p>
                </div>

                <div class="pt-4 flex flex-wrap items-center justify-between gap-4">
                    <Link href="/equipment" class="text-xs font-bold text-[#0A2FA8] hover:underline flex items-center gap-1.5">
                        <span>View complete equipment specifications</span>
                        <font-awesome-icon :icon="['fas', 'arrow-right']" class="text-[10px]" />
                    </Link>

                    <Link href="/contact?service=Equipment%20Leasing" class="btn-gold text-xs uppercase tracking-wider py-2.5 px-6">
                        Request Machinery Lease Rates
                    </Link>
                </div>
            </section>

            <!-- 3. Engineering Services -->
            <section id="engineering" class="bg-white rounded-3xl p-8 sm:p-12 border border-slate-200 shadow-sm scroll-mt-24">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 rounded-2xl bg-navy-50 text-[#020B4F] flex items-center justify-center text-xl font-bold">
                        <font-awesome-icon :icon="['fas', 'cogs']" />
                    </div>
                    <div>
                        <span class="text-xs font-bold text-amber-600 uppercase tracking-widest">Section 3</span>
                        <h2 class="text-2xl sm:text-3xl font-black text-slate-900">Engineering Services</h2>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 my-6">
                    <div class="p-6 rounded-2xl bg-[#F4F6FA] border border-slate-200 space-y-3">
                        <h3 class="text-base font-bold text-[#020B4F]">Planning, Design &amp; Engineering</h3>
                        <ul class="space-y-2 text-xs text-slate-600">
                            <li class="flex items-start gap-2">
                                <font-awesome-icon :icon="['fas', 'angle-right']" class="text-amber-500 mt-0.5" />
                                <span>Infrastructure planning and civil design modeling</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <font-awesome-icon :icon="['fas', 'angle-right']" class="text-amber-500 mt-0.5" />
                                <span>Project planning and structural engineering schedules</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <font-awesome-icon :icon="['fas', 'angle-right']" class="text-amber-500 mt-0.5" />
                                <span>Materials procurement, verification and site delivery</span>
                            </li>
                        </ul>
                    </div>

                    <div class="p-6 rounded-2xl bg-[#F4F6FA] border border-slate-200 space-y-3">
                        <h3 class="text-base font-bold text-[#020B4F]">Electrical &amp; Mechanical Engineering</h3>
                        <ul class="space-y-2 text-xs text-slate-600">
                            <li class="flex items-start gap-2">
                                <font-awesome-icon :icon="['fas', 'angle-right']" class="text-amber-500 mt-0.5" />
                                <span>Electrical works and erection of heavy support structures</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <font-awesome-icon :icon="['fas', 'angle-right']" class="text-amber-500 mt-0.5" />
                                <span>Mechanical instrumentation and equipment transportation</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <font-awesome-icon :icon="['fas', 'angle-right']" class="text-amber-500 mt-0.5" />
                                <span>Industrial material procurement and quality testing</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-100 flex items-center justify-end">
                    <Link href="/contact?service=Engineering" class="btn-gold text-xs uppercase tracking-wider py-2.5 px-6">
                        Consult Our Engineers
                    </Link>
                </div>
            </section>

            <!-- 4. Oil & Gas Services -->
            <section id="oil-and-gas" class="bg-white rounded-3xl p-8 sm:p-12 border border-slate-200 shadow-sm scroll-mt-24">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 rounded-2xl bg-navy-50 text-[#020B4F] flex items-center justify-center text-xl font-bold">
                        <font-awesome-icon :icon="['fas', 'oil-well']" />
                    </div>
                    <div>
                        <span class="text-xs font-bold text-amber-600 uppercase tracking-widest">Section 4</span>
                        <h2 class="text-2xl sm:text-3xl font-black text-slate-900">Oil &amp; Gas Services</h2>
                    </div>
                </div>

                <p class="text-slate-600 text-base leading-relaxed mb-8 max-w-4xl">
                    Specialised technical, field and supply support for energy-sector projects across upstream, midstream, and field production operations.
                </p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <!-- E&I -->
                    <div class="p-6 rounded-2xl bg-[#F4F6FA] border border-slate-200">
                        <h3 class="font-bold text-slate-900 text-sm mb-2">Electrical &amp; Instrumentation (E&amp;I)</h3>
                        <ul class="space-y-1.5 text-xs text-slate-600">
                            <li>• Robertshaw control panel maintenance and servicing</li>
                            <li>• Instrumentation inspection, calibration and troubleshooting</li>
                            <li>• Control systems, electrical panels and field-device maintenance</li>
                        </ul>
                    </div>

                    <!-- Well Services -->
                    <div class="p-6 rounded-2xl bg-[#F4F6FA] border border-slate-200">
                        <h3 class="font-bold text-slate-900 text-sm mb-2">Well Services</h3>
                        <ul class="space-y-1.5 text-xs text-slate-600">
                            <li>• Well clean-up and post-intervention support</li>
                            <li>• Well stimulation and related field support services</li>
                            <li>• Flowback support, testing and production optimisation assistance</li>
                        </ul>
                    </div>

                    <!-- Chemical Supply -->
                    <div class="p-6 rounded-2xl bg-[#F4F6FA] border border-slate-200">
                        <h3 class="font-bold text-slate-900 text-sm mb-2">Oilfield Chemical Supply</h3>
                        <ul class="space-y-1.5 text-xs text-slate-600">
                            <li>• Procurement and supply of oilfield and production chemicals</li>
                            <li>• Drilling, completion, treatment and maintenance chemicals</li>
                            <li>• Chemical logistics and project-specific material sourcing</li>
                        </ul>
                    </div>

                    <!-- Pipeline & Flowline -->
                    <div class="p-6 rounded-2xl bg-[#F4F6FA] border border-slate-200">
                        <h3 class="font-bold text-slate-900 text-sm mb-2">Pipeline &amp; Flowline Construction</h3>
                        <ul class="space-y-1.5 text-xs text-slate-600">
                            <li>• Onshore and offshore pipeline/flowline installation support</li>
                            <li>• Pipe fabrication, welding, laying and associated civil works</li>
                            <li>• Pipeline repairs, maintenance and testing support</li>
                        </ul>
                    </div>
                </div>

                <!-- Mandatory Regulatory Footnote -->
                <div class="p-4 rounded-xl bg-amber-50/60 border border-amber-200/60 text-xs text-amber-900 leading-relaxed mb-6">
                    <strong class="font-bold">Notice:</strong> Services are delivered in accordance with applicable project requirements and through appropriately qualified personnel and project partners where required.
                </div>

                <div class="pt-4 border-t border-slate-100 flex items-center justify-end">
                    <Link href="/contact?service=Oil%20and%20Gas" class="btn-gold text-xs uppercase tracking-wider py-2.5 px-6">
                        Discuss Oilfield Support
                    </Link>
                </div>
            </section>

            <!-- 5. IT Services -->
            <section id="it-services" class="bg-white rounded-3xl p-8 sm:p-12 border border-slate-200 shadow-sm scroll-mt-24">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 rounded-2xl bg-navy-50 text-[#020B4F] flex items-center justify-center text-xl font-bold">
                        <font-awesome-icon :icon="['fas', 'laptop-code']" />
                    </div>
                    <div>
                        <span class="text-xs font-bold text-amber-600 uppercase tracking-widest">Section 5 • Modern Technology</span>
                        <h2 class="text-2xl sm:text-3xl font-black text-slate-900">IT Services &amp; Cloud Solutions</h2>
                    </div>
                </div>

                <p class="text-slate-600 text-base leading-relaxed mb-8 max-w-4xl">
                    Technology solutions that keep your business moving. Delivering practical digital transformation, cloud resilience, and bespoke application development for modern enterprises.
                </p>

                <!-- Confirmed Services -->
                <div class="mb-8">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-4">Confirmed Core Services</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="p-6 rounded-2xl bg-navy-50 border border-navy-100">
                            <h4 class="font-bold text-[#020B4F] text-base mb-1.5">Cloud Solutions</h4>
                            <p class="text-xs text-slate-600 leading-relaxed">
                                Cloud setup and migration, enterprise cloud hosting, secure object storage and automated disaster-recovery backup architectures.
                            </p>
                        </div>
                        <div class="p-6 rounded-2xl bg-navy-50 border border-navy-100">
                            <h4 class="font-bold text-[#020B4F] text-base mb-1.5">Application Development</h4>
                            <p class="text-xs text-slate-600 leading-relaxed">
                                Custom web and mobile application development built for speed, offline tolerance, and modern Nigerian business operational workflows.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- 4-Step How We Work in IT -->
                <div class="mb-8 p-6 rounded-2xl bg-[#F4F6FA] border border-slate-200">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-4">How We Work</h3>
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 text-xs">
                        <div>
                            <span class="font-black text-[#F5A800] text-lg block mb-1">01. Discover</span>
                            <p class="text-slate-600">Understanding operational challenges and technical targets.</p>
                        </div>
                        <div>
                            <span class="font-black text-[#F5A800] text-lg block mb-1">02. Design</span>
                            <p class="text-slate-600">Clean architecture blueprint, UI design and data schemas.</p>
                        </div>
                        <div>
                            <span class="font-black text-[#F5A800] text-lg block mb-1">03. Build</span>
                            <p class="text-slate-600">Agile coding, automated testing and secure deployment.</p>
                        </div>
                        <div>
                            <span class="font-black text-[#F5A800] text-lg block mb-1">04. Support</span>
                            <p class="text-slate-600">Active monitoring, security updates and feature growth.</p>
                        </div>
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-100 flex items-center justify-end">
                    <Link href="/contact?service=IT%20Services" class="btn-gold text-xs uppercase tracking-wider py-2.5 px-6">
                        Discuss Your IT Project
                    </Link>
                </div>
            </section>
        </div>

        <CallToAction />
    </div>
</template>
