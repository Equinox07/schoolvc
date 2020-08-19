<template>
  <div class="container">
      <h1 class="display-4">Welcome</h1>
      <div class="col-lg-12">
          <div class="card">
              <div class="card-header">What would you like to do</div>
              <div class="card-body">
                  <button class="btn btn-primary">Generate Card</button>
                  <button @click="registerStudent()"  class="btn btn-info">Register Student</button>
              </div>
          </div>
      </div>
      <div class="row mt-5">
          <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    Cards Generated 0
                </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    Students 0
                </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    Active 0
                </div>
            </div>
          </div>
      </div>

      <modal name="register-student"
            :width="500"
         :height="500"
         :adaptive="true"
      
      >
       <div>
           <div class="card">
               <div class="card-header">
                   ENTER STUDENT DETAILS
               </div>
               <div class="card-body">
                   <form action="">
                       <div class="form-group">
                           <label for="">Institution Name</label>
                            <select v-model="student.school_id" class="form-control"  >
                                <option :value="null"  >Select Institution</option>
                                <option :value="school.id" v-for="(school, index) in schools" :key="index" > {{school.name}}</option>
                               
                            </select>
                       </div>
                       <div class="form-group">
                           <label for="">Student First Name</label>
                           <input type="text" class="form-control" >
                       </div>
                       <div class="form-group">
                           <label for="">Last Name</label>
                           <input type="text" class="form-control" >
                       </div>
                       <div class="form-group">
                            <label for="">Student Mobile</label>
                           <input type="text" class="form-control" >
                       </div>
                       <div class="form-group">
                             <label for="">Voucher Code</label>
                           <input type="text" class="form-control" >
                       </div>
                       <button @click="saveStudent()" class="btn btn-primary">Register</button>
                   </form>
               </div>
           </div>
       </div>
    </modal>
  </div>
</template>

<script>
export default {
    data() {
        return {
            student:{
                firstname: '',
                lastname: '',
                mobile: '',
                school_id: '',
                card: {}
            },
            card: {},
            schools: {},
            vouchers:{}
        }
    },
    methods: {
        generateCard(){
            console.log("Voucher Generated...", this.card);
        },
        registerStudent(){
            this.$modal.show('register-student');
        },
        saveStudent(){
            console.log("Register Student", this.student)
        },
       async loadSchool() {
             await axios.get('api/schools')
                    .then(({data}) => {
                        this.schools = data;
                        console.log(this.schools)
                    }).catch(({response}) => {
                        console.log(response)
                    })
        },
        async loadVouchers(){
            await axios.get('api/vouchers')
                    .then(({data}) => {
                        this.vouchers = data;
                        console.log(this.vouchers)
                    }).catch(({response}) => {
                        console.log(response)
                    })
        }
    },
    mounted() {
        this.loadSchool();
        this.loadVouchers();
    },

}
</script>

<style>

</style>