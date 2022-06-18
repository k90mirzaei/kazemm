<template>
  <div class="flex flex-col px-4 pb-10" id="contact">
    <h2 class="text-2xl font-semibold pb-5">Contact</h2>
    <p class="text-gray-500">Let me know if you are interested in my services and collaboration, I will reply as soon as possible!</p>
    <div class="py-8">
      <InputField label="Your full name" name="name" v-model.trim="name" :error="errors?.name" class="pb-7"/>
      <InputField label="Your Email" name="email" v-model.trim="email" :error="errors?.email" class="pb-7"/>
      <TextareaField label="Your message" name="message" v-model.trim="message" :error="errors?.message" :row="4" class="pb-7"/>
      <ButtonField label="Send Message" @click.prevent="handleSubmit" :is-loading="loading"/>
    </div>
  </div>
</template>

<script>
import InputField from "@/components/fields/Input";
import TextareaField from "@/components/fields/Textarea";
import ButtonField from "@/components/fields/Button";
import api from "@/services/apiServices";

export default {
  name: "Contact",
  components: {InputField, ButtonField, TextareaField},
  data: () => ({
    name: '',
    email: '',
    message: '',
    errors: null,
    loading: false
  }),
  methods: {
    async handleSubmit() {
      if (!this.loading) {
        this.loading = true;

        let formData = new FormData()
        formData.append('name', this.name)
        formData.append('email', this.email)
        formData.append('message', this.message)

        await api.post('send-message', formData).then(response => {
          console.log(response)
          this.loading = false;
        }).catch(error => {
          this.errors = error.response.data
          this.loading = false;
        })
      }
    }
  }
}
</script>
