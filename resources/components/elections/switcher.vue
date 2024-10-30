<script setup lang="ts">

const data = useProperty("elections");
const elections =
    data.value?.all?.map((e: App.Data.Elections.ElectionData) => ({
        value: e.id,
        label: e.name,
    })) || [];
const isNotEmpty = computed(() => elections.length !== 0);
const election = ref<number | null>(data.value?.selected?.id || null);
const loading = ref(false);

watch(election, async (newElection: number | null, _: number | null) => {
    if (newElection) {
        loading.value = true;
        try {
            const res = await router.patch(route("elections.switch"), {
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


