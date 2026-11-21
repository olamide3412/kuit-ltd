<script setup>
import { usePage } from '@inertiajs/vue3';
import { generateWhatappLink } from '@/Utils/whatsappLinkGen';
import { computed } from 'vue';
import { company } from '@/lib/kuitContent';

const page = usePage();

const whatsappLink = computed(() => {
    const raw = page.props.site?.whatsapp || company.whatsappNumber;
    const cleanPhone = String(raw).replace(/[^0-9]/g, '');
    return generateWhatappLink(cleanPhone, 'Hello KUIT LIMITED, I would like to make an enquiry regarding your services.');
});
</script>

<template>
    <a
      :href="whatsappLink"
      target="_blank"
      rel="noopener noreferrer"
      class="hidden md:flex fixed right-6 bottom-6 z-50 items-center justify-center space-x-2 bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-3 rounded-full shadow-2xl transition-all duration-300 transform hover:scale-105 group border border-emerald-500/30"
      aria-label="Chat on WhatsApp"
    >
      <font-awesome-icon :icon="['fab', 'whatsapp']" class="text-2xl" />
      <span class="opacity-0 w-0 overflow-hidden group-hover:opacity-100 group-hover:w-auto transition-all duration-300 whitespace-nowrap font-bold text-sm">
        WhatsApp Us
      </span>
    </a>
</template>
