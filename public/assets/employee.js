'use strict'

let projects;
let employees;

$(document).ready(
    axios.get('./api/project').then(res => {
        projects = res.data.data;
        let select = document.getElementById('project_select');

        projects.forEach(item => {
            let option = '<option value="'+item.id+'">'+item.name+'</option>';
            select.innerHTML += option;
        });
    }),
    loadEmployees()
);

function loadEmployees(){
    axios.get('./api/employee').then(res => {
        employees = res.data.data;
        console.log(employees);
        let table = document.getElementById('employeeTable');
        table.innerHTML = '';

        employees.forEach(item => {
            let row = '<tr id="row-'+item.id+'"><th scope="row">'+item.id+'</th><td id="name-'+item.id+'">'+item.name+'</td><td id="lastname-'+item.id+'">'+item.lastname+'</td><td id="project-'+item.id+'">'+item.project.name+'</td><td><i onclick="editEmployee('+item.id+')" class="fa fa-edit text-primary leftItem"></i><i onclick="removeEmployee('+item.id+')" class="fa fa-trash text-danger rightItem"></i></td></tr>';
            table.innerHTML += row;
        });
    })
}

function addNewEmployee(){
    $('#employeeId').val(0);

    $('#employeeId').val('');
    $('#name').val('');
    $('#lastname').val('');
    $('#birthday').val('');
    $('#roll_on_date').val('');
    $('#project_select').val('');

    $('#createEditTitle').html('Create employee');
    $('#createEditEmployee').modal('show');
}

function closeModal(modal){
    let id= '#'+modal;
    $(id).modal('hide');
}

function save(){
    let data = {
        name: $('#name').val(),
        lastname: $('#lastname').val(),
        birthday: $('#birthday').val(),
        roll_on_date: $('#roll_on_date').val(),
        project_id: $('#project_select').val()
    };

    if($('#employeeId').val() > 0){
        let url = './api/employee/'+$('#employeeId').val();
        axios.put(url, data).then(res => {
            loadEmployees();

            $('#employeeId').val(0);
            $('#createEditEmployee').modal('hide');
        });
    }else{
        axios.post('./api/employee', data).then(res => {
            loadEmployees();

            $('#employeeId').val(0);
            $('#createEditEmployee').modal('hide');
        });
    }
}

function remove(){
    let url = './api/employee/'+$('#removeId').val();

    axios.delete(url).then(res => {
        $('#removeId').val(0);
        $('#removeConfirm').modal('hide');

        loadEmployees();
    });
}

function editEmployee(employeeId){
    let currentEmployee = employees.filter(e => {return e.id == employeeId})[0];
    $('#employeeId').val(employeeId);
    $('#name').val(currentEmployee.name);
    $('#lastname').val(currentEmployee.lastname);
    $('#birthday').val(currentEmployee.birthday);
    $('#roll_on_date').val(currentEmployee.roll_on_date);
    $('#project_select').val(currentEmployee.project_id);

    $('#createEditTitle').html('Edit employee');
    $('#createEditEmployee').modal('show');
}

function removeEmployee(employeeId){
    $('#removeId').val(employeeId);
    $('#removeConfirm').modal('show');
}