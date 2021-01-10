'use strict'

let projects;

$(document).ready(
    loadProjects()
);

function loadProjects(){
    axios.get('./api/project').then(res => {
        projects = res.data.data;
        let table = document.getElementById('projectTable');
        table.innerHTML = '';

        projects.forEach(item => {
            let row = '<tr id="row-'+item.id+'"><th scope="row">'+item.id+'</th><td id="name-'+item.id+'">'+item.name+'</td><td id="description-'+item.id+'">'+item.description+'</td><td><i onclick="editProject('+item.id+')" class="fa fa-edit text-primary leftItem"></i><i onclick="removeProject('+item.id+')" class="fa fa-trash text-danger rightItem"></i></td></tr>';
            table.innerHTML += row;
        });
    })
}

function addNewProject(){
    $('#projectId').val(0);

    $('#name').val('');
    $('#description').val('');

    $('#createEditTitle').html('Create project');
    $('#createEditProject').modal('show');
}

function closeModal(modal){
    let id= '#'+modal;
    $(id).modal('hide');
}

function save(){
    let data = {
        name: $('#name').val(),
        description: $('#description').val()
    };

    if($('#projectId').val() > 0){
        let url = './api/project/'+$('#projectId').val();
        axios.put(url, data).then(res => {
            loadProjects();

            $('#projectId').val(0);
            $('#createEditProject').modal('hide');
        });
    }else{
        axios.post('./api/project', data).then(res => {
            loadProjects();

            $('#projectId').val(0);
            $('#createEditProject').modal('hide');
        });
    }
}

function remove(){
    let url = './api/project/'+$('#removeId').val();

    axios.delete(url).then(res => {
        $('#removeId').val(0);
        $('#removeConfirm').modal('hide');

        loadProjects();
    });
}

function editProject(projectId){
    let currentProject = projects.filter(e => {return e.id == projectId})[0];
    $('#projectId').val(projectId);
    $('#name').val(currentProject.name);
    $('#description').val(currentProject.description);
    $('#createEditTitle').html('Edit project');
    $('#createEditProject').modal('show');
}

function removeProject(projectId){
    $('#removeId').val(projectId);
    $('#removeConfirm').modal('show');
}