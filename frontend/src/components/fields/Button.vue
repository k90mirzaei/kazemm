<template>
  <button class="flex items-center justify-center bg-blue-500 px-5 h-12 w-fit rounded-xl text-white hover:bg-blue-600 active:bg-blue-700 transition"
          :class="isLoading?'pointer-events-none cursor-not-allowed bg-blue-400':''">
    <template v-if="!isLoading">
      {{ label }}
    </template>
    <template v-else>
      <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
           width="40px" height="40px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve">
           <path opacity="0.2" fill="#fff" d="M20.201,5.169c-8.254,0-14.946,6.692-14.946,14.946c0,8.255,6.692,14.946,14.946,14.946
              s14.946-6.691,14.946-14.946C35.146,11.861,28.455,5.169,20.201,5.169z M20.201,31.749c-6.425,0-11.634-5.208-11.634-11.634
              c0-6.425,5.209-11.634,11.634-11.634c6.425,0,11.633,5.209,11.633,11.634C31.834,26.541,26.626,31.749,20.201,31.749z"/>
           <path fill="#fff" d="M26.013,10.047l1.654-2.866c-2.198-1.272-4.743-2.012-7.466-2.012h0v3.312h0 C22.32,8.481,24.301,9.057,26.013,10.047z">
           <animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 20 20" to="360 20 20" dur="1s" repeatCount="indefinite"/>
        </path>
      </svg>
    </template>
  </button>
</template>

<script>

export default {
  props: ['label', 'isLoading'],
}
</script>