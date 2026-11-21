<script setup>
import Layout from '@/Layouts/Layout.vue';
import SeoHead from '@/Components/SeoHead.vue';
import HeroSection from '@/Components/Home/HeroSection.vue';
import BrandPartners from '@/Components/Home/BrandPartners.vue';
import ServicePillars from '@/Components/Home/ServicePillars.vue';
import FeaturedPackages from '@/Components/Home/FeaturedPackages.vue';
import ProjectShowcase from '@/Components/Home/ProjectShowcase.vue';
import ProcessSection from '@/Components/Home/ProcessSection.vue';
import WhyChooseUs from '@/Components/Home/WhyChooseUs.vue';
import Testimonials from '@/Components/Home/Testimonials.vue';
import CoverageAreas from '@/Components/Home/CoverageAreas.vue';
import CallToAction from '@/Components/Home/CallToAction.vue';

defineOptions({ layout: Layout });

defineProps({
    heroSlides: {
        type: Array,
        default: () => [],
    },
    categories: Array,
    featuredServices: Array,
    featuredProducts: Array,
    featuredProjects: Array,
    testimonials: Array,
    faqs: Array,
    keyStates: Array,
    partners: Array,
    seo: Object,
});
</script>

<template>
    <SeoHead :seo="seo" />

    <div>
        <!-- Hero with Background Slider & Featured Package Card -->
        <HeroSection :hero-slides="heroSlides" :featured-product="featuredProducts?.[0]" />

        <!-- Clients & Sectors Served -->
        <BrandPartners :partners="partners" />

        <!-- 5 Strategic Service Pillars -->
        <ServicePillars :services="featuredServices" />

        <!-- Equipment & Marine Fleet Showcase -->
        <FeaturedPackages :products="featuredProducts" />

        <!-- Project Experience Gallery -->
        <ProjectShowcase :projects="featuredProjects" />

        <!-- 4-Step Operational Process Section -->
        <ProcessSection />

        <!-- Corporate Values & Standards (Smart & Safe) -->
        <WhyChooseUs />

        <!-- Verified Client Testimonials (if present) -->
        <Testimonials :items="testimonials" />

        <!-- Effurun-Warri Operational Base & Deployment -->
        <CoverageAreas :keyStates="keyStates" />

        <!-- Final Call to Action -->
        <CallToAction />
    </div>
</template>
