<script lang="ts" setup>
const props = defineProps<{ duration: number }>();

const timeLeft = ref(props.duration >= 0 ? props.duration : 0);

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

const startCountdown = () => {
    const interval = setInterval(() => {
        if (timeLeft.value > 0) {
            timeLeft.value--;
        } else {
            clearInterval(interval);
        }
    }, 1000);
};

onMounted(() => {
    startCountdown();
});
</script>

<template>
    <p>{{ formattedTime }}</p>
</template>
