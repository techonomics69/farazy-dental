<template>
    <div class="appointments">
        <div class="row">
            <form v-on:submit.prevent="getAppointmentLists">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Select Doctor</label>
                        <v-select class="vue-select2" name="select2"
                                  :options="doctors" v-model="doctor"
                                  :searchable="true" language="en-US"
                                  v-bind:on-change="setDoctorId"
                        >
                            <option value="">Select Doctor</option>
                        </v-select>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Select Date</label>
                        <input type="text" autocomplete="off" v-model="appointmentDate" class="form-control datepicker"  id="appointmentDate">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-info flat" style="margin-top: 25px">Search</button>
                        <button type="button" class="btn btn-success flat" style="margin-top: 25px" v-on:click="getAllAppointments">All</button>
                    </div>
                </div>
            </form>
        </div>
        <p class="text-right">
            <a v-if="appointments.length" :href="downloadUrl" class="btn btn-sm btn-primary" target="_blank"><i class="fa fa-download"></i> Download</a>
        </p>
        <table class="table table-bordered" id="appointmentList" v-if="appointments.length">
            <thead>
            <tr>
                <th style="width: 50px">SL</th>
                <th>Doctor Name</th>
                <th>Patient Name</th>
                <th>Contact</th>
                <th>Date</th>
                <th>SL</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(item,index) in appointments">
                <td>{{ index+1 }}</td>
                <td>{{ item.doctor.name }}</td>
                <td>{{ item.patient_name }}</td>
                <td>{{ item.contact_no }}</td>
                <td>{{ item.appointment_date }}</td>
                <td>{{ item.sl_no }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props: ['items'],
        data: function() {
            return {
                doctor: "",
                appointmentDate: "",
                appointments: [],
                doctors: [],
                doctorId: "",
                selectedD: "",
                downloadUrl: "",
            };
        },

        methods: {
            customFormatter(date) {
                return moment(date).format('YYYY-MM-DD');
            },
            setDoctorId: function(val){
                this.doctorId = val.value;
            },
            getAppointmentLists: function(){
                this.appointmentDate = document.getElementById("appointmentDate").value;
                console.log(this.doctorId);
                console.log(this.appointmentDate);

                if(!this.doctorId || !this.appointmentDate){
                    console.log("Entered Here");
                    return;
                }
                var app = this;
                var date = this.customFormatter(app.appointmentDate);
                this.appointments = [];
                axios.get('/all-appointment-list/' + app.doctorId + '/' + app.appointmentDate)
                    .then(response => {
                       app.appointments = response.data.appointments;
                       app.downloadUrl = "download/appointments/"  + app.doctorId + '/' + app.appointmentDate;
                    })
                    .catch(e => {
                        this.errors.push(e)
                    });
            },
            setOptionsData: function(doctors){
                let doctorsData = [];
                for (let i=0; i<doctors.length; i++){
                    let p = {
                        label: doctors[i].name,
                        value: doctors[i].id
                    };
                    doctorsData.push(p);
                }
                this.doctors = doctorsData;
            },
            getAllAppointments: function(){
                this.appointments = this.items.appointments;
                this.downloadUrl = "download/all-appointments";
            }
        },
        created: function() {
            this.setOptionsData(this.items.doctors);
            this.appointments = this.items.appointments;
        },
        mounted() {

        },

    }
</script>
