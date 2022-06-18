<template>
  <div class="relative z-0 w-full">
    <div
        id="textarea"
        ref="textarea"
        :style="{ color: error?.length ? 'red' : '' }"
        :class="textareaStyle"
        contenteditable
        @keydown="onChanging"/>
    <label
        for="textarea"
        :style="{ color: error?.length ? 'red' : '' }"
        class="absolute bg-white transform origin-left duration-300 top-[14px] left-3 px-2 -z-1 origin-0 text-gray-400 cursor-text"
    >{{ label }}</label
    >
    <span v-if="error?.length" class="text-red-500 text-sm" v-html="error"/>
  </div>
</template>

<script>
export default {
  data: () => ({characterCount: 0}),
  props: {
    max: {
      type: Number,
      default: 100
    },
    label: {
      type: String,
      default: "Enter Your Name",
    },
    row: {
      type: Number,
      default: 1
    },
    hasNewline: {
      type: Boolean,
      default: true
    },
    error: null,
  },
  computed: {
    textareaStyle(e) {
      let base = 'block w-full p-3 mt-0 bg-transparent border rounded-lg appearance-none outline-none focus:ring-0 focus:border-gray-800 border-gray-200 transition-all duration-300'
      return base + (this.characterCount > 0 ? ' __text_filled' : '')
    }
  },
  mounted() {
    this.$refs.textarea.style.minHeight = `${this.$refs.textarea.clientHeight * this.row}px`
  },
  methods: {
    onChanging(e) {
      if (e.keyCode === 13 && !this.hasNewline) {
        e.preventDefault();
      }

      this.$emit('update:modelValue', this.$refs.textarea.textContent)

      setTimeout(() => {
        this.characterCount = this.$refs.textarea.textContent.length
      }, 50)

      if (this.characterCount >= this.max && e.keyCode !== 8) {
        e.preventDefault();
      }
    }
  },
};
</script>

<style scoped>
#textarea:focus ~ label,
#textarea.__text_filled ~ label {
  transform: scale(75%) translateY(-32px);
}

#textarea:focus ~ label {
  color: black;
}
</style>
