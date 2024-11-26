<script setup lang="ts">

const images = ref([
  {
    src: 'https://picsum.photos/id/1015/300/200',
    description: 'A serene mountain landscape',
  },
  {
    src: 'https://picsum.photos/id/1025/300/200',
    description: 'A playful puppy',
  },
  {
    src: 'https://picsum.photos/id/1035/300/200',
    description: 'A calm beach view at sunset',
  },
  {
    src: 'https://picsum.photos/id/1045/300/200',
    description: 'A bustling city skyline',
  },
  {
    src: 'https://picsum.photos/id/1055/300/200',
    description: 'A dense forest with sunlight peeking through',
  },
]);
const currentSlide = ref(0);

const nextSlide = () => {
  currentSlide.value =
    (currentSlide.value + 1) % images.value.length;
};

const prevSlide = () => {
  currentSlide.value =
    (currentSlide.value - 1 + images.value.length) %
    images.value.length;
};
</script>

<template>
  <div>
    <!-- Slider for small screens -->
    <div
      id="indicators-carousel"
      class="relative w-full sm:hidden"
      data-carousel="static"
    >
      <div class="relative h-56 overflow-hidden rounded-lg">
        <div
          v-for="(image, index) in images"
          :key="index"
          class="absolute inset-0 transition-opacity duration-700 ease-in-out"
          :class="{ hidden: currentSlide !== index, block: currentSlide === index }"
        >
          <img
            :src="image.src"
            :alt="image.description"
            class="w-full h-full object-cover"
          />
          <div class="absolute bottom-0 left-0 w-full bg-black bg-opacity-50 text-white text-center p-2">
            {{ image.description }}
          </div>
        </div>
      </div>
      <div
        class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3"
      >
        <button
          v-for="(_, index) in images"
          :key="index"
          @click="currentSlide = index"
          type="button"
          class="w-3 h-3 rounded-full"
          :class="{
            'bg-white/80': currentSlide === index,
            'bg-primary-500/80': currentSlide !== index,
          }"
        />
      </div>
      <button
        @click="prevSlide"
        type="button"
        class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4"
      >
        <span class="w-10 h-10 rounded-full bg-white flex justify-center items-center">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="w-4 h-4 text-black"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
          >
            <polyline points="15 18 9 12 15 6" />
          </svg>
        </span>
      </button>
      <button
        @click="nextSlide"
        type="button"
        class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4"
      >
        <span class="w-10 h-10 rounded-full bg-white flex justify-center items-center">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="w-4 h-4 text-black"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
          >
            <polyline points="9 18 15 12 9 6" />
          </svg>
        </span>
      </button>
    </div>

    <!-- Grid gallery for larger screens -->
    <div class="hidden sm:grid sm:grid-cols-3 sm:gap-4 sm:px-4">
      <div
        v-for="(image, index) in images"
        :key="index"
        class="relative group"
      >
        <img
          :src="image.src"
          :alt="image.description"
          class="w-full h-48 object-cover rounded-lg shadow"
        />
        <div
          class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 flex items-center justify-center text-white text-lg font-semibold rounded-lg transition-opacity"
        >
          {{ image.description }}
        </div>
      </div>
    </div>
  </div>
</template>
