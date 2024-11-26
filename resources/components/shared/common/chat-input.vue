<script setup lang="ts">
const model = defineModel();
</script>

<template>
    <div class="relative">
        <input
            v-model="model"
            type="text"
            class="py-3 px-5 pr-20 block w-full border-gray-200 rounded-full text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
            placeholder="message"
        />
        <button
            class="absolute right-0 top-0 w-20 flex items-center justify-center rounded-r-full h-full"
        >
            <SharedCommonIcon
                name="kite"
                class=""
                :class="[
                    model.trim() != '' ? 'text-primary-300' : 'text-[#C5BDBD]',
                ]"
            />
        </button>
    </div>
</template>
