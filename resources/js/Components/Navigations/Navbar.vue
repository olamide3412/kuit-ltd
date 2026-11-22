<script setup>
import { ref, computed, watch, onMounted, onUnmounted } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';
import { company, servicePillars } from '@/lib/kuitContent';

const page = usePage();

const isOpen = ref(false);
const toggle = () => (isOpen.value = !isOpen.value);
const closeMenu = () => {
    isOpen.value = false;
    mobileServicesOpen.value = false;
};

watch(isOpen, (open) => {
    if (typeof document !== 'undefined') {
        document.body.style.overflow = open ? 'hidden' : '';
    }
});

const servicesOpen = ref(false);
const mobileServicesOpen = ref(false);
const servicesRef = ref(null);

const isSticky = ref(false);
const handleScroll = () => {
    isSticky.value = window.scrollY > 20;
};

const handleClickOutside = (e) => {
    if (servicesRef.value && !servicesRef.value.contains(e.target)) {
        servicesOpen.value = false;
    }
};

onMounted(() => {
    document.addEventListener('click', handleClickOutside);
    window.addEventListener('scroll', handleScroll, { passive: true });
});

onUnmounted(() => {
    document.removeEventListener('click', handleClickOutside);
    window.removeEventListener('scroll', handleScroll);
    if (typeof document !== 'undefined') {
        document.body.style.overflow = '';
    }
});

const site = computed(() => ({
    name: page.props.site?.name || company.name,
    rc_number: page.props.site?.rc_number || company.rcNumber,
    logo_url: page.props.site?.logo_url || '/images/logo.svg',
    phone: page.props.site?.phone || company.primaryPhone,
    secondary_phone: page.props.site?.secondary_phone || company.secondaryPhone,
    email: page.props.site?.email || company.email,
    address: page.props.site?.address || company.address,
    enable_profile_download: page.props.site?.enable_profile_download,
    company_profile_url: page.props.site?.company_profile_url || '/docs/kuit-limited-company-profile.pdf',
}));

const authUser = computed(() => page.props.auth?.user);

const navServices = servicePillars.map(p => ({
    title: p.name,
    slug: p.slug,
    desc: p.summary,
    icon: p.icon,
}));
</script>

