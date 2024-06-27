<template>
  <WebLayout>
    <div class="container">
      <div class="card-header">
        <h1>Hospital Details</h1>
      </div>
      <!-- ======================================================= -->
                          <!-- hospital details -->
      <!-- ======================================================= -->
      <div class="card-container">
        <div class="card-left">
          <img src="@/assets/image/hospital1.png" alt="image" />
        </div>
        <div class="card-right">
          <div class="title">
            <span class="title-hospital">Royal Phnom Penh Hospital</span>
            <el-divider />
          </div>
          <div class="information mb-4">
            <div><strong>Open: Monday-Sunday 24/7</strong></div>
            <div><strong>Location: BP 511, Phum Tropeang Chhuk (Borey Sorla) Sangtak, Street 371, Phnom Penh</strong></div>
          </div>
          <div class="rate mb-4">
            <el-rate
              size="large"
              v-model="value"
              disabled
              show-score
              text-color="#ff9900"
              score-template="{value} points"
            />
            <el-divider />
          </div>
          <div class="contact-information">
            <div class="mb-4 mt-1">
              <el-button type="warning">Contact</el-button>
              <el-button type="warning" @click="dialogFormVisible = true">Booking</el-button>
              <el-button type="warning">Location</el-button>
            </div>
          </div>
          <!-- ==========alert form booking========== -->
          <el-dialog
            class="booking"
            v-model="dialogFormVisible"
            title="Get An Appointment"
            width="700"
            align-center
          >
            <el-form :model="form" :rules="formRules" label-width="auto" style="max-width: 700px">
              <el-form-item label="Full Name" prop="fullname">
                <el-input v-model="form.fullname" />
              </el-form-item>
              <el-form-item label="Phone Number" prop="phone_number">
                <el-input v-model="form.phone_number" type="number"/>
              </el-form-item>
              <el-form-item label="Age" prop="age">
                <el-input v-model="form.age" type="number"/>
              </el-form-item>
              <el-form-item label="Gender" prop="gender">
                <el-radio-group v-model="form.gender">
                  <el-radio border value="Men">Men</el-radio>
                  <el-radio border value="Women">Women</el-radio>
                </el-radio-group>
              </el-form-item>
              <el-form-item label="Department" prop="department">
                <el-select v-model="form.department" placeholder="please select department">
                  <el-option label="ICU: Intensive Care Unit" value="1" />
                  <el-option label="ASU: Ambulatory Surgery Unit" value="2" />
                  <el-option label="ED or ER: Emergency Department or Emergency Room" value="3" />
                  <el-option label="L&D: Labor and Delivery" value="4" />
                  <el-option label="Med-Surg: Medical-Surgical Unit" value="5" />
                </el-select>
              </el-form-item>
              <el-form-item label="Doctor" prop="doctor">
                <el-select v-model="form.doctor" placeholder="please select doctor">
                  <el-option label="Radit Thy" value="Radit Thy" />
                  <el-option label="Rath Samrath" value="Rath Samrath" />
                  <el-option label="Phal Him" value="Phal Him" />
                  <el-option label="Sreynang Rith" value="Sreynang Rith" />
                  <el-option label="Bour Klan" value="Bour Klan" />
                  <el-option label="Leysreng Ol" value="Leysreng Ol" />
                </el-select>
              </el-form-item>
              <el-form-item label="Appointment Date" prop="date">
                <el-col :span="11">
                  <el-date-picker
                    v-model="form.date"
                    type="date"
                    placeholder="Pick a date"
                    style="width: 100%"
                  />
                </el-col>
                <el-col :span="2" class="text-center">
                  <span class="text-gray-500">-</span>
                </el-col>
                <el-col :span="11">
                  <el-time-picker
                    v-model="form.time"
                    placeholder="Pick a time"
                    style="width: 100%"
                  />
                </el-col>
              </el-form-item>
            </el-form>
            <template #footer>
              <div class="dialog-footer">
                <el-button @click="dialogFormVisible = false">Cancel Booking</el-button>
                <el-button type="warning" @click="dialogFormVisible = false">
                  Confirm Booking
                </el-button>
              </div>
            </template>
          </el-dialog>
        </div>
      </div>
      <!-- ======================================================= -->
                      <!-- comment information-->
      <!-- ======================================================= -->
      <div class="container main-comment">
        <div class="comment-form mt-3">
          <el-form
            class="form-comment mt-4"
            :model="form"
            label-width="auto"
            style="max-width: 2000px"
          >
            <el-form-item>
              <el-input
                v-model="form.desc"
                type="textarea"
                placeholder="Write your comment here!"
              />
            </el-form-item>
            <el-form-item>
              <el-button type="warning" @click="onSubmit">Submit</el-button>
              <el-button type="primary">Cancel</el-button>
            </el-form-item>
          </el-form>
        </div>
        
        <div class="demo-collapse mt-4">
          <el-collapse v-model="activeNames" @change="handleChange">
            <el-collapse-item title="Comments" name="1">
              <div class="comment-container p-3 mt-2" v-for="comment in comments" :key="comment.id">
                <div class="comment-left d-flex flex-column p-2">
                  <div class="demo-type">
                    <el-avatar :size="70">
                      <img :src="comment.avatar" />
                    </el-avatar>
                  </div>
                </div>
                <div class="comment-right p-2">
                  <div class="information">
                    <div>
                      <p><strong>{{ comment.name }}</strong> . <span>{{ comment.time }}</span></p>
                    </div>
                    <div>
                      <p>{{ comment.content }}</p>
                    </div>
                    <div>
                      <el-rate
                        v-model="comment.value"
                        disabled
                        show-score
                        text-color="#ff9900"
                        score-template="{value} points"
                      />
                    </div>
                    <div class="mt-2">
                      <el-button
                        v-for="button in buttons"
                        :key="button.text"
                        :type="button.type"
                        text
                        bg
                      >
                        {{ button.text }}
                      </el-button>
                    </div>
                  </div>
                </div>
              </div>
            </el-collapse-item>
          </el-collapse>
        </div>
      </div>
    </div>
  </WebLayout>
