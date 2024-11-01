<script setup lang="ts">
import { SideBarMenuProps } from "~/resources/interfaces/layout/main-sidebar.interface";

const props = defineProps<{ menu: SideBarMenuProps }>();

const isOpen = ref(false);
const hasSublink = computed(
    () => props.menu.sublink && props.menu.sublink.length > 0,
);

const toggleSublink = () => {
    isOpen.value = !isOpen.value;
};

const { isNavigating, current, matches } = useRoute();
const isCurrentRoute = computed(() => {
    return current.value === props.menu.to && !isNavigating.value;
});
</script>

<template>
    <div class="capitalize">
        <button
            v-if="!menu.to || hasSublink"
            @click="toggleSublink"
            type="button"
            class="w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-200"
        >
            <SharedCommonIcon v-if="menu.icon" :name="menu.icon" />
            {{ menu.label }}
            <SharedCommonIcon
                v-if="hasSublink"
                name="chevron"
                :class="['ms-auto', !isOpen ? 'rotate-180' : '']"
            />
        </button>
        <router-link
            v-if="menu.to && !hasSublink"
            :href="route(menu.to)"
            :class="[
                isCurrentRoute &&
                    'bg-secondary-500  text-white pointer-events-none',
                menu.icon ? 'px-2.5':'pl-3.5',
            ]"
            class="w-full text-start  transition-all duration-300 flex items-center gap-x-3.5 py-2 text-sm text-gray-800 rounded-lg hover:bg-gray-100 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-200"
        >
            <SharedCommonIcon :name="menu.icon"  v-if="menu.icon" />
            <span class=""> {{ menu.label }} </span>
        </router-link>
    </div>
</template>
