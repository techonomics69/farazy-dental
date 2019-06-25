<template>
    <div class="prescription-details">
        <h3 class="box-title">WRITE YOUR PRESCRIPTION DETAILS</h3>
        <div class="row">
            <div class="col-md-4">
                <ul class="nav customtab nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#medicine" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs">Medicine</span></a></li>
                    <li role="presentation" class=""><a href="#test" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Test</span></a></li>
                    <li role="presentation" class=""><a href="#advice" aria-controls="messages" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-email"></i></span> <span class="hidden-xs">Advice</span></a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="medicine">
                        <div class="form-grup">
                            <input type="text" class="form-control" placeholder="Search Medicine" v-model="medicineText" @keyup="searchMedicines">
                        </div>
                        <ul class="list-group" v-if="filteredMedicines.length" >
                            <li class="list-group-item" v-for="(medicine,index) in filteredMedicines"  v-on:click="selectMedicine(index)" v-if="index < 10">
                                {{ medicine.item_name }}
                            </li>
                        </ul>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="test">
                        <div class="form-grup">
                            <input type="text" class="form-control" placeholder="Search Medicine" v-model="testText" @keyup="searchTests">
                        </div>
                        <ul class="list-group" v-if="filteredTests.length" >
                            <li class="list-group-item" v-for="(test,index) in filteredTests"  v-on:click="selectTest(index)" v-if="index < 10">
                                {{ test.name }}
                            </li>
                        </ul>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="advice">
                        <div class="form-grup">
                            <input type="text" class="form-control" placeholder="Search Medicine" v-model="adviceText" @keyup="searchAdvice">
                        </div>
                        <ul class="list-group" v-if="filteredAdvices.length" >
                            <li class="list-group-item" v-for="(advice,index) in filteredAdvices"  v-on:click="selectAdvice(index)" v-if="index < 10">
                                {{ advice.name }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <table class="table table-bordered mb-15">
                    <thead>
                    <tr>
                        <th colspan="5">Medication</th>
                    </tr>
                    <tr>
                        <th class="width-50">X</th>
                        <th>Medicine Name</th>
                        <th>Doses</th>
                        <th>Duration</th>
                        <th>Before Eat</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-if="medicineLists.length" v-for="(medicine,index) in medicineLists">
                        <td><span class="remove" v-on:click="deSelectMedicine(index)">X</span></td>
                        <td>
                            <input type="hidden" :name="'medicine['+ index +'][id]'" v-model="medicineLists[index].id">
                            {{ medicine.item_name }}
                        </td>
                        <td><input type="text" :name="'medicine['+ index +'][doses]'" class="form-control table-input" v-model="medicineLists[index].doses" required></td>
                        <td><input type="number" :name="'medicine['+ index +'][duration]'" class="form-control table-input" v-model="medicineLists[index].duration" required></td>
                        <td><input type="checkbox" :name="'medicine['+ index +'][before]'" class="form-control table-input" v-model="medicineLists[index].checked" :value="medicineLists[index].checked"></td>
                    </tr>
                    </tbody>
                </table>
                <table class="table table-bordered mb-15">
                    <thead>
                    <tr>
                        <th class="width-50"><span class="remove">X</span></th>
                        <th>Necessary Test</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-if="testLists.length" v-for="(test,index) in testLists">
                        <td><span class="remove" v-on:click="deSelectTest(index)">X</span></td>
                        <td>
                            <input type="hidden" :name="'tests['+ index +'][id]'" v-model="testLists[index].id">
                            {{ test.name }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <table class="table table-bordered mb-15">
                    <thead>
                    <tr>
                        <th class="width-50"><span class="remove"  v-on:click="de(index)">X</span></th>
                        <th>Necessary Advices</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-if="adviceLists.length" v-for="(advice,index) in adviceLists">
                        <td><span class="remove" v-on:click="deSelectAdvice(index)">X</span></td>
                        <td>
                            <input type="hidden" :name="'advice['+ index +'][id]'" v-model="adviceLists[index].id">
                            {{ advice.name }}
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</template>

<script>

    export default {
        props: ['items'],

        data: function() {

            return {
                medicines: [],
                filteredMedicines: [],
                tests:[],
                filteredTests:[],
                advices:[],
                filteredAdvices:[],
                medicineLists: [],
                testLists: [],
                adviceLists: [],
                medicineText: "",
                testText: "",
                adviceText: ""
            };
        },

        methods: {
            selectMedicine: function (index) {
                let item = this.filteredMedicines[index];
                item.doses = "";
                item.duration = "";
                item.checked = false;
                this.medicineLists.push(item);
                this.filteredMedicines.splice(index,1);
                this.removeItem(item.id);
            },
            selectTest: function (index) {
                let item = this.filteredTests[index];
                this.testLists.push(item);
                this.filteredTests.splice(index,1);
                this.removeTest(item.id);
            },
            selectAdvice: function (index) {
                let item = this.filteredAdvices[index];
                this.adviceLists.push(item);
                this.filteredAdvices.splice(index,1);
                this.removeTest(item.id);
            },

            deSelectMedicine: function (index) {
                let item = this.medicineLists[index];

                delete item.doses;
                delete item.duration;
                delete item.checked;
                //this.filteredMedicines.push(item);
                this.medicineLists.splice(index,1);
                this.addItem(item);
            },
            deSelectTest: function (index) {
                let item = this.testLists[index];
                this.testLists.splice(index,1);
                this.addTest(item);
            },
            deSelectAdvice: function (index) {
                let item = this.adviceLists[index];
                this.adviceLists.splice(index,1);
                this.addAdvice(item);
            },

            removeItem(id){
                for(let i=0; i<this.medicines.length; i++){
                    if(this.medicines[i].id == id){
                        this.medicines.splice(i,1);
                    }
                }
            },
            removeTest(id){
                for(let i=0; i<this.tests.length; i++){
                    if(this.tests[i].id == id){
                        this.tests.splice(i,1);
                    }
                }
            },
            removeAdvice(id){
                for(let i=0; i<this.advices.length; i++){
                    if(this.advices[i].id == id){
                        this.advices.splice(i,1);
                    }
                }
            },

            addItem(item){
                this.medicines.push(item);
            },
            addTest(item){
                this.tests.push(item);
            },
            addAdvice(item){
                this.advices.push(item);
            },

            searchMedicines(){
                var app = this;
                if(this.medicineText.length){
                    this.filteredMedicines = [];
                    this.filteredMedicines = this.medicines.filter((item) => {
                        return item.item_name.toUpperCase().search(app.medicineText.toUpperCase()) != -1;
                    });
                }else {
                    this.filteredMedicines = this.medicines;
                }
            },
            searchTests(){
                var app = this;
                if(this.testText.length){
                    this.filteredTests = [];
                    this.filteredTests = this.tests.filter((item) => {
                        return item.name.toUpperCase().search(app.testText.toUpperCase()) != -1;
                    });
                }else {
                    this.filteredTests = this.tests;
                }
            },
            searchAdvice(){
                var app = this;
                if(this.adviceText.length){
                    this.filteredAdvices = [];
                    this.filteredAdvices = this.tests.filter((item) => {
                        return item.name.toUpperCase().search(app.adviceText.toUpperCase()) != -1;
                    });
                }else {
                    this.filteredAdvices = this.advices;
                }
            },

        },
        created: function() {
            this.medicines = this.items.medicines;
            this.filteredMedicines = this.items.medicines;

            this.tests = this.items.tests;
            this.filteredTests = this.items.tests;

            this.advices = this.items.advices;
            this.filteredAdvices = this.items.advices;

            console.log(this.advices);
            console.log(this.tests);
            console.log(this.filteredAdvices);
            console.log(this.filteredTests);

        },
        mounted() {

        },


    };
</script>