</template>

<script setup lang="ts">
import WebLayout from '@/Components/Layouts/WebLayout.vue'
import { ref, reactive } from 'vue'
import { ElMessage } from 'element-plus'

const dialogFormVisible = ref(false)
const form = reactive({
  fullname: '',
  phone_number: '',
  age: '',
  gender: '',
  department: '',
  doctor: '',
  date: '',
  time: ''
})

const buttons = [
  {
    text: 'Reply',
    type: 'primary'
  },
  {
    text: 'Like',
    type: 'warning'
  },
]
const formRules = reactive({
  fullname: [
    { required: true, message: 'Please enter your full name', trigger: 'blur' }
  ],
  phone_number: [
    { required: true, message: 'Please enter your phone number', trigger: 'blur' }
  ],
  age: [
    { required: true, message: 'Please enter your age', trigger: 'blur' }
  ],
  gender: [
    { required: true, message: 'Please select your gender', trigger: 'change' }
  ],
  department: [
    { required: true, message: 'Please select a department', trigger: 'change' }
  ],
  doctor: [
    { required: true, message: 'Please select a doctor', trigger: 'change' }
  ],
  date: [
    { required: true, message: 'Please select an appointment date', trigger: 'change' }
  ],
  time: [
    { required: true, message: 'Please select an appointment time', trigger: 'change' }
  ]
})

const comments = [
  {
    id: 1,
    name: 'Florida',
    time: '30 min ago',
    content: 'To highlight a number or a group of numbers...',
    avatar: 'https://dl.memuplay.com/new_market/img/com.vicman.newprofilepic.icon.2022-06-07-21-33-07.png',
    value: 4.5
  },
  {
    id: 2,
    name: 'Radit Thy',
    time: '1h ago',
    content: 'To highlight a number or a group of numbers...',
    avatar: 'https://media.licdn.com/dms/image/D5603AQGCCYbUstS9xg/profile-displayphoto-shrink_400_400/0/1718211706383?e=1724889600&v=beta&t=AsGCwsdVHSL4a9JCH2ucQwk3JNZtcsX9KymwXSkAKYk',
    value: 4.2
  },
  {
    id: 3,
    name: 'Rath Samrath',
    time: '1 day ago',
    content: 'To highlight a number or a group of numbers...',
    avatar: 'https://media.licdn.com/dms/image/D5603AQFJJOAM6AAM-Q/profile-displayphoto-shrink_400_400/0/1704010367613?e=1724889600&v=beta&t=lT_OdIqbG4SCKpu95R71jbp9ZqEGVhglDVTitXqp7GA',
    value: 4.8
  },
]

const onSubmit = () => {
  // Logic for form submission can be added here
}
</script>

<style scoped>
.container {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  margin-top: 50px;
}

.card-container {
  width: 90%;
  height: 100vh;
  display: flex;
  margin-top: 20px;
  border-radius: 20px;
}

.comment-container {
  background: linear-gradient(to right, rgba(249, 249, 249, 0.8), rgba(239, 234, 234, 0.2));
  border-radius: 8px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 2px 4px rgba(0, 0, 0, 0.06);
  height: 30vh;
  display: flex;
}

.card-left,
.card-right {
  width: 50%;
}

.card-left img {
  height: 100%;
}

.card-left {
  background: #878484;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.card-right {
  background: #fcb22d;
  display: flex;
  flex-direction: column;
  padding: 60px;
}

.card-header {
  width: 100%;
  height: 20%;
  display: flex;
  justify-content: center;
}

.title-hospital {
  font-size: 70px;
  font-weight: bold;
}

.title {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  margin-bottom: 20px;
}

.item {
  margin-top: 10px;
  margin-right: 30px;
}

.demo-collapse {
  width: 100%;
}

.form-comment {
  width: 97%;
  margin: 0 auto;
}

.comment-form {
  width: 100%;
  height: 23vh;
  background: linear-gradient(to right, rgba(249, 249, 249, 0.8));
  box-shadow: 0 4px 6px rgba(167, 167, 167, 0.1), 0 2px 4px rgba(255, 255, 255, 0.06);
}

.main-comment {
  width: 90%;
  box-shadow: 0 4px 6px rgba(167, 167, 167, 0.1), 0 2px 4px rgba(255, 255, 255, 0.06);
}

</style>
