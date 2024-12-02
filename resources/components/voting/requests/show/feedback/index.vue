<script setup lang="ts">
useHead({
    title: "Agents",
});

import { formatDate, secondsUntil } from "~/resources/utils/shared/date";

const currentPage = ref(
    localStorage.getItem("currentFeedbackPage") || "comments",
);

const feddbacksPages = ["comments", "images"];
const switchFeedbackPage = (name: string) => {
    localStorage.setItem("currentFeedbackPage", name);
    currentPage.value = name;
};

const imageList = [
];

</script>

<template >
    <div class="grid gap-4 py-5  ">

        <div class="">
            <div class="">
                <p class="text-base text-black mobile:text-sm font-semibold">
                  Election Feedback
                </p>
                <p class="text-black/50 text-xs">Lorem ipsum dolor sit amet</p>
            </div>
            <div class="flex gap-5">
                <button
                    v-for="(page, index) in feddbacksPages"
                    :key="index"
                    @click="switchFeedbackPage(page)"
                    class="py-2 relative mobile:text-sm text-sm"
                    :aria-label="'Navigate to ' + page"
                >
                    {{ page }}
                    <div class="flex justify-around">
                        <div
                            class="bg-primary-500 h-[2px] duration-500 rounded-full"
                            :class="[
                                page == currentPage
                                    ? 'w-full transition-all'
                                    : 'w-0  ',
                            ]"
                        />
                    </div>
                </button>
            </div>
            <transition name="fade" mode="out-in">
                <VotingRequestsShowFeedbackComment v-if="currentPage === 'comments'" />
                <VotingRequestsShowFeedbackGallary v-else :images="imageList" />
            </transition>
        </div>
    </div>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.3s;
}
.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>
