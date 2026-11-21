<script setup>
import { ref, computed, onMounted, onUnmounted } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';
import { company } from '@/lib/kuitContent';

const props = defineProps({
    heroSlides: {
        type: Array,
        default: () => [],
    },
    featuredProduct: Object,
});

const page = usePage();

const defaultSlides = [
    'https://images.unsplash.com/photo-1541888946425-d0fbb186156f?q=80&w=2070&auto=format&fit=crop', // Heavy excavator & construction machinery
    'https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?q=80&w=2069&auto=format&fit=crop', // Marine vessel & offshore operations
    'https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=2070&auto=format&fit=crop', // Civil engineering, roads & bridge infrastructure
    'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?q=80&w=2069&auto=format&fit=crop', // Oil & gas industrial facility & pipelines
];

const slides = computed(() => {
    // 1. Direct prop passed from HomeController
    if (props.heroSlides && Array.isArray(props.heroSlides) && props.heroSlides.length > 0) {
        const mapped = props.heroSlides.map(s => typeof s === 'object' ? s.value : s).filter(Boolean);
        if (mapped.length > 0) return mapped;
    }
    // 2. Page prop / settings fallback
    const customSlides = page.props.heroSlides || page.props.settings?.hero_slides;
    if (customSlides && Array.isArray(customSlides) && customSlides.length > 0) {
        const mapped = customSlides.map(s => typeof s === 'object' ? s.value : s).filter(Boolean);
        if (mapped.length > 0) return mapped;
    }
    // 3. High quality default industrial slides
    return defaultSlides;
});

const currentSlide = ref(0);
let slideInterval = null;

const nextSlide = () => {
    if (slides.value.length === 0) return;
    currentSlide.value = (currentSlide.value + 1) % slides.value.length;
};

const prevSlide = () => {
    if (slides.value.length === 0) return;
    currentSlide.value = (currentSlide.value - 1 + slides.value.length) % slides.value.length;
};

const setSlide = (index) => {
    currentSlide.value = index;
    resetInterval();
};

const resetInterval = () => {
    if (slideInterval) clearInterval(slideInterval);
    slideInterval = setInterval(nextSlide, 6000);
};

onMounted(() => {
    resetInterval();
});

onUnmounted(() => {
    if (slideInterval) clearInterval(slideInterval);
});

const site = computed(() => ({
    name: page.props.site?.name || company.name,
    rc_number: page.props.site?.rc_number || company.rcNumber,
    phone: page.props.site?.phone || company.primaryPhone,
    enable_profile_download: page.props.site?.enable_profile_download,
    company_profile_url: page.props.site?.company_profile_url || '/docs/kuit-limited-company-profile.pdf',
}));
</script>

