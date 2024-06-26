<script setup lang="ts">
import WebLayout from '@/Components/Layouts/WebLayout.vue'
import { ref } from 'vue'
import { useTransition } from '@vueuse/core'
import {
  ChatLineRound,
  DataAnalysis,
  FirstAidKit,
  Location,
  Memo,
  Position,
  Search,
  Service,
  SuitcaseLine,
  User,
  View,
  Edit,
  Upload
} from '@element-plus/icons-vue'
import { ElMessage } from 'element-plus'

const source = ref(0)
const feedbacks = ref(0)
const outputValue = useTransition(source, {
  duration: 1500
})
const outputFeedBack = useTransition(feedbacks, {
  duration: 1500
})
source.value = 172000
feedbacks.value = 512

// =========upload image================

// Reactive properties for avatar and upload
const avatarUrl = ref('https://newprofilepicapp.com/wp-content/uploads/2024/02/New-Profile-Pic-App.webp')
const fileList = ref([])
const uploadRef = ref(null)

// Methods for handling upload events
const handlePreview = (file) => {
  console.log('Preview:', file)
}
const handleRemove = (file, fileList) => {
  console.log('Remove:', file, fileList)
}
const beforeUpload = (file) => {
  const isJPG = file.type === 'image/jpeg'
  const isPNG = file.type === 'image/png'
  const isLt2M = file.size / 1024 / 1024 < 2

  if (!isJPG && !isPNG) {
    ElMessage.error('Upload image only in JPG or PNG format!')
    return false
  }
  if (!isLt2M) {
    ElMessage.error('Upload image size should be less than 2MB!')
    return false
  }
  return true
}

const handleSuccess = (response, file, fileList) => {
  // Assuming response contains the URL of the uploaded image
  // In a real scenario, you might need to adjust this based on the response structure
  avatarUrl.value = URL.createObjectURL(file.raw)
  ElMessage.success('Upload success!')
}

const clickUploadButton = () => {
  uploadRef.value.submit()
}
</script>

<template>
  <WebLayout>
    <div class="container">
      <!-- Tabs for different sections -->
      <el-tabs type="border-card" class="main-card-border">
        <!-- History tab -->
        <el-tab-pane label="History" class="tabs">
          <!-- Card 1 -->
          <el-card class="card">
            <!-- Descriptions for personal information -->
            <el-descriptions title="Go to hospital Angkor Tom" :column="3" :size="size" border class="margin-top">
              <el-descriptions-item label="Username">Rath</el-descriptions-item>
              <el-descriptions-item label="Telephone">123456789</el-descriptions-item>
              <el-descriptions-item label="Place">Cambodia</el-descriptions-item>
              <el-descriptions-item label="Remarks"><el-tag size="small">PNC</el-tag></el-descriptions-item>
              <el-descriptions-item label="Address">No.1188, Wuzhong Avenue, Wuzhong District, Suzhou, Jiangsu Province</el-descriptions-item>
            </el-descriptions>
          </el-card>
          <!-- Card 2 -->
          <el-card class="card">
            <!-- Descriptions for another set of personal information -->
            <el-descriptions title="Go to hospital PNC" :column="3" :size="size" border class="margin-top">
              <el-descriptions-item label="Username">Rath</el-descriptions-item>
              <el-descriptions-item label="Telephone">123456789</el-descriptions-item>
              <el-descriptions-item label="Place">Cambodia</el-descriptions-item>
              <el-descriptions-item label="Remarks"><el-tag size="small">PNC</el-tag></el-descriptions-item>
              <el-descriptions-item label="Address">No.1188, Wuzhong Avenue, Wuzhong District, Suzhou, Jiangsu Province</el-descriptions-item>
            </el-descriptions>
          </el-card>
        </el-tab-pane>
        <!-- Personal Information tab -->
        <el-tab-pane label="Personal Information">
          <el-card class="card">
            <div class="demo-type">
              <!-- Avatar with dynamic source -->
              <el-avatar :size="150" :src="avatarUrl">
                <img :src="avatarUrl" />
              </el-avatar>
              <!-- Upload profile picture -->
              <el-upload
                class="upload-image"
                ref="uploadRef"
                action="https://jsonplaceholder.typicode.com/posts/"
                list-type="picture"
                :on-preview="handlePreview"
                :on-remove="handleRemove"
                :file-list="fileList"
                :before-upload="beforeUpload"
                :on-success="handleSuccess"
              >
                <el-button type="warning" class="upload-button" @click="clickUploadButton">
                  Upload Profile
                  <el-icon class="el-icon--right"><Upload /></el-icon>
                </el-button>
              </el-upload>
            </div>
            <!-- Descriptions for general information -->
            <el-descriptions title="General Information" :column="3" :size="size" border class="margin-top">
              <el-descriptions-item label="First Name">Rath</el-descriptions-item>
              <el-descriptions-item label="Last Name">Samrath</el-descriptions-item>
              <el-descriptions-item label="Gender">Men</el-descriptions-item>
              <el-descriptions-item label="Date of Birth">2024-24-02</el-descriptions-item>
              <el-descriptions-item label="Email">rathsamrath@gmail.com</el-descriptions-item>
              <el-descriptions-item label="Phone Number">+885 123456789</el-descriptions-item>
            </el-descriptions>
            <!-- Descriptions for address -->
            <el-descriptions title="Address" :column="3" :size="size" border class="margin-top">
              <el-descriptions-item label="Village">Phom Penh</el-descriptions-item>
              <el-descriptions-item label="Street">#371</el-descriptions-item>
              <el-descriptions-item label="Commune">O bek kaom</el-descriptions-item>
              <el-descriptions-item label="District">Sen Sok</el-descriptions-item>
              <el-descriptions-item label="Province">Phom Phenh</el-descriptions-item>
              <el-descriptions-item label="City">Phom Penh</el-descriptions-item>
            </el-descriptions>
            <!-- Other details -->
            <el-descriptions title="Others" :column="3" :size="size" border class="margin-top">
              <el-descriptions-item label="Blood Type"><el-tag size="small">O+</el-tag></el-descriptions-item>
              <el-descriptions-item label="Age">30</el-descriptions-item>
              <el-descriptions-item label="Father's Name">Yaya</el-descriptions-item>
              <el-descriptions-item label="Mother's Name">Papa</el-descriptions-item>
            </el-descriptions>
          </el-card>
        </el-tab-pane>
      </el-tabs>
    </div>
  </WebLayout>
</template>

<style scoped>
.container {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  margin-top: 50px;
}
.main-card-border {
  border: 2px solid rgba(0, 0, 0, 0.15);
  border-radius: 10px;
}
.card {
  width: 1200px;
  margin-top: 20px;
  margin-bottom: 20px;
  border-radius: 8px;
}
.margin-top {
  background: linear-gradient(to right, rgba(252, 178, 45, 0.8), rgba(249, 125, 0, 0.2));
  margin: 10px;
  border-radius: 8px;
  margin-bottom: 20px;
  font-size: 50px;
  margin-top: 20px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 2px 4px rgba(0, 0, 0, 0.06);
}
.upload-button,
.upload-image {
  padding-left: 10px;
}
span {
  font-size: 15px;
  font-weight: bold;
}
.tabs {
 padding: 20px;
}
         
</style>