<template>
    <header class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
        <!-- Top Contact Bar (Desktop) -->
        <div class="hidden lg:block bg-[#020B4F] text-slate-200 text-xs py-2 px-4 sm:px-6 lg:px-8 border-b border-navy-800">
            <div class="max-w-[1440px] mx-auto flex items-center justify-between">
                <!-- Left: Official Corporate Facts & Contact -->
                <div class="flex items-center space-x-5 whitespace-nowrap text-[12px]">
                    <span class="inline-flex items-center space-x-1.5 text-amber-400 font-bold tracking-wider">
                        <font-awesome-icon :icon="['fas', 'shield-halved']" class="text-[11px]" />
                        <span>{{ site.rc_number }}</span>
                    </span>

                    <span class="text-slate-600">|</span>

                    <a :href="`tel:${site.phone}`" class="inline-flex items-center space-x-1.5 hover:text-amber-400 transition-colors">
                        <font-awesome-icon :icon="['fas', 'phone']" class="text-amber-400 text-[11px]" />
                        <span class="font-medium tracking-wide">{{ site.phone }}</span>
                    </a>

                    <a :href="`tel:${site.secondary_phone}`" class="inline-flex items-center space-x-1.5 hover:text-amber-400 transition-colors hidden xl:inline-flex">
                        <span class="font-medium tracking-wide">{{ site.secondary_phone }}</span>
                    </a>

                    <span class="text-slate-600">|</span>

                    <a :href="`mailto:${site.email}`" class="inline-flex items-center space-x-1.5 hover:text-amber-400 transition-colors">
                        <font-awesome-icon :icon="['fas', 'envelope']" class="text-amber-400 text-[11px]" />
                        <span>{{ site.email }}</span>
                    </a>
                </div>

                <!-- Right: Location & Portal Navigation -->
                <div class="flex items-center space-x-4 text-slate-300 whitespace-nowrap text-[11px]">
                    <span class="inline-flex items-center space-x-1.5">
                        <font-awesome-icon :icon="['fas', 'location-dot']" class="text-amber-400 text-[11px]" />
                        <span>{{ site.address }}</span>
                    </span>

                    <span class="text-slate-600">|</span>

                    <Link 
                        v-if="authUser"
                        :href="route('dashboard')"
                        class="text-amber-400 hover:text-amber-300 transition-colors font-bold flex items-center space-x-1"
                    >
                        <font-awesome-icon :icon="['fas', 'gauge-high']" class="text-[10px]" />
                        <span>Staff Portal</span>
                    </Link>
                    <Link 
                        v-else
                        :href="route('login')"
                        class="hover:text-amber-400 transition-colors font-medium flex items-center space-x-1"
                    >
                        <font-awesome-icon :icon="['fas', 'lock']" class="text-[10px] text-slate-400" />
                        <span>Staff Login</span>
                    </Link>
                </div>
            </div>
        </div>

        <!-- Main Navigation Bar -->
        <nav 
            :class="[
                'w-full transition-all duration-300 bg-white/95 backdrop-blur-md border-b',
                isSticky ? 'shadow-md py-2.5 border-slate-200' : 'py-3.5 border-slate-100'
            ]"
        >
            <div class="max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between gap-4">
                <!-- Brand Logo & Entity Title -->
                <Link href="/" class="flex items-center space-x-3 group shrink-0">
                    <img 
                        :src="site.logo_url" 
                        alt="KUIT LIMITED Logo" 
                        class="w-11 h-11 object-contain rounded-xl shadow-sm group-hover:scale-105 transition-transform duration-300 shrink-0"
                    />
                    <div class="leading-tight">
                        <div class="flex items-baseline space-x-1.5">
                            <span class="text-xl sm:text-2xl font-black tracking-tight text-[#020B4F]">
                                KUIT
                            </span>
                            <span class="text-sm sm:text-base font-extrabold tracking-widest text-[#F5A800]">
                                LIMITED
                            </span>
                        </div>
                        <p class="text-[9px] text-slate-500 tracking-wider font-semibold uppercase">
                            Marine • Construction • Engineering • IT
                        </p>
                    </div>
                </Link>

                <!-- Desktop Navigation Menu -->
                <div class="hidden lg:flex items-center space-x-1 xl:space-x-2 text-sm font-semibold text-slate-700">
                    <Link 
                        href="/" 
                        class="px-3 py-2 rounded-xl hover:text-[#020B4F] hover:bg-slate-100 transition-colors whitespace-nowrap"
                    >
                        Home
                    </Link>

                    <Link 
                        href="/about" 
                        class="px-3 py-2 rounded-xl hover:text-[#020B4F] hover:bg-slate-100 transition-colors whitespace-nowrap"
                    >
                        About Us
                    </Link>

                    <!-- Services Dropdown (5 Core Pillars) -->
                    <div 
                        ref="servicesRef" 
                        class="relative"
                        @mouseenter="servicesOpen = true"
                        @mouseleave="servicesOpen = false"
                    >
                        <button 
                            @click="servicesOpen = !servicesOpen"
                            class="flex items-center space-x-1 px-3 py-2 rounded-xl hover:text-[#020B4F] hover:bg-slate-100 transition-colors whitespace-nowrap"
                            :class="{ 'text-[#020B4F] bg-slate-100': servicesOpen }"
                            aria-haspopup="true"
                            :aria-expanded="servicesOpen"
                        >
                            <span>Services</span>
                            <font-awesome-icon :icon="['fas', 'chevron-down']" class="text-[10px] transition-transform duration-200" :class="{ 'rotate-180': servicesOpen }" />
                        </button>

                        <div 
                            v-show="servicesOpen"
                            class="absolute left-0 top-full pt-2 w-88 z-50"
                        >
                            <div class="bg-white rounded-2xl shadow-xl border border-slate-100 p-2.5 animate-in fade-in slide-in-from-top-1 duration-150">
                                <div class="px-3 py-1.5 border-b border-slate-100 mb-1.5 flex items-center justify-between">
                                    <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Core Service Sectors</span>
                                    <Link href="/services" @click="servicesOpen = false" class="text-[11px] font-semibold text-[#0A2FA8] hover:underline">
                                        View All &rarr;
                                    </Link>
                                </div>

                                <Link 
                                    v-for="service in navServices" 
                                    :key="service.slug"
                                    :href="`/services#${service.slug}`"
                                    @click="servicesOpen = false"
                                    class="flex items-start p-2.5 rounded-xl hover:bg-slate-50 transition-colors group"
                                >
                                    <div class="mt-0.5 mr-3 w-8 h-8 rounded-lg bg-navy-50 text-[#020B4F] flex items-center justify-center shrink-0 group-hover:bg-[#020B4F] group-hover:text-amber-400 transition-colors">
                                        <font-awesome-icon :icon="['fas', service.icon]" class="text-xs" />
                                    </div>
                                    <div>
                                        <div class="font-bold text-slate-900 group-hover:text-[#020B4F] text-xs transition-colors">
                                            {{ service.title }}
                                        </div>
                                        <div class="text-[11px] text-slate-500 line-clamp-1 mt-0.5">
                                            {{ service.desc }}
                                        </div>
                                    </div>
                                </Link>
                            </div>
                        </div>
                    </div>

                    <Link 
                        href="/equipment" 
                        class="px-3 py-2 rounded-xl hover:text-[#020B4F] hover:bg-slate-100 transition-colors whitespace-nowrap"
                    >
                        Equipment & Fleet
                    </Link>

                    <Link 
                        href="/projects" 
                        class="px-3 py-2 rounded-xl hover:text-[#020B4F] hover:bg-slate-100 transition-colors whitespace-nowrap"
                    >
                        Projects Gallery
                    </Link>

                    <Link 
                        href="/blog" 
                        class="px-3 py-2 rounded-xl hover:text-[#020B4F] hover:bg-slate-100 transition-colors whitespace-nowrap"
                    >
                        Blog
                    </Link>

                    <Link 
                        href="/contact" 
                        class="px-3 py-2 rounded-xl hover:text-[#020B4F] hover:bg-slate-100 transition-colors whitespace-nowrap"
                    >
                        Contact
                    </Link>
                </div>

                <!-- Right Action: Download Profile & Request a Quote (Gold CTA Button) -->
                <div class="hidden sm:flex items-center space-x-2 xl:space-x-3">
                    <a 
                        v-if="site.enable_profile_download"
                        :href="site.company_profile_url"
                        download="KUIT-LIMITED-Company-Profile.pdf"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="inline-flex items-center gap-1.5 px-3 py-2 rounded-xl text-xs font-bold text-[#020B4F] bg-slate-100 hover:bg-slate-200 border border-slate-200 transition-colors shadow-sm"
                        title="Download KUIT LIMITED Official Profile (PDF)"
                    >
                        <font-awesome-icon :icon="['fas', 'file-arrow-down']" class="text-amber-500 text-xs" />
                        <span class="hidden xl:inline">Profile PDF</span>
                        <span class="xl:hidden">PDF</span>
                    </a>

                    <Link 
                        href="/contact"
                        class="btn-gold flex items-center space-x-2 text-xs uppercase tracking-wider"
                    >
                        <font-awesome-icon :icon="['fas', 'file-signature']" />
                        <span>Request a Quote</span>
                    </Link>
                </div>

                <!-- Mobile Hamburger Button -->
                <button 
                    @click="toggle"
                    class="lg:hidden p-2 rounded-xl text-slate-700 hover:text-slate-900 hover:bg-slate-100 focus:outline-none"
                    aria-label="Toggle navigation menu"
                >
                    <font-awesome-icon :icon="['fas', isOpen ? 'xmark' : 'bars']" class="text-xl" />
                </button>
            </div>
        </nav>

        <!-- Mobile Drawer Overlay -->
        <transition 
            enter-active-class="transition-opacity duration-300 ease-out" 
            enter-from-class="opacity-0" 
            enter-to-class="opacity-100" 
            leave-active-class="transition-opacity duration-200 ease-in" 
            leave-from-class="opacity-100" 
            leave-to-class="opacity-0"
        >
            <div 
                v-if="isOpen" 
                class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-40 lg:hidden"
                @click="closeMenu"
            />
        </transition>

        <!-- Mobile Slide-out Menu -->
        <transition 
            enter-active-class="transition-transform duration-300 ease-out" 
            enter-from-class="translate-x-full" 
            enter-to-class="translate-x-0" 
            leave-active-class="transition-transform duration-200 ease-in" 
            leave-from-class="translate-x-0" 
            leave-to-class="translate-x-full"
        >
            <div 
                v-if="isOpen" 
                class="fixed top-0 right-0 bottom-0 w-80 max-w-[85vw] bg-white z-50 shadow-2xl flex flex-col justify-between overflow-y-auto lg:hidden"
            >
                <div class="p-5">
                    <!-- Drawer Header -->
                    <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                        <div class="flex items-center space-x-2.5">
                            <img :src="site.logo_url" alt="KUIT LIMITED" class="w-9 h-9 object-contain shrink-0" />
                            <div>
                                <span class="text-lg font-black text-[#020B4F]">KUIT <span class="text-[#F5A800]">LIMITED</span></span>
                                <p class="text-[9px] text-slate-500 font-bold uppercase tracking-wider">{{ site.rc_number }}</p>
                            </div>
                        </div>
                        <button 
                            @click="closeMenu" 
                            class="p-2 rounded-xl text-slate-400 hover:text-slate-700 hover:bg-slate-100"
                        >
                            <font-awesome-icon :icon="['fas', 'xmark']" class="text-lg" />
                        </button>
                    </div>

                    <!-- Drawer Nav Links -->
                    <div class="py-4 space-y-1">
                        <Link 
                            href="/" 
                            @click="closeMenu" 
                            class="block px-3 py-2.5 rounded-xl font-bold text-slate-800 hover:bg-slate-50 hover:text-[#020B4F]"
                        >
                            Home
                        </Link>

                        <Link 
                            href="/about" 
                            @click="closeMenu" 
                            class="block px-3 py-2.5 rounded-xl font-bold text-slate-800 hover:bg-slate-50 hover:text-[#020B4F]"
                        >
                            About Us
                        </Link>

                        <!-- Mobile Services Accordion -->
                        <div>
                            <button 
                                @click="mobileServicesOpen = !mobileServicesOpen" 
                                class="w-full flex items-center justify-between px-3 py-2.5 rounded-xl font-bold text-slate-800 hover:bg-slate-50"
                            >
                                <span>Services</span>
                                <font-awesome-icon :icon="['fas', 'chevron-down']" class="text-xs transition-transform" :class="{ 'rotate-180': mobileServicesOpen }" />
                            </button>
                            <div v-show="mobileServicesOpen" class="pl-4 pr-2 py-1 space-y-1 bg-slate-50 rounded-xl mt-1">
                                <Link 
                                    v-for="service in navServices" 
                                    :key="service.slug"
                                    :href="`/services#${service.slug}`"
                                    @click="closeMenu"
                                    class="block py-2 px-3 text-xs font-semibold text-slate-700 hover:text-[#020B4F]"
                                >
                                    {{ service.title }}
                                </Link>
                                <Link 
                                    href="/services" 
                                    @click="closeMenu" 
                                    class="block py-2 px-3 text-xs font-bold text-[#0A2FA8]"
                                >
                                    View All Services &rarr;
                                </Link>
                            </div>
                        </div>

                        <Link 
                            href="/equipment" 
                            @click="closeMenu" 
                            class="block px-3 py-2.5 rounded-xl font-bold text-slate-800 hover:bg-slate-50 hover:text-[#020B4F]"
                        >
                            Equipment & Fleet
                        </Link>

                        <Link 
                            href="/projects" 
                            @click="closeMenu" 
                            class="block px-3 py-2.5 rounded-xl font-bold text-slate-800 hover:bg-slate-50 hover:text-[#020B4F]"
                        >
                            Projects Gallery
                        </Link>

                        <Link 
                            href="/blog" 
                            @click="closeMenu" 
                            class="block px-3 py-2.5 rounded-xl font-bold text-slate-800 hover:bg-slate-50 hover:text-[#020B4F]"
                        >
                            Blog
                        </Link>

                        <Link 
                            href="/contact" 
                            @click="closeMenu" 
                            class="block px-3 py-2.5 rounded-xl font-bold text-slate-800 hover:bg-slate-50 hover:text-[#020B4F]"
                        >
                            Contact
                        </Link>
                    </div>

                    <!-- Direct Call & Quote CTA -->
                    <div class="pt-4 border-t border-slate-100 space-y-2">
                        <Link 
                            href="/contact" 
                            @click="closeMenu"
                            class="btn-gold w-full text-center block text-xs uppercase tracking-wider py-3"
                        >
                            Request a Quote
                        </Link>

                        <a 
                            v-if="site.enable_profile_download"
                            :href="site.company_profile_url"
                            download="KUIT-LIMITED-Company-Profile.pdf"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="w-full py-2.5 px-4 rounded-xl border border-amber-500/40 bg-amber-50 text-[#020B4F] font-bold text-xs flex items-center justify-center space-x-2 hover:bg-amber-100 transition shadow-sm"
                        >
                            <font-awesome-icon :icon="['fas', 'file-arrow-down']" class="text-amber-600" />
                            <span>Download Company Profile (PDF)</span>
                        </a>

                        <a 
                            :href="`tel:${site.phone}`"
                            class="w-full py-2.5 px-4 rounded-xl border border-slate-200 text-slate-800 font-bold text-xs flex items-center justify-center space-x-2 hover:bg-slate-50"
                        >
                            <font-awesome-icon :icon="['fas', 'phone']" class="text-amber-500" />
                            <span>Call {{ site.phone }}</span>
                        </a>
                    </div>
                </div>

                <!-- Drawer Footer (Location & Copyright) -->
                <div class="p-5 bg-slate-50 border-t border-slate-100 text-xs text-slate-500 space-y-1">
                    <p class="font-semibold text-slate-700">{{ site.address }}</p>
                    <p class="text-[11px]">{{ company.copyright }}</p>
                </div>
            </div>
        </transition>
    </header>
</template>
