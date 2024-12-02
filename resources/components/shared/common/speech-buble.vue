<script lang="ts" setup>
import { SpeechBubbleProps } from "~/resources/interfaces/shared/common.interface";

// Import the interface

const props = withDefaults(defineProps<SpeechBubbleProps>(), {
    sender: {
        name: "Komla Adzam",
        logo: "https://picsum.photos/id/1035/300/200",
    },
    message: {
        text: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas sit ullam amet.",
        time: "15min ago",
    },
});
</script>

<template>
    <SharedCommonCard
        class="rounded-[1.5rem] w-[80%] shadow-card rounded-bl-[0] flex gap-5 p-5 max-w-fit pr-10"
    >
        <div class="h-full flex items-center justify-center">
            <img
                :src="sender.logo"
                alt="Sender Logo"
                class="shadow-card size-20 rounded-full h-fit aspect-square shrink-0"
            />
        </div>

        <div>
            <p class="font-medium flex gap-2 items-center">
                <span>{{ sender.name }}</span>
                <span class="text-[10px] text-gray-300">{{
                    message.time
                }}</span>
            </p>
            <div class="text-xs">
                {{ message.text }}
            </div>
        </div>
    </SharedCommonCard>
</template>
