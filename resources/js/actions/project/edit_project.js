export default function edit_project(){
    const button_edit_project = document.getElementById('button_edit_project');
    const edit_project = document.getElementById('edit_project');
    const close_form_edit_project = document.getElementById('close_form_edit_project');
    if (button_edit_project) {
        button_edit_project.addEventListener('click' , function () {
            if (edit_project.classList.contains('hidden')) {
                edit_project.classList.remove('hidden');
            }else{
                edit_project.classList.add('hidden');
            }
        })
    }
    if (close_form_edit_project) {
        close_form_edit_project.addEventListener('click' , function() {
            edit_project.classList.add('hidden');
        })
    }
}
