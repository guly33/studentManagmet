console.log(role);
console.log(loggedId);
displayByRole(role);
function displayByRole(role) {
    // body...
        if (role == 2) {
            $(".owner").hide();
            $(".manager").hide();
        }
        if (role == 1) {
            $(".owner").hide();
        }

}
if (mode == 'admin') {

    var roleSelect = document.getElementsByClassName("roleSelect"),
        adminNav = document.querySelector("#users"),
        addUserBtn = document.querySelector("#addUserBtn");

    for(var k = 0; k < roleSelect.length; k++){

        for (var i = 0; i < roleArr.length; i++) {
            var option = document.createElement("option");
            option.setAttribute("value", i);
            option.textContent = roleArr[i];
            roleSelect[k].add(option);
        }

    }
 
    adminInit();
    function adminInit() {
        for (var i = 0; i < usersArr.length; i++) {
            $(".controlDiv").addClass("hide");
            
            var button = document.createElement("button");
            var role = document.createElement("span");
            var name = document.createElement("span");
            roleArr.forEach( function(el, k) {
                // statements
                if (k == usersArr[i].role) {
                    role.textContent = el;
                }
            });

            name.classList.add("userName");
            role.classList.add("userRole");
            button.id = "u-" + usersArr[i].id;
            button.classList.add("btn");
            button.classList.add("userBtn");
            name.textContent = usersArr[i].name;
            button.appendChild(name);
            button.appendChild(role);
            adminNav.appendChild(button);
            

        }
        adminAddEvents()
    }

    function adminAddEvents() {

        $("#editUserFormContainer").hide();
        $(".userAlerts").hide();
        $(".validAlerts").hide();
        $("#addUserBtn").on("click", function () {
            /* body... */
            $(".controlDiv").addClass("hide");
            $(".addUser").toggleClass("hide show");
        });
        $(".userBtn").on("click", function() {
            /* body... */
            getUserInfo(this.id);
            $(".editUserBtn").show();
            $(".controlDiv").addClass("hide");
            // $(".userInfo").addClass(".stretchLeft");
            // $(".userInfo").addClass("one");
            $(".userInfo").toggleClass("hide show");
        });
        $(".editUserBtn").on("click", function() {
            /* body... */
            $(this).hide();
            $("#editUserFormContainer").show("slow");
        });
        $(".deleteUserBtn").unbind('click').on("click", function() {
            /* body... */
            userId = document.querySelector("#userEditId");
            userId = userId.value;
            console.log(userId);
            deleteUser(userId);
        });
    }

    function getUserInfo(t) {
        // body...
        var thisId = t.slice(2);
        for (var i = 0; i < usersArr.length; i++) {
            if (thisId == usersArr[i].id) {
                displayUserInfo(usersArr[i]);
            }
        }
    }

    function displayUserInfo(user) {
        // body...
        // console.log(student);
        var img = document.querySelector("#userImg"),
            fullName = document.querySelector("#user"),
            email = document.querySelector("#userMail"),
            cellphone = document.querySelector("#userCellphone"),
            userId = document.querySelector("#userEditId");

        img.setAttribute("src", user.image);
        userId.setAttribute("value", user.id);
        fullName.textContent = user['name'];
        email.textContent = user.mail;
        cellphone.textContent = user.phone;

        adminAddEvents();
        setUsersEdit(user);
    }


    function setUsersEdit(user) {
        // body...  
        if (role == "2") {
            $(".owner").hide();
            $(".manager").hide();
        }
        var userName = document.querySelector("#newUserName"),
            userEmail = document.querySelector("#newUserEmail"),
            userPassword = document.querySelector("#newPassword"),
            userPhone = document.querySelector("#newUserPhone"),
            userRole = document.querySelector("#roleEdit"),
            userImg = document.querySelector("#newUserImageToUpload");

        userName.setAttribute("value", user.name);
        userEmail.value = user.mail;
        userPhone.value = user.phone;
        userImg.value = '';

        userId = user.id;
        if (user.id != loggedId) {            
            if (role == "1" && user.role == "1") {
                $(".editUser").hide();
            }
        }
        if (user.id == loggedId && role == "2") {
            $(".editUser").show();
        }
        for (var i = 0; i < roleArr.length; i++) {
            if (user.role == i) {
                userRole[i].selected = "selected";
            }
        }

    }

    //DELETE STUDENT
    function deleteUser(u) {
        $('#confirmDeleteUser').on('click', function() {
            /* body... */
            console.log('clicked');
            deleteUserFromArray(u);
            deleteUserFromDB(u);
            $("#deleteUserSucsses").show("slow");
            dismissAlert('user');

        });


    }

    function deleteUserFromArray(u) {

        for (var i = 0; i < usersArr.length; i++) {
            if (usersArr[i].id == u) {
                usersArr.splice(i, 1);
                $('.userBtn').remove();
                adminInit();
            }
        }


    }

    function deleteUserFromDB(u) {
        info = {
            userId: u,
        }

        $.ajax({
            type: 'POST',
            datatype: 'json',
            data: info,
            url: "http://localhost/john_bryce/smsV1/includes/handlers/deleteUserHandler.php",
            success: function(data) {
                console.log("db response:", data);
            },
            error: function(error) {
                console.log("error : ", error);
            }

        });
    }


    //USER VALIDATIONS
    var error;

    function displayError(error) {
        /* body... */
        $(".validAlerts").text(error);
        $(".validAlerts").show("slow");
        console.log(error);
    }


    function userValid(form) {
        $(".validAlerts").hide();    
        console.log(form);
        var error;
        res = regexValid(form.userName, form.userEmail, form.password,form.userPhone);

        return res;
    }

    function userEditValid(form) {
        res = regexValid(form.newUserName, form.newUserEmail, form.newPassword,form.newUserPhone);
        return res;
    }

    function regexValid(name, mail, pass, phone) {

        //username
        var patt = /^[a-z\u0590-\u05fe\p{L}\s'.-]+$/i;
        var nameToCheck = name.value,
            res = patt.test(nameToCheck);
        if (!res) {
            error = "name is not valid";
            displayError(error);
            return false;
        }

        //email
        var patt = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        var mailToCheck = mail.value,
            res = patt.test(mailToCheck);
        if (!res) {
            error = "email is not valid";
            displayError(error);
            return false;
        }

        //password 
        if (pass.value.length < 6 && pass.value.length > 0) {
            error = "password shorter then 6 notes";
            displayError(error);
            return false;
        }

        //phone
        var pattLocal = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
        var patteInter = /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
        var phoneToCheck = phone.value,
            res1 = pattLocal.test(phoneToCheck),
            res2 = patteInter.test(phoneToCheck);
        if (!res1) {
            if (!res2) {
                error = "phone is not valid";
                displayError(error);
                return false;
            }
        }

        return true;

    }

}








if (mode == 'school') {

    //JSON DB HANDLER
    var coursesNav = document.querySelector("#courses"),
        studentsNav = document.querySelector("#students"),
        addCourseBtn = document.querySelector(".addCourseBtn"),
        studentCourse;
    initSchool();

    function initSchool() {
        // body...
        for (var i = 0; i < courseArr.length; i++) {
            // console.log(courseArr[i].name);
            var button = document.createElement("button");

            button.id = "c-" + courseArr[i].id;
            button.classList.add("btn");
            button.classList.add("courseBtn");
            button.textContent = courseArr[i].name;
            coursesNav.appendChild(button);

            if (i == 0) {
                displayCourseStudents(courseArr[i][4]);
            }

        }
    }

    //SCHOOL DIVS HANDELRS
    $(document).ready(function() {
        /* body... */
        addEvents();
        coursesList = document.querySelectorAll(".courseBtn");
        getCourseId(coursesList[0].id)
    });

    function coursesInit(courseId) {
        // body...
        var buttonExist = document.getElementsByClassName("studentItem");
        // console.log(buttonExist);
        if (buttonExist.length > 0) {
            $('.studentItem').remove();
        }
        getStudents(courseId);
        getCourseInfo(courseId);
        $(".editCourseBtn").show();
        $(".controlDiv").addClass("hide");
        $(".courseInfo").toggleClass("hide show");
        $(".courseAlerts").hide();
        $(".studentAlerts").hide();
    }

    function addEvents() {
        // body...
        // school events
        $(".controlDiv").addClass("hide");
        $("#editFormContainer").hide();
        $("#editCourseContainer").hide();
        $(".validAlerts").hide();

        $("#addStudentBtn").on("click", function() {
            /* body... */
            var checkBoxArr = $('div.checkCourseContainer.required :checkbox');
            for (var i = 0; i < checkBoxArr.length; i++) {
                checkBoxArr[i].checked = false;
            }

            $(".controlDiv").addClass("hide");
            $(".addStudent").toggleClass("hide show");
        });
        $("#addCourseBtn").on("click", function() {
            /* body... */
            $(".controlDiv").addClass("hide");
            $(".addCourse").toggleClass("hide show");
        });
        $(".courseBtn").unbind('click').on("click", function() {
            /* body... */
            getCourseId(this.id);
        });
        $(".studentBtn").on("click", function() {
            /* body... */
            getStudentInfo(this.id);
            $(".editBtn").show();
            $(".controlDiv").addClass("hide");
            $(".studentInfo").toggleClass("hide show");
        });
        $(".removeBtn").unbind('click').on("click", function() {
            /* body... */
            removeStudentFromCourse(this.id, studentCourse);
        });
        $(".deleteBtn").unbind('click').on("click", function() {
            /* body... */
            courseId = document.querySelector("#courseId");
            courseId = courseId.value;
            console.log(courseId);
            removeCourse(courseId);
        });
        $(".deleteStudentBtn").unbind('click').on("click", function() {
            /* body... */
            studentId = document.querySelector("#studentId");
            studentId = studentId.value;
            console.log(studentId);
            deleteStudent(studentId);
        });
        $(".editBtn").on("click", function() {
            /* body... */
            $(this).hide();
            $("#editFormContainer").show("slow");
        });
        $(".editCourseBtn").on("click", function() {
            /* body... */
            $(this).hide();
            $("#editCourseContainer").show("slow");
        });

    }


    //SCHOOL NAVS HANDLERS
    function getCourseId(t) {
        // body...
        var t = t.slice(2);
        coursesInit(t);
    }

    function getStudents(t) {
        console.log(t);
        for (var i = 0; i < courseArr.length; i++) {
            // console.log(courseArr[i].id);
            if (courseArr[i].id == t) {
                if (courseArr[i][4].length > 0) {
                    displayCourseStudents(courseArr[i][4]);
                }
            }
        }
    }

    //--------------------//
    //DATA DISPLAY FUNCTIONS
    //--------------------//


    //STUDENT DISPLAY FUNCTION
    function displayCourseStudents(arr) {
        // body...

        for (var j = 0; j < arr.length; j++) {
            var div = document.createElement("div");
            var button = document.createElement("button");
            var rmBtn = document.createElement("button");
            var icon = document.createElement("i");

            button.id = "s-" + arr[j].id;
            rmBtn.id = "rs-" + arr[j].id;

            div.classList.add("studentItem")
            button.classList.add("btn");
            button.classList.add("studentBtn");
            button.textContent = arr[j].name;

            rmBtn.classList.add("btn");
            rmBtn.classList.add("removeBtn");
            rmBtn.setAttribute("title", "הסר מקורס");
            rmBtn.setAttribute("type", "submit");
            rmBtn.setAttribute("name", "rmStudent");
            rmBtn.setAttribute("data-toggle", "modal");
            rmBtn.setAttribute("data-target", "#removeStudentConfirm");

            icon.classList.add("fas");
            icon.classList.add("fa-minus");

            rmBtn.appendChild(icon);
            div.appendChild(button);
            div.appendChild(rmBtn);
            studentsNav.appendChild(div);

        }
        addEvents();

    }


    function getStudentInfo(t) {
        // body...
        var thisId = t.slice(2);
        for (var i = 0; i < courseArr.length; i++) {

            for (var k = 0; k < courseArr[i][4].length; k++) {
                studentId = courseArr[i][4][k].id;
                if (thisId == studentId) {
                    displayStudentInfo(courseArr[i][4][k]);
                }
            }

        }
    }

    function displayStudentInfo(student) {
        // body...
        // console.log(student);
        var img = document.querySelector("#studentImg"),
            fullName = document.querySelector("#student"),
            email = document.querySelector("#studentMail"),
            phone = document.querySelector("#studentPhone"),
            courses = document.querySelector("#studentCourses");
        studentId = document.querySelector("#studentId");

        img.setAttribute("src", student.image);
        studentId.setAttribute("value", student.id);
        fullName.textContent = student['name'];
        phone.textContent = student.phone;
        email.textContent = student.mail;

        addEvents();
        setStudentsEdit(student);
    }

    function setStudentsEdit(student) {
        // body...  
        var checkBoxArr = $('div.checkCourseContainer.required :checkbox');
        for (var i = 0; i < checkBoxArr.length; i++) {
            checkBoxArr[i].checked = false;
        }
        var studentCoursesArr = [];
        var studentName = document.querySelector("#newName"),
            studentEmail = document.querySelector("#newEmail"),
            studentPhone = document.querySelector("#newPhone"),
            studentImg = document.querySelector("#newImageToUpload");

        studentName.setAttribute("value", student.name);
        studentEmail.value = student.mail;
        studentPhone.value = student.phone;
        studentImg.value = '';

        studentId = student.id;

        for (var i = 0; i < courseArr.length; i++) {
            for (var k = 0; k < courseArr[i][4].length; k++) {
                if (courseArr[i][4][k].id == studentId) {
                    studentCoursesArr.push(courseArr[i].id);
                }
            }
        }


        for (var i = 0; i < checkBoxArr.length; i++) {
            for (var k = 0; k < studentCoursesArr.length; k++) {
                if (checkBoxArr[i].value == studentCoursesArr[k]) {

                    toCheck = checkBoxArr[i];
                    toCheck.checked = true;
                }
            }
        }
    }

    //COURSE DISPLAY FUNCTION
    function getCourseInfo(t) {
        // body...
        // console.log(thisId);
        for (var i = 0; i < courseArr.length; i++) {

            thisId = courseArr[i].id;
            if (t == thisId) {
                displayCourseInfo(courseArr[i]);
            }
        }
    }

    function displayCourseInfo(course) {
        // body...
        // console.log(course);
        var img = document.querySelector("#courseImg"),
            courseName = document.querySelector("#course"),
            desc = document.querySelector("#courseDesc"),
            phone = document.querySelector(".studentsList"),
            courseId = document.querySelector("#courseId");

        img.setAttribute("src", course.image);
        courseId.setAttribute("value", course.id);

        courseName.textContent = course['name'];
        desc.textContent = course.description;
        $('.students h4').text(course['name']);
        studentCourse = course['name'];
        addEvents();
        setCourseEdit(course);
    }

    function setCourseEdit(course) {
        // body...  
        var courseName = document.querySelector("#editCourseName"),
            courseDesc = document.querySelector("#editDescription");

        courseName.setAttribute("value", course.name);
        courseDesc.value = course.description;

    }

    //---------------//
    //REMOVE FUNCTIONS
    //---------------//

    //DELETE STUDENT
    function deleteStudent(s) {
        $('#confirmDeleteStudent').on('click', function() {
            /* body... */
            console.log('clicked');
            deleteStudentFromArray(s);
            deleteStudentFromDB(s);
            $("#deleteStudentSucsses").show("slow");
            dismissAlert('student');

        });


    }

    function deleteStudentFromArray(s) {

        for (var i = 0; i < courseArr.length; i++) {
            for (var k = 0; k < courseArr[i][4].length; k++) {
                if (courseArr[i][4][k].id == s) {
                    courseArr[i][4].splice(k, 1);
                    $('.courseBtn').remove();
                    initSchool();
                    coursesInit(courseArr[i].id);
                }
            }
        }


    }

    function deleteStudentFromDB(s) {
        info = {
            studentId: s,
        }

        $.ajax({
            type: 'POST',
            datatype: 'json',
            data: info,
            url: "http://localhost/john_bryce/smsV1/includes/handlers/deleStudentHandler.php",
            success: function(data) {
                console.log("db response:", data);
            },
            error: function(error) {
                console.log("error : ", error);
            }

        });
    }
    //REMOVE STUDENT
    function removeStudentFromCourse(t, c) {
        // body...
        var t = t.slice(3);
        $('#confirmRemoveStudent').on('click', function() {
            /* body... */
            console.log('clicked');

            info = {
                studentId: t,
                courseName: c,
            };

            removeStudentFromArr(info);
            removeStudentFromDB(info);
            $("#removeStudentSucsses").show("slow");
            dismissAlert('student');

        });

    }

    function removeStudentFromArr(info) {
        // body...

        // var index = array.indexOf(5);
        // if (index > -1) {
        //   
        // }
        for (var i = 0; i < courseArr.length; i++) {
            courseToCheck = info.courseName;
            if (courseArr[i].name == courseToCheck) {
                console.log('test');
                for (var k = 0; k < courseArr[i][4].length; k++) {
                    console.log('test');
                    if (courseArr[i][4][k].id === info.studentId) {
                        console.log(courseArr[i][4][k].id);
                        courseArr[i][4].splice(k, 1);
                        console.log(courseArr[i].id);
                        $('.courseBtn').remove();
                        initSchool();
                        coursesInit(courseArr[i].id);
                    }
                }
            }

        }
    }

    function removeStudentFromDB(info) {
        // body...
        $.ajax({
            type: 'POST',
            datatype: 'json',
            data: info,
            url: "http://localhost/john_bryce/smsV1/includes/handlers/removeFromCourseHandler.php",
            success: function(data) {
                console.log("db response:", data);
                if (data == '2') {
                    console.log('test');
                    $("#deleteStudentSucsses").show();
                    dismissAlert('student');
                }
            },
            error: function(error) {
                console.log("error : ", error);
            }

        });
    }

    //REMOVE COURSE
    function removeCourse(c) {
        // body...
        $('#confirmRemoveCourse').unbind('click').on('click', function() {
            /* body... */
            console.log('clicked');
            rmFromArr = removeCourseFromArr(c);
            rmFromDB = removecourseFromDB(c);
            if (rmFromArr && rmFromDB) {

            } else {

            }

        });

    }

    function removeCourseFromArr(c) {
        // body...
        for (var i = 0; i < courseArr.length; i++) {

            if (courseArr[i].id == c) {
                if (courseArr[i][4].length < 1) {
                    courseArr.splice(i, 1);
                    $('.courseBtn').remove();
                    initSchool();
                    return true;
                } else {
                    return false;
                }
            }

        }
    }

    function removecourseFromDB(c) {
        // body...
        info = {
            courseId: c,
        }
        $.ajax({
            type: 'POST',
            datatype: 'json',
            data: info,
            url: "http://localhost/john_bryce/smsV1/includes/handlers/removeCourseHandler.php",
            success: function(data) {
                console.log("db response:", data);
                if (data == '2') {
                    $("#removeCourseWarning").show();
                    dismissAlert('course');
                } else {
                    $("#removeCourseSucsses").show();
                    dismissAlert('course');
                }

            },
            error: function(error) {
                console.log("error : ", error);
            }

        });


    }

    //---------//
    //VALIDATIONS
    //---------//

    var error;

    function displayError(error) {
        /* body... */
        $(".validAlerts").text(error);
        $(".validAlerts").show("slow");
        console.log(error);
    }

    //STUDENT VALIDATIONS

    function studentValid(form) {
        $(".validAlerts").hide();
        console.log(form);
        var error;
        res = regexValid(form.studentName, form.email, form.phone);
        if (res) {

            //checkboxes
            var toCheck = $('div.checkCourseContainer.required :checkbox:checked');

            if (toCheck.length <= 0) {
                error = "No courses Checked!";
                displayError(error)
                console.log(toCheck.length);
                return false;
            }
            return true;
        }
        return false;
    }

    function studentEditValid(form) {
        res = regexValid(form.newName, form.newEmail, form.newPhone);
        return res;
    }

    function regexValid(name, mail, phone) {

        //username
        var patt = /^[a-z\u0590-\u05fe\p{L}\s'.-]+$/i;
        var nameToCheck = name.value,
            res = patt.test(nameToCheck);
        if (!res) {
            error = "name is not valid";
            displayError(error);
            return false;
        }
        //email
        var patt = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        var mailToCheck = mail.value,
            res = patt.test(mailToCheck);
        if (!res) {
            error = "email is not valid";
            displayError(error);
            return false;
        }

        //phone
        var pattLocal = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
        var patteInter = /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
        var phoneToCheck = phone.value,
            res1 = pattLocal.test(phoneToCheck);
        res2 = patteInter.test(phoneToCheck);
        if (!res1) {
            if (!res2) {
                error = "phone is not valid";
                displayError(error);
                return false;
            }
        }

        return true;

    }
}

//COURSE VALIDATIONS
    // image upload preview 
function readURL(input) {
    if (input.files && input.files[0]) {
    var reader = new FileReader();

        reader.onload = function(e) {
            $('.toUpload')
                .attr('src', e.target.result)
                .addClass("formImage");
        };

        reader.readAsDataURL(input.files[0]);
    }
}

//UTILITIES
function dismissAlert(type) {
    // body...
    if (type == 'course') {
        setTimeout(function() {
            /* body... */
            $(".courseAlerts").hide("slow");
        }, 3000);
    }

    if (type == 'student') {

        setTimeout(function() {
            /* body... */
            $(".studentAlerts").hide("slow");
        }, 3000);
    }
    if (type == 'user') {

        setTimeout(function() {
            /* body... */
            $(".userAlerts").hide("slow");
        }, 3000);
    }
}