<template>
    <section class="relative overflow-hidden w-full min-h-[580px] sm:min-h-[660px] lg:min-h-[720px] h-[75vh] sm:h-[82vh] max-h-[880px] flex items-center justify-center bg-slate-950 text-white font-sans group">
        <!-- ══════════════════════════════════════════════════════════════ -->
        <!-- 1. FULL-WIDTH BACKGROUND SLIDER (Clear, Vibrant & Unobstructed) -->
        <!-- ══════════════════════════════════════════════════════════════ -->
        <div class="absolute inset-0 w-full h-full z-0 overflow-hidden pointer-events-none">
            <transition-group name="fade" tag="div" class="w-full h-full relative">
                <div 
                    v-for="(slide, index) in slides" 
                    :key="'slide-' + index + '-' + slide"
                    v-show="currentSlide === index"
                    class="absolute inset-0 w-full h-full flex items-center justify-center overflow-hidden"
                >
                    <!-- Ambient subtle blur edge fill -->
                    <img 
                        :src="slide" 
                        alt="" 
                        class="absolute inset-0 w-full h-full object-cover blur-2xl scale-110 opacity-30 select-none" 
                        aria-hidden="true"
                    />

                    <!-- Crisp, high-definition slide image (clear and vibrant) -->
                    <img 
                        :src="slide" 
                        alt="KUIT LIMITED Operations" 
                        class="relative w-full h-full object-cover object-center select-none brightness-[0.88] contrast-[1.05]"
                    />
                </div>
            </transition-group>

            <!-- Subtle cinema dark overlay: keeps the photo clearly visible while ensuring text contrast -->
            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/85 via-slate-950/30 to-slate-950/45 z-[2]"></div>
            <div class="absolute inset-0 bg-black/15 z-[2]"></div>
        </div>

        <!-- ══════════════════════════════════════════════════════════════ -->
        <!-- 2. FOREGROUND CONTENT (Clean, Uncluttered & Centered)          -->
        <!-- ══════════════════════════════════════════════════════════════ -->
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-20 relative z-10 w-full text-center flex flex-col items-center">
            <!-- Subtle Corporate RC Badge -->
            <div class="inline-flex items-center space-x-2 px-4 py-1.5 rounded-full bg-black/45 border border-white/20 text-[#F5A800] text-xs sm:text-sm font-bold tracking-wider backdrop-blur-md mb-4 shadow-lg" data-aos="fade-down">
                <font-awesome-icon :icon="['fas', 'shield-halved']" class="text-[#F5A800]" />
                <span>{{ site.rc_number }} • Established 2009</span>
            </div>

            <!-- Main Headline -->
            <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black tracking-tight leading-[1.15] text-white drop-shadow-2xl max-w-4xl" data-aos="fade-up">
                Marine, Construction &amp; Engineering Services
                <span class="block text-[#F5A800] mt-2 drop-shadow-lg">
                    You Can Rely On.
                </span>
            </h1>

            <!-- Sub-headline -->
            <p class="mt-4 text-slate-100 text-base sm:text-lg max-w-2xl mx-auto leading-relaxed font-normal drop-shadow-md" data-aos="fade-up" data-aos-delay="100">
                {{ company.heroSubheadline }}
            </p>

            <!-- Essential Action Buttons -->
            <div class="flex flex-wrap items-center justify-center gap-3 sm:gap-4 mt-8" data-aos="fade-up" data-aos-delay="200">
                <Link 
                    href="/contact"
                    class="btn-gold px-8 py-4 text-xs sm:text-sm uppercase tracking-wider font-extrabold shadow-2xl hover:scale-105 transition-all flex items-center space-x-2 cursor-pointer"
                >
                    <font-awesome-icon :icon="['fas', 'file-signature']" />
                    <span>Request a Quote</span>
                </Link>

                <a 
                    v-if="site.enable_profile_download"
                    :href="site.company_profile_url"
                    download="KUIT-LIMITED-Company-Profile.pdf"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="px-7 py-4 rounded-xl bg-black/45 hover:bg-black/65 text-amber-300 font-bold text-xs sm:text-sm uppercase tracking-wider border border-amber-400/50 backdrop-blur-md transition-all shadow-xl hover:scale-105 flex items-center space-x-2 cursor-pointer"
                >
                    <font-awesome-icon :icon="['fas', 'file-arrow-down']" class="text-amber-400" />
                    <span>Download Profile (PDF)</span>
                </a>

                <Link 
                    href="/services"
                    class="px-7 py-4 rounded-xl bg-white/15 hover:bg-white/30 text-white font-bold text-xs sm:text-sm uppercase tracking-wider border border-white/30 backdrop-blur-md transition-all shadow-xl hover:scale-105 flex items-center space-x-2 cursor-pointer"
                >
                    <span>Our Services</span>
                    <font-awesome-icon :icon="['fas', 'arrow-right']" class="text-xs" />
                </Link>
            </div>
        </div>

        <!-- ══════════════════════════════════════════════════════════════ -->
        <!-- 3. SLIDER NAVIGATION ARROWS (like makka-eye)                   -->
        <!-- ══════════════════════════════════════════════════════════════ -->
        <button 
            v-if="slides.length > 1"
            type="button"
            @click="prevSlide(); resetInterval()"
            class="absolute left-3 sm:left-6 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/45 hover:bg-[#F5A800] text-white hover:text-[#020B4F] flex items-center justify-center backdrop-blur-md border border-white/25 transition-all duration-300 opacity-0 group-hover:opacity-100 shadow-2xl cursor-pointer hover:scale-110"
            aria-label="Previous Slide"
        >
            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/>
            </svg>
        </button>

        <button 
            v-if="slides.length > 1"
            type="button"
            @click="nextSlide(); resetInterval()"
            class="absolute right-3 sm:right-6 top-1/2 -translate-y-1/2 z-20 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-black/45 hover:bg-[#F5A800] text-white hover:text-[#020B4F] flex items-center justify-center backdrop-blur-md border border-white/25 transition-all duration-300 opacity-0 group-hover:opacity-100 shadow-2xl cursor-pointer hover:scale-110"
            aria-label="Next Slide"
        >
            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
            </svg>
        </button>

        <!-- ══════════════════════════════════════════════════════════════ -->
        <!-- 4. SLIDER INDICATOR DOTS / PILLS (like makka-eye)              -->
        <!-- ══════════════════════════════════════════════════════════════ -->
        <div v-if="slides.length > 1" class="absolute bottom-5 sm:bottom-7 left-0 right-0 flex justify-center space-x-2.5 z-20">
            <button 
                v-for="(_, index) in slides" 
                :key="'indicator-' + index"
                type="button"
                @click="setSlide(index)"
                class="h-2.5 rounded-full transition-all duration-300 focus:outline-none shadow-md cursor-pointer"
                :class="currentSlide === index ? 'bg-[#F5A800] scale-110 w-8' : 'bg-white/60 hover:bg-white w-2.5'"
                :aria-label="'Go to slide ' + (index + 1)"
            ></button>
        </div>
    </section>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 1.2s ease-in-out;
}
.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
.fade-enter-to,
.fade-leave-from {
    opacity: 1;
}
</style>
