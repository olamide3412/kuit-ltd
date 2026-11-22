<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
  paginator: {
    type: Object,
    default: null,
  },
  links: {
    type: Array,
    default: null,
  },
});

// Support either direct links array prop or paginator.links
const rawLinks = computed(() => {
  if (Array.isArray(props.links) && props.links.length > 0) {
    return props.links;
  }
  if (props.paginator?.links && Array.isArray(props.paginator.links) && props.paginator.links.length > 0) {
    return props.paginator.links;
  }
  return null;
});

// Laravel-style truncation for pagination when paginator object is provided
const paginationLinks = computed(() => {
  if (!props.paginator?.last_page || !props.paginator?.current_page) {
    return [];
  }
  const pages = [];
  const total = props.paginator.last_page;
  const current = props.paginator.current_page;

  if (total <= 7) {
    for (let i = 1; i <= total; i++) pages.push(i);
  } else {
    if (current <= 4) {
      pages.push(1, 2, 3, 4, 5, '...', total);
    } else if (current >= total - 3) {
      pages.push(1, '...', total - 4, total - 3, total - 2, total - 1, total);
    } else {
      pages.push(1, '...', current - 1, current, current + 1, '...', total);
    }
  }

  return pages;
});

const getUrlForPage = (page) => {
  if (page === '...' || !props.paginator?.path) return null;

  const baseUrl = props.paginator.path;
  const query = new URLSearchParams(props.paginator.query || {});
  query.set('page', page);
  return `${baseUrl}?${query.toString()}`;
};
</script>

<template>
  <!-- Format 1: Direct Laravel links array (e.g. from :links="...") -->
  <div v-if="rawLinks && rawLinks.length > 3" class="flex flex-wrap justify-center items-center gap-1 my-4">
    <Component
      :is="link.url ? Link : 'span'"
      v-for="(link, i) in rawLinks"
      :key="i"
      :href="link.url || undefined"
      v-html="link.label"
      class="px-3 py-1.5 text-xs sm:text-sm rounded-lg transition font-medium"
      :class="[
        link.active
          ? 'bg-secondary-500 text-white font-bold shadow-sm'
          : link.url
            ? 'bg-gray-100 text-gray-700 hover:bg-gray-200'
            : 'text-gray-400 cursor-not-allowed bg-transparent'
      ]"
    />
  </div>

  <!-- Format 2: Numeric paginator with << and >> controls -->
  <div v-else-if="paginator && paginator.last_page > 1" class="flex justify-center items-center gap-2 my-4">
    <Link
      v-if="paginator.current_page > 1"
      :href="getUrlForPage(paginator.current_page - 1)"
      class="px-3 py-1 rounded bg-gray-200 hover:bg-gray-300 text-sm font-semibold"
    >
       &lt;&lt;
    </Link>

    <div v-for="(page, i) in paginationLinks" :key="i" class="hidden md:inline">
      <span
        v-if="page === '...'"
        class="px-3 py-1 rounded bg-gray-100 text-gray-400 cursor-default text-sm"
      >...</span>

      <Link
        v-else
        :href="getUrlForPage(page)"
        :class="[
          'px-3 py-1 rounded text-sm font-semibold transition',
          page === paginator.current_page ? 'bg-secondary-500 text-white shadow-sm' : 'bg-gray-200 hover:bg-gray-300 text-gray-700',
        ]"
      >
        {{ page }}
      </Link>
    </div>

    <Link
      v-if="paginator.current_page < paginator.last_page"
      :href="getUrlForPage(paginator.current_page + 1)"
      class="px-3 py-1 rounded bg-gray-200 hover:bg-gray-300 text-sm font-semibold"
    >
        &gt;&gt;
    </Link>
  </div>
</template>
