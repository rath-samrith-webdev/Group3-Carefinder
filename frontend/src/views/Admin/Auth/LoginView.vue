<!-- src/components/Login.vue -->
<template>
  <WebHeaderMenu/>
  <div class="flex items-center justify-center min-h-screen bg-gray-100">
    <el-card class="w-full max-w-md shadow-lg">
      <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>
      <el-form @submit="onSubmit">
        <el-form-item :error="emailError">
          <el-input placeholder="Email Address" v-model="email" size="large" />
        </el-form-item>

        <el-form-item :error="nameError" class="mt-8">
          <el-input placeholder="Password" v-model="password" size="large" type="password" />
        </el-form-item>

        <div>
          <el-button
            size="large"
            class="mt-3 w-full"
            :disabled="isSubmitting"
            type="primary"
            native-type="submit"
            >Submit
          </el-button>
        </div>
      </el-form>
    </el-card>
  </div>
</template>

<script setup lang="ts">
import axiosInstance from '@/plugins/axios'
import { useField, useForm } from 'vee-validate'
import * as yup from 'yup'
import { useRouter } from 'vue-router'
import {useAuthStore} from '@/stores/auth-store'
import WebHeaderMenu from '@/Components/WebHeaderMenu.vue'

const router = useRouter()
const store = useAuthStore()
console.log(store.roles)
const formSchema = yup.object({
  password: yup.string().required().label('Password'),
  email: yup.string().required().email().label('Email address')
})

const { handleSubmit, isSubmitting } = useForm({
  initialValues: {
    password: '',
    email: ''
  },
  validationSchema: formSchema
})

const onSubmit = handleSubmit(async (values) => {
  try {
    const { data } = await axiosInstance.post('/login', values)
    localStorage.setItem('access_token', data.access_token)
    if(store.roles[0]=='admin') {
      await router.push('/admin/dashboard')
    }else {
      await router.push('/')
    }
  } catch (error) {
    console.warn('Error')
  }
})

const { value: password, errorMessage: nameError } = useField('password')
const { value: email, errorMessage: emailError } = useField('email')
</script>

<style scoped>
.min-h-screen {
  min-height: 100vh;
}
</style>
