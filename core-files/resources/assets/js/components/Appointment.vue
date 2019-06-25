<template>
    <div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Patient Name</label>
                    <input type="text" name="patient_name" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Mobile No</label>
                    <input type="text" name="contact_no" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Appointment Date</label>
                    <datepicker v-model="appointmentsDate" input-class="form-control" :disabledDates="disabledDates" @selected="selectDate"></datepicker>
                    <input type="hidden" name="appointment_date" :value="appointmentDate">
                    <!--<input id="appointment-date" type="text" name="appointment_date" class="form-control datepicker" autocomplete="off" required>-->
                </div>
            </div>
        </div>
        <div class="appointment-list">
            <div class="form-group">
                <label class="radio-inline col-sm-4 col-md-2" v-for="i in max_appointment">
                    <input type="radio" name="sl_no" :disabled="serialExist(i)" :value="i">SL {{ i }}
                </label>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['disabled_days'],
        data: function() {
            return {
                serials: [],
                max_appointment: 0,
                appointmentsDate: new Date(),
                disabledDates: {
                    days: [],
                },
                appointmentDate: moment(new Date()).format('YYYY-MM-DD'),
            };
        },

        methods: {
            selectDate: function(date){
                this.appointmentDate = moment(date).format('YYYY-MM-DD');
                this.loadSchedule();
                console.log(this.appointmentDate);
            },
            loadSchedule: function(){
                if(!this.appointmentDate){
                    this.serials = [];
                    this.max_appointment = 0;
                    return;
                }
                var app =this;
                var did = document.getElementById('doctor_id').value;

                axios.get('/all-appointment/' + did + '/' + this.appointmentDate)
                    .then(response => {
                        app.max_appointment = response.data.max_appointment;
                        app.serials = response.data.serials;
                    })
                    .catch(e => {
                        this.errors.push(e)
                    });
            },

            serialExist: function (i) {
                if(this.serials.includes(i)){
                    console.log(i);
                    return true;
                }else{
                    return false;
                }
            }

        },
        created: function() {
            let days = [0,1,2,3,4,5,6];
            const app = this;
            const visibleDates = this.disabled_days.map(function(v,i){
                return parseInt(v);
            });
            this.disabledDates.days = visibleDates.length ? days.filter(function(val){
                return visibleDates.indexOf(val) < 0;
            }) : [];
            this.selectDate();
        },
        mounted() {

        },

    }
</script>
