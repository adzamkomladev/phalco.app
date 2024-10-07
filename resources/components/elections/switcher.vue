<script setup lang="ts">
const elections = [];
const isNotEmpty = computed(() => elections.length !== 0);
const election = ref<number | null>(null);
const loading = ref(false);

watch(election, async (newElection: number | null, _: number | null) => {
    if (newElection) {
        loading.value = true;
        try {
            const res = await router.patch(route("elections.select"), {
                data: { election_id: +newElection },
            });
        } catch (error) {
        } finally {
            loading.value = false;
        }
    }
});
</script>

<template>
    <SharedFormBaseSelect
        v-if="isNotEmpty"
        v-model="election"
        id="election"
        name="election"
        :options="elections"
    />
</template>
