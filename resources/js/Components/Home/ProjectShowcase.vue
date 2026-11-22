<script setup>
import { Link } from '@inertiajs/vue3';
import { projectGallery } from '@/lib/kuitContent';

// Show first 4 projects on Home
const previewProjects = projectGallery.slice(0, 4);
</script>

<template>
    <section class="py-16 sm:py-24 bg-slate-900 text-white relative overflow-hidden font-sans">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Header -->
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12" data-aos="fade-up">
                <div>
                    <span class="text-xs font-bold text-[#F5A800] uppercase tracking-widest bg-white/10 border border-white/20 px-3.5 py-1.5 rounded-full inline-block mb-3">
                        Operational Track Record
                    </span>
                    <h2 class="text-3xl sm:text-4xl font-black tracking-tight text-white">
                        Field Execution &amp; Project Photos
                    </h2>
                    <p class="mt-2 text-slate-300 text-sm sm:text-base">
                        Real photographs from our site clearances, road works, pipeline trenching, and equipment yards.
                    </p>
                </div>

                <div class="mt-4 md:mt-0">
                    <Link 
                        href="/projects"
                        class="inline-flex items-center space-x-1.5 text-xs font-bold text-[#F5A800] hover:underline uppercase tracking-wider transition"
                    >
                        <span>View All Project Photos</span>
                        <font-awesome-icon :icon="['fas', 'arrow-right']" />
                    </Link>
                </div>
            </div>

            <!-- Projects Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div 
                    v-for="project in previewProjects" 
                    :key="project.title"
                    class="rounded-2xl bg-slate-800/80 border border-slate-700/60 overflow-hidden hover:border-[#F5A800]/60 transition-all duration-300 transform hover:-translate-y-1 shadow-lg flex flex-col justify-between group"
                    data-aos="fade-up"
                >
                    <div class="aspect-[4/3] relative bg-slate-950 overflow-hidden">
                        <img 
                            :src="project.image" 
                            :alt="project.title"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" 
                            @error="(e) => e.target.src = $page.props.site?.logo_url || '/images/logo.svg'"
                        />
                        <span class="absolute top-3 left-3 bg-[#020B4F]/90 text-[#F5A800] text-[10px] font-bold px-2.5 py-1 rounded-full uppercase tracking-wider">
                            {{ project.category }}
                        </span>
                    </div>

                    <div class="p-4 sm:p-5">
                        <h3 class="font-bold text-white text-sm leading-snug">
                            {{ project.title }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
