props:['our_classes'],

        data: function() {
            return {
                students: [],
                academicClasses: [],
                formData: {
                    year: "",
                    numberOfStudent: 0,
                    classId: ""
                    
                },
                alertClasses: 'alert alert-success fade in',
                alertText: null,
                formCreating: true,
                editId : null,
                editIndex : null,
            };
            
        },

        methods: {
            showAll: function(){
                var app = this;
                axios.get('wirehouse/get_all_student')
                .then(result => {
                    console.log(result.data);
                })
                .catch(e => {
                    this.errors.push(e)
                });
            },

            findStudents: function(){
                if(this.formData.year != ""){
                     var app =this;
                    axios.get('wirehouse/get-student-strength/' + app.formData.year)
                        .then(result => {
                            app.students = result.data.students;
                            //console.log(result.data.students);
                        })
                        .catch(e => {
                            this.errors.push(e)
                        });
               }
            },

            saveStudent: function(){
                if(this.formCreating){
                    this.save();
                }else{
                    //console.log(this.formData);
                    this.update();
                }
                
            },
            closeAlert: function(){
                this.alertText = null;
                this.alertClasses =  'alert alert-success fade in';
            },
            selectStudent: function(index){
                let student = this.students[index];
                this.formData.classId= student.class_id;
                this.formData.year = student.year;
                this.formData.numberOfStudent = student.quantity;
                this.formCreating = false;
                this.editId = student.id;
                this.editIndex = index;
                //console.log(this.formData);
            },

            selectDelete: function(index){
                //console.log(this.students[index]);
            },

            cancelEdit: function () {
                this.formCreating =true;
                this.formData.classId = "";
                this.formData.numberOfStudent = 0;
                this.editId =null;
            },
            save: function (){
                var app =this;
                axios.post('wirehouse/save-students' ,app.formData)
                    .then(result => {
                        app.alertText = result.data.message;
                        if(result.data.status == 'exist'){
                            app.alertClasses = "alert alert-warning fade in";
                        }else{
                            app.students.push(result.data.new_student);
                        }

                        //app.findStudents();
                        app.formData.classId = "";
                        app.formData.numberOfStudent = 0;
                    })
                    .catch(e => {
                        this.errors.push(e)
                    });
            },
            update: function(){
                
                var app =this;
                //console.log(this.formData);
                //return;

                axios.post('wirehouse/update-students/' + app.editId ,app.formData)
                    .then(result => {
                        app.alertText = result.data.message;
                        if(result.data.status == 'failed'){
                            app.alertClasses = "alert alert-danger fade in";
                        }else{
                            console.log(result.data);
                            app.students.splice(app.editIndex,1,result.data.new_student);
                            app.formCreating = true;
                        }

                        
                        app.formData.classId = "";
                        app.formData.numberOfStudent = 0;
                    })
                    .catch(e => {
                        this.errors.push(e)
                    });
            }
           

            

        },
        created: function() {
            this.academicClasses = this.our_classes;
        },
        mounted() {
            
        },