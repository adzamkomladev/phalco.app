<script lang="ts" setup>
import { ref, computed, onMounted } from "vue";

// Props
interface CountdownProps {
    duration: number; // Time in seconds
}

const props = defineProps<CountdownProps>();

// Countdown State
const timeLeft = ref(props.duration);

const formattedTime = computed(() => {
    const hours = Math.floor(timeLeft.value / 3600)
        .toString()
        .padStart(2, "0");
    const minutes = Math.floor((timeLeft.value % 3600) / 60)
        .toString()
        .padStart(2, "0");
    const seconds = (timeLeft.value % 60).toString().padStart(2, "0");
    return `${hours}:${minutes}:${seconds}`;
});

// Countdown Function
const startCountdown = () => {
    const interval = setInterval(() => {
        if (timeLeft.value > 0) {
            timeLeft.value--;
        } else {
            clearInterval(interval);
        }
    }, 1000);
};

// Start Countdown on Mount
onMounted(() => {
    startCountdown();
});
</script>

<template>
    <p>{{ formattedTime }}</p>
</template>
