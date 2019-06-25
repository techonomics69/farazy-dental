<template>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-9 blog-pull-right">
                    <div class="row multi-row-clearfix">
                        <div class="col-sm-6 col-md-4 mb-60 sm-text-center" v-for="specialist in displayedDoctors">
                            <div class="team maxwidth400">
                                <div class="thumb"><img class="img-fullwidth" :src="specialist.photo" alt=""></div>
                                <div class="content border-1px p-15 bg-white-light">
                                    <h4 class="name mb-0 mt-0">{{ specialist.name }}</h4>
                                    <h6 class="title mt-0" v-if="specialist.department">{{ specialist.department.title }}</h6>
                                    <h6 class="title mt-0">{{ specialist.specialization }}</h6>
                                    <p class="mb-30"></p>
                                    <a class="btn btn-theme-colored btn-sm pull-right flip" :href="'get-appointment/' + specialist.id ">Get Appointment</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <nav>
                                <paginate
                                        :page-count="pageCount"
                                        :click-handler="paginate"
                                        :prev-text="'Prev'"
                                        :next-text="'Next'"
                                        :container-class="'pagination theme-colored pull-right pull-sm-center'">
                                </paginate>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3">
                    <div class="sidebar sidebar-left mt-sm-30">
                        <div class="widget">
                            <h5 class="widget-title line-bottom">Select Departments</h5>
                            <ul class="list list-divider list-border" v-if="departments.length">
                                <li v-for="department in departments">
                                    <div class="form-group checkbox-inline">
                                        <input type="checkbox" class="checkbox" @click="togleDepartment(department.id)">
                                        <label>{{ department.title }}</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        props: ['specialists'],
        data: function() {

            return {
                departments: [],
                doctors: [],
                checkedDepartments: [],
                filteredDoctors: [],
                displayedDoctors:[],
                totalItem: 0,
                pageCount: 0,
            };
        },

        methods: {
            togleDepartment: function (val) {
                console.log(val);
                if(this.checkedDepartments.includes(val)){
                    let i = this.checkedDepartments.indexOf(val);
                    this.checkedDepartments.splice(i,1);
                }else{
                    this.checkedDepartments.push(val);
                }
                this.getDoctorList();
                console.log(this.doctors);
            },
            getDoctorList: function () {
                this.filteredDoctors = [];
                var app = this;
                if(this.checkedDepartments.length > 0){
                    this.filteredDoctors = this.doctors.filter(function(item){
                        if(item.department){
                            if(app.checkedDepartments.includes(item.department.id)){
                                return true;
                            }
                        }else{
                            return false;
                        }
                    });
                }else{
                    this.filteredDoctors = this.doctors;
                }
                this.initializePagination();
            },
            initializePagination: function(){
                this.totalItem = this.filteredDoctors.length;
                this.pageCount = Math.ceil(this.totalItem/10);
                if(this.totalItem > 10){
                    this.displayedDoctors = this.filteredDoctors.slice(0,9);
                    console.log(this.filteredDoctors);
                }else{
                    this.displayedDoctors = this.filteredDoctors;
                }
            },
            paginate: function (pageNo) {
                var startIndex = (pageNo -1) * 10;
                var lastIndex = startIndex + 9;
                this.displayedDoctors = this.filteredDoctors.slice(startIndex,lastIndex);
            }

        },
        created: function() {
            this.doctors = this.specialists.doctors;
            this.departments = this.specialists.departments;
            this.getDoctorList();
        },
        mounted() {
            console.log('Component mounted');
        },
    }
</script>
