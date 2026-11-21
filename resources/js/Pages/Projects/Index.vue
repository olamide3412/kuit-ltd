<script setup>
import { ref, computed } from 'vue';
import Layout from '@/Layouts/Layout.vue';
import SeoHead from '@/Components/SeoHead.vue';
import { Link } from '@inertiajs/vue3';
import { projectGallery } from '@/lib/kuitContent';

defineOptions({ layout: Layout });

defineProps({
    seo: Object,
});

const activeCategory = ref('All');
const categories = ['All', 'Civil Works', 'Road Infrastructure', 'Oil & Gas', 'Plant & Fleet'];

const filteredProjects = computed(() => {
    if (activeCategory.value === 'All') return projectGallery;
    return projectGallery.filter(p => p.category === activeCategory.value);
});

// Lightbox Modal state
const activeModalImage = ref(null);
const openLightbox = (project) => {
    activeModalImage.value = project;
};
const closeLightbox = () => {
    activeModalImage.value = null;
};
</script>

<template>
    <SeoHead :seo="seo" />

    <div class="bg-slate-50 min-h-screen font-sans">
        <!-- Hero Header -->
        <div class="bg-gradient-to-b from-[#020B4F] via-[#06125E] to-[#020B4F] text-white py-16 sm:py-24 border-b border-navy-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center sm:text-left">
                <nav class="flex items-center space-x-2 text-xs text-slate-300 mb-4 justify-center sm:justify-start">
                    <Link href="/" class="hover:text-amber-400">Home</Link>
                    <span>/</span>
                    <span class="text-[#F5A800] font-bold">Projects</span>
                </nav>

                <div class="max-w-3xl space-y-3">
                    <span class="text-xs font-bold text-[#F5A800] uppercase tracking-widest bg-white/10 border border-white/20 px-3.5 py-1 rounded-full inline-block">
                        Field Photography
                    </span>
                    <h1 class="text-3xl sm:text-5xl font-black text-white tracking-tight">
                        Project &amp; Operations Gallery
                    </h1>
                    <p class="text-slate-200 text-sm sm:text-base leading-relaxed">
                        Photographs from site clearances, road works, pipeline trenching, earthworks, and equipment yards across Nigeria.
                    </p>
                </div>

                <!-- Category Filters -->
                <div class="mt-8 flex flex-wrap gap-2 justify-center sm:justify-start">
                    <button
                        v-for="cat in categories"
                        :key="cat"
                        @click="activeCategory = cat"
                        class="px-4 py-2 rounded-xl text-xs font-bold transition cursor-pointer"
                        :class="activeCategory === cat ? 'bg-[#F5A800] text-[#020B4F] shadow-sm' : 'bg-white/10 text-white hover:bg-white/20'"
                    >
                        {{ cat }}
                    </button>
                </div>
            </div>
        </div>

        <!-- Projects Photo Grid -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <div 
                    v-for="project in filteredProjects" 
                    :key="project.title"
                    class="rounded-2xl bg-white border border-slate-200 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 cursor-pointer group flex flex-col justify-between"
                    @click="openLightbox(project)"
                >
                    <div class="aspect-[4/3] relative bg-slate-100 overflow-hidden">
                        <img 
                            :src="project.image" 
                            :alt="project.title"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            @error="(e) => e.target.src = '/images/logo.svg'"
                        />
                        <div class="absolute inset-0 bg-[#020B4F]/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <span class="w-10 h-10 rounded-full bg-white/90 text-[#020B4F] flex items-center justify-center shadow-lg">
                                <font-awesome-icon :icon="['fas', 'magnifying-glass-plus']" />
                            </span>
                        </div>
                    </div>

                    <div class="p-4">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-[#0A2FA8] block mb-1">
                            {{ project.category }}
                        </span>
                        <h3 class="font-bold text-slate-900 text-sm leading-snug">
                            {{ project.title }}
                        </h3>
                    </div>
                </div>
            </div>

            <!-- Bottom CTA -->
            <div class="mt-16 p-8 rounded-3xl bg-white border border-slate-200 shadow-sm flex flex-col md:flex-row items-center justify-between gap-6">
                <div class="space-y-1">
                    <h3 class="text-lg font-bold text-slate-900">Need machinery or civil engineering support for your site?</h3>
                    <p class="text-xs text-slate-600">Contact our operations base in Effurun-Warri for equipment leasing rates and availability.</p>
                </div>
                <Link href="/contact" class="btn-gold text-xs uppercase tracking-wider py-3 px-6 shrink-0">
                    Discuss Your Project
                </Link>
            </div>
        </div>

        <!-- Lightbox Modal -->
        <transition 
            enter-active-class="transition-opacity duration-200 ease-out" 
            enter-from-class="opacity-0" 
            enter-to-class="opacity-100" 
            leave-active-class="transition-opacity duration-150 ease-in" 
            leave-from-class="opacity-100" 
            leave-to-class="opacity-0"
        >
            <div 
                v-if="activeModalImage" 
                class="fixed inset-0 z-50 bg-black/80 backdrop-blur-sm flex items-center justify-center p-4"
                @click.self="closeLightbox"
            >
                <div class="bg-slate-900 rounded-2xl overflow-hidden max-w-3xl w-full border border-slate-800 shadow-2xl animate-in zoom-in-95 duration-200">
                    <div class="relative bg-black flex items-center justify-center max-h-[70vh]">
                        <img 
                            :src="activeModalImage.image" 
                            :alt="activeModalImage.title" 
                            class="max-h-[70vh] w-auto object-contain"
                            @error="(e) => e.target.src = '/images/logo.svg'"
                        />
                        <button 
                            @click="closeLightbox" 
                            class="absolute top-4 right-4 w-9 h-9 rounded-full bg-black/60 text-white flex items-center justify-center hover:bg-black transition"
                        >
                            <font-awesome-icon :icon="['fas', 'xmark']" />
                        </button>
                    </div>
                    <div class="p-5 flex items-center justify-between bg-slate-900 text-white">
                        <div>
                            <span class="text-xs text-amber-400 font-bold uppercase tracking-wider">{{ activeModalImage.category }}</span>
                            <h4 class="text-base font-bold text-white">{{ activeModalImage.title }}</h4>
                        </div>
                        <Link 
                            :href="`/contact?project=${encodeURIComponent(activeModalImage.title)}`"
                            class="btn-gold text-xs uppercase tracking-wider py-2 px-4"
                        >
                            Enquire
                        </Link>
                    </div>
                </div>
            </div>
        </transition>
    </div>
</template>
