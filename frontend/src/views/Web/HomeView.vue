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
  Search, Service, SuitcaseLine,
  User, View
} from '@element-plus/icons-vue'

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
</script>
<template>
  <WebLayout>
    <div class="mt-lg-5 d-flex justify-between px-4 py-lg-5-6 h-75 py-10 m-auto">
      <div class="w-50 px-4 d-flex flex-column justify-content-between gap-3">
        <div class="mt-3">
          <h3 style="font-size: 50px; font-weight: bold">Welcome to,</h3>
          <h1 style="font-size: 100px; font-weight: bold">
            <span class="text-#FCB22D font-bold">C</span>are
            <span class="text-#32B4E3 font-bold">F</span>inder!
          </h1>
        </div>
        <div class="d-flex justify-content-between mt-lg-3">
          <el-card class="rounded-50% bg-card">
            <img src="@/assets/image/linkeding.png" class="card-img" alt="" />
          </el-card>
          <el-card class="rounded-50% bg-card d-flex flex-column align-items-center">
            <img src="@/assets/image/gmail.png" class="card-img" alt="" />
          </el-card>
          <el-card class="rounded-50% bg-card d-flex flex-column align-items-center">
            <img src="@/assets/image/instagram.png" class="card-img" alt="" />
          </el-card>
        </div>
      </div>
      <div class="w-25 d-flex justify-content-around">
        <img src="@/assets/image/doctor.png" alt="" />
      </div>
    </div>
  </WebLayout>
  <el-row class="state bg-warning py-4">
    <el-col :span="8">
      <el-statistic title="Daily active users" :value="268500" />
    </el-col>
    <el-col :span="8">
      <el-statistic title="Total Hospital User" :value="outputValue" />
    </el-col>
    <el-col :span="8">
      <el-statistic title="Feedback number" :value="outputFeedBack">
        <template #suffix>
          <el-icon style="vertical-align: -0.125em">
            <ChatLineRound />
          </el-icon>
        </template>
      </el-statistic>
    </el-col>
  </el-row>
  <el-container class="d-flex flex-column align-items-center mt-lg-5">
    <el-row class="d-flex justify-content-center py-4">
      <h1 class="text-center font-bold">
        <span class="text-#FCB22D font-bold">O</span>ur
        <span class="text-#32B4E3 font-bold">T</span>eam
      </h1>
    </el-row>
    <el-row class="d-flex justify-content-around mt-3 gap-3">
      <el-col :span="5">
        <el-card style="width: 280px" shadow="hover" class="d-flex flex-column align-items-center">
          <div class="rounded-50% d-flex justify-content-center">
            <img
              src="@/assets/image/profile-photo-attractive-family-doc-600nw-1724693776.png"
              alt=""
              class="img-fluid w-75 card-img"
            />
          </div>
          <el-row class="d-flex justify-content-center">
            <h2 class="text-center">PHAL HIM</h2>
          </el-row>
          <el-row class="d-flex justify-content-center gap-1 mt-3">
            <el-tooltip class="box-item" effect="dark" content="UX Manager" placement="top-start">
              <el-avatar
                shape="circle"
                :src="'https://static.thenounproject.com/png/2070195-200.png'"
              ></el-avatar>
            </el-tooltip>
            <el-divider direction="vertical"></el-divider>
            <el-tooltip class="box-item" effect="dark" content="LinkedIn" placement="top-start">
              <el-avatar
                shape="circle"
                :src="'https://cdn1.iconfinder.com/data/icons/logotypes/32/circle-linkedin-512.png'"
              ></el-avatar>
            </el-tooltip>
          </el-row>
          <el-row class="d-flex justify-content-center gap-3 mt-3">
            <el-tooltip class="box-item" effect="dark" content="LinkedIn" placement="top-start">
              <el-avatar
                shape="circle"
                :src="'https://cdn1.iconfinder.com/data/icons/logotypes/32/circle-linkedin-512.png'"
              ></el-avatar>
            </el-tooltip>
            <el-tooltip class="box-item" effect="dark" content="Gmail" placement="top-start">
              <el-avatar
                shape="circle"
                :src="'https://img.freepik.com/premium-vector/email-symbol-white-icon_1076610-15454.jpg'"
              ></el-avatar>
            </el-tooltip>
            <el-tooltip class="box-item" effect="dark" content="Instagram" placement="top-start">
              <el-avatar
                shape="circle"
                :src="'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Instagram_icon.png/1200px-Instagram_icon.png'"
              ></el-avatar>
            </el-tooltip>
            <el-tooltip class="box-item" effect="dark" content="Github" placement="top-start">
              <el-avatar
                shape="circle"
                :src="'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c2/GitHub_Invertocat_Logo.svg/1200px-GitHub_Invertocat_Logo.svg.png'"
                class="bg-white"
              ></el-avatar>
            </el-tooltip>
          </el-row>
        </el-card>
      </el-col>
      <el-col :span="5">
        <el-card style="width: 280px" shadow="hover" class="d-flex flex-column align-items-center">
          <div class="rounded-50% d-flex justify-content-center">
            <img
              src="@/assets/image/profile-photo-attractive-family-doc-600nw-1724693776.png"
              alt=""
              class="img-fluid w-75 card-img"
            />
          </div>
          <el-row class="d-flex justify-content-center">
            <h2 class="text-center">RATH SAMRITH</h2>
          </el-row>
          <el-row class="d-flex justify-content-center gap-4 mt-3">
            <el-tooltip class="box-item" effect="dark" content="UX Manager" placement="top-start">
              <el-avatar
                shape="circle"
                :src="'https://static.thenounproject.com/png/2070195-200.png'"
              ></el-avatar>
            </el-tooltip>
            <el-divider direction="vertical"></el-divider>
            <el-tooltip class="box-item" effect="dark" content="LinkedIn" placement="top-start">
              <el-avatar
                shape="circle"
                :src="'https://cdn1.iconfinder.com/data/icons/logotypes/32/circle-linkedin-512.png'"
              ></el-avatar>
            </el-tooltip>
          </el-row>
          <el-row class="d-flex justify-content-center gap-3 mt-3">
            <el-tooltip class="box-item" effect="dark" content="LinkedIn" placement="top-start">
              <el-avatar
                shape="circle"
                :src="'https://cdn1.iconfinder.com/data/icons/logotypes/32/circle-linkedin-512.png'"
              ></el-avatar>
            </el-tooltip>
            <el-tooltip class="box-item" effect="dark" content="Gmail" placement="top-start">
              <el-avatar
                shape="circle"
                :src="'https://img.freepik.com/premium-vector/email-symbol-white-icon_1076610-15454.jpg'"
              ></el-avatar>
            </el-tooltip>
            <el-tooltip class="box-item" effect="dark" content="Instagram" placement="top-start">
              <el-avatar
                shape="circle"
                :src="'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Instagram_icon.png/1200px-Instagram_icon.png'"
              ></el-avatar>
            </el-tooltip>
            <el-tooltip class="box-item" effect="dark" content="Github" placement="top-start">
              <el-avatar
                shape="circle"
                :src="'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c2/GitHub_Invertocat_Logo.svg/1200px-GitHub_Invertocat_Logo.svg.png'"
                class="bg-white"
              ></el-avatar>
            </el-tooltip>
          </el-row>
        </el-card>
      </el-col>
      <el-col :span="5">
        <el-card style="width: 280px" shadow="hover" class="d-flex flex-column align-items-center">
          <div class="rounded-50% d-flex justify-content-center">
            <img
              src="@/assets/image/profile-photo-attractive-family-doc-600nw-1724693776.png"
              alt=""
              class="img-fluid w-75 card-img"
            />
          </div>
          <el-row class="d-flex justify-content-center">
            <h2 class="text-center">RADIT THY</h2>
          </el-row>
          <el-row class="d-flex justify-content-center gap-1 mt-3">
            <el-tooltip class="box-item" effect="dark" content="UX Manager" placement="top-start">
              <el-avatar
                shape="circle"
                :src="'https://static.thenounproject.com/png/2070195-200.png'"
              ></el-avatar>
            </el-tooltip>
            <el-divider direction="vertical"></el-divider>
            <el-tooltip class="box-item" effect="dark" content="LinkedIn" placement="top-start">
              <el-avatar
                shape="circle"
                :src="'https://cdn1.iconfinder.com/data/icons/logotypes/32/circle-linkedin-512.png'"
              ></el-avatar>
            </el-tooltip>
          </el-row>
          <el-row class="d-flex justify-content-center gap-3 mt-3">
            <el-tooltip class="box-item" effect="dark" content="LinkedIn" placement="top-start">
              <el-avatar
                shape="circle"
                :src="'https://cdn1.iconfinder.com/data/icons/logotypes/32/circle-linkedin-512.png'"
              ></el-avatar>
            </el-tooltip>
            <el-tooltip class="box-item" effect="dark" content="Gmail" placement="top-start">
              <el-avatar
                shape="circle"
                :src="'https://img.freepik.com/premium-vector/email-symbol-white-icon_1076610-15454.jpg'"
              ></el-avatar>
            </el-tooltip>
            <el-tooltip class="box-item" effect="dark" content="Instagram" placement="top-start">
              <el-avatar
                shape="circle"
                :src="'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Instagram_icon.png/1200px-Instagram_icon.png'"
              ></el-avatar>
            </el-tooltip>
            <el-tooltip class="box-item" effect="dark" content="Github" placement="top-start">
              <el-avatar
                shape="circle"
                :src="'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c2/GitHub_Invertocat_Logo.svg/1200px-GitHub_Invertocat_Logo.svg.png'"
                class="bg-white"
              ></el-avatar>
            </el-tooltip>
          </el-row>
        </el-card>
      </el-col>
      <el-col :span="5">
        <el-card style="width: 290px" shadow="hover" class="d-flex flex-column align-items-center">
          <div class="rounded-50% d-flex justify-content-center">
            <img
              src="@/assets/image/profile-photo-attractive-family-doc-600nw-1724693776.png"
              alt=""
              class="img-fluid w-75 card-img"
            />
          </div>
          <el-row class="d-flex justify-content-center">
            <h2 class="text-center">SREYNANG RITH</h2>
          </el-row>
          <el-row class="d-flex justify-content-center gap-1 mt-3">
            <el-tooltip class="box-item" effect="dark" content="UX Manager" placement="top-start">
              <el-avatar
                shape="circle"
                :src="'https://static.thenounproject.com/png/2070195-200.png'"
              ></el-avatar>
            </el-tooltip>
            <el-divider direction="vertical"></el-divider>
            <el-tooltip class="box-item" effect="dark" content="LinkedIn" placement="top-start">
              <el-avatar
                shape="circle"
                :src="'https://cdn1.iconfinder.com/data/icons/logotypes/32/circle-linkedin-512.png'"
              ></el-avatar>
            </el-tooltip>
          </el-row>
          <el-row class="d-flex justify-content-center gap-3 mt-3">
            <el-tooltip class="box-item" effect="dark" content="LinkedIn" placement="top-start">
              <el-avatar
                shape="circle"
                :src="'https://cdn1.iconfinder.com/data/icons/logotypes/32/circle-linkedin-512.png'"
              ></el-avatar>
            </el-tooltip>
            <el-tooltip class="box-item" effect="dark" content="Gmail" placement="top-start">
              <el-avatar
                shape="circle"
                :src="'https://img.freepik.com/premium-vector/email-symbol-white-icon_1076610-15454.jpg'"
              ></el-avatar>
            </el-tooltip>
            <el-tooltip class="box-item" effect="dark" content="Instagram" placement="top-start">
              <el-avatar
                shape="circle"
                :src="'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Instagram_icon.png/1200px-Instagram_icon.png'"
              ></el-avatar>
            </el-tooltip>
            <el-tooltip class="box-item" effect="dark" content="Github" placement="top-start">
              <el-avatar
                shape="circle"
                :src="'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c2/GitHub_Invertocat_Logo.svg/1200px-GitHub_Invertocat_Logo.svg.png'"
                class="bg-white"
              ></el-avatar>
            </el-tooltip>
          </el-row>
        </el-card>
      </el-col>
      <el-col :span="5">
        <el-card style="width: 280px" shadow="hover" class="d-flex flex-column align-items-center">
          <div class="rounded-50% d-flex justify-content-center">
            <img
              src="@/assets/image/profile-photo-attractive-family-doc-600nw-1724693776.png"
              alt=""
              class="img-fluid w-75 card-img"
            />
          </div>
          <el-row class="d-flex justify-content-center">
            <h2 class="text-center">LEYSRENG OL</h2>
          </el-row>
          <el-row class="d-flex justify-content-center gap-1 mt-3">
            <el-tooltip class="box-item" effect="dark" content="UX Manager" placement="top-start">
              <el-avatar
                shape="circle"
                :src="'https://static.thenounproject.com/png/2070195-200.png'"
              ></el-avatar>
            </el-tooltip>
            <el-divider direction="vertical"></el-divider>
            <el-tooltip class="box-item" effect="dark" content="LinkedIn" placement="top-start">
              <el-avatar
                shape="circle"
                :src="'https://cdn1.iconfinder.com/data/icons/logotypes/32/circle-linkedin-512.png'"
              ></el-avatar>
            </el-tooltip>
          </el-row>
          <el-row class="d-flex justify-content-center gap-3 mt-3">
            <el-tooltip class="box-item" effect="dark" content="LinkedIn" placement="top-start">
              <el-avatar
                shape="circle"
                :src="'https://cdn1.iconfinder.com/data/icons/logotypes/32/circle-linkedin-512.png'"
              ></el-avatar>
            </el-tooltip>
            <el-tooltip class="box-item" effect="dark" content="Gmail" placement="top-start">
              <el-avatar
                shape="circle"
                :src="'https://img.freepik.com/premium-vector/email-symbol-white-icon_1076610-15454.jpg'"
              ></el-avatar>
            </el-tooltip>
            <el-tooltip class="box-item" effect="dark" content="Instagram" placement="top-start">
              <el-avatar
                shape="circle"
                :src="'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Instagram_icon.png/1200px-Instagram_icon.png'"
              ></el-avatar>
            </el-tooltip>
            <el-tooltip class="box-item" effect="dark" content="Github" placement="top-start">
              <el-avatar
                shape="circle"
                :src="'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c2/GitHub_Invertocat_Logo.svg/1200px-GitHub_Invertocat_Logo.svg.png'"
                class="bg-white"
              ></el-avatar>
            </el-tooltip>
          </el-row>
        </el-card>
      </el-col>
      <el-col :span="5">
        <el-card style="width: 280px" shadow="hover" class="d-flex flex-column align-items-center">
          <div class="rounded-50% d-flex justify-content-center">
            <img
              src="@/assets/image/profile-photo-attractive-family-doc-600nw-1724693776.png"
              alt=""
              class="img-fluid w-75 card-img"
            />
          </div>
          <el-row class="d-flex justify-content-center">
            <h2 class="text-center">BOUR KLAN</h2>
          </el-row>
          <el-row class="d-flex justify-content-center gap-4 mt-3">
            <el-tooltip class="box-item" effect="dark" content="UX Manager" placement="top-start">
              <el-avatar
                shape="circle"
                :src="'https://static.thenounproject.com/png/2070195-200.png'"
              ></el-avatar>
            </el-tooltip>
            <el-divider direction="vertical"></el-divider>
            <el-tooltip class="box-item" effect="dark" content="LinkedIn" placement="top-start">
              <el-avatar
                shape="circle"
                :src="'https://cdn1.iconfinder.com/data/icons/logotypes/32/circle-linkedin-512.png'"
              ></el-avatar>
            </el-tooltip>
          </el-row>
          <el-row class="d-flex justify-content-center gap-3 mt-3">
            <el-tooltip class="box-item" effect="dark" content="LinkedIn" placement="top-start">
              <el-avatar
                shape="circle"
                :src="'https://cdn1.iconfinder.com/data/icons/logotypes/32/circle-linkedin-512.png'"
              ></el-avatar>
            </el-tooltip>
            <el-tooltip class="box-item" effect="dark" content="Gmail" placement="top-start">
              <el-avatar
                shape="circle"
                :src="'https://img.freepik.com/premium-vector/email-symbol-white-icon_1076610-15454.jpg'"
              ></el-avatar>
            </el-tooltip>
            <el-tooltip class="box-item" effect="dark" content="Instagram" placement="top-start">
              <el-avatar
                shape="circle"
                :src="'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Instagram_icon.png/1200px-Instagram_icon.png'"
              ></el-avatar>
            </el-tooltip>
            <el-tooltip class="box-item" effect="dark" content="Github" placement="top-start">
              <el-avatar
                shape="circle"
                :src="'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c2/GitHub_Invertocat_Logo.svg/1200px-GitHub_Invertocat_Logo.svg.png'"
                class="bg-white"
              ></el-avatar>
            </el-tooltip>
          </el-row>
        </el-card>
      </el-col>
    </el-row>
  </el-container>
  <el-container class="px2 d-flex flex-column mt-20">
    <el-row class="d-flex justify-content-around mt-3 gap-3 p-5">
      <el-col :span="5" class="d-flex flex-column justify-content-between align-items-center mb-3">
        <div class="d-flex justify-content-between" style="width: 100%">
          <el-tooltip class="box-item" effect="dark" content="Gmail" placement="top-start">
            <el-avatar fit="cover" class="bg-white">
              <Search style="width: 2em; height: 2em; color: #32b4e3" />
            </el-avatar>
          </el-tooltip>
          <el-tooltip class="box-item" effect="dark" content="Gmail" placement="top-start">
            <el-avatar style="position: relative; bottom: 30px" class="bg-white">
              <Memo style="width: 2em; height: 2em; color: #32b4e3" />
            </el-avatar>
          </el-tooltip>
          <el-tooltip class="box-item" effect="dark" content="Location" placement="top-start">
            <el-avatar class="bg-white">
              <Location style="width: 2em; height: 2em; color: #32b4e3" />
            </el-avatar>
          </el-tooltip>
        </div>
        <h1 class="text-center" style="font-size: 90px; font-weight: bold">
          <span class="text-#32B4E3 font-bold">H</span>ospital
        </h1>
        <div class="d-flex justify-content-between" style="width: 100%">
          <el-tooltip class="box-item" effect="dark" content="Gmail" placement="top-start">
            <el-avatar class="bg-white">
              <User style="width: 2em; height: 2em; color: #32b4e3" />
            </el-avatar>
          </el-tooltip>
          <el-tooltip class="box-item" effect="dark" content="Gmail" placement="top-start">
            <el-avatar class="bg-white" style="position: relative; top: 30px">
              <FirstAidKit style="width: 2em; height: 2em; color: #32b4e3" />
            </el-avatar>
          </el-tooltip>
          <el-tooltip class="box-item" effect="dark" content="Gmail" placement="top-start">
            <el-avatar class="bg-white">
              <DataAnalysis style="width: 2em; height: 2em; color: #32b4e3" />
            </el-avatar>
          </el-tooltip>
        </div>
      </el-col>
      <el-col :span="5" class="d-flex flex-column justify-start align-items-start mt-3">
        <div>
          <h1 class="text-center" style="font-size: 90px; font-weight: bold">
            <span class="text-#32B4E3 font-bold">H</span>ospital
          </h1>
          <el-timeline>
            <el-timeline-item class="text-start"
              >Browse through our professionally designed selection of free template and customize a
              design for any occasion.
            </el-timeline-item>
            <el-timeline-item class="text-start"
              >Browse through our professionally designed selection.
            </el-timeline-item>
          </el-timeline>
        </div>
      </el-col>
    </el-row>
  </el-container>
  <el-container class="container-fluid value px-20 d-flex flex-column align-items-center">
    <div class="container inner d-flex justify-content-center align-items-center">
      <h1 class="text-center font-bold">
        <span class="text-#FCB22D font-bold">O</span>ur
        <span class="text-#32B4E3 font-bold">V</span>alue
      </h1>
    </div>
    <div class="container inner d-flex justify-content-center gap-lg-5 align-items-start">
      <el-card style="width: 120px" class="d-flex card-item flex-column align-items-center">
        <div class="d-flex justify-content-center">
          <el-avatar class="bg-white" :size="50"><FirstAidKit style="color: #fcb22d;font-size: 10px"/></el-avatar>
        </div>
        <h3>Mission</h3>
      </el-card>
      <el-card style="width: 120px" class="d-flex card-item flex-column align-items-center">
        <div class="d-flex justify-content-center">
          <el-avatar class="bg-white" :size="50"><View style="color: #fcb22d;font-size: 10px"/></el-avatar>
        </div>
        <h3>Vision</h3>
      </el-card>
      <el-card style="width: 120px" class="d-flex card-item flex-column align-items-center">
        <div class="d-flex justify-content-center">
          <el-avatar class="bg-white" :size="50" ><SuitcaseLine style="color: #fcb22d;font-size: 10px"/></el-avatar>
        </div>
        <h3>Value</h3>
      </el-card>
      <el-card style="width: 120px" class="d-flex card-item flex-column align-items-center">
        <div class="d-flex justify-content-center">
          <el-avatar class="bg-white" :size="50"><Service style="color: #fcb22d;font-size: 10px"/></el-avatar>
        </div>
        <h3>Service</h3>
      </el-card>
    </div>
  </el-container>
  <el-footer class="md:px-20 d-flex justify-content-between align-items-center footer py-2" style="background-color: #f8f8f8;">
    <el-col :span="4">
      <div class="d-flex flex-column align-items-start">
        <img src="@/assets/logo/care_finder-02.png" alt="" width="200px">
        <p class="text-start">Browse through our professionally designed selection. Browse through our professionally designed selection.</p>
      </div>
    </el-col>
    <el-col :span="4">
      <div class="d-flex flex-column align-items-start">
        <h4>Navigation</h4>
        <router-link to="/landing" class="nav-link">Home</router-link>
        <router-link to="/landing" class="nav-link">About</router-link>
        <router-link to="/landing" class="nav-link">Service</router-link>
        <router-link to="/landing" class="nav-link">Contact</router-link>
      </div>
    </el-col>
    <el-col :span="4">
      <div>
        <h4 class="text-start">Address</h4>
        <div>
          <p class="text-justify">
            BP 511, Phum Tropeang Chhuk (Borey Sorla) Sangtak, Street 371, Phnom Penh
          </p>
        </div>
      </div>
    </el-col>
    <el-col :span="4">
      <div class="d-flex justify-content-between gap-lg-5 flex-column mt-2">
        <h4>Social Media</h4>
        <div class="d-flex justify-content-between mt-2">
          <el-tooltip class="box-item" effect="dark" content="LinkedIn" placement="top-start">
            <el-avatar
              shape="circle"
              :src="'https://cdn1.iconfinder.com/data/icons/logotypes/32/circle-linkedin-512.png'"
            ></el-avatar>
          </el-tooltip>
          <el-tooltip class="box-item" effect="dark" content="Gmail" placement="top-start">
            <el-avatar
              shape="circle"
              :src="'https://img.freepik.com/premium-vector/email-symbol-white-icon_1076610-15454.jpg'"
            ></el-avatar>
          </el-tooltip>
          <el-tooltip class="box-item" effect="dark" content="Instagram" placement="top-start">
            <el-avatar
              shape="circle"
              :src="'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Instagram_icon.png/1200px-Instagram_icon.png'"
            ></el-avatar>
          </el-tooltip>
          <el-tooltip class="box-item" effect="dark" content="Github" placement="top-start">
            <el-avatar
              shape="circle"
              :src="'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c2/GitHub_Invertocat_Logo.svg/1200px-GitHub_Invertocat_Logo.svg.png'"
              class="bg-white"
            ></el-avatar>
          </el-tooltip>
        </div>
      </div>
    </el-col>
  </el-footer>
</template>
<style scoped>
.bg-card {
  width: 80px;
  background-color: #fcb22d;
}
.card-item{
  background-color: #fcb22d;
  border: none;
}
.card-img {
  border-radius: 50%;
}
.footer{
  height: 40vh;
}
.state {
  color: white;
}

.head-img {
  position: absolute;
  top: -30px;
  right: 150px;
  z-index: 1;
}

.bg-card img {
  width: 100%;
}

.el-col {
  text-align: center;
}
.value {
  height: 70vh;
  background-image: url('@/assets/image/PhysPatient_SplitWidthHero_1920x1280.png');
  background-size: cover;
  background-repeat: no-repeat;
}
.inner {
  height: 100%;
}
.el-statistic {
  --el-statistic-title-color: white;
  --el-statistic-content-color: #32b4e3;
  --el-statistic-content-font-size: 20px;
  --el-statistic-title-font-size: 20px;
  --el-statistic-content-font-weight: bold;
}

.w-25 img {
  width: 400px;
}
</style>
