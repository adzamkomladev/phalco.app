<script setup lang="ts">
import { FAQ } from "~/resources/interfaces/welcome/index.interface";

defineProps<{ faq: FAQ }>();

const FaqIsOpened = ref(false);
</script>

<template>
    <SharedAnimationCollapsible class="sm:max-w-[80%]">
        <template v-slot:summary>
            <button
                class="flex w-full justify-between font-bold py-3 pb-5 text-sm"
                @click="FaqIsOpened = !FaqIsOpened"
            >
                <div class="text-left font-unbounded">{{ faq.question }}</div>
                <div class="text-wrap">
                    <span v-if="FaqIsOpened" v-text="'-'" />
                    <span v-else v-text="'+'" />
                </div>
            </button>
        </template>
        <p class="pb-3 text-gray-600">{{ faq.answer }}</p>
    </SharedAnimationCollapsible>
</template>
