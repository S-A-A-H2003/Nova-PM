export default function create_new_project(){
    const button_new_project = document.getElementById('button_new_project');
    const form_new_project = document.getElementById('form_new_project');
    const close_form_new_project = document.getElementById('close_form_new_project');
    const button_new_project_other = document.getElementById('button_new_project_other');
    if (button_new_project) {
        button_new_project.addEventListener('click' , function () {
            if (form_new_project.classList.contains('hidden')) {
                form_new_project.classList.remove('hidden');
            }else{
                form_new_project.classList.add('hidden');
            }
        })

    }
    if (close_form_new_project) {
        close_form_new_project.addEventListener('click' , function() {
            form_new_project.classList.add('hidden');
        })
    }

    if (button_new_project_other) {
        button_new_project_other.addEventListener('click' , function() {
            form_new_project.classList.remove('hidden');
        })

    }
}
