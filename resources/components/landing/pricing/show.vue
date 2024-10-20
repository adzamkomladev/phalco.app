<script setup lang="ts">
const standard = {
    type: "standard",
    amount: {
        value: 15,
        rate: "month",
    },
    description: "mollitia omnis dolorem",
    offers: [
        "Lorem ipsum dolor sit amet",
        "Lorem adipisicing atque",
        "Lorem mollitia omnis dolorem",
        "Lorem iusto vel",
    ],
};

const professional = {
    type: "professional",
    amount: {
        value: 25,
        rate: "month",
    },
    description: "mollitia omnis dolorem",
    offers: [
        "Lorem ipsum dolor sit amet",
        "Lorem adipisicing atque",
        "Lorem mollitia omnis dolorem",
        "Lorem iusto vel",
        "Lorem iusto vel",
        "Lorem iusto vel",
        "Lorem iusto vel",
    ],
};

const premium = {
    type: "premium",
    amount: {
        value: 100,
        rate: "year",
    },
    description: "mollitia omnis dolorem",
    offers: [
        "All voting access",
        "7 Day transaction clearing",
        "L2 auto tracking",
        "24/7 Customer support",
    ],
};
</script>
<template>
    <div
        class="_md:space-y-8 md:grid md:grid-cols-3 sm:gap-6 xl:gap-10 lg:space-y-0"
    >
        <LandingPricingListCard
        :position="1"
            :data="standard"
            class="border-gray-800 bg-white"
        >
            <template v-slot:button>
                <a
                    href="#"
                    class="text-white bg-black w-fit hover:bg-opacity-90 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-10 py-2.5 text-center dark:text-white dark:focus:ring-primary-900"
                >
                    Purchase</a
                >
            </template>
        </LandingPricingListCard>

        <LandingPricingListCard
        :position="2"
            :data="professional"
            class="bg-primary-300 text-white border-white"
        >
            <template v-slot:button>
                <a
                    href="#"
                    class="text-primary-500 bg-white w-fit hover:bg-primary-50 focus:ring-4 focus:ring-primary-200 font-semibold rounded-lg text-sm px-10 py-2.5 text-center dark:text-white dark:focus:ring-primary-900"
                >
                    Purchase</a
                >
            </template>
        </LandingPricingListCard>
        <LandingPricingListCard
        :position="3"    
        :data="premium"
            class="border-gray-800 bg-white"
        >
            <template v-slot:button>
                <a
                    href="#"
                    class="text-white bg-black w-fit hover:bg-opacity-90 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-10 py-2.5 text-center dark:text-white dark:focus:ring-primary-900"
                >
                    Purchase</a
                >
            </template>
        </LandingPricingListCard>
    </div>
</template>
