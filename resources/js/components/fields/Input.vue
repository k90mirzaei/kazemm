<template>
  <div class="relative z-0 w-full">
    <input
        :id="name"
        :name="name"
        :type="type"
        :style="{ color: error?.length ? 'red' : '' }"
        :value="$attrs.modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        :maxlength="maxlength"
        class="block w-full p-3 mt-0 bg-transparent border rounded-lg appearance-none outline-none focus:ring-0 focus:border-gray-800 border-gray-200 transition-all duration-300"
        placeholder=" "
    />
    <label
        :for="name"
        :style="{ color: error?.length ? 'red' : '' }"
        class="absolute bg-white transform origin-left duration-300 top-[14px] left-3 px-2 -z-1 origin-0 text-gray-400 cursor-text"
    >{{ label }}</label
    >
    <span v-if="error?.length" class="text-red-500 text-sm" v-html="error"/>
  </div>
</template>

<script>

export default {
  data() {
    return {
      showPass: false,
    }
  },
  props: {
    type: {
      type: String,
      default: "text",
    },
    label: {
      type: String,
      default: "Enter Your Name",
    },
    name: {
      type: String,
      default: "name",
    },
    maxlength: {
      type: Number,
      default: 255
    },
    error: null,
  }
};
</script>

<style scoped>
input:focus ~ label,
input:not(:placeholder-shown) ~ label {
  transform: scale(75%) translateY(-32px);
}

input:focus ~ label {
  color: black;
}

</style>
