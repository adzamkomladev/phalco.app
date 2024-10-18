<script setup lang="ts">

const requirements = [
    "Lorem ipsum dolor sit amet some one is here who cares if its lorem ipsun",
    "Lorem  adipisicing elit. some guys are hidden ",
    "Lorem ipsum dolor sit who cares if its lorem ipsun  who cares if its lorem ipsun",
    "Lorem  iusto eum quasi asperiores illo corporis eaque vel ",
];
</script>

<template>
    <LandingRequirementItemList
        v-for="(req, i) in requirements"
        :key="i"
        :requirement="req"
    />
</template>
