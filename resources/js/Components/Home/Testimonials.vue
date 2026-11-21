<script setup>
defineProps({
    items: {
        type: Array,
        default: () => []
    }
});
</script>

<template>
    <section v-if="items && items.length > 0" class="py-16 sm:py-24 bg-slate-50 relative overflow-hidden font-sans">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-14" data-aos="fade-up">
                <span class="text-xs font-bold text-[#020B4F] uppercase tracking-widest bg-navy-100 px-3.5 py-1.5 rounded-full inline-block mb-3">
                    Client Feedback
                </span>
                <h2 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight">
                    What Our Clients Say
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                <div 
                    v-for="review in items" 
                    :key="review.id"
                    class="bg-white rounded-3xl p-7 border border-slate-200/80 shadow-sm hover:shadow-md transition flex flex-col justify-between"
                >
                    <p class="text-slate-600 text-sm leading-relaxed italic mb-6">
                        "{{ review.message }}"
                    </p>
                    <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                        <div>
                            <div class="font-bold text-slate-900 text-sm">{{ review.name }}</div>
                            <div class="text-xs text-slate-500">{{ review.occupation }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
