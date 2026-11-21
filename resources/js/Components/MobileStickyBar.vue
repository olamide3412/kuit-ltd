<script setup>
import { computed } from 'vue';
import { usePage, Link } from '@inertiajs/vue3';
import { company } from '@/lib/kuitContent';

const page = usePage();

const phone = computed(() => {
    return page.props.site?.phone || company.primaryPhone;
});

const email = computed(() => {
    return page.props.site?.email || company.email;
});
</script>

<template>
    <div class="md:hidden fixed bottom-0 left-0 right-0 z-40 bg-white/95 backdrop-blur-md border-t border-slate-200 px-3 py-2 shadow-2xl flex items-center justify-between gap-2">
        <!-- Call Button -->
        <a 
            :href="`tel:${phone}`"
            class="flex-1 flex flex-col items-center justify-center py-1.5 px-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-800 text-xs font-semibold transition"
            aria-label="Call KUIT LIMITED"
        >
            <font-awesome-icon :icon="['fas', 'phone']" class="text-[#020B4F] text-sm mb-0.5" />
            <span>Call Us</span>
        </a>

        <!-- Email Button -->
        <a 
            :href="`mailto:${email}`"
            class="flex-1 flex flex-col items-center justify-center py-1.5 px-2 rounded-xl bg-navy-50 hover:bg-navy-100 text-[#020B4F] text-xs font-semibold transition"
            aria-label="Email KUIT LIMITED"
        >
            <font-awesome-icon :icon="['fas', 'envelope']" class="text-sm mb-0.5" />
            <span>Email</span>
        </a>

        <!-- Request Quote Button -->
        <Link 
            href="/contact"
            class="flex-1 flex flex-col items-center justify-center py-1.5 px-2 rounded-xl bg-[#F5A800] hover:bg-[#D99400] text-[#020B4F] text-xs font-bold transition shadow-sm"
        >
            <font-awesome-icon :icon="['fas', 'file-signature']" class="text-sm mb-0.5" />
            <span>Get Quote</span>
        </Link>
    </div>
</template>
