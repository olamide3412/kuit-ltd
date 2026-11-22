<script setup>
import { Head, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const props = defineProps({
    seo: {
        type: Object,
        default: () => ({})
    }
});

const page = usePage();
const siteLogo = computed(() => page.props.site?.logo_url || '/images/logo.svg');
const title = computed(() => props.seo?.title || 'KUIT LIMITED | Marine, Construction and Engineering Services');
const description = computed(() => props.seo?.description || "KUIT LIMITED (RC 806865) delivers heavy equipment leasing, marine services, engineering and oil & gas support across Nigeria.");
const canonical = computed(() => props.seo?.canonical || '');
const robots = computed(() => props.seo?.robots || 'index,follow');
const ogImage = computed(() => props.seo?.ogImage || siteLogo.value);
const ogType = computed(() => props.seo?.ogType || 'website');
const defaultKeywords = "KUIT LIMITED, KUIT, RC 806865, RC806865, Kuit Nigeria, Kuit Limited Warri, 132 Airport Road Effurun Warri, marine services Nigeria, marine vessel charter Niger Delta, tanker vessels charter, product tanker, offshore supply vessels OSV, sea going tug boats, ocean tug boat hire, high bollard pull tug, passenger crew boats, fast crew boat Pelican Calm, deck cargo barge, flat top barge rental, marine bunkering AGO MGO, heavy equipment leasing Nigeria, plant hire Warri, equipment rental Delta State, CAT 330 excavator lease, CAT 320 excavator, CAT 325 excavator, Caterpillar excavator hire, low-bed trailers haulage, CAT 950 pay-loader, wheel loader rental, CAT D8 bulldozer hire, CAT D6 bulldozer, swamp buggy excavator hire, amphibious excavator Niger Delta, marshland excavation, 60 Ton forklift hire, 140G CAT graders, motor grader hire, site concrete mixers batching, 400Amp welding machines, industrial welding rig, industrial compressors hire, diesel air compressor, 60-100tons cranes, mobile crane hire, crawler crane charter, dry lease equipment Nigeria, wet lease plant hire, oil and gas services Nigeria, Robertshaw control panel maintenance, instrumentation calibration troubleshooting, pneumatic shutdown panel, well clean-up post-intervention, well stimulation field support, flowback testing, oilfield chemical supply, drilling completion treatment chemicals, chemical logistics Niger Delta, pipeline flowline construction, pipe fabrication radiographic welding, pipeline hydro-testing dewatering, NNPC contractor, NPDC vendor, Century Exploration CEPL, civil engineering contractor Nigeria, roads and bridges construction Nigeria, laterite sand filling compaction, reinforced concrete drainage box culverts, asphalt road paving, industrial concrete hardstanding, shoreline erosion protection, Quality Safety Personnel QSP, Smart and Safe corporate policy, host community relations Niger Delta, enterprise IT solutions Nigeria, cloud infrastructure, Effurun-Warri, Delta State, Port Harcourt, Lagos, Escravos, Forcados, Bonny, Nigeria";
const keywords = computed(() => props.seo?.keywords ? `${props.seo.keywords}, ${defaultKeywords}` : defaultKeywords);
const jsonLdString = computed(() => {
    if (!props.seo?.jsonLd || Object.keys(props.seo.jsonLd).length === 0) return null;
    return JSON.stringify(props.seo.jsonLd);
});
</script>

<template>
    <Head>
        <title>{{ title }}</title>
        <meta name="description" :content="description" />
        <meta name="keywords" :content="keywords" />
        <meta name="robots" :content="robots" />

        <link v-if="canonical" rel="canonical" :href="canonical" />
        <link v-if="canonical" rel="alternate" hreflang="en-NG" :href="canonical" />
        <link v-if="canonical" rel="alternate" hreflang="x-default" :href="canonical" />

        <!-- Dynamic Favicon & Title Bar Logo -->
        <link rel="icon" :href="siteLogo" />
        <link rel="apple-touch-icon" :href="siteLogo" />

        <!-- Open Graph / Facebook -->
        <meta property="og:type" :content="ogType" />
        <meta property="og:title" :content="title" />
        <meta property="og:description" :content="description" />
        <meta property="og:locale" content="en_NG" />
        <meta v-if="canonical" property="og:url" :content="canonical" />
        <meta v-if="ogImage" property="og:image" :content="ogImage" />

        <!-- Twitter Card -->
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:title" :content="title" />
        <meta name="twitter:description" :content="description" />
        <meta v-if="ogImage" name="twitter:image" :content="ogImage" />

        <!-- JSON-LD Structured Data -->
        <component 
            is="script" 
            v-if="jsonLdString"
            type="application/ld+json"
            v-text="jsonLdString"
        />
    </Head>
</template>
